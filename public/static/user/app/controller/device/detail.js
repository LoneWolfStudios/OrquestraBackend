OrquestraUser.controller('DeviceDetailCtrl', [
    '$scope', '$state', '$stateParams', 'Breadcumb', 'DeviceRepository', 'PinRepository', 'VisualizationRepository', 'ConstraintRepository',
    function ($scope, $state, $stateParams, Breadcumb, DeviceRepository, PinRepository, VisualizationRepository, ConstraintRepository) {
        
        Breadcumb.items = [
            { url: 'home', text: 'Dashboard' },
            { text: 'Dispositivo' }
        ];
        
        DeviceRepository.find($stateParams.deviceId).then(
            function onSuccess (device) {
                $scope.device = device;
                
                Breadcumb.title = device.nickname;
                
                PinRepository.byDevice(device.id).then(
                    function onSuccess (pins) {
                        $scope.pins = pins;
                    },
                    function onError (res) {
                        alert("Houve um erro na obtenção da lista de pinos");
                    }
                );
        
                VisualizationRepository.byDevice(device.id).then(
                    function onSuccess (visualizations) {
                        $scope.visualizations = visualizations;
                    },
                    function onError (res) {
                        alert("Houve um erro na obtenção da lista de visualizações");
                    }
                );
        
                ConstraintRepository.byDevice(device.id).then(
                    function onSuccess (constraints) {
                        $scope.constraints = constraints;
                    },
                    function onError (res) {
                        alert("Houve um erro na obtenção da lista de gatilhos");
                    }
                );
        
            }
        );
        
    }
]);