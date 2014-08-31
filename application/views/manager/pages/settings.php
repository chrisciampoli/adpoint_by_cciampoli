<script>
    var config = {
        base: "<?php echo base_url(); ?>",
        locations: '<?=$locations;?>',
        shifts: '<?=$shifts;?>'
    };
</script>
<div><h2 class="sub-header" style="display: inline">Company Settings</h2></div>
<br>
<div class="container-fluid">
      <div class="form-group">
        <label for="company_name">asdfasdfsadfasdfasdfasadffd</label>
        <input value="<?=(isset($settings[0]['company_name']) ? $settings[0]['company_name'] : '');?>" type="input" class="form-control" id="company_name" name="company_name" placeholder="Company Name" required>
      </div>
      <div class="form-group form-inline">
        <button type="button" class="btn btn-default" id="display_shifts">Display Shifts</button>
        <div id="shifts_tbl" class="table-responsive" style="display:none;">
          <table id="shifts_records" class="table table-hover">
          <?php if(array_key_exists('result', json_decode($shifts, true))) {?>
              <tr id="shiftHolder"><td><h2>No shifts added yet. <button class="btn btn-small" style="padding-left: 5px;" id="shiftAddBtn" data-toggle="modal" data-target="#addShiftModal">Add Shift</button></h2></td></tr>
          <?php } else { ?>
            <thead>
              <th>Name</th>
              <th>Shift Start</th>
              <th>Shift End</th>
            </thead>
            <button class="btn btn-small" style="float:right;" id="shiftAddBtn" data-toggle="modal" data-target="#addShiftModal">Add Shift</button>
            <tbody>
              <?php foreach(json_decode($shifts, true) as $shift): ?>
              <tr>
                <td id="<?=$shift['id']?>"><?=$shift['name']?></td><td><?=$shift['shift_start']?></td><td><?=$shift['shift_end']?></td><td><button class="btn btn-small" id="shiftDeleteBtn">Delete</button></td>
              </tr>
            <?php endforeach;?>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="form-group form-inline">
        <button type="button" class="btn btn-default" id="display_locations">Display Locations</button>
        <div id="locations_tbl" style="display:none;">
          <table id="locations_records" class="table table-hover">
            <?php if(array_key_exists('result', json_decode($locations,true))) {?>
                <tr id="locationHolder"><td><h2>No locations added yet. <button class="btn btn-small" style="padding-left: 5px;" id="locationAddBtn" data-toggle="modal" data-target="#addLocationModal">Add Location</button></h2></td></tr>
            <?php } else { ?>
            <button class="btn btn-small" style="float:right;" id="locationAddBtn" data-toggle="modal" data-target="#addLocationModal">Add Location</button>
            <thead>
              <th>Name</th>
              <th>Address</th>
              <th>Manager</th>
              <th>Contact</th>
            </thead>
            <tbody>
            <?php foreach(json_decode($locations, true) as $location): ?>
              <tr id="<?=$location['id'];?>">
                <td><?=$location['locationName'];?></td>
                <td><?=$location['locationAddress'];?></td>
                <td><?=$location['manager'];?></td>
                <td><?=$location['contact'];?></td>
                <td><button class='btn btn-small' id='locationDeleteBtn'>Delete</button></td>
              </tr>
            <?php endforeach; ?>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="form-group">
        <label for="admin_email">Administrator Contact Email</label>
        <input value="<?=(isset($settings[0]['admin_email']) ? $settings[0]['admin_email'] : '');?>" name="admin_email" type="email" class="form-control" id="admin_email" placeholder="admin@example.com" required>
      </div>
      <button class="btn btn-default" id="saveBtn">Save</button>
</div>
<div class="modal fade" id="addShiftModal" tabindex="-1" role="dialog" aria-labelledby="addShiftModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="addShiftModalLabel">Add Shift</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
          <div class="control-group">
            <label class="control-label" for="shiftName">Name</label>
            <div class="controls">
              <input class="form_input" type="text" id="shiftName" placeholder="Morning">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="shiftStart">Shift Start</label>
            <div class="controls">
              <input class="form_input" type="text" id="shiftStart" placeholder="9:00AM">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="shiftEnd">Shift End</label>
            <div class="controls">
              <input class="form_input" type="text" id="shiftEnd" placeholder="5:00PM">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="shiftSaveBtn">Save changes</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="addLocationModal" tabindex="-1" role="dialog" aria-labelledby="addLocationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="addLocationModalLabel">Add Location</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
          <div class="control-group">
            <label class="control-label" for="locationName">Name</label>
            <div class="controls">
              <input class="form_input" type="text" id="locationName" placeholder="Mission Valley">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="locationAddress">Address</label>
            <div class="controls">
              <input class="form_input" type="text" id="locationAddress" placeholder="123 Production Way">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="manager">Manager</label>
            <div class="controls">
              <input class="form_input" type="text" id="manager" placeholder="Paul">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="contact">Contact</label>
            <div class="controls">
              <input class="form_input" type="phone" id="contact" placeholder="(000) 000-0000">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="locationSaveBtn">Save changes</button>
      </div>
    </div>
  </div>
</div>