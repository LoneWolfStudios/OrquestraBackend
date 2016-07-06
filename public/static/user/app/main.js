var OrquestraUser = angular.module('OrquestraUser', ['ui.router', 'angular-flot']);

var APP_URL = $("#APP_URL").val();
var API_TOKEN = $("#API_TOKEN").val();

function view(path) {
    return APP_URL + "/user/" + path;
}

function api_v1(path) {
    return APP_URL + "/api/v1/" + path + "?api_token=" + API_TOKEN;
}

function attr(dest, src) {
    for (var e in src) {
        dest[e] = src[e];
    }
}

OrquestraUser.run([
    function () {
        
    }
]);