<div data-role="content" data-theme="d" class="laciudad2" >
    <h1>Unidad Turismo Baños</h1>
    <!-- <p>Baños, una pequeña ciudad que se encuentra asentada en sobre una meseta basáltica, está rodeado de altas montañas en los andes ecuatorianos, tiene una extensión de 340 hectáreas; conocido en el mundo entero por sus bondades naturales, sus ríos, sus cascadas su flora y fauna, las aguas medicinales que brotan del fondo de la tierra, por el volcán Tungurahua. </p> <br/> -->
    <p>Encuentranos en:</p>
    <!-- Address and Phone -->
    <ul data-role="listview" data-theme="a" data-inset="true" class="icab">
        <li ><img src="<?php echo base_url()?>images/pin.png" alt="Location" class="ui-li-icon"><!-- <strong>Dirección:</strong> -->Th. Halflants entre Ambato y Rocafuerte</li>
        <li style="background:#FFBF00" >
            <a href="tel:0983819961"><img src="<?php echo base_url()?>images/fono.png" alt="Phone" class="ui-li-icon" >Teléfono:++593 (0) 3 2740 483</a>
        </li>
        <li><img src="<?php echo base_url()?>images/email.png" alt="Phone" class="ui-li-icon"><strong>Email:</strong>info@banos-ecuador.com</li>
    </ul>
    <div data-role="content" class="content" data-theme="d" style="margin-top:15px" data-shadow="false">
        <form>
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" value="" required="required" placeholder="Ingrese su Nombre "  pattern="[a-zA-Z]{4,}" maxlength="60" autofocus/>
            <p>Debe tener + de 4 letras</p>

            <br />
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" value="" placeholder="correo@dominio.(com,es,etc.) " required data-corners="false"/>
            <br />
            <label for="textarea">Mensaje:</label>
            <textarea name="textarea" id="textarea"  placeholder="Escriba aquí su mensaje "></textarea>
            <br />
            <a href="#thankyou" data-rel="dialog" data-transition="pop" data-role="button" data-inline="true" data-theme="a">Send</a>
            <a href="#aboutus" data-role="button" data-inline="true" data-theme="a">Reset </a>
        </form>
    </div>
    <!-- END OF: Address and Phone -->
</div>