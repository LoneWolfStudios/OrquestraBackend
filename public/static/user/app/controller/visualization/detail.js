OrquestraUser.controller('VisualizationDetailCtrl', ['$scope', '$stateParams', 'Breadcumb', 'VisualizationRepository',
    function ($scope, $stateParams, Breadcumb, VisualizationRepository) {
        Breadcumb.items = [
            { url: 'home', text: 'Dashboard' },
            { url: 'device_detail({ deviceId: ' + $stateParams.deviceId + '})', text: 'Dispositivo' },
            { text: 'Visualização' }
        ];
        
        $scope.chartOptions = {
            legend: {
                show: true,
                container: "#chart-legends"
            },
            
            series: {
                lines: {
                    lineWidth: 1
                }
            },
            
            xaxis: {
                mode: "time",
                timezone: "browser",
                position: "bottom",
                timeFormat: "%H:%M:%S"
            }
        };
        
        VisualizationRepository.find($stateParams.visualizationId).then(
            function onSuccess (visualization) {
                $scope.visualization = visualization;
                
                Breadcumb.title = visualization.name;
                
                VisualizationRepository.dataAll(visualization.id).then(
                    function onSuccess (list) {
                        $scope.chartDataset = [
                            {
                                color: "blue",
                                label: visualization.name,
                                shadowSize: 0,
                                data: _.map(list, function (e) {
                                    return [new Date(e.created_at), e.value];
                                })
                            }
                        ];
                    },
                    function onError (res) {
                        alert("Não foi possivel obter os dados da visualização.");
                    }
                );
            },
            function onError () {
                alert("Não foi possivel obter informações da visualização");
            }
        );
    }
]);
