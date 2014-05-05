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
      </div>
      <div class="form-group form-inline">
        <button type="button" class="btn btn-default" id="add_location">Display Locations</button>
      </div>
      <div class="form-group">
        <label for="admin_email">Administrator Contact Email</label>
        <input value="<?=(isset($settings[0]['admin_email']) ? $settings[0]['admin_email'] : '');?>" name="admin_email" type="email" class="form-control" id="admin_email" placeholder="admin@example.com" required>
      </div>
      <button type="submit" class="btn btn-default">Save</button>
    </form>
</div>
