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
        <button type="button" class="btn btn-default" id="display_shifts">Display Shifts</button>
        <div id="shifts_tbl" style="display:none;">
          <table class="table table-hover">
            <thead>
              <th>Name</th>
              <th>Address</th>
              <th>Manager</th>
              <th>Contact</th>
            </thead>
            <tbody>
              <tr>
                <td>Mission Valley</td><td>9232 Mission Valley Way, San Diego CA</td><td>Steven</td><td>(619)223-1212</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="form-group form-inline">
        <button type="button" class="btn btn-default" id="display_locations">Display Locations</button>
        <div id="locations_tbl" style="display:none;">
          <table class="table table-hover">
            <thead>
            </thead>
            <tbody>
              <tr>
                <td>Testing</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="form-group">
        <label for="admin_email">Administrator Contact Email</label>
        <input value="<?=(isset($settings[0]['admin_email']) ? $settings[0]['admin_email'] : '');?>" name="admin_email" type="email" class="form-control" id="admin_email" placeholder="admin@example.com" required>
      </div>
      <button type="submit" class="btn btn-default">Save</button>
    </form>
</div>
