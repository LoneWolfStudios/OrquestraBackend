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