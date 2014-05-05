<script>
    var config = {
        base: "<?php echo base_url(); ?>",
        notes: 4
    };
</script>
<div class="container-fluid">
    <form role="form">
      <div class="form-inline">
        <label for="exampleInputEmail1">Locations</label>
        <select class="form-control" id="locations">
            <option value="mission_valley">Mission Valley</option>
            <option value="fashion valley">Fashion Valley</option>
            <option value="SDSU">SDSU</option>
        </select>
        <button type="button" class="btn btn-default" id="add_location">Edit Location</button>
        <button type="button" class="btn btn-default" id="add_location">Add New Location</button>
      </div>
      <button type="submit" class="btn btn-default">Save</button>
    </form>
</div>
