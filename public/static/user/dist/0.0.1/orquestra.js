var OrquestraUser = angular.module('OrquestraUser', ['ui.router']);

var APP_URL = $("#APP_URL").val();

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
            });
        
    }
]);