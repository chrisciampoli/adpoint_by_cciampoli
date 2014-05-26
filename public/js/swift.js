var SWIFT = SWIFT || {};

    SWIFT.namespace = function (ns_string) {
        var parts = ns_string.split('.'),
            parent = SWIFT,
            i;

        if(parts[0] === "SWIFT") {
            parts = parts.slice(1);
        }

        for(i = 0; i < parts.length; i += 1) {
            if(typeof parent[parts[i]] === "undefined") {
                parent[parts[i]] = {};
            }
            parent = parent[parts[i]];
        }
        return parent;
    }; 

    SWIFT.namespace('modules.company.settings.shifts');     
    SWIFT.namespace('modules.company.settings.locations');

    SWIFT.namespace('modules.company.employee.swift_giveups');
    SWIFT.namespace('modules.company.employee.busy_or_not');
    SWIFT.namespace('modules.company.employee.schedule');
    
    SWIFT.namespace('modules.company.manager.swift_giveups');
    SWIFT.namespace('modules.company.manager.schedule');
    SWIFT.namespace('modules.company.manager.employees');
    SWIFT.namespace('modules.company.manager.shifts');

    SWIFT.postData = function(url, type, dataType, data, beforeSend, success) {
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
                    }
                });
            }

    SWIFT.ucfirst = function(str) {
      //  discuss at: http://phpjs.org/functions/ucfirst/
      // original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
      // bugfixed by: Onno Marsman
      // improved by: Brett Zamir (http://brett-zamir.me)
      //   example 1: ucfirst('kevin van zonneveld');
      //   returns 1: 'Kevin van zonneveld'

      str += '';
      var f = str.charAt(0)
        .toUpperCase();
      return f + str.substr(1);
    }

    window.test = SWIFT;