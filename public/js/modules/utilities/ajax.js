SWIFT.modules.utilities.ajax = (function () {
            
            function postData(url, type, dataType, data, beforeSend, success) {
                $.ajax({
                    url: url,
                    type: type,
                    dataType: dataType,
                    data: data,
                    beforeSend: function(data) {
                        beforeSend(data);
                    },
                    success: function(data) {
                        success(data);
                        console.log(data);
                    }
                });
            }
            
            return {
                postData: postData,
            };
            
        }());