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
        <link rel="stylesheet" href="<?=site_url('public/css/employees/index.css');?>" />
        <title>Swift Schedules</title>
    </head>
    <body>
        <div data-role="page" id="page2" style="background-color: #0D0D0D;" data-dom-cache="true" data-theme="b" data-prev="<?=site_url('admin/home');?>" data-next="<?=site_url('admin/home/month');?>" data-url="week">
            <div data-role="header" style="background-color:#BFBA73;color: black;">
                <h1>Swift Schedules</h1>
            </div>
            <div role="main" class="ui-content">
                <div data-role="tabs" style="border:2px solid #590E0E;">
                    <div id="fragment-1">
                        <div height="100%" id="container">
                            <div id="employee_name" width="100%" class="info_box"><h2 class="ui-bar"><?=  ucwords($name);?> - Cashier</h2></div>
                            <div id="current_date" width="100%" class="info_box"><h2 class="ui-bar"><?php echo date('l F jS Y'); ?></h2></div>
                            <div class="ui-btn ui-input-btn ui-shadow">
                                <?php echo form_open("public/auth/logout");?>
                                <?php echo form_submit('logout_submit', 'Logout');?>
                                <?php echo form_close();?>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-role="navbar">
                    <ul>
                        <li><a href="<?php echo site_url("admin/home"); ?>" >Today</a></li>
                        <li><a href="<?php echo site_url("admin/home/week"); ?>" class="ui-btn-active">This Week</a></li>
                        <li><a href="<?php echo site_url("admin/home/month"); ?>">This Month</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </body>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.0/jquery.mobile-1.4.0.min.js"></script>
    <script src="<?php echo site_url('public/js/employees/index.js');?>"></script>
</html>