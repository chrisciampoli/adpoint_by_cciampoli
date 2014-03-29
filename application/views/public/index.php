<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Swift Shifts, by Swift'n'Co</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css">
        <style type="text/css">
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="../assets/js/html5shiv.js"></script>
        <![endif]-->

    </head>

    <body>

        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Swift Shifts by Swift'n'Co</a>
                </div>
                <div class="navbar-collapse collapse">
                    <?php $attributes = array('class' => 'navbar-form navbar-right', 'id' => 'signin_form'); ?>
                    <?php echo form_open("public/auth/login", $attributes); ?>
                    <?php unset($attributes); ?>
                    <div class="form-group">
                        <?php echo form_input($identity); ?>
                    </div>
                    <div class="form-group">
                        <?php echo form_input($password); ?>
                    </div>
                    <?php $attributes = array('name' => 'submit', 'id' => 'submit_btn', 'class' => 'btn btn-success'); ?>
                    <?php echo form_submit($attributes, lang('login_submit_btn')); ?>
                    <?php echo form_close(); ?>
                </div><!--/.navbar-collapse -->
            </div>
        </div>

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <h1>Manage your time better!</h1>
                <p>Swift shifts is a software platform that aims to become the industry standard for providing a simple and intuitive application for managing shifts.</p>
                <p><a class="btn btn-primary btn-lg" role="button">Learn more &raquo;</a></p>
            </div>
        </div>

        <div class="container">
            <!-- Example row of columns -->
            <div class="row">
                <div class="col-md-4">
                    <h2>Benefits the Employee</h2>
                    <ul>
                        <li>Providing 24/7 online access to their shifts via computer or smartphone</li>
                        <li>Empowering employees to pick up a shift if they do not work that day (Swift Pick-Up)</li>
                        <li>Introducing 'Busy or Not'.  Employees press 'Busy or Not' and if not, do not have to work that shift.</li>
                    </ul>
                    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                </div>
                <div class="col-md-4">
                    <h2>Saves Employers Money</h2>
                    <ul>
                        <li>Saving managers' time and pay from creating, adjusting, managing all employee shifts</li>
                        <li>Keeping managers on the sales floor with customers instead of on the phone or computer for scheduling</li>
                        <li>Allowing same chain storefronts to communicate and analyze daily, weekly, and monthly labor figures</li>
                    </ul>
                    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                </div>
                <div class="col-md-4">
                    <h2>Why Us?</h2>
                    <ul>
                        <li>Priced lower then the standard competition</li>
                        <li>Our system allows for access anywhere, at anytime</li>
                    </ul>
                    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                </div>
            </div>

            <hr>

            <footer>
                <p>&copy; Swift'n'Co 2014</p>
            </footer>
        </div> <!-- /container -->

        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

    </body>
</html>
