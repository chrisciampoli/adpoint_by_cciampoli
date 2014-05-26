SWIFT.modules.company.shifts = (function () {
        
                var name,
                    shift_start,
                    shift_end,
                    addUrl = '',
                    updateUrl = '',
                    removeUrl = '',
                    postData = SWIFT.postData;

                    console.log(postData);
        
                ////////////////////////////////////
        function addShift(data) {
                    postData(addUrl, 'POST', 'json', shift, 'addShiftBefore', 'addShiftSuccess');
                    return true;
        }
                
                function addShiftBefore() {}
                function addShiftSuccess() {}
                function addShiftFailure() {}
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


        return {
            addShift: addShift,
            removeshift: removeShift,
            updateShift: updateShift
        };

        }());