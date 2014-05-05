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
        <input type="input" class="form-control" id="company_name" name="company_name" placeholder="Company Name" required>
      </div>
      <div class="form-group form-inline">
        <label for="shifts">Shifts</label>
        <select name="shifts" class="form-control" id="locations">
            <option value="morning_shift">Morning</option>
            <option value="afternoon_shift">Afternoon</option>
            <option value="swing_shift">Swing</option>
        </select>
        <button type="button" class="btn btn-default" id="add_location">Edit Shift</button>
        <button type="button" class="btn btn-default" id="add_location">Add New Shift</button>
      </div>
      <div class="form-group form-inline">
        <label for="locations">Locations</label>
        <select name="locations" class="form-control" id="locations">
            <option value="mission_valley">Mission Valley</option>
            <option value="fashion valley">Fashion Valley</option>
            <option value="SDSU">SDSU</option>
        </select>
        <button type="button" class="btn btn-default" id="add_location">Edit Location</button>
        <button type="button" class="btn btn-default" id="add_location">Add New Location</button>
      </div>
      <div class="form-group">
        <label for="admin_email">Administrator Contact Email</label>
        <input name="admin_email" type="email" class="form-control" id="admin_email" placeholder="admin@example.com" required>
      </div>
      <button type="submit" class="btn btn-default">Save</button>
    </form>
</div>
