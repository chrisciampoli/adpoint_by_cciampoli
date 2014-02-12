    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="padding-left: 8px;">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?=site_url('manager/home/index');?>">Swift Schedules</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?=site_url('manager/home/index');?>">Dashboard</a></li>
            <li><a href="<?=site_url('manager/home/quick_pickup');?>">Quick Pickup</a></li>
            <li><a href="<?=site_url('manager/home/busy_or_not');?>">Busy or Not</a></li>
            <li><a href="<?=site_url('manager/home/employees');?>">Employees</a></li>
            <li><a href="<?=site_url('manager/home/settings');?>">Settings</a></li>
            <li><a href="<?=site_url('auth/logout');?>">Logout</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
                <a href='<?php echo site_url('manager/home/swift_pickup');?>'><img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail"></a>
              <h4>Swift Pickup</h4>
              <span class="text-muted">Manage Swift Pickups</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
                <a href='<?php echo site_url('manager/home/busy_or_not');?>'><img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail"></a>
              <h4>Busy or Not</h4>
              <span class="text-muted">Approve Busy or Not Requests</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
                <a href='<?php echo site_url('manager/home/employees');?>'><img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail"></a>
              <h4>Employees</h4>
              <span class="text-muted">Manage Employees</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
                <a href='<?php echo site_url('manager/home/settings');?>'><img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail"></a>
              <h4>Settings</h4>
              <span class="text-muted">Account Settings</span>
            </div>
          </div>
        </div>
      </div>
    </div>