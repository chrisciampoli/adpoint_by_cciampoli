SWIFT.modules.utilities.strings = (function () {
            
      function ucfirst(str) {
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
      
      return {
          ucfirst: ucfirst
      };
            
}());