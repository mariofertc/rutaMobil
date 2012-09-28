<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Rutas Móbiles - Bienvenido/a</title>
	<link rel="stylesheet"  href="js/jqMobile/css/themes/default/jquery.mobile-1.1.0.css" />
	<!--<link rel="stylesheet" href="docs/_assets/css/jqm-docs.css" />-->
	<script src="js/jquery.js"></script>
	<!--<script src="docs/_assets/js/jqm-docs.js"></script>-->
	<script src="js/jqMobile/jquery.mobile-1.1.0.js"></script>
</head>
<body>

<!-- Start of first page -->
<div data-role="page" id="bienvenido" >

	<div data-role="header">
		<h1>Bienvenido a Rutas Móbiles!</h1>
	</div><!-- /header -->

	<div data-role="content">	
		<p>Baños de Agua Santa.</p>
		<p><?php echo anchor('#menu', 'Ingresar', 'data-transition="pop"'); ?></p>
		<p><?php echo anchor('acercade', 'Acerca de la Aplicación', 'data-rel="dialog"'); ?></p>			
	</div><!-- /content -->

	<div data-role="footer">
		<h4>Copy Rigth 2012</h4>
	</div><!-- /footer -->
</div><!-- /page -->