<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.0/jquery.mobile-1.4.0.min.css" />
        <link rel="stylesheet" href="<?= site_url('public/css/employees/index2.css'); ?>" />
        <title>Swift Schedules</title>
    </head>
    <body>
        <div data-role="page" id="city" class="demo-page" data-dom-cache="true" data-theme="b" data-prev="<?=site_url('admin/home');?>" data-next="<?=site_url('admin/home/week');?>" data-url="city">
            <div role="main" class="ui-content">
                <div id="trivia-city" class="trivia ui-content" data-role="page" data-position-to="window" data-tolerance="50,30,30,30" data-theme="a">
                    <div data-role="tabs" style="border:2px solid #590E0E;">
                        <div id="fragment-1">
                        <div height="100%" id="container">
                            <p>TEST</p>
                        </div>
                    </div>
                </div>
                <div data-role="navbar">
                    <ul>
                        <li><a href="<?php echo site_url("admin/home"); ?>" class="ui-btn-active">Today</a></li>
                        <li><a href="<?php echo site_url("admin/home/week"); ?>">This Week</a></li>
                        <li><a href="<?php echo site_url("admin/home/month"); ?>">This Month</a></li>
                    </ul>
                </div>
                    </div>
                </div><!-- /popup -->
            </div><!-- /content -->
        </div>
    </body>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.0/jquery.mobile-1.4.0.min.js"></script>
    <script src="<?php echo site_url('public/js/employees/index2.js'); ?>"></script>
</html>