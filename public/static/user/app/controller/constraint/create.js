OrquestraUser.controller('ConstraintCreateCtrl', ['$scope', '$state', '$stateParams', 'Breadcumb',  'Constraint', 'VisualizationRepository', 'ConstraintRepository',
    function ($scope, $state, $stateParams, Breadcumb, Constraint, VisualizationRepository, ConstraintRepository) {
        Breadcumb.title = "Novo Gatilho";
        
        Breadcumb.items = [
            {url: 'home', text: 'Dashboard'},
            {url: 'device_detail({deviceId: ' + $stateParams.deviceId + '})', text: 'Dispositivo'},
            {text: 'Novo Gatilho'}
        ];
        
        $scope.constraint = new Constraint();
        
        $scope.constraint.device_id = $stateParams.deviceId;
        
        var clicked = false;
        
        $scope.create = function () {
            if (! clicked) {
                ConstraintRepository.save($scope.constraint).then(
                   function onSuccess(constraint) {
                       $state.go('device_detail', {
                           deviceId: constraint.device_id
                       });
                   },
                   function onError(res) {
                       alert("Houve um erro na criação do gatilho.");
                   }
                );
            }
        };
        
        VisualizationRepository.byDevice($stateParams.deviceId).then(
            function onSuccess (list) {
                $scope.visualizations = list;
            },
            function onError (res) {
                alert("Houve um erro na obtenção da lista de visualizações");
            }
        );
    }
]);
