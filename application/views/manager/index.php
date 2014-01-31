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
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.0/jquery.mobile-1.4.0.min.js"></script>
        <title>Swift Schedules</title>
    </head>
    <body>
        <div data-role="page" id="page1">
            <div data-role="header" style="background-color:#ADFCC0">
                <h1>Swift Schedules</h1>
            </div>
            <div role="main" class="ui-content">
                <div data-role="tabs" style="border:2px solid black;">
                    <div id="fragment-1">
                        <div height="100%" id="container">
                            <div id="employee_name" width="100%"><h2 class="ui-bar"><?=  ucwords($name);?></h2></div>
                            <div id="current_date" width="100%" style="background-color:#C5FAF4"><h2 class="ui-bar"><?php echo date('l F jS Y'); ?></h2></div>
                            <div id="assigned_work_area" width="100%" style="background-color:#F3FF89"><h2 class="ui-bar">Section Working</h2></div>
                            <div id="shift_info" width="100%" style="border:2px solid black;">
                                <div id="shift_sub_info1" width="100%" class="ui-bar">Shift Time</div>
                                <div class="ui-btn ui-input-btn ui-shadow">
                                    Swift Give-up
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
                <?php $this->load->view('nav');?>
            </div>
        </div>
    </body>
</html>