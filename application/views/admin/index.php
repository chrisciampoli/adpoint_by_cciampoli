<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">
        <link rel="stylesheet" href="<?=site_url('public/css/bootstrap.css');?>" />
        <link rel="stylesheet" href="<?=site_url('public/css/employees/index.css');?>" />
        <link href='http://fonts.googleapis.com/css?family=Arizonia' rel='stylesheet' type='text/css'>
        <title>Swift Schedules</title>
    </head>
    <body>
        <div data-role="page" id="page1" style="background-color: #0D0D0D;" data-dom-cache="true" data-theme="b" data-next="<?=site_url('admin/home/week');?>" data-url="home">
            <div data-role="header" style="background-color:#BFBA73;color: black;">
                <h1>Swift Schedules</h1>
            </div>
            <div role="main" class="ui-content">
                <div data-role="tabs" style="border:2px solid #590E0E;">
                    <div id="fragment-1">
                        <div height="100%" id="container">
                            <div id="employee_name" width="100%" class="info_box ui-bar"><p><?=  ucwords($name);?> - Cashier</p></div>
                            <div id="current_date" width="100%" class="info_box ui-bar"><p><?php echo date('l F jS Y'); ?></p></div>
                            <div id="assigned_work_area" width="100%" class="info_box ui-bar"><p>Section Working - Counter</p></div>
                            <div id="shift_info" width="100%" style="border:2px solid black;color:white;">
                                <div id="shift_sub_info1" width="100%" class="ui-bar" style="text-align: center;"><h1>Shift Time 4:30 - 9:30 PM</h1></div>
                                <div class="ui-btn ui-input-btn ui-shadow">
                                    Swift Pick up
                                    <input type="button" data-corners="false" data-enhanced="true" value="The Button"></input>
                                </div>
                                <div class="ui-btn ui-input-btn ui-shadow">
                                    Busy or Not
                                    <input type="button" data-corners="false" data-enhanced="true" value="The Button"></input>
                                </div>
                            </div>
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
                        <li><a href="<?php echo site_url("admin/home"); ?>" class="ui-btn-active">Today</a></li>
                        <li><a href="<?php echo site_url("admin/home/week"); ?>">This Week</a></li>
                        <li><a href="<?php echo site_url("admin/home/month"); ?>">This Month</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </body>
    <script src="<?php echo site_url('public/js/employees/index.js');?>"></script>
</html>