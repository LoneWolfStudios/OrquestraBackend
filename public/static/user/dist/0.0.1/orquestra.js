var OrquestraUser = angular.module('OrquestraUser', ['ui.router']);

var APP_URL = $("#APP_URL").val();

function view(path) {
    return APP_URL + "/user/" + path;
}

function api_v1(path) {
    return APP_URL + "/api/v1/" + path;
}

function attr(dest, src) {
    for (var e in src) {
        dest[e] = src[e];
    }
}

OrquestraUser.run([
    function () {
        
    }
]);

OrquestraUser.factory('Device', ['PinRepository',
    function (PinRepository) {
        var Device = new Function();
        
        Device.prototype.pins = function () {
            return PinRepository.byDevice(this.id);
        };
        
        return Device;
    }
]);

OrquestraUser.factory('Pin', [
    function () {
        var Pin = new Function();
        
        return Pin;
    }    
]);

OrquestraUser.factory('User', ['DeviceRepository',
    function (DeviceRepository) {
        var User = new Function();
        
        User.prototype.devices = function () {
            return DeviceRepository.byUser(this.id);
        };
        
        return User;
    }
]);

OrquestraUser.service('Breadcumb', [
    function () {
        var service = this;
        
        service.title = "Teste";
        
        service.items = [];
    }
]);

OrquestraUser.service('CurrentUser', ['$http', '$q', 'User',
    function ($http, $q, User) {
        var service = this;
        
        var _user = false;
        
        service.get = function () {
            var deferred = $q.defer();
            
            if ( ! _user) {
                $http.get(api_v1("user")).then(
                    function (res) {
                        var user = new User();
                        
                        _.extend(user, res.data);
                        
                        _user = user;
                        
                        deferred.resolve(_user);
                    }
                );
            } else {
                deferred.resolve(_user);
            }
            
            return deferred.promise;
        };
    }
]);

OrquestraUser.service('DeviceRepository', ['$http', '$q', 'Device',
    function ($http, $q, Device) {
        var repository = {};
        
        repository.find = function (id) {
            var deferred = $q.defer();
            
            $http.get(api_v1("device/" + id)).then(
                function (res) {
                    var device = new Device();
                        
                    attr(device, res.data);
                    
                    deferred.resolve(device);
                }
            );
            
            return deferred.promise;
        };
        
        repository.save = function (device) {
            var deferred = $q.defer();
            
            var data = {
                nickname: device.nickname,
                desc: device.desc,
                user_id: device.user_id
            };
            
            $http.post(api_v1("device/create"), data).then(
                function (res) {
                    device.id = res.data.id;
                    
                    deferred.resolve(device);
                },
                function (res) {
                    deferred.reject(res);
                }
            );
            
            return deferred.promise;
        };
        
        repository.byUser = function (id) {
            var deferred = $q.defer();
            
            $http.get(api_v1("device/byUser/" + id)).then(
                function (res) {
                    var devices = _.map(res.data, function (json) {
                        var device = new Device();
                        
                        attr(device, json);
                        
                        return device;
                    });
                    
                    deferred.resolve(devices);
                }
            );
            
            return deferred.promise;
        };
        
        return repository;
    }
]);

OrquestraUser.service('PinRepository', ['$q', '$http', 'Pin',
    function ($q, $http, Pin) {
        var repository = {};
        
        repository.byDevice = function (id) {
            var deferred = $q.defer();
            
            $http.get(api_v1("pin/byDevice/" + id)).then(
                function (res) {
                    var pins = _.map(res.data, function (json) {
                        var pin = new Pin();
                        
                        attr(pin, json);
                        
                        return pin;
                    });
                    
                    deferred.resolve(pins);
                }
            );
            
            return deferred.promise;
        };
        
        return repository;
    }
]);

OrquestraUser.controller('BreadcumbCtrl', ['$scope', 'Breadcumb',
    function ($scope, Breadcumb) {
        $scope.breadcumb = Breadcumb;
    }
])

