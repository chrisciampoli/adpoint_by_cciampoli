<script>
    var config = {
        base: "<?php echo base_url(); ?>",
        notes: 4,
        locations: $.parseJSON('<?php echo $locations; ?>'),
        shifts: $.parseJSON('<?php echo $shifts; ?>')
    };
    $(function() {
        
        $.each(config.locations, function(k, v) {
          $('#inputLocation')
            .append($("<option></option>")
            .attr("value", v.locationName)
            .text(v.locationName));
        });

        $.each(config.shifts, function(k, v) {
          $('#inputShift')
            .append($("<option></option>")
            .attr("value", v.id)
            .attr('shift_start', v.shift_start)
            .attr('shift_end', v.shift_end)
            .text(v.name));
        });

        $('#inputShift').on('change', function(){
          var shift_start = $('#inputShift').find(':selected').attr('shift_start'),
              shift_end = $('#inputShift').find(':selected').attr('shift_end');
              console.log('Shift Start: ' + shift_start);
              console.log('Shift End: ' + shift_end);
              $('#inputShiftStart').val(shift_start);
              $('#inputShiftEnd').val(shift_end);
        });

        $('body').on('click', '#removeEmployeeBtn' ,function(e) {
            e.preventDefault();
            var confirmation = confirm("Are you sure?");
            if(confirmation) {
              var employee = {
                id: $(this).attr('rel')
              };
              $(this).closest('tr').toggle();
              try {
                  $.ajax({
                    url: config.base + 'manager/home/ajaxRemoveEmployee',
                    type: 'POST',
                    dataType: 'json',
                    data: employee,
                    success: function(data) {
                      console.log(data);
                    },
                    fail: function(e) {
                      console.log(e);
                    }
                });
              } catch(e) {
                console.log(e.toString());
              }
              
            }
            return;
        });

    });
</script>
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
                      <!--<button rel="<?=$employee['id']?>" id="editEmployeeBtn" name="editEmployeeBtn" type="button" class="btn btn-primary btn-sm">
                          <span class="glyphicon glyphicon-pencil"></span> Edit
                      </button>-->
                      <button rel="<?=$employee['id']?>" name="removeEmployeeBtn" id="removeEmployeeBtn" type="button" class="btn btn-danger btn-sm">
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
    <!-- Modal -->
<div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
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
              <input class="form_input" type="text" id="inputFirstName" placeholder="John" value="">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputLastName">Last Name</label>
            <div class="controls">
              <input class="form_input" type="text" id="inputLastName" placeholder="Doe">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputEmail">Email</label>
            <div class="controls">
              <input class="form_input" type="email" id="inputEmail" placeholder="user@example.com">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputPhone">Phone</label>
            <div class="controls">
              <input class="form_input" type="text" id="inputPhone" placeholder="(000) 000-0000">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputPassword">Password</label>
            <div class="controls">
              <input class="form_input" type="password" id="inputPassword" placeholder="">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputPasswordConfirmation">Re-enter Password</label>
            <div class="controls">
              <input class="form_input" type="password" id="inputPasswordConfirmation" placeholder="">
              <input type="hidden" id="hiddinInputCompany" placeholder="" value="Swift Schedules">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="employeeSaveBtn">Save changes</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="editScheduleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit Schedule</h4>
      </div>
      <div class="modal-body">
        <div id="calendar"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="scheduleSaveBtn">Save changes</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="editDayModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit Day</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
          <div class="control-group">
            <label class="control-label" for="inputLocation">Location</label>
            <div class="controls">
              <!-- TODO: Change this over to a select -->
              <select id="inputLocation" name="inputLocation">
              <option></option>
              </select>
              <!--<input class="form_input" type="text" id="inputLocation" placeholder="Mission Valley">-->
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputShiftShift">Shift</label>
            <select id="inputShift" name="inputShift">
              <option></option>
            </select>
            <div class="controls">
              <input class="form_input" type="hidden" id="inputShiftStart" placeholder="5:30PM">
            </div>
          </div>
          <div class="control-group">
            <div class="controls">
              <input type="hidden" class="form_input" type="text" id="inputShiftEnd" placeholder="10:30PM">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="daySaveBtn">Save changes</button>
      </div>
    </div>
  </div>
</div>
