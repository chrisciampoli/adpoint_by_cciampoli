    <table class="table table-striped table-hover">
        <tr>
            <td class="well"><h2><?php echo ucwords($username); ?></h2></td>
        </tr>
        <tr>
            <td class="well"><h3 id="date"></h3></td>
        </tr>
        <tr>
            <td class="well"><h3 id="working">Title - Area</h3></td>
        </tr>
        <tr>
            <td><h3 id="hours">Shift Hours</h3></td>
        </tr>
    </table>

    <div class="row">
        <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#pickup_modal">Swift Pick up</button>
        <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#busy_modal">Busy or Not</button>
        <button class="btn btn-primary btn-lg" id="logout_btn">Logout</button>
    </div>