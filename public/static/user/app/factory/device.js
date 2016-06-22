OrquestraUser.factory('Device', ['PinRepository',
    function (PinRepository) {
        var Device = new Function();
        
        Device.prototype.pins = function () {
            return PinRepository.byDevice(this.id);
        };
        
        return Device;
    }
]);