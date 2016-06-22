OrquestraUser.controller('DashboardIndexCtrl', ['$scope', 'Breadcumb',
    function ($scope, Breadcumb) {
        Breadcumb.title = "Dashboard";
        Breadcumb.items = [{ text: 'Dashboard' }];
        
        $scope.test = "User Dashboard Index";
    }
]);