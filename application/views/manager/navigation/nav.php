<div class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="padding-left:8px;">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Swift Schedules</a>
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