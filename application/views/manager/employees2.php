
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Dashboard Template for Bootstrap</title>
    <?php $this->load->view('manager/styles');?>
   
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

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

    <div class="container-fluid">
        <div><h2 class="sub-header" style="display: inline">Employees</h2><input type="button" value="Add employee" class="btn btn-success" style="display: inline-block;float: right;padding: 5px;margin-top:5px;"/></div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Position</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Availability</th>
                  <th>Controls</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Manager</td>
                  <td>Christopher Ciampoli</td>
                  <td>(619) 403-2134</td>
                  <td>chrisciampoli@gmail.com</td>
                  <td>
                      <button type="button" rel="1" class="check_avail btn btn-primary btn-sm">
                          <div class="datepicker" id="datepicker_1" rel="1"></div>
                          <span class="glyphicon glyphicon-calendar"></span> Check
                      </button>
                  </td>
                  <td>
                      <button type="button" class="btn btn-primary btn-sm">
                          <span class="glyphicon glyphicon-pencil"></span> Edit
                      </button>
                      <button type="button" class="btn btn-danger btn-sm">
                          <span class="glyphicon glyphicon-remove"></span> Remove
                      </button>
                  </td>
                </tr>
                <tr>
                  <td>Shift Manager</td>
                  <td>Edward Burdeno</td>
                  <td>(423) 234-2321</td>
                  <td>eburdeno@quicknco.com</td>
                  <td>
                      <button type="button"  rel="2" class="check_avail btn btn-primary btn-sm">
                          <div class="datepicker" id="datepicker_2"></div>
                          <span class="glyphicon glyphicon-calendar"></span> Check
                      </button>
                  </td>
                  <td>
                      <button type="button" class="btn btn-primary btn-sm">
                          <span class="glyphicon glyphicon-pencil"></span> Edit
                      </button>
                      <button type="button" class="btn btn-danger btn-sm">
                          <span class="glyphicon glyphicon-remove"></span> Remove
                      </button>
                  </td>
                </tr>
                <tr>
                  <td>Barista</td>
                  <td>Kim Evans</td>
                  <td>(342) 443-3211</td>
                  <td>kevans@starbucks.com</td>
                  <td>
                      <button type="button" rel="3" class="check_avail btn btn-primary btn-sm">
                          <div class="datepicker" id="datepicker_3"></div>
                          <span class="glyphicon glyphicon-calendar"></span> Check
                      </button>
                  </td>
                  <td>
                      <button type="button" class="btn btn-primary btn-sm">
                          <span class="glyphicon glyphicon-pencil"></span> Edit
                      </button>
                      <button type="button" class="btn btn-danger btn-sm">
                          <span class="glyphicon glyphicon-remove"></span> Remove
                      </button>
                  </td>
                </tr>
                <tr>
                  <td>Cashier</td>
                  <td>Steve Howits</td>
                  <td>(342) 445-3551</td>
                  <td>showits@starbucks.com</td>
                  <td>
                      <button type="button" rel="4" class="check_avail btn btn-primary btn-sm">
                          <div class="datepicker" id="datepicker_4"></div>
                          <span class="glyphicon glyphicon-calendar"></span> Check
                      </button>
                  </td>
                  <td>
                      <button type="button" class="btn btn-primary btn-sm">
                          <span class="glyphicon glyphicon-pencil"></span> Edit
                      </button>
                      <button type="button" class="btn btn-danger btn-sm">
                          <span class="glyphicon glyphicon-remove"></span> Remove
                      </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div id="create_employee_dialig">
        
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="<?php echo base_url('public/js/docs.js');?>"></script>
    <script src="<?php echo base_url('public/js/main.js');?>"></script>
  </body>
</html>
