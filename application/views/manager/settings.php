    <body>
        <div data-role="page" id="page1">
            <div data-role="header" style="background-color:#ADFCC0">
                <h1>Swift Schedules</h1>
            </div>
            <div role="main" class="ui-content">
                <div data-role="tabs" style="border:2px solid black;">
                    <div id="fragment-1">
                        <div height="100%" id="container">
                            <div id="employee_name" width="100%"><h2 class="ui-bar">Employee Name</h2></div>
                            <div id="current_date" width="100%" style="background-color:#C5FAF4"><h2 class="ui-bar"><?php echo date('l F jS Y'); ?></h2></div>
                            <div id="assigned_work_area" width="100%" style="background-color:#F3FF89"><h2 class="ui-bar">Section Working</h2></div>
                            <div id="employee_table">
                               <table>
                                    <thead>
                                    <th>Type</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Availability</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Manager</td>
                                            <td>Bob</td>
                                            <td>Floor</td>
                                            <td>619-999-3453</td>
                                            <td>test@test.com</td>
                                            <td>open</td>
                                        </tr>
                                    </tbody>
                                </table>
                              <input type="submit" value="Logout">
                            </div>
                        </div>
                    </div>
                </div>
                <?php $this->load->view('manager/navigation/nav');?>
            </div>
        </div>
    </body>
</html>