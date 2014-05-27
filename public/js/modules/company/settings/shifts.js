SWIFT.modules.company.settings.shifts = (function () {
        
        var ajax = SWIFT.modules.utilities.ajax;

        ////////////////////////////////////
        function addShift(data, url) {
            ajax.postData(url, 'POST', 'json', data, addShiftBefore, addShiftSuccess);
        }
                
        function addShiftBefore() {
           // console.log('Sending Shift...');
        }

        function addShiftSuccess(data) {

            var name = data.record.name,
                start = data.record.shift_start,
                end = data.record.shift_end;
            $('#addShiftModal').modal('toggle');
            $('#shiftHolder').hide();
            renderShift(name, start, end);
        }

        function addShiftFailure() {

        }
        /////////////////////////////////////
                

        ///////////////////////////////////
        function removeShift (id) {
                    postData(removeUrl, 'POST', 'json', shift, 'removeShiftBefore', 'addShiftSuccess');
                    return true;
        }
        function removeShiftBefore() {}
        function removeShiftSuccess() {}
        function removeShiftFailure() {}
        ///////////////////////////////////
                
       ////////////////////////////////////
        function updateShift(id, data) {
                    postData(updateUrl, 'POST', 'json', shift, 'updateShiftBefore', 'addShiftSuccess');
                    return true;
        }
        function updateShiftBefore() {}
        function updateShiftSuccess() {}
        function updateShiftFailure() {}
        ////////////////////////////////////

        //Rendering Functions
        ////////////////////////////////////
        function renderShift(name, start, end) {
            var row = "<tr><td>"+name+"</td><td>"+start+"</td><td>"+end+"</td></tr>"
                table = $('#shifts_records');

            table.append(row);
        }

        return {
            addShift: addShift,
            removeshift: removeShift,
            updateShift: updateShift
        };

        }());