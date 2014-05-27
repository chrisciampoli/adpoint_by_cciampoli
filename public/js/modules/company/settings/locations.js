SWIFT.modules.company.settings.locations = (function () {
            
            var ajax = SWIFT.modules.utilities.ajax;

            ////////////////////////////////////////////////////////
            function addLocation(data, url) {
                ajax.postData(
                    url, 
                    'post', 
                    'json', 
                    data, 
                    addLocationBeforeSend, 
                    addLocationSuccess
                    );
            }

            function addLocationBeforeSend(data) {

            }

            function addLocationSuccess(data) {

            }

            function addLocationFailure(data) {

            }
            /////////////////////////////////////////////////////////

            function updateLocation(id, data) {
                return true;
            }
            
            function removeLocation(id) {
                return true;
            }

            function renderLocation(name, address, manager, contact) {
                var row = "<tr><td>"+name+"</td><td>"+address+"</td><td>"+manager+"</td><td>"+contact+"</td></tr>",
                    table = $('#locations_records');

                table.append(row);
            }

            
            return {
                addLocation: addLocation,
                updateLocation: updateLocation,
                removeLocation: removeLocation
            };
            
        }());