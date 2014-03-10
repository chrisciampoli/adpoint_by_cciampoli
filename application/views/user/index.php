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
                <li id="home_tab" class="active"><a href="#">Home</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Messages</a></li>
            </ul>
        </div>
        <div>
            
        </div>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="<?php echo base_url('public/js/bootstrap.min.js'); ?>"></script>
    </body>
    <script>
        $(function() {
            
            $('#home_tab').tab('show');
            
            $('#home_tab a').click(function(e) {
                e.preventDefault()
                $(this).tab('show')
            })
            
        });
    </script>
</html>
