OrquestraUser.controller('VisualizationCreateCtrl', ['$scope', '$state', '$stateParams', 'Breadcumb',  'Visualization', 'VisualizationRepository', 'PinRepository',
    function ($scope, $state, $stateParams, Breadcumb, Visualization, VisualizationRepository, PinRepository) {
        Breadcumb.title = "Novo Pino";
        
        Breadcumb.items = [
            {url: 'home', text: 'Dashboard'},
            {url: 'device_detail({deviceId: ' + $stateParams.deviceId + '})', text: 'Dispositivo'},
            {text: 'Nova Visualização'}
        ];
        
        $scope.visualization = new Visualization();
        
        $scope.visualization.device_id = $stateParams.deviceId;
        
        var clicked = false;
        
        $scope.create = function () {
            if (! clicked) {
                clicked = true;
                
                if ($scope.visualization.x_id) {
                    VisualizationRepository.save($scope.visualization).then(
                       function onSuccess(pin) {
                           $state.go('device_detail', {
                               deviceId: pin.device_id
                           });
                       },
                       function onError(res) {
                           alert("Houve um erro na criação do pino.");

                           clicked = false;
                       }
                    );    
                } else {
                    alert("Você deve escolher ao menos um pino. Sempre do x ao z.");
                    
                    clicked = false;
                }
            }
        };
        
        PinRepository.byDevice($stateParams.deviceId).then(
            function onSuccess (pins) {
                $scope.pins = pins;
            },
            function onError (res) {
                alert("Houve um erro na obtenção dos pinos deste dispositivo");
            }
        );
    }
]);