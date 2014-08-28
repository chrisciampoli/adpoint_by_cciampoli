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
                var location = data.record;
                $('#addLocationModal').modal('toggle');
                $('#locationAddBtn').show();
                renderLocation(location.id, location.locationName, location.locationAddress, location.manager, location.contact);
            }

            function addLocationFailure(data) {

            }
            /////////////////////////////////////////////////////////

            function updateLocation(id, data) {
                return true;
            }
            
            function removeLocation(data, url) {
                 ajax.postData(url, 'POST', 'json', data, removeLocationBefore, removeLocationSuccess);
                 return true;
            }

            function removeLocationBefore(){}
            function removeLocationSuccess(){}


            function renderLocation(id, name, address, manager, contact) {
                var row = "<tr id="+id+"><td>"+name+"</td><td>"+address+"</td><td>"+manager+"</td><td>"+contact+"</td><td><button class='btn btn-small' id='locationDeleteBtn'>Delete</button></td></tr>",
                    table = $('#locations_records');

                table.append(row);
            }

            
            return {
                addLocation: addLocation,
                updateLocation: updateLocation,
                removeLocation: removeLocation
            };
            
        }());