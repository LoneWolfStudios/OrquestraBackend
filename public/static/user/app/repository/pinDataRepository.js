OrquestraUser.service('PinDataRepository', ['$q', '$http', 'PinData',
    function ($q, $http, PinData) {
        var repository = {};
        
        repository.byPin = function (id) {
            var deferred = $q.defer();
            
            $http.get(api_v1("data/byPin/" + id)).then(
                function (res) {
                    var data = _.map(res.data, function (json) {
                        var pd = new PinData();
                        
                        attr(pd, json);
                        
                        return pd;
                    });
                    
                    deferred.resolve(data);
                }
            );
            
            return deferred.promise;
        };
        
        return repository;
    }
]);