<div data-role="footer" data-theme="a" >

		<div data-role="navbar" data-theme="e" class="pie">
            <ul>
                <li><a href="#home" class="ui-btn-active" data-icon="home">Home</a></li>
                <li><a href="#oferta" data-icon="grid">Oferta Turistica</a></li>
                <li><a href="#aboutus" data-icon="info">About Us</a></li>
                <li><a href="#geo" data-icon="star" onclick="sessionStorage.categoria_id=<?php echo isset($oferta->id)?$oferta->id:0;?>;sessionStorage.lugar_id=<?php echo isset($lugar->id)?$lugar->id:0;?>">Ubicacion</a></li>
            </ul>
        </div>
        <p class="copyright">&copy; 2012 Rutas moviles.com &nbsp;&nbsp;</p>
</div>