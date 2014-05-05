<script>
    var config = {
        base: "<?php echo base_url(); ?>",
        notes: 4
    };
</script>
<div class="container-fluid">
    <form role="form" method="post" action="<?= base_url('manager/home/postSettings');?>">
      <div class="form-group">
        <label for="company_name">Company Name</label>
        <input value="<?=(isset($settings[0]['company_name']) ? $settings[0]['company_name'] : '');?>" type="input" class="form-control" id="company_name" name="company_name" placeholder="Company Name" required>
      </div>
      <div class="form-group form-inline">
        <button type="button" class="btn btn-default" id="add_location">Display Shifts</button>
        <div class="container-fluid" style="display:none;">
        <div><h2 class="sub-header" style="display: inline">Employees</h2><button style="float:right;margin: 7px;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addEmployeeModal">Add Employee</button></div>
          <div class="table-responsive">
            <table class="table table-striped" id="employee_table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Availability</th>
                  <th>Controls</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($employees as $employee) { ?>
                <tr>
                  <td><?=ucwords($employee['username']);?></td>
                  <td><?=$employee['phone'];?></td>
                  <td><?=$employee['email'];?></td>
                  <td>
                      <button data-toggle="modal" data-target="#editScheduleModal" type="button" rel="<?=$employee['id'];?>|<?=$employee['username'];?>" class="check_avail btn btn-primary btn-sm">
                          <div class="datepicker" id="datepicker_1" rel="1"></div>
                          <span class="glyphicon glyphicon-calendar"></span> Schedule
                      </button>
                  </td>
                  <td>
                      <button type="button" class="btn btn-primary btn-sm">
                          <span class="glyphicon glyphicon-pencil"></span> Edit
                      </button>
                      <button type="button" class="btn btn-danger btn-sm">
                          <span class="glyphicon glyphicon-remove"></span> Remove
                      </button>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
      </div>
      <div class="form-group form-inline" style="display:none;">
        <button type="button" class="btn btn-default" id="add_location">Display Locations</button>
        <div class="container-fluid">
        <div><h2 class="sub-header" style="display: inline">Employees</h2><button style="float:right;margin: 7px;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addEmployeeModal">Add Employee</button></div>
          <div class="table-responsive">
            <table class="table table-striped" id="employee_table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Availability</th>
                  <th>Controls</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($employees as $employee) { ?>
                <tr>
                  <td><?=ucwords($employee['username']);?></td>
                  <td><?=$employee['phone'];?></td>
                  <td><?=$employee['email'];?></td>
                  <td>
                      <button data-toggle="modal" data-target="#editScheduleModal" type="button" rel="<?=$employee['id'];?>|<?=$employee['username'];?>" class="check_avail btn btn-primary btn-sm">
                          <div class="datepicker" id="datepicker_1" rel="1"></div>
                          <span class="glyphicon glyphicon-calendar"></span> Schedule
                      </button>
                  </td>
                  <td>
                      <button type="button" class="btn btn-primary btn-sm">
                          <span class="glyphicon glyphicon-pencil"></span> Edit
                      </button>
                      <button type="button" class="btn btn-danger btn-sm">
                          <span class="glyphicon glyphicon-remove"></span> Remove
                      </button>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
      </div>
      <div class="form-group">
        <label for="admin_email">Administrator Contact Email</label>
        <input value="<?=(isset($settings[0]['admin_email']) ? $settings[0]['admin_email'] : '');?>" name="admin_email" type="email" class="form-control" id="admin_email" placeholder="admin@example.com" required>
      </div>
      <button type="submit" class="btn btn-default">Save</button>
    </form>
</div>
