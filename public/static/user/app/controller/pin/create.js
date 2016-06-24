OrquestraUser.controller('PinCreateCtrl', ['$scope', '$stateParams', 'Breadcumb',
    function ($scope, $stateParams, Breadcumb) {
        Breadcumb.title = "Novo Pino";
        
        Breadcumb.items = [
            {url: 'home', text: 'Dashboard'},
            {url: 'device_detail({deviceId: ' + $stateParams.deviceId + '})', text: 'Dispositivo'},
            {text: 'Novo Pino'}
        ];
    }
]);