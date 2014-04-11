<div class="container-fluid">
        <div><h2 class="sub-header" style="display: inline">Employees</h2><button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Launch demo modal</button></div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Position</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Availability</th>
                  <th>Current Assignment</th>
                  <th>Controls</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($employees as $employee) { ?>
                <tr>
                  <td>Manager</td>
                  <td><?=ucwords($employee['username']);?></td>
                  <td><?=$employee['phone'];?></td>
                  <td><?=$employee['email'];?></td>
                  <td>
                      <button type="button" rel="<?=$employee['id'];?>" class="check_avail btn btn-primary btn-sm">
                          <div class="datepicker" id="datepicker_1" rel="1"></div>
                          <span class="glyphicon glyphicon-calendar"></span> Schedule
                      </button>
                  </td>
                  <td>Floor (Mission Valley)</td>
                  <td>
                      <button type="button" class="btn btn-primary btn-sm">
                          <span class="glyphicon glyphicon-pencil"></span> Edit
                      </button>
                      <button type="button" class="btn btn-danger btn-sm">
                          <span class="glyphicon glyphicon-remove"></span> Remove
                      </button>
                  </td>
                </tr>
                <tr id="avail_<?=$employee['id'];?>" style="display:none; width:100%;" class="alert alert-info">
                    <td style="height: 10%;width: 14%;border:1px solid black;">
                        <div style="text-align:center;"><h4>Sunday</h4></div>
                        <div style="text-align: center;"><span class="label label-success">Open</span></div>
                    </td>
                    <td style="height: 10%;width: 14%;border:1px solid black;">
                        <div style="text-align:center;"><h4>Monday</h4></div>
                        <div style="text-align: center;"><span class="label label-warning">N/A</span></div>
                    </td>
                    <td style="height: 10%;width: 14%;border:1px solid black;">
                        <div style="text-align:center;"><h4>Tuesday</h4></div>
                        <div style="text-align: center;"><span class="label label-success">Open</span></div>
                    </td>
                    <td style="height: 10%;width: 14%;border:1px solid black;">
                        <div style="text-align:center;"><h4>Wednesday</h4></div>
                        <div style="text-align: center;"><span class="label label-warning">N/A</span></div>
                    </td>
                    <td style="height: 10%;width: 14%;border:1px solid black;">
                        <div style="text-align:center;"><h4>Thursday</h4></div>
                        <div style="text-align: center;"><span class="label label-success">Open</span></div>
                    </td>
                    <td style="height: 10%;width: 14%;border:1px solid black;">
                        <div style="text-align:center;"><h4>Friday</h4></div>
                        <div style="text-align: center;"><span class="label label-success">Open</span></div>
                    </td>    
                    <td style="height: 10%;width: 14%;border:1px solid black;">
                        <div style="text-align:center;"><h4>Saturday</h4></div>
                        <div style="text-align: center;"><span class="label label-danger">10AM - 4PM</span></div>
                    </td>  
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add Employee</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
          <div class="control-group">
            <label class="control-label" for="inputFirstName">First Name</label>
            <div class="controls">
              <input type="text" id="inputFirstName" placeholder="John">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputLastName">Last Name</label>
            <div class="controls">
              <input type="text" id="inputLastName" placeholder="Doe">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputEmail">Email</label>
            <div class="controls">
              <input type="email" id="inputEmail" placeholder="user@example.com">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputPhone">Phone</label>
            <div class="controls">
              <input type="text" id="inputPhone" placeholder="(000) 000-0000">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputPassword">Password</label>
            <div class="controls">
              <input type="password" id="inputPassword" placeholder="">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputPasswordConfirmation">Re-enter Password</label>
            <div class="controls">
              <input type="password" id="inputPasswordConfirmation" placeholder="">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    <div id="create_employee_dialig">
        
    </div>
