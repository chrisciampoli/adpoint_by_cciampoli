SWIFT.modules.company.settings.settings = (function () {
            var name, 
                address, 
                manager, 
                contact,
                ajax = SWIFT.modules.utilities.ajax;

            /////////////////////////////////////////////////////////////////////////    
            function addSettings(data, url) {
                ajax.postData(
                    url, 
                    'post', 
                    'json', 
                    data, 
                    addSettingsBeforeSend, 
                    addSettingsSuccess
                    );
            }

            function addSettingsBeforeSend() {
                $('#saveBtn').html('');
                $('#saveBtn').html('Settings being sent..');
            }

            function addSettingsSuccess(data) {
                
                if(data.status === "failure") {
                    addSettingsFailure(data);
                    return;
                }

                window.location.reload();

            }

            function addSettingsFailure(data) {
                console.log(data);
            }
            ////////////////////////////////////////////////////////////////////////

            function updateSettings(id, data) {
                return true;
            }
            
            function removeSettings(id) {
                return true;
            }
            
            return {
                addSettings: addSettings,
                updateSettings: updateSettings,
                removeSettings: removeSettings
            };
            
        }());