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

    SWIFT.namespace('modules.company.settings.settings');
    SWIFT.namespace('modules.company.settings.shifts');     
    SWIFT.namespace('modules.company.settings.locations');

    SWIFT.namespace('modules.company.employee.swift_giveups');
    SWIFT.namespace('modules.company.employee.busy_or_not');
    SWIFT.namespace('modules.company.employee.schedule');
    
    SWIFT.namespace('modules.company.manager.swift_giveups');
    SWIFT.namespace('modules.company.manager.schedule');
    SWIFT.namespace('modules.company.manager.employees');
    SWIFT.namespace('modules.company.manager.shifts');

    SWIFT.namespace('modules.utilities.ajax');
    SWIFT.namespace('modules.utilities.validation');
    SWIFT.namespace('modules.utilities.strings');
