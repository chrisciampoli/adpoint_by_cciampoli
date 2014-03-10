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

        <!-- Custom styles for this template -->
        <link href="sticky-footer-navbar.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy this line! -->
        <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <!-- Wrap all page content here -->
        <div id="wrap">
            <ul class="nav nav-tabs">
                <li id="daily_tab" class="active"><a href="#daily" data-toggle="tab">Daily</a></li>
                <li><a href="#week" data-toggle="tab">Week</a></li>
                <li><a href="#month" data-toggle="tab">Month</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="daily">
                    <div class="row">
                        <div class="col-xs-12">Employee Name</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">Date</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">Section Working</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">Shift Time</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6"><button type="button" class="btn btn-primary">Swift Giveup</button></div>
                        <div class="col-xs-6"><button type="button" class="btn btn-primary">Busy or Not</button></div>
                    </div>
                </div>
                <div class="tab-pane" id="week">
                    <div class="row">
                        <div class="col-xs-12">.col-md-6</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">.col-md-6</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">.col-md-6</div>
                    </div>
                </div>
                <div class="tab-pane" id="month">
                    <div class="row">
                        <div class="col-md-12">.col-md-6</div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">.col-md-6</div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">.col-md-6</div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            
        </div>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="<?php echo base_url('public/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/js/employees/index.js'); ?>"></script>
    </body>
</html>
