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