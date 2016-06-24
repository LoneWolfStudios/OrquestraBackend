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