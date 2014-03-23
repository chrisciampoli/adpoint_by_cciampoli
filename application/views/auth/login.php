<link href="<?php echo base_url('public/css/bootstrap.css')?>" rel="stylesheet">
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url('public/js/bootstrap.js')?>"></script>
<div class="container">
<h2 class="form-signin-heading"><?php echo lang('login_heading');?></h2>
<p><?php echo lang('login_subheading');?></p>
<div id="infoMessage"><?php echo $message;?></div>
<?php $attributes = array('class' => 'form_signin', 'id' => 'signin_form');?>
<?php echo form_open("public/auth/login",$attributes);?>
<?php unset($attributes);?>

  <p>
    <?php echo lang('login_identity_label', 'identity');?>
    <?php echo form_input($identity);?>
  </p>

  <p>
    <?php echo lang('login_password_label', 'password');?>
    <?php echo form_input($password);?>
  </p>

  <p>
    <?php echo lang('login_remember_label', 'remember');?>
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
  </p>

  <?php $attributes = array('name'=>'submit','id'=>'submit_btn','class'=>'form_submit');?>
  <p><?php echo form_submit($attributes, lang('login_submit_btn'));?></p>
  <?php unset($attributes);?>

<?php echo form_close();?>

<p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
</div>