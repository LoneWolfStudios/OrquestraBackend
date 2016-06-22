OrquestraUser.service('PinRepository', ['$q', '$http', 'Pin',
    function ($q, $http, Pin) {
        var repository = {};
        
        repository.byDevice = function (id) {
            var deferred = $q.defer();
            
            $http.get(api_v1("pin/byDevice/" + id)).then(
                function (res) {
                    var pins = _.map(res.data, function (json) {
                        var pin = new Pin();
                        
                        attr(pin, json);
                        
                        return pin;
                    });
                    
                    deferred.resolve(pins);
                }
            );
            
            return deferred.promise;
        };
        
        return repository;
    }
]);