<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Rutas Móbiles - Lugares</title>
</head>
<body>

<div id="container">
	<h1>Bienvenido a Lugares de Rutas Móbiles!</h1>

	<div id="body">
		<p>Administración de los Lugares.</p>
		<p><?php foreach($lugares as $lugar)?>
		<div><?php echo $lugar->nombre; ?></div>
		</p>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>