<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Acerca de Rutas Móbiles</title>
    </head>
    <body>
	<div data-role="dialog">
	    <div data-role="header" data-theme="d">
		<h1>Acerca de Rutas Móbiles</h1>

	    </div>

	    <div data-role="content" data-theme="c">
		<h1>Delete page?</h1>
		<p>Este sistema esta listo para entrar en funcionamiento</p>
		<p><?php echo anchor('mobil', 'Inicio', 'data-role="button" data-theme="b"'); ?></p>
		<p><?php echo anchor('mobil/menu', 'Menu', 'data-role="button" data-theme="b"'); ?></p>
		<a href="menu.php" data-role="button" data-theme="a">Menu</a>
		<a href="atras.php" data-role="button" data-rel="back" data-theme="c">Cerrar</a>        
	    </div>
	</div>
    </body>
</html>
