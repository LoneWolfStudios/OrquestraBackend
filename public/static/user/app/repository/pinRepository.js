OrquestraUser.service('PinRepository', ['$q', '$http', 'Pin',
    function ($q, $http, Pin) {
        var repository = {};
        
        repository.find = function (id) {
            var deferred = $q.defer();
            
            $http.get(api_v1('pin/find/' + id)).then(
                function (res) {
                    var pin = new Pin();
                    
                    attr(pin, res.data);
                    
                    deferred.resolve(pin);
                }
            );
            
            return deferred.promise;
        };
        
        repository.save = function (pin) {
            var deferred = $q.defer();
            
            var data = JSON.stringify(pin);
            
            $http.post(api_v1("pin/create"), data).then(
                function (res) {
                    pin.id = res.data.id;
                    
                    deferred.resolve(pin);
                },
                function (res) {
                    deferred.reject(pin);
                }
            );
    
            return deferred.promise;
        };
        
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