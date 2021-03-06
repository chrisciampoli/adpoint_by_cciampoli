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
                        <div id="employee_table" class='table-responsive'>
                            <table  class="table table-hover">
                                <thead id="table_header">
                                    <tr>
                                        <th>Position</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Availability</th>
                                        <th>Controls</th>
                                    </tr>
                                </thead>
                                <tbody id="employee_table_body">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('manager/navigation/nav'); ?>
        </div>
    </div>
</body>
<script src="<?= $script; ?>"></script>
</html>