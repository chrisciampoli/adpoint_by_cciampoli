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
                            <div id="employee_table">
                            <table data-role="table" id="my-table" data-mode="columntoggle">
                                <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th><abbr title="Rotten Tomato Rating">Phone</abbr></th>
                                        <th>Email</th>
                                        <th>Availability</th>
                                        <th>Controls</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>1</th>
                                        <td><a href="foo.com" data-rel="external">Citizen Kane</a></td>
                                        <td>1941</td>
                                        <td>100%</td>
                                        <td>74</td>
                                        <td>Afternoon..</td>
                                        <td>Edit</td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $this->load->view('manager/navigation/nav');?>
            </div>
        </div>
    </body>
</html>