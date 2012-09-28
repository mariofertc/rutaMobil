	<div data-role="page" id="menu" data-title="Rutas Móbiles - Menu Principal">

	    <div data-role="header">
		<h1>Menú Principal</h1>
	    </div>

	    <div data-role="content">
		<!--<div data-role="controlgroup">-->

		    <div class="ui-grid-b">
			<div class="ui-block-a"><?php echo anchor('mobil/parques', 'Párques', 'data-role="button" data-theme="b"'); ?></div>
			<div class="ui-block-b"><?php echo anchor('mobil/mapa', 'Iglesias', 'data-role="button" data-theme="b"'); ?></div>
			<div class="ui-block-c"><?php echo anchor('mobil/hoteles', 'Hoteles', 'data-role="button" data-theme="b"'); ?></div>
		    </div><!-- /grid-b -->
		    <div class="ui-grid-b">
			<div class="ui-block-a"><?php echo anchor('mobil/agencias', 'Agencias', 'data-role="button" data-theme="b"'); ?></div>
			<div class="ui-block-b"><?php echo anchor('mobil/cafes', 'Cafes', 'data-role="button" data-theme="b"'); ?></div>
			<div class="ui-block-c"><?php echo anchor('mobil/discotecas', 'Discotecas', 'data-role="button" data-theme="b"'); ?></div>
		    </div><!-- /grid-b -->
		</div>
	    

	    <div data-role="footer">
		<div data-role="navbar"  data-iconpos="left">
		    <ul>
			<li><?php echo anchor('#bienvenido', 'Inicio', 'data-role="button" data-theme="b" data-icon="home" class="ui-btn-active"'); ?></li>
			<li><?php echo anchor('#bienvenido', 'Atrás', 'data-role="button" data-theme="b" data-icon="arrow-l"  data-rel="back"'); ?></li>
			<li><?php echo anchor('#', 'Adelante', 'data-role="button" data-theme="b" data-icon="arrow-r"  data-direction="forward"'); ?></li>
			<li><?php echo anchor('mobil/mapa', 'Mapa', 'data-role="button" data-theme="b" data-icon="search"'); ?></li>
		    </ul>
		</div>
		<h4>Copy Right 2012</h4>
	    </div>
	</div>
    </body>
</html>
