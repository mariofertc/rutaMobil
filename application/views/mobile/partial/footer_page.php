<div data-role="footer" data-theme="a" >

		<div data-role="navbar" data-theme="e" class="pie">
            <ul>
                <li title="inicio"><a href="#home" class="ui-btn-active"data-transition="slideup" data-icon="home">Inicio</a></li>
                <li title="Sitios"><a href="#oferta" data-transition="slideup" data-icon="grid">Sitios</a></li>
                <li title="Contáctanos" ><a href="#aboutus" data-transition="slideup" data-icon="info">Contáctanos</a></li>
                <li title="ubicación"><a href="#geo" data-transition="slideup" data-icon="search"  onclick="sessionStorage.categoria_id=<?php echo isset($oferta->id)?$oferta->id:(isset($lugar->categoria_id)?$lugar->categoria_id:0);?>;sessionStorage.lugar_id=<?php echo isset($lugar->id)?$lugar->id:0;?>">Ubicación</a></li>
            </ul>
        </div>


        <p class="copyright">&copy; 2012 Rutas moviles.com &nbsp;&nbsp;</p>
</div>