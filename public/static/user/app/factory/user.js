OrquestraUser.factory('User', ['DeviceRepository',
    function (DeviceRepository) {
        var User = new Function();
        
        User.prototype.devices = function () {
            return DeviceRepository.byUser(this.id);
        };
        
        return User;
    }
]);