$(function() {

    var logout_url = config.base + "auth/logout",
            schedule_url = config.base + "user/home/getSchedule",
            events = [];

    // Gonna need to do a query to a schedules table
    // Using the username from php.  We will grab the data
    // in json, and the build the events variable based on that.
    /*
     CREATE TABLE `schedules` (
     `id` int(11) NOT NULL auto_increment,
     `user` varchar(255) NOT NULL,
     `schedule` TEXT NOT NULL,
     `updated`  TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
     PRIMARY KEY (`id`)
     ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
     */

    $.ajax({
        url: schedule_url,
        data: {},
        success: function(data) {
            window.test = data;
            var replaced = str_replace('\/', '/', data);
            var parsed = $.parseJSON(replaced);
            $.each(parsed, function(index, element) {
                events.push(element.schedule);
            });
            console.log('Events: ' + events);
        },
        failure: function(data) {
            alert('Issue with pulling schedule!  Please refresh the page');
        }
    });
    /*
     var events = [
     {
     date: "11/3/2014",
     title: "Starbucks: College",
     color: "#333",
     content: '4:30PM - 10:30PM'
     },
     {
     date: "12/3/2014",
     title: "Starbucks: College",
     color: "#333",
     content: '6:30PM - 10:30PM'
     },
     {
     date: "13/3/2014",
     title: "Starbucks: College",
     color: "#333",
     content: '5:30PM - 10:30PM'
     }
     ];
     */

    function str_replace(search, replace, subject, count) {
        //  discuss at: http://phpjs.org/functions/str_replace/
        // original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
        // improved by: Gabriel Paderni
        // improved by: Philip Peterson
        // improved by: Simon Willison (http://simonwillison.net)
        // improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
        // improved by: Onno Marsman
        // improved by: Brett Zamir (http://brett-zamir.me)
        //  revised by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
        // bugfixed by: Anton Ongson
        // bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
        // bugfixed by: Oleg Eremeev
        //    input by: Onno Marsman
        //    input by: Brett Zamir (http://brett-zamir.me)
        //    input by: Oleg Eremeev
        //        note: The count parameter must be passed as a string in order
        //        note: to find a global variable in which the result will be given
        //   example 1: str_replace(' ', '.', 'Kevin van Zonneveld');
        //   returns 1: 'Kevin.van.Zonneveld'
        //   example 2: str_replace(['{name}', 'l'], ['hello', 'm'], '{name}, lars');
        //   returns 2: 'hemmo, mars'

        var i = 0,
                j = 0,
                temp = '',
                repl = '',
                sl = 0,
                fl = 0,
                f = [].concat(search),
                r = [].concat(replace),
                s = subject,
                ra = Object.prototype.toString.call(r) === '[object Array]',
                sa = Object.prototype.toString.call(s) === '[object Array]';
        s = [].concat(s);
        if (count) {
            this.window[count] = 0;
        }

        for (i = 0, sl = s.length; i < sl; i++) {
            if (s[i] === '') {
                continue;
            }
            for (j = 0, fl = f.length; j < fl; j++) {
                temp = s[i] + '';
                repl = ra ? (r[j] !== undefined ? r[j] : '') : r[0];
                s[i] = (temp)
                        .split(f[j])
                        .join(repl);
                if (count && s[i] !== temp) {
                    this.window[count] += (temp.length - s[i].length) / f[j].length;
                }
            }
        }
        return sa ? s : s[0];
    }


    var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

    var dayNames = ["S", "M", "T", "W", "T", "F", "S"];

    $('#calendar').bic_calendar({
        events: window.test,
        //enable select
        enableSelect: true,
        //set day names
        dayNames: dayNames,
        //set month names
        monthNames: monthNames,
        //show dayNames
        showDays: true,
        //show month controller
        displayMonthController: true,
        //show year controller
        displayYearController: true,
        //change calendar to english format
        startWeekDay: 1,
        //set ajax call
        reqAjax: {
            type: 'get',
            url: 'http://bic.cat/bic_calendar/index.php'
        }
    });



    $('body').on('click', '#logout_btn', function(e) {
        e.preventDefault();
        $.ajax({
            url: logout_url,
            data: {},
            success: function(data) {
                window.location.href = config.base;
            },
            failure: function(data) {
                alert('Issue with logging you out.  Please refresh the page!');
            }
        });
    });

    $('body').on('click', '#pickup_btn', function(e) {
        e.preventDefault();
    });

});
