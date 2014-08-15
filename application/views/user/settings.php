<script>
    var config = {
        base: "<?php echo base_url(); ?>",
        locations: '<?=$locations;?>',
        shifts: '<?=$shifts;?>'
    };
</script>
<div class="container-fluid">
      <div class="form-group">
        <label for="company_name">Availability</label>
        <input value="<?=(isset($settings[0]['company_name']) ? $settings[0]['company_name'] : '');?>" type="input" class="form-control" id="company_name" name="company_name" placeholder="Company Name" required>
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