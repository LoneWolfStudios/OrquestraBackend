var OrquestraUser = angular.module('OrquestraUser', ['ui.router']);

var APP_URL = $("#APP_URL");

function view(path) {
    return APP_URL + "/user/" + path;
}

OrquestraUser.run([
    function () {
        
    }
]);

OrquestraUser.controller('DashboardIndexCtrl', ['$scope',
    function ($scope) {
        $scope.test = "User Dashboard Index";
    }
]);

OrquetraUser.config(['$stateProvider', '$urlRouteProvider',
    function ($stateProvider, $urlRouteProvider) {
        
        $urlRouteProvider.otherwise('/');
        
        $stateProvider
            .state('home', {
                url: '/',
                views: {
                    MainContent: {
                        templateUrl: view('dashboard')
                    }
                }
            });
        
    }
]);