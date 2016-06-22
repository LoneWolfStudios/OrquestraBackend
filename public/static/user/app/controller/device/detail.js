OrquestraUser.controller('DeviceDetailCtrl', [
    '$scope', '$stateParams', 'Breadcumb', 'DeviceRepository', 'PinRepository',
    function ($scope, $stateParams, Breadcumb, DeviceRepository, PinRepository) {
        
        Breadcumb.items = [
            { url: 'home', text: 'Dashboard' },
            { text: 'Dispositivo' }
        ];
        
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