OrquestraUser.controller('ConstraintDetailCtrl', ['$scope', '$stateParams', 'Breadcumb', 'ConstraintRepository',
    function ($scope, $stateParams, Breadcumb, ConstraintRepository) {
        Breadcumb.items = [
            { url: 'home', text: 'Dashboard' },
            { url: 'device_detail({ deviceId: ' + $stateParams.deviceId + '})', text: 'Dispositivo' },
            { text: 'Pino' }
        ];
        
        ConstraintRepository.find($stateParams.constraintId).then(
            function onSuccess (constraint) {
                $scope.constraint = constraint;
                
                Breadcumb.title = constraint.name;
            },
            function onError () {
                alert("Não foi possivel obter informações do gatilho");
            }
        );
        
    }
]);
