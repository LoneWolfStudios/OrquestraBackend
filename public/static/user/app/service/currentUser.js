OrquestraUser.service('CurrentUser', ['$http', '$q', 'User',
    function ($http, $q, User) {
        var service = {};
        
        var _user = false;
        
        service.get = function () {
            var deferred = $q.defer();
            
            if ( ! _user) {
                $http.get(api_v1("user")).then(
                    function (res) {
                        var user = new User(res.data.id);
                        
                        _.extend(user, res.data);
                        
                        _user = user;
                        
                        deferred.resolve(_user);
                    }
                );
            } else {
                deferred.resolve(_user);
            }
            
            return deferred.promise;
        };
        
        return service;
    }
]);