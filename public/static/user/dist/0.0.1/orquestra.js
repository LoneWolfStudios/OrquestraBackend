var OrquestraUser = angular.module('OrquestraUser', ['ui.router', 'angular-flot']);

var APP_URL = $("#APP_URL").val();
var API_TOKEN = $("#API_TOKEN").val();

function view(path) {
    return APP_URL + "/user/" + path;
}

function api_v1(path) {
    return APP_URL + "/api/v1/" + path + "?api_token=" + API_TOKEN;
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

OrquestraUser.factory('Constraint', [
    function () {
        var Constraint = new Function();
        
        return Constraint;
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

OrquestraUser.factory('PinData', [
    function () {
        var PinData = new Function();
        
        return PinData;
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

OrquestraUser.factory('Visualization', [
    function () {
        var Visualization = new Function();
        
        return Visualization;
    }    
]);

OrquestraUser.factory('VisualizationData', [
    function () {
        var VisualizationData = new Function();
        
        return VisualizationData;
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

OrquestraUser.service('ConstraintRepository', ['$q', '$http', 'Constraint',
    function ($q, $http, Constraint) {
        var repository = {};
        
        repository.find = function (id) {
            var deferred = $q.defer();
            
            $http.get(api_v1('constraint/find/' + id)).then(
                function (res) {
                    var constraint = new Constraint();
                    
                    attr(constraint, res.data);
                    
                    deferred.resolve(constraint);
                }
            );
            
            return deferred.promise;
        };
        
        repository.save = function (constraint) {
            var deferred = $q.defer();
            
            var data = JSON.stringify(constraint);
            
            $http.post(api_v1("constraint/create"), data).then(
                function (res) {
                    constraint.id = res.data.id;
                    
                    deferred.resolve(constraint);
                },
                function (res) {
                    deferred.reject(constraint);
                }
            );
    
            return deferred.promise;
        };
        
        repository.byDevice = function (id) {
            var deferred = $q.defer();
            
            $http.get(api_v1("constraint/byDevice/" + id)).then(
                function (res) {
                    var constraints = _.map(res.data, function (json) {
                        var constraint = new Constraint();
                        
                        attr(constraint, json);
                        
                        return constraint;
                    });
                    
                    deferred.resolve(constraints);
                }
            );
            
            return deferred.promise;
        };
        
        return repository;
    }
]);


OrquestraUser.service('DeviceRepository', ['$http', '$q', 'Device',
    function ($http, $q, Device) {
        var repository = {};
        
        repository.find = function (id) {
            var deferred = $q.defer();
            
            $http.get(api_v1("device/find/" + id)).then(
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
            
            var data = JSON.stringify(device);
            
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

OrquestraUser.service('PinDataRepository', ['$q', '$http', 'PinData',
    function ($q, $http, PinData) {
        var repository = {};
        
        repository.byPin = function (id) {
            var deferred = $q.defer();
            
            $http.get(api_v1("data/byPin/" + id)).then(
                function (res) {
                    var data = _.map(res.data, function (json) {
                        var pd = new PinData();
                        
                        attr(pd, json);
                        
                        return pd;
                    });
                    
                    deferred.resolve(data);
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
        
        repository.find = function (id) {
            var deferred = $q.defer();
            
            $http.get(api_v1('pin/find/' + id)).then(
                function (res) {
                    var pin = new Pin();
                    
                    attr(pin, res.data);
                    
                    deferred.resolve(pin);
                }
            );
            
            return deferred.promise;
        };
        
        repository.save = function (pin) {
            var deferred = $q.defer();
            
            var data = JSON.stringify(pin);
            
            $http.post(api_v1("pin/create"), data).then(
                function (res) {
                    pin.id = res.data.id;
                    
                    deferred.resolve(pin);
                },
                function (res) {
                    deferred.reject(pin);
                }
            );
    
            return deferred.promise;
        };
        
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

OrquestraUser.service('VisualizationRepository', ['$http', '$q', 'Visualization', 'VisualizationData',
    function ($http, $q, Visualization, VisualizationData) {
        var repository = {};
        
        repository.find = function (id) {
            var deferred = $q.defer();
            
            $http.get(api_v1("visualization/find/" + id)).then(
                function (res) {
                    var visualization = new Visualization();
                        
                    attr(visualization, res.data);
                    
                    deferred.resolve(visualization);
                }
            );
            
            return deferred.promise;
        };
        
        repository.save = function (visualization) {
            var deferred = $q.defer();
            
            var data = JSON.stringify(visualization);
            
            $http.post(api_v1("visualization/create"), data).then(
                function (res) {
                    visualization.id = res.data.id;
                    
                    deferred.resolve(visualization);
                },
                function (res) {
                    deferred.reject(res);
                }
            );
            
            return deferred.promise;
        };
        
        
        repository.byDevice = function (id) {
            var deferred = $q.defer();
            
            $http.get(api_v1("visualization/byDevice/" + id)).then(
                function (res) {
                    var visualizations = _.map(res.data, function (json) {
                        var visualization = new Visualization();
                        
                        attr(visualization, json);
                        
                        return visualization;
                    });
                    
                    deferred.resolve(visualizations);
                }
            );
            
            return deferred.promise;
        };
        
        repository.dataAll = function (id) {
            var deferred = $q.defer();
            
            $http.get(api_v1("visualization/data/" + id + "/all")).then(
                function (res) {
                    var data = _.map(res.data, function (json) {
                        var vd = new VisualizationData();
                        
                        attr(vd, json);
                        
                        return vd;
                    });
                    
                    deferred.resolve(data);
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

OrquestraUser.controller('ConstraintCreateCtrl', ['$scope', '$state', '$stateParams', 'Breadcumb',  'Constraint', 'VisualizationRepository', 'ConstraintRepository',
    function ($scope, $state, $stateParams, Breadcumb, Constraint, VisualizationRepository, ConstraintRepository) {
        Breadcumb.title = "Novo Gatilho";
        
        Breadcumb.items = [
            {url: 'home', text: 'Dashboard'},
            {url: 'device_detail({deviceId: ' + $stateParams.deviceId + '})', text: 'Dispositivo'},
            {text: 'Novo Gatilho'}
        ];
        
        $scope.constraint = new Constraint();
        
        $scope.constraint.device_id = $stateParams.deviceId;
        
        var clicked = false;
        
        $scope.create = function () {
            if (! clicked) {
                ConstraintRepository.save($scope.constraint).then(
                   function onSuccess(constraint) {
                       $state.go('device_detail', {
                           deviceId: constraint.device_id
                       });
                   },
                   function onError(res) {
                       alert("Houve um erro na criação do gatilho.");
                   }
                );
            }
        };
        
        VisualizationRepository.byDevice($stateParams.deviceId).then(
            function onSuccess (list) {
                $scope.visualizations = list;
            },
            function onError (res) {
                alert("Houve um erro na obtenção da lista de visualizações");
            }
        );
    }
]);


OrquestraUser.controller('ConstraintDetailCtrl', ['$scope', '$stateParams', 'Breadcumb', 'ConstraintRepository',
    function ($scope, $stateParams, Breadcumb, ConstraintRepository) {
        Breadcumb.items = [
            { url: 'home', text: 'Dashboard' },
            { url: 'device_detail({ deviceId: ' + $stateParams.deviceId + '})', text: 'Dispositivo' },
            { text: 'Pino' }
        ];
        
        ConstraintRepository.find($stateParams.constraintId).then(
            function onSuccess (constraint) {
                $scope.constraint = constraint;
                
                Breadcumb.title = constraint.name;
            },
            function onError () {
                alert("Não foi possivel obter informações do gatilho");
            }
        );
        
    }
]);


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
    '$scope', '$state', '$stateParams', 'Breadcumb', 'DeviceRepository', 'PinRepository', 'VisualizationRepository', 'ConstraintRepository',
    function ($scope, $state, $stateParams, Breadcumb, DeviceRepository, PinRepository, VisualizationRepository, ConstraintRepository) {
        
        Breadcumb.items = [
            { url: 'home', text: 'Dashboard' },
            { text: 'Dispositivo' }
        ];
        
        DeviceRepository.find($stateParams.deviceId).then(
            function onSuccess (device) {
                $scope.device = device;
                
                Breadcumb.title = device.nickname;
                
                PinRepository.byDevice(device.id).then(
                    function onSuccess (pins) {
                        $scope.pins = pins;
                    },
                    function onError (res) {
                        alert("Houve um erro na obtenção da lista de pinos");
                    }
                );
        
                VisualizationRepository.byDevice(device.id).then(
                    function onSuccess (visualizations) {
                        $scope.visualizations = visualizations;
                    },
                    function onError (res) {
                        alert("Houve um erro na obtenção da lista de visualizações");
                    }
                );
        
                ConstraintRepository.byDevice(device.id).then(
                    function onSuccess (constraints) {
                        $scope.constraints = constraints;
                    },
                    function onError (res) {
                        alert("Houve um erro na obtenção da lista de gatilhos");
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

OrquestraUser.controller('PinCreateCtrl', ['$scope', '$state', '$stateParams', 'Breadcumb',  'Pin', 'PinRepository',
    function ($scope, $state, $stateParams, Breadcumb, Pin, PinRepository) {
        Breadcumb.title = "Novo Pino";
        
        Breadcumb.items = [
            {url: 'home', text: 'Dashboard'},
            {url: 'device_detail({deviceId: ' + $stateParams.deviceId + '})', text: 'Dispositivo'},
            {text: 'Novo Pino'}
        ];
        
        $scope.pin = new Pin();
        
        $scope.pin.device_id = $stateParams.deviceId;
        
        var clicked = false;
        
        $scope.create = function () {
            if (! clicked) {
                PinRepository.save($scope.pin).then(
                   function onSuccess(pin) {
                       $state.go('device_detail', {
                           deviceId: pin.device_id
                       });
                   },
                   function onError(res) {
                       alert("Houve um erro na criação do pino.");
                   }
                );
            }
        };
    }
]);

OrquestraUser.controller('PinDetailCtrl', ['$scope', '$stateParams', 'Breadcumb', 'PinRepository', 'PinDataRepository',
    function ($scope, $stateParams, Breadcumb, PinRepository, PinDataRepository) {
        Breadcumb.items = [
            { url: 'home', text: 'Dashboard' },
            { url: 'device_detail({ deviceId: ' + $stateParams.deviceId + '})', text: 'Dispositivo' },
            { text: 'Pino' }
        ];
        
        $scope.chartOptions = {
            legend: {
                show: true,
                container: "#chart-legends"
            },
            
            series: {
                lines: {
                    lineWidth: 1
                }
            },
            
            xaxis: {
                mode: "time",
                timezone: "browser",
                position: "bottom",
                timeFormat: "%H:%M:%S"
            }
        };
        
        PinRepository.find($stateParams.pinId).then(
            function onSuccess (pin) {
                $scope.pin = pin;
                
                Breadcumb.title = pin.name;
                
                PinDataRepository.byPin(pin.id).then(
                    function onSuccess (list) {
                        $scope.chartDataset = [
                            {
                                color: "blue",
                                label: pin.name,
                                shadowSize: 0,
                                data: _.map(list, function (e) {
                                    return [new Date(e.created_at), e.value];
                                })
                            }
                        ];
                    },
                    function onError (res) {
                        alert("Não foi possivel obter os dados do pino.");
                    }
                );
            },
            function onError () {
                alert("Não foi possivel obter informações do pino");
            }
        );
    }
]);


OrquestraUser.controller('VisualizationCreateCtrl', ['$scope', '$state', '$stateParams', 'Breadcumb',  'Visualization', 'VisualizationRepository', 'PinRepository',
    function ($scope, $state, $stateParams, Breadcumb, Visualization, VisualizationRepository, PinRepository) {
        Breadcumb.title = "Novo Pino";
        
        Breadcumb.items = [
            {url: 'home', text: 'Dashboard'},
            {url: 'device_detail({deviceId: ' + $stateParams.deviceId + '})', text: 'Dispositivo'},
            {text: 'Nova Visualização'}
        ];
        
        $scope.visualization = new Visualization();
        
        $scope.visualization.device_id = $stateParams.deviceId;
        
        var clicked = false;
        
        $scope.create = function () {
            if (! clicked) {
                clicked = true;
                
                if ($scope.visualization.x_id) {
                    VisualizationRepository.save($scope.visualization).then(
                       function onSuccess(pin) {
                           $state.go('device_detail', {
                               deviceId: pin.device_id
                           });
                       },
                       function onError(res) {
                           alert("Houve um erro na criação do pino.");

                           clicked = false;
                       }
                    );    
                } else {
                    alert("Você deve escolher ao menos um pino. Sempre do x ao z.");
                    
                    clicked = false;
                }
            }
        };
        
        PinRepository.byDevice($stateParams.deviceId).then(
            function onSuccess (pins) {
                $scope.pins = pins;
            },
            function onError (res) {
                alert("Houve um erro na obtenção dos pinos deste dispositivo");
            }
        );
    }
]);

OrquestraUser.controller('VisualizationDetailCtrl', ['$scope', '$stateParams', 'Breadcumb', 'VisualizationRepository',
    function ($scope, $stateParams, Breadcumb, VisualizationRepository) {
        Breadcumb.items = [
            { url: 'home', text: 'Dashboard' },
            { url: 'device_detail({ deviceId: ' + $stateParams.deviceId + '})', text: 'Dispositivo' },
            { text: 'Visualização' }
        ];
        
        $scope.chartOptions = {
            legend: {
                show: true,
                container: "#chart-legends"
            },
            
            series: {
                lines: {
                    lineWidth: 1
                }
            },
            
            xaxis: {
                mode: "time",
                timezone: "browser",
                position: "bottom",
                timeFormat: "%H:%M:%S"
            }
        };
        
        VisualizationRepository.find($stateParams.visualizationId).then(
            function onSuccess (visualization) {
                $scope.visualization = visualization;
                
                Breadcumb.title = visualization.name;
                
                VisualizationRepository.dataAll(visualization.id).then(
                    function onSuccess (list) {
                        $scope.chartDataset = [
                            {
                                color: "blue",
                                label: visualization.name,
                                shadowSize: 0,
                                data: _.map(list, function (e) {
                                    return [new Date(e.created_at), e.value];
                                })
                            }
                        ];
                    },
                    function onError (res) {
                        alert("Não foi possivel obter os dados da visualização.");
                    }
                );
            },
            function onError () {
                alert("Não foi possivel obter informações da visualização");
            }
        );
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
            
            .state('constraint_create', {
                url: '/device/{deviceId}/constraint/create',
                views: {
                    MainContent: {
                        templateUrl: view('constraint/create')
                    }
                }
            })
            
            .state('constraint_detail', {
                url: '/device/{deviceId}/constraint/{constraintId}',
                views: {
                    MainContent: {
                        templateUrl: view('constraint/detail')
                    }
                }
            })
            
            .state('visualization_create', {
                url: '/device/{deviceId}/visualization/create',
                views: {
                    MainContent: {
                        templateUrl: view('visualization/create')
                    }
                }
            })
            
            .state('visualization_detail', {
                url: '/device/{deviceId}/visualization/{visualizationId}',
                views: {
                    MainContent: {
                        templateUrl: view('visualization/detail')
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
            
            .state('pin_detail', {
                url: '/device/{deviceId}/pin/{pinId}',
                views: {
                    MainContent: {
                        templateUrl: view('pin/detail')
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