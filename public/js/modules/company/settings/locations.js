SWIFT.modules.company.locations = (function () {
            var name, address, manager, contact;
            
            function addLocation(data) {
                return true;
            }
            
            function updateLocation(id, data) {
                return true;
            }
            
            function removeLocation(id) {
                return true;
            }
            
            return {
                addLocation: addLocation,
                updateLocation: updateLocation,
                removeLocation: removeLocation
            };
            
        }());