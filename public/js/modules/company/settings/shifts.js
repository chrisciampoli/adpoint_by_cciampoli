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
                end = data.record.shift_end,
                id = data.record.id;
            $('#addShiftModal').modal('toggle');
            $('#shiftHolder').hide();
            $('#shiftAddBtn').show();
            renderShift(id, name, start, end);
        }

        function addShiftFailure() {

        }
        /////////////////////////////////////
                

        ///////////////////////////////////
        function removeShift (data, url) {
                    ajax.postData(url, 'POST', 'json', data, removeShiftBefore, removeShiftSuccess);
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
        function renderShift(id, name, start, end) {
            var row = "<tr id="+id+"><td>"+name+"</td><td>"+start+"</td><td>"+end+"</td><td><button class='btn btn-small' id='shiftDeleteBtn'>Delete</button></td></tr>",
                table = $('#shifts_records');

            table.append(row);
        }

        return {
            addShift: addShift,
            removeShift: removeShift,
            updateShift: updateShift
        };

        }());