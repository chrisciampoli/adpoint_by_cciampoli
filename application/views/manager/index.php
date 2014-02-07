    <body>
        <div data-role="page" id="page1">
            <div data-role="header" style="background-color:#ADFCC0">
                <h1>Swift Schedules</h1>
            </div>
            <div role="main" class="ui-content">
                <div data-role="tabs" style="border:2px solid black;">
                    <div id="fragment-1">
                        <div height="100%" id="container">
                                <?php $this->load->view('employee_info'); ?>
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
                <?php $this->load->view('manager/navigation/nav');?>
            </div>
        </div>
    </body>
</html>