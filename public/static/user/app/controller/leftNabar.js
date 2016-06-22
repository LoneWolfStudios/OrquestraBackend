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