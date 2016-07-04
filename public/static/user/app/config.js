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
            
            .state('visualization_create', {
                url: '/{deviceId}/visualization/create',
                views: {
                    MainContent: {
                        templateUrl: view('visualization/create')
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