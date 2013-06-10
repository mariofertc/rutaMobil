<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" rev="stylesheet" href="<?php echo base_url();?>css/login.css" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Rutas Móbiles <?php echo $this->lang->line('login_login'); ?></title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>



<script type="text/javascript">
$(document).ready(function()
{
	$("#login_form input:first").focus();
});
</script>
</head>
<body>
<h1>Rutas Móviles 0.1</h1>
<?php
if ($_SERVER['HTTP_HOST'] == 'www.rutasmoviles.com')
{
?>
<h2>Usuario = admin</h2>
<h2>Contraseña = *****</h2>
<?php
}
?>
<?php echo form_open('login') ?>
<div id="container">
<?php echo validation_errors(); ?>
	<div id="top">
	<?php echo $this->lang->line('login_login'); ?>
	</div>
	<div id="login_form">
		<div id="welcome_message">
		<?php echo $this->lang->line('login_welcome_message'); ?>
		</div>
		
		<div class="form_field_label"><?php echo $this->lang->line('login_username'); ?>: </div>
		<div class="form_field">
		<?php echo form_input(array(
		'name'=>'username', 
		'value'=>set_value('username'),
		'size'=>'20')); ?>
		</div>

		<div class="form_field_label"><?php echo $this->lang->line('login_password'); ?>: </div>
		<div class="form_field">
		<?php echo form_password(array(
		'name'=>'password', 
		'value'=>set_value('password'),
		'size'=>'20')); ?>
		
		</div>
		
		<div id="submit_button">
		<?php echo form_submit('loginButton','Go'); ?>
		</div>
	</div>
</div>
<?php echo form_close(); ?>
</body>
</html>
