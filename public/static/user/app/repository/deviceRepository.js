OrquestraUser.service('DeviceRepository', ['$http', '$q', 'Device',
    function ($http, $q, Device) {
        var repository = {};
        
        repository.byUser = function (id) {
            var deferred = $q.defer();
            
            $http.get(api_v1("device/byUser/" + id)).then(
                function (res) {
                    var devices = _.map(res.data, function (json) {
                        var device = new Device();
                        
                        attr(device, json);
                        
                        return device;
                    });
                    
                    deferred.resolve(devices);
                }
            );
            
            return deferred.promise;
        };
        
        return repository;
    }
]);