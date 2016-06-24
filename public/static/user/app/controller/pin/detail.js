OrquestraUser.controller('PinDetailCtrl', ['$scope', '$stateParams', 'Breadcumb', 'PinRepository',
    function ($scope, $stateParams, Breadcumb, PinRepository) {
        Breadcumb.items = [
            { url: 'home', text: 'Dashboard' },
            { url: 'device_detail({ deviceId: ' + $stateParams.deviceId + '})', text: 'Dispositivo' },
            { text: 'Pino' }
        ];
        
        PinRepository.find($stateParams.pinId).then(
            function (pin) {
                $scope.pin = pin;
                
                Breadcumb.title = pin.name;
            }
        );
    }
]);
