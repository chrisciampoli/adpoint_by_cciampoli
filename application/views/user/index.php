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
                <li class="disabled"><a href="#week" data-toggle="tab">Week</a></li>
                <li><a href="#month" data-toggle="tab">Month</a></li>
                <li><a href="#pending" data-toggle="tab">Pending</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="daily">
                    <?php $this->load->view('user/day'); ?>
                </div>
                <div class="tab-pane" id="week">
                    <?php $this->load->view('user/week'); ?>
                </div>
                <div class="tab-pane" id="month">
                    <?php $this->load->view('user/month'); ?>
                </div>
                <div class="tab-pane" id="pending">
                    Coming Soon
                </div>
            </div>
        </div>
        <!-- Swift Giveup up Modal -->
        <div class="modal fade" id="giveup_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Swift Give up</h4>
                    </div>
                    <div class="modal-body">
                        <h4>Who would you like to Swift Give Up to?</h4>
                      <?php foreach($employees as $employee) { if($employee['username'] == $this->session->userdata('username')) continue;?> 
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> <?php echo ucwords($employee['username']);?>
                            </label>
                        </div>
                      <?php } ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary">Swift Give Up</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Busy or Not Modal -->
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
