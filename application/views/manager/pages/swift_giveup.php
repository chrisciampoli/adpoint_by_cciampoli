<script>
    var config = {
        base: "<?php echo base_url(); ?>",
        notes: 4
    };
</script>
<div class="container-fluid">
        <div><h2 class="sub-header" style="display:inline;">Swift Giveup</h2></div>
          <div class="table-responsive">
            <table class="table table-hover table-responsive">
              <thead>
                  <th>Employee</th>
                  <th>Date</th>
                  <th>Location</th>
                  <th>Shift</th>
                  <th>Status</th>
              </thead>
                <tbody>
                    <?php //echo "<pre>" . print_r($requests, true) . "</pre>";?>
                    <?php foreach($requests as $request) { ?>
                        <?php if($request['target'] == $username) { ?>
                          <?php if($request['status'] == 'pending') { ?>
                            <tr class="warning pending-row" rel="<?=$request['id'];?>">
                                <td><?=$request['requester'];?></td><td><?=$request['date'];?></td><td>Mission Valley</td><td><?= $request['shift'];?></td><td class="status" id="<?=$request['id'];?>"><span class="label label-warning"><?=ucfirst($request['status']);?></span></td>
                            </tr>
                          <?php } ?>
                          <?php if($request['status'] == 'accepted') { ?>
                            <tr class="success accepted-row" rel="<?=$request['id'];?>">
                                <td><?=$request['requester'];?></td><td><?=$request['date'];?></td><td>Mission Valley</td><td><?= $request['shift'];?></td><td class="status" id="<?=$request['id'];?>"><span class="label label-success"><?=ucfirst($request['status']);?></span></td>
                            </tr>
                          <?php } ?>
                          <?php if($request['status'] == 'denied') { ?>
                            <tr class="danger denied-row" rel="<?=$request['id'];?>">
                                <td><?=$request['requester'];?></td><td><?=$request['date'];?></td><td>Mission Valley</td><td><?= $request['shift'];?></td><td class="status" id="<?=$request['id'];?>"><span class="label label-danger"><?=ucfirst($request['status']);?></span></td>
                            </tr>
                          <?php } ?>
                        <?php } else {  ?>
                            <?php if($request['status'] == 'pending') { ?>
                            <tr class="warning pending-row" rel="<?=$request['id'];?>">
                                <td><?=$request['target'];?></td><td><?=$request['date'];?></td><td>Mission Valley</td><td><?= $request['shift'];?></td><td class="status" id="<?=$request['id'];?>"><span class="label label-warning"><?=ucfirst($request['status']);?></span></td>
                            </tr>
                          <?php } ?>
                          <?php if($request['status'] == 'accepted') { ?>
                            <tr class="success accepted-row" rel="<?=$request['id'];?>">
                                <td><?=$request['target'];?></td><td><?=$request['date'];?></td><td>Mission Valley</td><td><?= $request['shift'];?></td><td class="status" id="<?=$request['id'];?>"><span class="label label-success"><?=ucfirst($request['status']);?></span></td>
                            </tr>
                          <?php } ?>
                          <?php if($request['status'] == 'denied') { ?>
                            <tr class="danger denied-row" rel="<?=$request['id'];?>">
                                <td><?=$request['target'];?></td><td><?=$request['date'];?></td><td>Mission Valley</td><td><?= $request['shift'];?></td><td class="status" id="<?=$request['id'];?>"><span class="label label-danger"><?=ucfirst($request['status']);?></span></td>
                            </tr>
                        <?php } ?>
                      <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- Request Modal -->
        <div class="modal fade" id="confirmation_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Swift Confirmation</h4>
                    </div>
                    <div class="modal-body">
                        Would you like to approve or deny this shift swap?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" id="accept_btn" data-dismiss="modal">Approve</button>
                        <button type="button" class="btn btn-danger" id="decline_btn" data-dismiss="modal">Deny</button>
                    </div>
                </div>
            </div>
        </div>