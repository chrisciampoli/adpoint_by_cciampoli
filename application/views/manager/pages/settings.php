<script>
    var config = {
        base: "<?php echo base_url(); ?>",
        locations: '<?=$locations;?>',
        shifts: '<?=$shifts;?>'
    };
</script>
<div class="container-fluid">
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
              <th>Shift Start</th>
              <th>Shift End</th>
              <th><button class="btn btn-small" style="float:right;">Add</button></th>
            </thead>
            <tbody>
              <?php foreach(json_decode($shifts, true) as $shift): ?>
              <tr>
                <td><?=$shift['name']?></td><td><?=$shift['shift_start']?></td><td><?=$shift['shift_end']?></td>
              </tr>
            <?php endforeach;?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="form-group form-inline">
        <button type="button" class="btn btn-default" id="display_locations">Display Locations</button>
        <div id="locations_tbl" style="display:none;">
          <table class="table table-hover">
            <thead>
              <th>Name</th>
              <th>Address</th>
              <th>Manager</th>
              <th>Contact</th>
            </thead>
            <tbody>
            <?php foreach(json_decode($locations, true) as $location): ?>
              <tr>
                <td><?=$location['name'];?></td>
                <td><?=$location['address'];?></td>
                <td><?=$location['manager'];?></td>
                <td><?=$location['contact'];?></td>
              </tr>
            <?php endforeach; ?>
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
<?php 
  echo "<pre>" . print_r(json_decode($shifts, true)) . "</pre>"; 
?>