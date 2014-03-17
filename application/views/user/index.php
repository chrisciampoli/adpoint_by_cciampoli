<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

        <title>Swift Schedules</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url('public/css/bootstrap.css'); ?>" rel="stylesheet">

        <!-- Calendar CSS -->
        <link href="<?php echo base_url('public/css/bic_calendar.css'); ?>" rel="stylesheet">

        <!-- jQuery UI CSS -->
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />

        <!-- Custom styles for this template -->
        <!--<link href="sticky-footer-navbar.css" rel="stylesheet">-->

        <!-- Just for debugging purposes. Don't actually copy this line! -->
        <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <script>
            var config = {
                base: "<?php echo base_url(); ?>",
                notes: 4
            };
        </script>
    </head>

    <body>

        <!-- Wrap all page content here -->
        <div id="container">
            <ul class="nav nav-tabs">
                <li id="daily_tab" class="active"><a href="#daily" data-toggle="tab">Daily</a></li>
                <li><a href="#week" data-toggle="tab">Week</a></li>
                <li><a href="#month" data-toggle="tab">Month</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="daily">
                    <table class="table table-striped table-hover">
                        <tr>
                            <td class="well"><h2><?php echo ucwords($username);?></h2></td>
                        </tr>
                        <tr>
                            <td class="well"><h3><?php echo date('l F jS Y'); ?></h3></td>
                        </tr>
                        <tr>
                            <td class="well"><h3 id="working">Title - Area</h3></td>
                        </tr>
                        <tr>
                            <td><h3 id="hours">Shift Hours</h3></td>
                        </tr>
                    </table>

                    <div class="row">
                        <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#pickup_modal">Swift Pick up</button>
                        <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#busy_modal">Busy or Not</button>
                        <button class="btn btn-primary btn-lg" id="logout_btn">Logout</button>
                    </div>
                </div>
                <div class="tab-pane" id="week">
                    <table class="table table-striped table-hover">
                        <tr>
                            <td class="well"><h2><?php echo ucwords($username);?></h2></td>
                        </tr>
                        <tr>
                            <td class="well"><h3><?php echo date('l F jS Y'); ?></h3></td>
                        </tr>
                        <tr>
                            <td class="well"><h3 id="working">Title - Area</h3></td>
                        </tr>
                        <tr>
                            <td><h3>Calendar with Week View</h3></td>
                        </tr>
                    </table>
                    <div class="row">
                        <button type="button" class="btn btn-primary col-xs-12" id="logout_btn">Logout</button>
                    </div>
                </div>
                <div class="tab-pane" id="month">
                    <table class="table table-striped table-hover">
                        <tr>
                            <td class="well"><h2><?php echo ucwords($username);?></h2></td>
                        </tr>
                        <tr>
                            <td class="well"><h3><?php echo date('l F jS Y'); ?></h3></td>
                        </tr>
                        <tr>
                            <td class="well"><h3 id="working">Title - Area</h3></td>
                        </tr>
                        <tr>
                            <td><div id="calendar"></div></td>
                        </tr>
                    </table>
                    <div class="row">
                        <button type="button" class="btn btn-primary col-xs-12" id="logout_btn">Logout</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Swift Pick up Modal -->
        <div class="modal fade" id="pickup_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Swift Pick up</h4>
                    </div>
                    <div class="modal-body">
                        Would you like to pick up a shift for today?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Submit Request</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Swift Pick up Modal -->
        <div class="modal fade" id="busy_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Busy or Not</h4>
                    </div>
                    <div class="modal-body">
                        Would you like to give up your shift for the day?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Submit Request</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
        <script src="<?php echo base_url('public/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/js/employees/index.js'); ?>"></script>
        <script src="<?php echo base_url('public/js/bic_calendar.js'); ?>"></script>
        <script src="https://rawgithub.com/moment/moment/develop/min/moment-with-langs.min.js"></script>
    </body>
</html>
