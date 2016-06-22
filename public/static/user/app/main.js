var OrquestraUser = angular.module('OrquestraUser', ['ui.router']);

var APP_URL = $("#APP_URL").val();

function view(path) {
    return APP_URL + "/user/" + path;
}

OrquestraUser.run([
    function () {
        
    }
]);