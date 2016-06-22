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

OrquestraUser.factory('Device', [
    function () {
        var Device = new Function();
        
        return Device;
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

OrquestraUser.service('CurrentUser', ['$http', '$q', 'User',
    function ($http, $q, User) {
        var service = {};
        
        var _user = false;
        
        service.get = function () {
            var deferred = $q.defer();
            
            if ( ! _user) {
                $http.get(api_v1("user")).then(
                    function (res) {
                        var user = new User(res.data.id);
                        
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
        
        return service;
    }
]);

OrquestraUser.service('DeviceRepository', ['$http', '$q', 'Device',
    function ($http, $q, Device) {
        var repository = {};
        
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

OrquestraUser.controller('DashboardIndexCtrl', ['$scope',
    function ($scope) {
        $scope.test = "User Dashboard Index";
    }
]);

OrquestraUser.controller('DeviceDetailCtrl', ['$scope',
    function ($scope) {
        $scope.test = "Device Detail";
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
            
            .state('device_detail', {
                url: '/device/{id}',
                views: {
                    MainContent: {
                        templateUrl: view('device/detail')
                    }
                }
            });
        
    }
]);