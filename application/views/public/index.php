<?php $this->load->view('manager/head'); ?>
<body>
    <div class="container">
        <h1>Swift Schedules</h1>
        <div>
            <h3>Login</h3>
            <?php $attributes = array('class' => 'navbar-form navbar-right', 'id' => 'signin_form'); ?>
            <?php echo form_open("public/auth/login", $attributes); ?>
            <?php unset($attributes); ?>
            <div class="form-group">
                <?php echo form_input($identity); ?>
            </div>
            <div class="form-group">
                <?php echo form_input($password); ?>
            </div>
            <?php $attributes = array('name' => 'submit', 'id' => 'submit_btn', 'class' => 'form_submit'); ?>
            <?php echo form_submit($attributes, lang('login_submit_btn')); ?>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<hr>
<footer>
    <p>&copy; By Quick and Co</p>
</footer>
</div> <!-- /container -->
</body>
</html>
