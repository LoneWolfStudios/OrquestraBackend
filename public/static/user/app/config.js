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