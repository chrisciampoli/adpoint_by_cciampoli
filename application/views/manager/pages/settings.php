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
        <button type="button" class="btn btn-default" id="add_location">Add Location</button>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
      <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <input type="file" id="exampleInputFile">
        <p class="help-block">Example block-level help text here.</p>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox"> Check me out
        </label>
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
