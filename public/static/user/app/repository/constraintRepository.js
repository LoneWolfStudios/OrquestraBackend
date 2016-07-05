OrquestraUser.service('ConstraintRepository', ['$q', '$http', 'Constraint',
    function ($q, $http, Constraint) {
        var repository = {};
        
        repository.find = function (id) {
            var deferred = $q.defer();
            
            $http.get(api_v1('constraint/find/' + id)).then(
                function (res) {
                    var constraint = new Constraint();
                    
                    attr(constraint, res.data);
                    
                    deferred.resolve(constraint);
                }
            );
            
            return deferred.promise;
        };
        
        repository.save = function (constraint) {
            var deferred = $q.defer();
            
            var data = JSON.stringify(constraint);
            
            $http.post(api_v1("constraint/create"), data).then(
                function (res) {
                    constraint.id = res.data.id;
                    
                    deferred.resolve(constraint);
                },
                function (res) {
                    deferred.reject(constraint);
                }
            );
    
            return deferred.promise;
        };
        
        repository.byDevice = function (id) {
            var deferred = $q.defer();
            
            $http.get(api_v1("constraint/byDevice/" + id)).then(
                function (res) {
                    var constraints = _.map(res.data, function (json) {
                        var constraint = new Constraint();
                        
                        attr(constraint, json);
                        
                        return constraint;
                    });
                    
                    deferred.resolve(constraints);
                }
            );
            
            return deferred.promise;
        };
        
        return repository;
    }
]);
