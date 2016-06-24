OrquestraUser.controller('PinCreateCtrl', ['$scope', '$state', '$stateParams', 'Breadcumb',  'Pin', 'PinRepository',
    function ($scope, $state, $stateParams, Breadcumb, Pin, PinRepository) {
        Breadcumb.title = "Novo Pino";
        
        Breadcumb.items = [
            {url: 'home', text: 'Dashboard'},
            {url: 'device_detail({deviceId: ' + $stateParams.deviceId + '})', text: 'Dispositivo'},
            {text: 'Novo Pino'}
        ];
        
        $scope.pin = new Pin();
        
        $scope.pin.device_id = $stateParams.deviceId;
        
        var clicked = false;
        
        $scope.create = function () {
            if (! clicked) {
                PinRepository.save($scope.pin).then(
                   function onSuccess(pin) {
                       $state.go('device_detail', {
                           deviceId: pin.device_id
                       });
                   },
                   function onError(res) {
                       alert("Houve um erro na criação do pino.");
                   }
                );
            }
        };
    }
]);