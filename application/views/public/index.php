
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>Swift Schedules</title>

    <!-- Bootstrap core CSS -->
    <!--<link href="<?php //echo base_url('public/css/bootstrap.css')?>" rel="stylesheet">-->
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.0/jquery.mobile-1.4.0.min.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.0/jquery.mobile-1.4.0.min.js"></script>
    <!-- Custom styles for this template -->
    <!--<link href="jumbotron.css" rel="stylesheet">-->

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container" style="background-color:#ADFCC0">
        <div class="navbar-header">
        </div>
      </div>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Swift Schedules</h1>
      <div data-role="collapsible" data-content-theme="b">
          <h3>Login</h3>
       <?php $attributes = array('class' => 'navbar-form navbar-right', 'id' => 'signin_form');?>
           <?php echo form_open("public/auth/login",$attributes);?>
           <?php unset($attributes);?>
            <div class="form-group">
              <?php echo form_input($identity);?>
            </div>
            <div class="form-group">
              <?php echo form_input($password);?>
            </div>
              <?php $attributes = array('name'=>'submit','id'=>'submit_btn','class'=>'form_submit');?>
              <?php echo form_submit($attributes, lang('login_submit_btn'));?>
          <?php echo form_close();?>
      </div>
      <div data-role="collapsible" data-content-theme="b">
          <h3>Clock In</h3>
       <?php $attributes = array('class' => 'navbar-form navbar-right', 'id' => 'signin_form');?>
           <?php echo form_open("public/auth/login",$attributes);?>
           <?php unset($attributes);?>
            <div class="form-group">
                <label for="pin">Pin</label>
               <?php echo form_input($identity);?>
            </div>
              <?php $attributes = array('name'=>'submit','id'=>'submit_btn','class'=>'form_submit');?>
              <?php echo form_submit($attributes, lang('login_submit_btn'));?>
          <?php echo form_close();?>
      </div>
      </div>
    </div>
      <hr>
      <footer>
        <p>&copy; By Quick and Co</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url('public/js/bootstrap.js')?>"></script>
  </body>
</html>