OrquestraUser.controller('DashboardIndexCtrl', ['$scope', 'Breadcumb',
    function ($scope, Breadcumb) {
        Breadcumb.title = "Dashboard";
        Breadcumb.items = [{ text: 'Dashboard' }];
        
        $scope.test = "User Dashboard Index";
    }
]);

OrquestraUser.controller('DeviceCreateCtrl', ['$scope', '$state', 'Breadcumb', 'CurrentUser', 'Device', 'DeviceRepository',
    function ($scope, $state, Breadcumb, CurrentUser, Device, DeviceRepository) {
        Breadcumb.items = [
            { url: 'home', text: 'Dashboard' },
            { text: 'Novo Dispositivo' }
        ];
        
        Breadcumb.title = "Novo Dispositivo";
        
        $scope.device = new Device();
        
        var clicked = false;
        
        $scope.create = function () {
            if (! clicked) {
                
                clicked = true;
                
                CurrentUser.get().then(function (user) {
                    $scope.device.user_id = user.id;
                    
                    DeviceRepository.save($scope.device).then(
                        function onSuccess(device) {
                            $state.go('home');
                        },
                        function onError(res) {
                            clicked = false;
                            alert('Houve um erro na criação do dispositivo.');
                        }
                    );                    
                });

            }
        };
    }
]);

OrquestraUser.controller('DeviceDetailCtrl', [
    '$scope', '$state', '$stateParams', 'Breadcumb', 'DeviceRepository', 'PinRepository',
    function ($scope, $state, $stateParams, Breadcumb, DeviceRepository, PinRepository) {
        
        Breadcumb.items = [
            { url: 'home', text: 'Dashboard' },
            { text: 'Dispositivo' }
        ];
        
        $scope.createPin = function () {
            $state.go('pin_create', {
                deviceId: $stateParams.deviceId
            });
        };
        
        DeviceRepository.find($stateParams.deviceId).then(
            function (device) {
                $scope.device = device;
                
                Breadcumb.title = device.nickname;
                
                PinRepository.byDevice(device.id).then(
                    function (pins) {
                        $scope.pins = pins;
                    }
                );
            }
        );
        
    }
]);

OrquestraUser.controller('LeftNavbarCtrl', ['$scope', 'CurrentUser',
    function ($scope, CurrentUser) {
        
        CurrentUser.get().then(
            function (user) {
                $scope.user = user;
                
                user.devices().then(
                    function (devices) {
                        $scope.devices = devices;
                    }
                );
            }
        );
        
    }
]);

OrquestraUser.controller('PinCreateCtrl', ['$scope', '$stateParams', 'Breadcumb',
    function ($scope, $stateParams, Breadcumb) {
        Breadcumb.title = "Novo Pino";
        
        Breadcumb.items = [
            {url: 'home', text: 'Dashboard'},
            {url: 'device_detail({deviceId: ' + $stateParams.deviceId + '})', text: 'Dispositivo'},
            {text: 'Novo Pino'}
        ];
    }
]);

OrquestraUser.config(['$stateProvider', '$urlRouterProvider',
    function ($stateProvider, $urlRouterProvider) {
        
        $urlRouterProvider.otherwise('/');
        
        $stateProvider
            .state('home', {
                url: '/',
                views: {
                    MainContent: {
                        templateUrl: view('dashboard')
                    }
                }
            })
            
            .state('pin_create', {
                url: '/{deviceId}/pin/create',
                views: {
                    MainContent: {
                        templateUrl: view('pin/create')
                    }
                }
            })
            
            .state('device_create', {
                url: '/device/create',
                views: {
                    MainContent: {
                        templateUrl: view('device/create')
                    }
                }
            })
            
            .state('device_detail', {
                url: '/device/{deviceId}',
                views: {
                    MainContent: {
                        templateUrl: view('device/detail')
                    }
                }
            });
        
    }
]);