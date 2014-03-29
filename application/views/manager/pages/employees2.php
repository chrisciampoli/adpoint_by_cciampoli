<div class="container-fluid">
        <div><h2 class="sub-header" style="display: inline">Employees</h2><button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Add Employee</button></div>
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
                <tr>
                  <td>Manager</td>
                  <td>Christopher Ciampoli</td>
                  <td>(619) 403-2134</td>
                  <td>chrisciampoli@gmail.com</td>
                  <td>
                      <button type="button" rel="1" class="check_avail btn btn-primary btn-sm">
                          <div class="datepicker" id="datepicker_1" rel="1"></div>
                          <span class="glyphicon glyphicon-calendar"></span> Check
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
                <tr id="avail_1" style="display:none; width:100%;" class="alert alert-info">
                    <td style="height: 10%;width: 14%;border:1px solid black;">
                        <div style="text-align:center;"><h4>Monday</h4></div>
                        <div style="text-align: center;"><span class="label label-success">Open</span></div>
                    </td>
                    <td style="height: 10%;width: 14%;border:1px solid black;">
                        <div style="text-align:center;"><h4>Tuesday</h4></div>
                        <div style="text-align: center;"><span class="label label-warning">N/A</span></div>
                    </td>
                    <td style="height: 10%;width: 14%;border:1px solid black;">
                        <div style="text-align:center;"><h4>Wednesday</h4></div>
                        <div style="text-align: center;"><span class="label label-success">Open</span></div>
                    </td>
                    <td style="height: 10%;width: 14%;border:1px solid black;">
                        <div style="text-align:center;"><h4>Thursday</h4></div>
                        <div style="text-align: center;"><span class="label label-warning">N/A</span></div>
                    </td>
                    <td style="height: 10%;width: 14%;border:1px solid black;">
                        <div style="text-align:center;"><h4>Friday</h4></div>
                        <div style="text-align: center;"><span class="label label-success">Open</span></div>
                    </td>
                    <td style="height: 10%;width: 14%;border:1px solid black;">
                        <div style="text-align:center;"><h4>Saturday</h4></div>
                        <div style="text-align: center;"><span class="label label-success">Open</span></div>
                    </td>    
                    <td style="height: 10%;width: 14%;border:1px solid black;">
                        <div style="text-align:center;"><h4>Sunday</h4></div>
                        <div style="text-align: center;"><span class="label label-danger">10AM - 4PM</span></div>
                    </td>  
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                    <h1>Add Employee</h1>
            </div>
        </div>
   </div>
    <div id="create_employee_dialig">
        
    </div>
