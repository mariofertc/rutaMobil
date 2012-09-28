<!DOCTYPE html> 
<html lang="es">
<head>
<meta charset="utf-8">


<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
<title>Rutas moviles guia turistica</title>


<!--<link href="<?php //echo base_url();?>js/jquery-mobile/jquery.mobile.theme-1.0.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php //echo base_url();?>js/jquery-mobile/jquery.mobile.structure-1.0.min.css" rel="stylesheet" type="text/css"/>-->

<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.css" />


<!--<script type="text/javascript" src="<?php //echo base_url();?>js/jquery/jquery-1.7.1.min.js"></script>-->
<!--<script type="text/javascript" src="<?php //echo base_url();?>js/jquery/jquery.mobile-1.0.1.js"></script>-->
<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.js"></script>




<script type="text/javascript" src="<?php echo base_url();?>js/jquery/jquery.scrollTo-min.js"></script>
<!--<script type="text/javascript" src="<?php //echo base_url();?>js/jquery/jquery.js"></script>-->
<script type="text/javascript" src="<?php //echo base_url();?>js/jquery/custom.js"></script>

<!--== GALERIA==-->
<script type="text/javascript" src="<?php echo base_url();?>js/jquery/klass.min.js"></script>
<script type="text/javascript" src="<?php //echo base_url();?>js/jquery/misc.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery/code.photoswipe.jquery-3.0.4.min.js"></script>

<!--== GEOLOCALIZACION==-->
<script src="http://maps.google.com/maps/api/js?sensor=false"> </script>


<link href="<?php echo base_url();?>css/descripcion.css" rel="stylesheet" type="text/css"/> 
<link href="<?php echo base_url();?>css/photoswipe.css" type="text/css" rel="stylesheet" />   
<link href="<?php echo base_url();?>css/my-styles.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>css/flexslider.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>css/geo.css" rel="stylesheet" type="text/css">
<!--== /Font ==-->
<link href='http://fonts.googleapis.com/css?family=Terminal+Dosis' rel='stylesheet' type='text/css' />
    
    
    
</script>

    <!--scripts flex slider-->
    <script src="<?php echo base_url();?>js/jquery/jquery.flexslider.js"></script>     

    
	 <script type="text/javascript" language="javascript">
	 function change_page(page_name) {
   $.mobile.changePage($('#' + page_name));
}

        $('#geo').live('pagecreate', function (event, ui) {
		geolocalizar();
            //alert('This page was just hidden: ' + ui.prevPage);
        });

	<!--GEO--> 
	function geolocalizar()
	{
		navigator.geolocation.getCurrentPosition(mostrarMapa,errorMapa);
		
		$("#status").text("En tu busqueda ....");
		
	}
	
	function mostrarMapa(datos)
	{
		var lat = datos.coords.latitude;
		var lon = datos.coords.longitude;
		
		$("#status").text("Te encontre en: " + lat + " , " + lon);
		
		/*$("#mapa").css("height", 480).css("margin", "0 auto").css("width", 320);*/
		
		var coordenada = new google.maps.LatLng(lat,lon);
		var opcionesMapa = {
			center: coordenada,
			zoom: 18,
			mapTypeId: google.maps.MapTypeId.HYBRID
		};
		
		var mapa = new google.maps.Map($("#mapa")[0], opcionesMapa);
		
		var opcionesChinche = {
			position: coordenada,
			map: mapa,
			title: "Aqui estas!!"
		};
		
		var chinche = new google.maps.Marker(opcionesChinche);
		map.setCenter(new GLatLng(37.4419, -122.1419), 13);

		
		//google.maps.LatLng(lat, lon);
		
		//var kontrol = mapa.getController();
		//var ja = new GeoPoint(lat, lon);
    	//kontrol.animateTo(ja);
	
		//kontrol = mvMap.getController();
    //GeoPoint ja = new GeoPoint(52172722, 21071987);
    //kontrol.animateTo(ja);
	}
	
	function errorMapa()
	{
		$("#status").text("Tarde o temprano te encontrare");
	}  
	<!--GEO-->

	  
	

	
	 
	  
	  
	  
</script>
 

</head> 
<body> 

<!--<div data-role="page" id="carga" data-theme="a">
    
    <div data-role="content" data-theme="d">
            <div id="hidepage"> 
                <p class="center-text">Loading depends on mobile bandwidth speed!<br/><img src="images/bg/130.gif" alt="load"></p>
            </div>
    </div>
    
</div>-->


<!--<div id="splash" class="splash"> 
  <img id="splashBg" src="images/splash.jpg" alt="Splash Image" />
  <img id="splashTitle" src="images/splashTitle.png" alt="Splash Title" />
</div>
-->




<div data-role="page" id="home" data-theme="a">

	<div data-role="header" data-theme="a" class="yellow">
           <!--<div class="bannerr"></div>-->
           
           
           <!--<div data-role="navbar" data-theme="a" >
             <ul> 
                 <li><a href="http://www.facebook.com/"data-show-count="false" data-show-screen-name="false"><img src="images/white_facebook.png" width="32" height="32" alt="Follow Us on Facebook"><br />Like Us</a>
    </a></li>
                <li><a href="#twitter" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false"><img src="images/white_twitter_bird.png" width="32" height="32" alt="Visit our Twitter Feed"><br />Twitter Feed</a>
    </a></li>
             </ul> 
          </div>-->
          
          
          
           <!--<div data-role="navbar" data-theme="e" class="pie">
            <ul>
                <li><a href="#" class="ui-btn-active" data-icon="check">FACEBOOK</a></li>
                <li><a href="#" data-icon="check">TWITTER</a></li>
                <li><a href="#" data-icon="check">MAIL</a></li>
            </ul>
           </div>-->
    
    
    
    		<div class="flexslider">
                       <ul class="slides">
                             <li><a href="www.infrasigno.con"><img src="<?php echo base_url();?>images/slider/baner-01.gif" /> </a></li>
                             <li><img src="<?php echo base_url();?>images/slider/baner-02.gif" /></li>
                             <li> <img src="<?php echo base_url();?>images/slider/baner-03.gif" /></li>
                       </ul>
          
               </div>              
            
            
		
	</div>
    
    
  <li class="title" id="ciudad"> <div class="icontitle">C</div> <h1>LA CIUDAD</h1>
  <h4>Baños de Agua Santa</h4></li>   
    
	<div data-role="content" data-theme="d">
    	
    
        
 <div data-role="collapsible-set">
 
 <div data-role="content" class="laciudad">
  <!--<h1 class="tagline">Response project&nbsp;&nbsp;<p>Historia, antecedentes <p>
  <div class="icontitle">C</div>
 </h1>-->
 <!-- <li class="title"> <div class="icontitle">C</div> <h1>LA CIUDAD</h1>
  <h4>Baños de Agua Santa</h4></li>-->
            
            
  <p>Es un cantón perteneciente a la Provincia de Tungurahua, se encuentra ubicada en la base del volcán Tungurahua, en el flanco oriental de la Cordillera de los Andes, sobre una meseta montañosa drenada por los ríos Bascún, Ulba y Pastaza que inciden directamente en la geografía de Baños. Su significativa diferencia de altitud, que va desde los 5016 m.s.n.m en la cima del volcán Tungurahua, pasando por los 1820 m.s.n.m a los que se encuentra la ciudad de Baños, hasta los 1050 m.s.n.m en el límite provincial con Pastaza, generan especiales condiciones climáticas en su camino hacia el oriente, lo que hace del cantón Baños uno de los sitios más privilegiados para la existencia de flora, fauna y paisajes únicos en el mundo.
</p>
  </div>
  
  
  <div data-role="collapsible" class="laciudad">
   <H1>LIMITES DE LA CIUDAD</H1>
   <p>Baños, una pequeña ciudad que se encuentra asentada en sobre una meseta basáltica, está rodeado de altas montañas en los andes ecuatorianos, tiene una extensión de 340 hectáreas; conocido en el mundo entero por sus bondades naturales, sus ríos, sus cascadas su flora y fauna, las aguas medicinales que brotan del fondo de la tierra, por el volcán Tungurahua.<br/><br/>

Al NORTE: Con la parroquia Lligua <br/>
Al SUR: Con la provincia de Chimborazo<br/>
Al ESTE: Con las parroquias Ulba y Río Verde.<br/>
Al Oeste: Con el Cantón Pelileo.<br/><br/>


Clima.- posee un clima ecuatorial, mesotérmico que va desde el  semi húmedo a húmedo, su temperatura fluctúa entre los 18 y 22 grados centígrados.<br/><br/>

Altitud.- Baños se encuentra ubicada a 1820 msnm.<br/><br/>

Ríos.- Los más importantes son: El Pastaza, en el cual se realiza el rafting, Bascun y Ulba.
</p>
  </div>
  
  <div data-role="collapsible" class="laciudad">
   <H1>DIVISION POLITICA</H1>
   <p>Su cabecera es la ciudad de Baños; cuenta con una parroquia urbana que es Baños (La Matriz).<br/> Las parroquias rurales son:<br/><br/>

Lligua, Ulba, Río Verde, Río Negro</p>
<div class="politica" name="lligua">
<h2 class="enca-main">LLIGUA</h2>
<h3 class="enca-sub">Lligua, Ulba, Rio verde, Rio negro</h3>
</div>
<p>Parroquia ubicada a 5 minutos de la ciudad vía al Oriente, población  3.152 habitantes . Clima  templado, semi-húmedo, temperatura promedio  18ºC, ideal para la realización de actividades recreacionales al aire libre, así como actividades económicas de carácter agrícola y pecuario. <br/><br/>
Productos: mandarinas, tomate de árbol, tomate de carne, aguacate,  granadilla, zanahoria blanca, camote, papa china, fréjol, maíz.
Un alto porcentaje de la población también se dedica a la avicultura, porcicultura, actividades turísticas, gastronomía. Existen varios paraderos y establecimientos que ofrecen comidas típicas: fritada, caldo de gallina criolla, pollo asado, choclos con queso, parrilladas.<br/><br/>

<div class="politica" name="ulba">
<h2 class="enca-main">ULBA</h2>
<h3 class="enca-sub">Lligua, Ulba, Rio verde, Rio negro</h3>
</div>





 <p>Parroquia ubicada a 5 minutos de la ciudad vía al Oriente, población  3.152 habitantes . Clima  templado, semi-húmedo, temperatura promedio  18ºC, ideal para la realización de actividades recreacionales al aire libre, así como actividades económicas de carácter agrícola y pecuario. <br/><br/>
Productos: mandarinas, tomate de árbol, tomate de carne, aguacate,  granadilla, zanahoria blanca, camote, papa china, fréjol, maíz.
Un alto porcentaje de la población también se dedica a la avicultura, porcicultura, actividades turísticas, gastronomía. Existen varios paraderos y establecimientos que ofrecen comidas típicas: fritada, caldo de gallina criolla, pollo asado, choclos con queso, parrilladas.<br/><br/>

Atractivos naturales: Río Ulba, Río Chamana, Río Verde Chico,   Río Cristal,   Río Valencia,   Río Santa Rosa,   Río Guamag,    Río Blanco, Río León,  Cascada del Silencio, Cascada Ulba, Cascadas de Chamana.</p>


 
 
  </div>
  
 
</div>
        
            
        
        
			
            
            
            
                   
            
            
				
	</div>
    
    
    
	<div data-role="footer" data-theme="a" >
    
		<div data-role="navbar" data-theme="e" class="pie">
            <ul>
                <li><a href="#home" class="ui-btn-active" data-icon="home">Home</a></li>
                <li><a href="#oferta" data-icon="grid">Oferta Turistica</a></li>
                <li><a href="#aboutus" data-icon="info">About Us</a></li>
                <li><a href="#geo" data-icon="star" onclick="//alert('2')">Ubicacion</a></li>
                <!--<li><a href="javascript:change_page('geo');" data-icon="star" onclick="//alert('2')">Ubicacion</a></li>-->
                <li><a href="" data-role="button" class="next" data-icon="forward" data-iconpos="notext">Next</a></li>
            </ul>
            </ul>
        </div>
        
        
        <p class="copyright">&copy; 2012 Rutas moviles.com &nbsp;&nbsp;</p>	
	</div>
</div>








<div data-role="page" id="oferta" data-theme="a">

	<div data-role="header" data-theme="a" class="yellow">
    <div class="bannerr"></div>
<!--<a href="#home" data-rel="back" data-icon="arrow-l">Back</a>
        <h1>OFERTA</h1>
        <a href="photogallery.html" rel="external">Photo Gallery</a>-->
          <div data-role="navbar" data-theme="a" >
             <ul> 
                 <li><a href="http://www.facebook.com/"data-show-count="false" data-show-screen-name="false"><img src="<?php echo base_url();?>images/white_facebook.png" width="32" height="32" alt="Follow Us on Facebook"><br />MEGUSTA</a>
    </a></li>
                <li><a href="#twitter" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false"><img src="<?php echo base_url();?>images/white_twitter_bird.png" width="32" height="32" alt="Visit our Twitter Feed"><br />TWITTEAR</a>
    </a></li>
             </ul> 
          </div>
	</div>
    
    
    <li class="title2"> <div class="icontitle">C</div> <h1>ZOOLOGICO</h1>
    <h4>Sector San Francisco</h4></li>
    
    
    
	<div data-role="content" data-theme="d">
     
    	
      <!-- navigation -->
		<ul data-role="listview" id="listview" data-dividertheme="e" class="titulo"  data-inset="true" data-filter="true" data-filter-placeholder="Qué atractivo buscas?" data-autodividers="true">
             
             <li class="titulo"><a href="#atractivos"> <div class="icon">C</div> <h1>ATRACTIVOS TURISTICOS</h1>
            <p>Zoologico, Serpentario,Volcan, etc.</p>
            <!--<img src="images/vote.png">--> <!--<span class="ui-li-count">10 km</span>--></a>            </li>    
            
            
             <li class="titulo"><a href="#hosterias"><div class="icon">C</div><h1>HOSTERIAS</h1>
            <p>Cañaveral, Amazonas, etc.</p>
            <!--<img src="images/vote.png">--> <!--<span class="ui-li-count">10 km</span>--></a>            </li>
            
            
             <li class="titulo"><a href="#deportes"><div class="icon">C</div><h1>DEPORTES</h1>
            <p>Downhill, escalada, ratting, etc.</p>
            <!--<img src="images/vote.png">--> <!--<span class="ui-li-count">10 km</span>--></a>            </li>
            
             <li class="titulo"><a href="#mas"><div class="icon">C</div><h1>IGLESIAS</h1>
            <p>Conceptas,Central, etc.</p>
            <!--<img src="images/vote.png">--> <!--<span class="ui-li-count">10 km</span>--></a>      </li> 
            
             <li class="titulo"><a href="#mas"><div class="icon">C</div><h1>BALNEAREOS</h1>
            <p>Termas de la virgen,tambo,etc.</p>
            <!--<img src="images/vote.png">--> <!--<span class="ui-li-count">10 km</span>--></a>      </li> 
            
             <li class="titulo"><a href="#mas"><div class="icon">C</div><h1>Cascadas</h1>
            <p>Bascum, Manto de la novia, Pailon, etc.</p>
            <!--<img src="images/vote.png">--> <!--<span class="ui-li-count">10 km</span>--></a>      </li> 
            
             <li class="titulo"><a href="#mas"><div class="icon">C</div><h1>MIRADORES</h1>
            <p>Ojos del volcan, cruz de bellavista, etc.</p>
            <!--<img src="images/vote.png">--> <!--<span class="ui-li-count">10 km</span>--></a>      </li> 
            
             <li class="titulo"><a href="#mas"><div class="icon">C</div><h1>ARTESANIAS</h1>
            <p>Talleres, Paseo artesanal, etc.</p>
            <!--<img src="images/vote.png">--> <!--<span class="ui-li-count">10 km</span>--></a>      </li> 
                                
		</ul>

        
        <div class="shadow2box"><img src="<?php echo base_url();?>images/shadow.png" class="shadow2" alt="shadow"></div>
        <!-- /navigation -->  

        
        
        
  
			
        
        
        
        
        
        	
	</div>
	<div data-role="footer" data-position="fixed" data-id="myfooter" class="ui-footer ui-bar-a ui-footer-fixed fade ui-fixed-overlay" role="contentinfo" style="top: 543px; ">
		<div data-role="navbar" data-theme="e">
            <ul>
				<li><a href="#home" data-icon="home">Home</a></li>
                <li><a href="#oferta" data-icon="grid" class="ui-btn-active">Oferta Turistica</a></li>
                <li><a href="#aboutus" data-icon="info">About Us</a></li>
                <li><a href="#geo" data-icon="star">Ubicacion</a></li>
            </ul>
        </div>	
        <p class="copyright">&copy; 2012 Rutas moviles.com &nbsp;&nbsp;</p>
	</div>
</div>







<div data-role="page" id="mas" data-theme="d">

	<div data-role="header" data-theme="a" class="yellow" >
           <div class="bannerr"></div>
           
           <!--inicio barra sociales y foto-->
           <div data-role="navbar" data-theme="a" >
             <ul> 
             <li><a href="#oferta" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false"><img src="<?php echo base_url();?>images/regresar.png" width="32" height="32" alt="Visit our Twitter Feed"><br />
       REGRESAR</a>
    </a></li>
                 <li><a href="http://www.facebook.com/"data-show-count="false" data-show-screen-name="false"><img src="<?php echo base_url();?>images/white_facebook.png" width="32" height="32" alt="Follow Us on Facebook"><br />MEGUSTA</a>
    </a></li>
                <li><a href="#twitter" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false"><img src="<?php echo base_url();?>images/white_twitter_bird.png" width="32" height="32" alt="Visit our Twitter Feed"><br />TWITTEAR</a>
    </a></li>
    
     <li><a href="#portfolio" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false"><img src="<?php echo base_url();?>images/foto.png" width="32" height="32" alt="Visit our Twitter Feed"><br />
       FOTOS</a>
    </a></li>
    
             </ul> 
          </div>
          <!--fin barra sociales y foto-->
            
		
	     </div>
          
    
    
    
	<div data-role="content" data-theme="d" class="conte" >
    	


		<ul data-role="listview" data-inset="true" data-filter="true" data-filter-placeholder="Qué lugar buscas?" data-autodividers="true">
        
			<li><a href="lugares.html" rel="external"><img src="<?php echo base_url();?>images/imgoferta/iglesias/iglesia-parque2.jpg" width="300" height="260" alt="Tours Listing"><h1>Iglesia Central</h1>
            <p>Es un cantón perteneciente a la Provincia de Tungurahua, se encuentra ubicada en la base del volcán Tungurahua, en el flanco oriental de la Cordillera de los Andes, sobre una meseta montañosa drenada por los ríos Bascún, Ulba y Pastaza que inciden directamente en la geografía de Baños. Su significativa diferencia de altitud, que va desde los 5016 </p>
            <img src="<?php echo base_url();?>images/vote.png"> <span class="ui-li-count">10 km</span></a></li>
            
            
            
            <li><a href="lugares.html" rel="external"><img src="<?php echo base_url();?>images/imgoferta/iglesias/iglesia-la sagrada concepcion.jpg" width="300" height="260" alt="Tours Listing"><h1>Iglesia Catedral</h1>
            <p>Es un cantón perteneciente a la Provincia de Tungurahua, se encuentra ubicada en la base del volcán Tungurahua, en el flanco oriental de la Cordillera de los Andes, sobre una meseta montañosa drenada por los ríos Bascún, Ulba y Pastaza que inciden directamente en la geografía de Baños. Su significativa diferencia de altitud, que va desde los 5016 </p>
            <img src="<?php echo base_url();?>images/vote.png"> <span class="ui-li-count">12 km</span></a></li>
            
            
            
            
			<li><a href="lugares.html" rel="external"><img src="<?php echo base_url();?>images/imgoferta/iglesias/concepcion.jpg" width="300" height="260" alt="Tours Listing"><h1>Iglesia Conceptas</h1>
            <p>Es un cantón perteneciente a la Provincia de Tungurahua, se encuentra ubicada en la base del volcán Tungurahua, en el flanco oriental de la Cordillera de los Andes, sobre una meseta montañosa drenada por los ríos Bascún, Ulba y Pastaza que inciden directamente en la geografía de Baños. Su significativa diferencia de altitud, que va desde los 5016 </p>
            <img src="<?php echo base_url();?>images/vote.png"> <span class="ui-li-count">16 km</span></a></li>

<li><a href="lugares.html" rel="external"><img src="<?php echo base_url();?>images/imgoferta/iglesias/armenian_catholic_church.jpg" width="500" height="390" alt="Tours Listing"><h1>Iglesia Espiritu Santo</h1>
            <p>Es un cantón perteneciente a la Provincia de Tungurahua, se encuentra ubicada en la base del volcán Tungurahua, en el flanco oriental de la Cordillera de los Andes, sobre una meseta montañosa drenada por los ríos Bascún, Ulba y Pastaza que inciden directamente en la geografía de Baños. Su significativa diferencia de altitud, que va desde los 5016 </p>
            <img src="<?php echo base_url();?>images/vote.png"> <span class="ui-li-count">20 km</span></a></li>          
            
            
		</ul>		
	</div>
	<div data-role="footer" data-theme="a" >
		<div data-role="navbar" data-theme="e">
            <ul>
                <li><a href="#home" class="ui-btn-active" data-icon="home">Home</a></li>
                <li><a href="#oferta" data-icon="grid">Oferta Turistica</a></li>
                <li><a href="#aboutus" data-icon="info">About Us</a></li>
                <li><a href="#geo" data-icon="star">Ubicacion</a></li>
            </ul>
        </div>
        <p class="copyright">&copy; 2012 Rutas moviles.com &nbsp;&nbsp;</p>	
	</div>
</div>





<div data-role="page" id="hosterias" data-theme="d">

	<div data-role="header" data-theme="a" class="yellow" >
           <div class="bannerr"></div>
           
           <div data-role="navbar" data-theme="a" >
             <ul> 
             <li><a href="#oferta" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false"><img src="<?php echo base_url();?>images/regresar.png" width="32" height="32" alt="Visit our Twitter Feed"><br />
       REGRESAR</a>
    </a></li>
                 <li><a href="http://www.facebook.com/"data-show-count="false" data-show-screen-name="false"><img src="<?php echo base_url();?>images/white_facebook.png" width="32" height="32" alt="Follow Us on Facebook"><br />MEGUSTA</a>
    </a></li>
                <li><a href="#twitter" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false"><img src="<?php echo base_url();?>images/white_twitter_bird.png" width="32" height="32" alt="Visit our Twitter Feed"><br />TWITTEAR</a>
    </a></li>
    
     <li><a href="#portfolio" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false"><img src="<?php echo base_url();?>images/foto.png" width="32" height="32" alt="Visit our Twitter Feed"><br />
       FOTOS</a>
    </a></li>
             </ul> 
          </div>
            
		
	       </div>
    
    
    
    
	<div data-role="content" data-theme="d" class="conte" >
    	


		<ul data-role="listview" data-inset="true" data-filter="true" data-filter-placeholder="Qué lugar buscas?" data-autodividers="true">
        
			<li><a href="#tours"><img src="<?php echo base_url();?>images/imgoferta/hosterias/uno.jpg" width="340" height="279" alt="Tours Listing"><h1>HOSTERIA 1</h1>
            <p>Es un cantón perteneciente a la Provincia de Tungurahua, se encuentra ubicada en la base del volcán Tungurahua, en el flanco oriental de la Cordillera de los Andes, sobre una meseta montañosa drenada por los ríos Bascún, Ulba y Pastaza que inciden directamente en la geografía de Baños. Su significativa diferencia de altitud, que va desde los 5016 </p>
            <img src="<?php echo base_url();?>images/vote.png"> <span class="ui-li-count">10 km</span></a></li>
            
            
            
            <li><a href="#tours"><img src="<?php echo base_url();?>images/imgoferta/hosterias/dos.jpg" width="340" height="279" alt="Tours Listing"><h1>HOSTERIA 2</h1>
            <p>Es un cantón perteneciente a la Provincia de Tungurahua, se encuentra ubicada en la base del volcán Tungurahua, en el flanco oriental de la Cordillera de los Andes, sobre una meseta montañosa drenada por los ríos Bascún, Ulba y Pastaza que inciden directamente en la geografía de Baños. Su significativa diferencia de altitud, que va desde los 5016 </p>
                      <img src="<?php echo base_url();?>images/vote.png"> <span class="ui-li-count">12 km</span></a></li>
            
            
            
            
			<li><a href="#tours"><img src="<?php echo base_url();?>images/imgoferta/hosterias/tres.jpg" width="340" height="279" alt="Tours Listing">  <h1>HOSTERIA 3</h1>
            <p>Es un cantón perteneciente a la Provincia de Tungurahua, se encuentra ubicada en la base del volcán Tungurahua, en el flanco oriental de la Cordillera de los Andes, sobre una meseta montañosa drenada por los ríos Bascún, Ulba y Pastaza que inciden directamente en la geografía de Baños. Su significativa diferencia de altitud, que va desde los 5016 </p>
            <img src="<?php echo base_url();?>images/vote.png"> <span class="ui-li-count">16 km</span></a></li>

<li><a href="#tours"><img src="<?php echo base_url();?>images/imgoferta/hosterias/cuatro.jpg" width="340" height="279" alt="Tours Listing"><h1>HOSTERIA 4</h1>
            <p>Es un cantón perteneciente a la Provincia de Tungurahua, se encuentra ubicada en la base del volcán Tungurahua, en el flanco oriental de la Cordillera de los Andes, sobre una meseta montañosa drenada por los ríos Bascún, Ulba y Pastaza que inciden directamente en la geografía de Baños. Su significativa diferencia de altitud, que va desde los 5016 </p>
            <img src="<?php echo base_url();?>images/vote.png"> <span class="ui-li-count">20 km</span></a></li>          
            
            
		</ul>		
	</div>
	<div data-role="footer" data-theme="a" >
		<div data-role="navbar" data-theme="e">
            <ul>
                <li><a href="#home" class="ui-btn-active" data-icon="home">Home</a></li>
                <li><a href="#oferta" data-icon="grid">Oferta Turistica</a></li>
                <li><a href="#aboutus" data-icon="info">About Us</a></li>
                <li><a href="#geo" data-icon="star">Ubicacion</a></li>
            </ul>
        </div>
        <p class="copyright">&copy; 2012 Rutas moviles.com &nbsp;&nbsp;</p>	
	</div>
</div>




<div data-role="page" id="deportes" data-theme="d">

	<div data-role="header" data-theme="a" class="yellow" >
           <div class="bannerr"></div>
           
    
            <div data-role="navbar" data-theme="a" >
             <ul> 
             <li><a href="#oferta" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false"><img src="<?php echo base_url();?>images/regresar.png" width="32" height="32" alt="Visit our Twitter Feed"><br />
       REGRESAR</a>
    </a></li>
                 <li><a href="http://www.facebook.com/"data-show-count="false" data-show-screen-name="false"><img src="<?php echo base_url();?>images/white_facebook.png" width="32" height="32" alt="Follow Us on Facebook"><br />MEGUSTA</a>
    </a></li>
                <li><a href="#twitter" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false"><img src="<?php echo base_url();?>images/white_twitter_bird.png" width="32" height="32" alt="Visit our Twitter Feed"><br />TWITTEAR</a>
    </a></li>
    
     <li><a href="#portfolio" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false"><img src="<?php echo base_url();?>images/foto.png" width="32" height="32" alt="Visit our Twitter Feed"><br />
       FOTOS</a>
    </a></li>
             </ul> 
          </div>
		
	       </div>
      
    
    
    
	<div data-role="content" data-theme="d" class="conte" >
    	


		<ul data-role="listview" data-inset="true" data-filter="true" data-filter-placeholder="Qué lugar buscas?" data-autodividers="true">
        
			<li><a href="#tours"><img src="<?php echo base_url();?>images/imgoferta/deportes/uno.jpg" width="340" height="279" alt="Tours Listing"><h1>PUENTING</h1>
            <p>Es un cantón perteneciente a la Provincia de Tungurahua, se encuentra ubicada en la base del volcán Tungurahua, en el flanco oriental de la Cordillera de los Andes, sobre una meseta montañosa drenada por los ríos Bascún, Ulba y Pastaza que inciden directamente en la geografía de Baños. Su significativa diferencia de altitud, que va desde los 5016 </p>
            <img src="<?php echo base_url();?>images/vote.png"> <span class="ui-li-count">10 km</span></a></li>
            
            
            
            <li><a href="#tours"><img src="<?php echo base_url();?>images/imgoferta/deportes/dos.jpg" width="340" height="279" alt="Tours Listing"><h1>RAPTTING</h1>
            <p>Es un cantón perteneciente a la Provincia de Tungurahua, se encuentra ubicada en la base del volcán Tungurahua, en el flanco oriental de la Cordillera de los Andes, sobre una meseta montañosa drenada por los ríos Bascún, Ulba y Pastaza que inciden directamente en la geografía de Baños. Su significativa diferencia de altitud, que va desde los 5016 </p>
            <img src="<?php echo base_url();?>images/vote.png"> <span class="ui-li-count">12 km</span></a></li>
            
            
            
            
			<li><a href="#tours"><img src="<?php echo base_url();?>images/imgoferta/deportes/tres.jpg" width="340" height="279" alt="Tours Listing"><h1>CICLISMO</h1>
            <p>Es un cantón perteneciente a la Provincia de Tungurahua, se encuentra ubicada en la base del volcán Tungurahua, en el flanco oriental de la Cordillera de los Andes, sobre una meseta montañosa drenada por los ríos Bascún, Ulba y Pastaza que inciden directamente en la geografía de Baños. Su significativa diferencia de altitud, que va desde los 5016 </p>
            <img src="<?php echo base_url();?>images/vote.png"> <span class="ui-li-count">16 km</span></a></li>

<li><a href="#tours"><img src="<?php echo base_url();?>images/imgoferta/deportes/cuatro.jpg" width="340" height="279" alt="Tours Listing"><h1>MOTOCROSS </h1>
            <p>Es un cantón perteneciente a la Provincia de Tungurahua, se encuentra ubicada en la base del volcán Tungurahua, en el flanco oriental de la Cordillera de los Andes, sobre una meseta montañosa drenada por los ríos Bascún, Ulba y Pastaza que inciden directamente en la geografía de Baños. Su significativa diferencia de altitud, que va desde los 5016 </p>
            <img src="<?php echo base_url();?>images/vote.png"> <span class="ui-li-count">20 km</span></a></li>          
            
            
		</ul>		
	</div>
	<div data-role="footer" data-theme="a" >
		<div data-role="navbar" data-theme="e">
            <ul>
                <li><a href="#home" class="ui-btn-active" data-icon="home">Home</a></li>
                <li><a href="#oferta" data-icon="grid">Oferta Turistica</a></li>
                <li><a href="#aboutus" data-icon="info">About Us</a></li>
                <li><a href="#geo" data-icon="star">Ubicacion</a></li>
            </ul>
        </div>
        <p class="copyright">&copy; 2012 Rutas moviles.com &nbsp;&nbsp;</p>	
	</div>
</div>







<div data-role="page" id="atractivos" data-theme="d">

	<div data-role="header" data-theme="a" class="yellow" >
           <div class="bannerr"></div>
           <!--<div data-role="navbar" data-theme="e" class="pie">
            <ul>
                <li><a href="#" class="ui-btn-active" data-icon="check">FACEBOOK</a></li>
                <li><a href="#" data-icon="check">TWITTER</a></li>
                <li><a href="#" data-icon="check">MAIL</a></li>
            </ul>
        </div>-->
           
           
            <div data-role="navbar" data-theme="a" >
             <ul> 
             <li><a href="#oferta" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false"><img src="<?php echo base_url();?>images/regresar.png" width="32" height="32" alt="Visit our Twitter Feed"><br />
       REGRESAR</a>
    </a></li>
                 <li><a href="http://www.facebook.com/"data-show-count="false" data-show-screen-name="false"><img src="<?php echo base_url();?>images/white_facebook.png" width="32" height="32" alt="Follow Us on Facebook"><br />MEGUSTA</a>
    </a></li>
                <li><a href="#twitter" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false"><img src="<?php echo base_url();?>images/white_twitter_bird.png" width="32" height="32" alt="Visit our Twitter Feed"><br />TWITTEAR</a>
    </a></li>
    
     <li><a href="#hosterias" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false"><img src="<?php echo base_url();?>images/avanzar.png" width="32" height="32" alt="Visit our Twitter Feed"><br />
       REGRESAR</a>
    </a></li>
             </ul> 
          </div>
           
           
            
		
	      </div>
    
    
  <li class="title"> <div class="icontitle">C</div> <h1>ATRACTIVOS TURISTICOS</h1>
  <h4>Zoologico,Volcán Tungurahua</h4></li>
    
	<div data-role="content" data-theme="d" class="conte" >
    	
 

		<ul data-role="listview" data-inset="true" data-filter="true" data-filter-placeholder="Qué lugar buscas?" data-autodividers="true">
       <!-- rel="external"-->
			<li><a href="#zoologico" ><img src="<?php echo base_url();?>images/imgoferta/atractivos/uno.jpg" width="340" height="279" alt="Tours Listing"><h1>ZOOLOGICO</h1>
            <p>Es un cantón perteneciente a la Provincia de Tungurahua, se encuentra ubicada en la base del volcán Tungurahua, en el flanco oriental de la Cordillera de los Andes, sobre una meseta montañosa drenada por los ríos Bascún, Ulba y Pastaza que inciden directamente en la geografía de Baños. Su significativa diferencia de altitud, que va desde los 5016 </p>
          <img src="<?php echo base_url();?>images/vote.png"> <span class="ui-li-count">10 km</span></a></li>
            
            
          <!--  rel="external"-->
            <li><a href="#volcan" ><img src="<?php echo base_url();?>images/imgoferta/atractivos/dos.jpg" width="340" height="279" alt="Tours Listing"><h1>VOLCAN TUNGURAHUA</h1>
            <p>Es un cantón perteneciente a la Provincia de Tungurahua, se encuentra ubicada en la base del volcán Tungurahua, en el flanco oriental de la Cordillera de los Andes, sobre una meseta montañosa drenada por los ríos Bascún, Ulba y Pastaza que inciden directamente en la geografía de Baños. Su significativa diferencia de altitud, que va desde los 5016 </p>
          <img src="<?php echo base_url();?>images/vote.png"> <span class="ui-li-count">12 km</span></a></li>
            
            
            
            
			<li><a href="lugares.html" rel="external"><img src="<?php echo base_url();?>images/imgoferta/atractivos/tres.jpg" width="340" height="279" alt="Tours Listing"><h1>SERPENTARIO</h1>
            <p>Es un cantón perteneciente a la Provincia de Tungurahua, se encuentra ubicada en la base del volcán Tungurahua, en el flanco oriental de la Cordillera de los Andes, sobre una meseta montañosa drenada por los ríos Bascún, Ulba y Pastaza que inciden directamente en la geografía de Baños. Su significativa diferencia de altitud, que va desde los 5016 </p>
          <img src="<?php echo base_url();?>images/vote.png"> <span class="ui-li-count">16 km</span></a></li>

<li><a href="lugares.html" rel="external"><img src="<?php echo base_url();?>images/imgoferta/atractivos/cuatro.jpg" width="340" height="279" alt="Tours Listing"><h1>FLORA Y FAUNA</h1>
            <p>Es un cantón perteneciente a la Provincia de Tungurahua, se encuentra ubicada en la base del volcán Tungurahua, en el flanco oriental de la Cordillera de los Andes, sobre una meseta montañosa drenada por los ríos Bascún, Ulba y Pastaza que inciden directamente en la geografía de Baños. Su significativa diferencia de altitud, que va desde los 5016 </p>
          <img src="<?php echo base_url();?>images/vote.png"> <span class="ui-li-count">20 km</span></a></li>          
            
            
		</ul>
        <div class="shadow2box"><img src="<?php echo base_url();?>images/shadow.png" class="shadow2" alt="shadow"></div>		
	</div>
	<div data-role="footer" data-theme="a" >
		<div data-role="navbar" data-theme="e">
            <ul>
                <li><a href="#home" class="ui-btn-active" data-icon="home">Home</a></li>
                <li><a href="#oferta" data-icon="grid">Oferta Turistica</a></li>
                <li><a href="#aboutus" data-icon="info">About Us</a></li>
                <li><a href="#geo" data-icon="star">Ubicacion</a></li>
            </ul>
        </div>
        <p class="copyright">&copy; 2012 Rutas moviles.com &nbsp;&nbsp;</p>	
	</div>
</div>






<div data-role="page" id="countries" data-theme="e">
	<div data-role="header" data-theme="b">
		<a href="#home" data-rel="back" data-icon="arrow-l">Back</a>
        <h1>Countries</h1>
        <a href="photogallery.html" rel="external">Photo Gallery</a>
	</div>
    
    
	
	<div data-role="footer" data-theme="b">
		<div data-role="navbar" data-theme="e">
            <ul>
				<li><a href="#home" data-icon="home">Home</a></li>
                <li><a href="#tours" data-icon="grid">Tours</a></li>
                <li><a href="#aboutus" data-icon="info">About Us</a></li>
                <li><a href="#geo" data-icon="star">Ubicacion</a></li>
            </ul>
        </div>
        <p class="copyright">&copy; 2012 Rutas moviles.com &nbsp;&nbsp;</p>	
	</div>
</div>

<div data-role="page" id="calendar" data-theme="e">
	<div data-role="header" data-theme="b">
		<a href="#home" data-rel="back" data-icon="arrow-l">Back</a>
        <h1>Book a Tour</h1>
	</div>
	<div data-role="content" data-theme="d">	
		Content		
	</div>
	<div data-role="footer" data-theme="b" >
		<div data-role="navbar" data-theme="e">
            <ul>
				<li><a href="#home" data-icon="home">Home</a></li>
                <li><a href="#tours" data-icon="grid">Tours</a></li>
                <li><a href="#aboutus" data-icon="info">About Us</a></li>
                <li><a href="#geo" data-icon="star">Ubicacion</a></li>
            </ul>
        </div>	
        <p class="copyright">&copy; 2012 Rutas moviles.com &nbsp;&nbsp;</p>
	</div>
</div>


<!-- aboutus -->

<div data-role="page" id="aboutus" data-theme="a" >
	<div data-role="header" data-theme="a" class="yellow">
		<!--<a href="#home" data-rel="back" data-icon="arrow-l">Back</a>
        <h1>About Us</h1>-->
    <div class="bannerr"></div>
    
	</div>
    <div data-role="navbar" data-theme="a" >
         <ul> 
             <li><a href="http://www.facebook.com/"data-show-count="false" data-show-screen-name="false"><img src="<?php echo base_url();?>images/white_facebook.png" width="32" height="32" alt="Follow Us on Facebook"><br />ME GUSTA</a>
</a></li>
			<li><a href="#twitter" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false"><img src="<?php echo base_url();?>images/white_twitter_bird.png" width="32" height="32" alt="Visit our Twitter Feed"><br />
			  TWITTEAR</a>
</a></li>
         </ul> 
    </div>	
    
    
	<div data-role="content" data-theme="d" class="laciudad2" >	
    <h1>WELCOME - BIEMVENIDOS</h1>
	<p>Baños, una pequeña ciudad que se encuentra asentada en sobre una meseta basáltica, está rodeado de altas montañas en los andes ecuatorianos, tiene una extensión de 340 hectáreas; conocido en el mundo entero por sus bondades naturales, sus ríos, sus cascadas su flora y fauna, las aguas medicinales que brotan del fondo de la tierra, por el volcán Tungurahua. </p> <br/>
        
        <p>Mailing Address:
        	<!-- Address and Phone -->
        <ul data-role="listview" data-theme="a" data-inset="true" class="icab">
            <li ><img src="<?php echo base_url();?>images/pin.png" alt="Location" class="ui-li-icon">Galaxy avenue, New York, U.S</li>
            <li><img src="<?php echo base_url();?>images/fono.png" alt="Phone" class="ui-li-icon">Phone:
        800-555-TOUR</li>
        <li><img src="<?php echo base_url();?>images/email.png" alt="Phone" class="ui-li-icon">Email:
        info@turismo_banios.com</li>
        </ul>  
        
        <div data-role="content" class="content" data-theme="d" style="margin-top:15px">
			<form>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value=""  />
                
                <br />
                
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" value=""  />
                
                <br />
                
                <label for="textarea">Mensaje:</label>
                <textarea name="textarea" id="textarea"></textarea>
                             
                <br />
                
                <a href="#thankyou" data-rel="dialog" data-transition="pop" data-role="button" data-inline="true" data-theme="a">Send</a>           
                <a href="#aboutus" data-role="button" data-inline="true" data-theme="a">Reset </a>
                
			</form>  
        </div>
        
        
        <!-- END OF: Address and Phone -->
        
      
	</div>
    
    
    
	<div data-role="footer" data-theme="a" >
		<div data-role="navbar" data-theme="e">
            <ul>
 				<li><a href="#home" data-icon="home">Home</a></li>
                <li><a href="#oferta" data-icon="grid">Oferta</a></li>
                <li><a href="#aboutus" data-icon="info" class="ui-btn-active">About Us</a></li>
                <li><a href="#geo" data-icon="star">Ubicacion</a></li>
            </ul>
        </div>	
         <p class="copyright">&&copy; 2012 Rutas moviles.com &nbsp;&nbsp;</p>
	</div>
</div>
<!--  fin aboutus -->


<!-- Thank You Message -->
<div data-role="page" id="thankyou" data-title="Thank You">

    <!-- Header -->
    <div data-role="header" class="header">
       <h4>GRACIAS POR VISITARNOS</h4>
    </div><!-- END OF: Header -->
    
    <!-- Content -->
    <div data-role="content" class="dialog">
       Gracias por escribiernos, le responderemos lo más pronto posible
    </div><!-- END OF: Content -->
   

</div><!-- END OF: Thank You Message -->





<div data-role="page" id="twitter" data-theme="a" >
	<div data-role="header" data-theme="a" class="yellow">
    <div class="bannerr"></div>
		<!--<a href="#home" data-rel="back" data-icon="arrow-l">REGRESAR</a>
        <h4>REDES SOCIALES</h4>-->
        <div data-role="navbar" data-theme="a" >
         <ul> 
             <li><a href="https://twitter.com/poetzle" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false" target="_blank"><img src="<?php echo base_url();?>images/white_twitter_bird.png" width="32" height="32" alt="Follow Us on Twitter"><br />SIGUENOS EN TWITTER</a>
</a></li>
			<li><a href="#twitter" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false"><img src="<?php echo base_url();?>images/white_twitter_bird.png" width="32" height="32" alt="Visit our Twitter Feed"><br />Actualizar VENTANA</a>
</a></li>
         </ul> 
    </div>
	</div>
    	
	<div data-role="content" data-theme="a" class="tw">	
		<h4>Manténgase al día con nuestros últimos tweets</h4>	
        <script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
		<script>
			new TWTR.Widget({
			  version: 2,
			  type: 'profile',
			  rpp: 4,
			  interval: 30000,
			   width: 'auto',
			  height: 300,
			  theme: {
				shell: {
					background: '#000',
					color: '#ffffff'
				},
				tweets: {
					background: '#fff',
					color: '#030303',
					links: '#1b6394'
				}
			  },
			  features: {
				scrollbar: false,
				loop: false,
				live: false,
				behavior: 'all'
			  }
			}).render().setUser('poetzle').start();
        </script>
	</div>
	<div data-role="footer" data-theme="a" >
		<div data-role="navbar" data-theme="e">
            <ul>
				<li><a href="#home" data-icon="home">Home</a></li>
                <li><a href="#oferta" data-icon="grid">Oferta</a></li>
                <li><a href="#aboutus" data-icon="info">About Us</a></li>
                <li><a href="#geo" data-icon="star">Ubicacion</a></li>
            </ul>
        </div>
        <p class="copyright">&copy; 2012 Rutas moviles.com &nbsp;&nbsp;</p>	
	</div>
</div>









<!-- Portfolio -->
<div data-role="page" id="portfolio" data-title="Portfolio">

    <!-- Header -->
    <div data-role="header" class="header">
       <a href="#" data-rel="back" data-icon="arrow-l" data-transition="flip">Back</a> <h4>GALERIA</h4>
    </div><!-- END OF: Header -->

	<!-- Portfolio -->
	<ul id="gallery" class="gallery">
		<li><a rel="external" href="<?php echo base_url();?>images/full/001.jpg"><img src="<?php echo base_url();?>images/thumb/001.jpg" alt="Image 001" /></a></li>
		<li><a rel="external" href="<?php echo base_url();?>images/full/002.jpg"><img src="<?php echo base_url();?>images/thumb/002.jpg" alt="Image 002" /></a></li>
		<li><a rel="external" href="<?php echo base_url();?>images/full/003.jpg"><img src="<?php echo base_url();?>images/thumb/003.jpg" alt="Image 003" /></a></li>
		<li><a rel="external" href="<?php echo base_url();?>images/full/004.jpg"><img src="<?php echo base_url();?>images/thumb/004.jpg" alt="Image 004" /></a></li>
		<li><a rel="external" href="<?php echo base_url();?>images/full/005.jpg"><img src="<?php echo base_url();?>images/thumb/005.jpg" alt="Image 005" /></a></li>
		<li><a rel="external" href="<?php echo base_url();?>images/full/006.jpg"><img src="<?php echo base_url();?>images/thumb/006.jpg" alt="Image 006" /></a></li>
		<li><a rel="external" href="<?php echo base_url();?>images/full/007.jpg"><img src="<?php echo base_url();?>images/thumb/007.jpg" alt="Image 007" /></a></li>
		<li><a rel="external" href="<?php echo base_url();?>images/full/008.jpg"><img src="<?php echo base_url();?>images/thumb/008.jpg" alt="Image 008" /></a></li>
		<li><a rel="external" href="<?php echo base_url();?>images/full/009.jpg"><img src="<?php echo base_url();?>images/thumb/009.jpg" alt="Image 009" /></a></li>
		<li><a rel="external" href="<?php echo base_url();?>images/full/010.jpg"><img src="<?php echo base_url();?>images/thumb/010.jpg" alt="Image 010" /></a></li>
		<li><a rel="external" href="<?php echo base_url();?>images/full/011.jpg"><img src="<?php echo base_url();?>images/thumb/011.jpg" alt="Image 011" /></a></li>
		<li><a rel="external" href="<?php echo base_url();?>images/full/012.jpg"><img src="<?php echo base_url();?>images/thumb/012.jpg" alt="Image 012" /></a></li>
		<li><a rel="external" href="<?php echo base_url();?>images/full/013.jpg"><img src="<?php echo base_url();?>images/thumb/013.jpg" alt="Image 013" /></a></li>
		<li><a rel="external" href="<?php echo base_url();?>images/full/014.jpg"><img src="<?php echo base_url();?>images/thumb/014.jpg" alt="Image 014" /></a></li>
		<li><a rel="external" href="<?php echo base_url();?>images/full/015.jpg"><img src="<?php echo base_url();?>images/thumb/015.jpg" alt="Image 015" /></a></li>
		<li><a rel="external" href="<?php echo base_url();?>images/full/016.jpg"><img src="<?php echo base_url();?>images/thumb/016.jpg" alt="Image 016" /></a></li>
		<li><a rel="external" href="<?php echo base_url();?>images/full/017.jpg"><img src="<?php echo base_url();?>images/thumb/017.jpg" alt="Image 017" /></a></li>
		<li><a rel="external" href="<?php echo base_url();?>images/full/018.jpg"><img src="<?php echo base_url();?>images/thumb/018.jpg" alt="Image 018" /></a></li>
	</ul><!-- END OF: Portfolio -->



    <!-- Footer -->
	<div data-role="footer" class=" copyright">
        <h4>&copy; 2012 Rutas moviles.com &nbsp;&nbsp;</h4>
	</div><!-- END OF: Footer -->
    
</div><!-- END OF: Portfolio -->




 <!------------------------SECCION DESCRIPCIONES------------------------------>
 <!------------------------SECCION DESCRIPCIONES------------------------------>
 
 
 
<!-- DESCRIPCION SITIO#1 -->
<div data-role="page" id="zoologico" data-title="Blog Post"  data-theme="a">

    <!-- Header -->
    <div data-role="header" class="yellow" >
    <div class="bannerr"></div>
       <!--<a href="index.html" rel="external" data-rel="back" data-icon="arrow-l" data-transition="flip">Back</a> <h4>DESCRIPCION</h4>-->
       
    <!--inicio barra sociales y foto-->
                                      <!-- class="ic"-->
           <div data-role="navbar" data-theme="a" >
             <ul> 
               <li><a href="#atractivos" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false"><img src="<?php echo base_url();?>images/regresar.png" width="32" height="32" alt="Visit our Twitter Feed"><br />
       REGRESAR</a>
    </a></li>
                 <li><a href="http://www.facebook.com/"data-show-count="false" data-show-screen-name="false"><img src="<?php echo base_url();?>images/white_facebook.png" width="32" height="32" alt="Follow Us on Facebook"><br />MEGUSTA</a>
    </a></li>
                <li><a href="#twitter" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false"><img src="<?php echo base_url();?>images/white_twitter_bird.png" width="32" height="32" alt="Visit our Twitter Feed"><br />TWITTEAR</a>
    </a></li>
    
     <li><a href="#iglesia1" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false"><img src="<?php echo base_url();?>images/foto.png" width="32" height="32" alt="Visit our Twitter Feed"><br />
       FOTOS</a>
    </a></li>
    
  
             </ul> 
          </div>
          <!--fin barra sociales y foto-->       
         
    </div><!-- END OF: Header -->
    <li class="title"> <div class="icontitle">C</div> <h1>ZOOLOGICO</h1>
    <h4>Sector San Francisco</h4></li>
    <div data-role="content" class="content" data-theme="d">
    
  
   
        <!-- Content -->
        
           <div class="imdes"><img src="<?php echo base_url();?>images/img_480/iglesia_02.jpg" /> </div>
           <div class="imdes8"><img src="<?php echo base_url();?>images/img_1010/zoo_01.jpg" /> </div>
          <div data-role="collapsible-set">
 
 <div data-role="content" class="laciudad">
  <H1> DESCRIPCION DEL DESTINO</H1>
  <p>Historia, antecedentes <p>
  <p>Es un cantón perteneciente a la Provincia de Tungurahua, se encuentra ubicada en la base del volcán Tungurahua, en el flanco oriental de la Cordillera de los Andes, sobre una meseta montañosa drenada por los ríos Bascún, Ulba y Pastaza que inciden directamente en la geografía de Baños. Su significativa diferencia de altitud, que va desde los 5016 m.s.n.m en la cima del volcán Tungurahua, pasando por los 1820 m.s.n.m a los que se encuentra la ciudad de Baños, hasta los 1050 m.s.n.m en el límite provincial con Pastaza, generan especiales condiciones climáticas en su camino hacia el oriente, lo que hace del cantón Baños uno de los sitios más privilegiados para la existencia de flora, fauna y paisajes únicos en el mundo.
</p>
  </div>
  
  
  <div data-role="collapsible" class="laciudad">
   <H1>UBICACION DEL DESTINO</H1>
   <p>Baños, una pequeña ciudad que se encuentra asentada en sobre una meseta basáltica, está rodeado de altas montañas en los andes ecuatorianos, tiene una extensión de 340 hectáreas; conocido en el mundo entero por sus bondades naturales, sus ríos, sus cascadas su flora y fauna, las aguas medicinales que brotan del fondo de la tierra, por el volcán Tungurahua.<br/><br/>

Al NORTE: Con la parroquia Lligua <br/>
Al SUR: Con la provincia de Chimborazo<br/>
Al ESTE: Con las parroquias Ulba y Río Verde.<br/>
Al Oeste: Con el Cantón Pelileo.<br/><br/>


Clima.- posee un clima ecuatorial, mesotérmico que va desde el  semi húmedo a húmedo, su temperatura fluctúa entre los 18 y 22 grados centígrados.<br/><br/>

Altitud.- Baños se encuentra ubicada a 1820 msnm.<br/><br/>

Ríos.- Los más importantes son: El Pastaza, en el cual se realiza el rafting, Bascun y Ulba.
</p>
  </div>
  
  <div data-role="collapsible" class="laciudad">
   <H1>QUE DEBEMOS SABER</H1>
   <p>Su cabecera es la ciudad de Baños; cuenta con una parroquia urbana que es Baños (La Matriz).<br/> Las parroquias rurales son: 

- Lligua
- Ulba
- Río Verde
- Río Negro</p> <br/>

<div class="politica" name="lligua">
<h2 class="enca-main">LLIGUA</h2>
<h3 class="enca-sub">Lligua, Ulba, Rio verde, Rio negro</h3>
</div>
 <p>Parroquia ubicada a 3km de distancia,  vía asfaltada. Atractivos: una chorrera de más de 50m de longitud ubicada entre la Palma y Ozoguayco, un rio de aguas cristalinas que cruza por la parroquia, senderos, esplèndidos miradores naturales, una piscina  de agua fría cubierta.  
Sus habitantes viven de la agricultura y la ganadería, se produce tomate de árbol, granadilla, maíz, fréjol, durazno y zanahoria blanca. <br/><br/>

Atractivos naturales:Posee senderos aptos para realizar paseos a caballo,  excelentes miradores de la actividaddel volcán Tungurahua, siendo un sitio ideal para realizar avistamientos de objetos voladores no identificados (OVNIS), según  testimonios de varios de los moradores del lugar que han sido testigos de su presencia. 
</p>

<div class="politica" name="lligua">
<h2 class="enca-main">LLIGUA</h2>
<h3 class="enca-sub">Lligua, Ulba, Rio verde, Rio negro</h3>
</div>
 <p>Parroquia ubicada a 5 minutos de la ciudad vía al Oriente, población  3.152 habitantes . Clima  templado, semi-húmedo, temperatura promedio  18ºC, ideal para la realización de actividades recreacionales al aire libre, así como actividades económicas de carácter agrícola y pecuario. <br/><br/>
Productos: mandarinas, tomate de árbol, tomate de carne, aguacate,  granadilla, zanahoria blanca, camote, papa china, fréjol, maíz.
Un alto porcentaje de la población también se dedica a la avicultura, porcicultura, actividades turísticas, gastronomía. Existen varios paraderos y establecimientos que ofrecen comidas típicas: fritada, caldo de gallina criolla, pollo asado, choclos con queso, parrilladas.<br/><br/>

Atractivos naturales: Río Ulba, Río Chamana, Río Verde Chico,   Río Cristal,   Río Valencia,   Río Santa Rosa,   Río Guamag,    Río Blanco, Río León,  Cascada del Silencio, Cascada Ulba, Cascadas de Chamana.</p>


 
 
</div>
  
 
</div>
           
           
           
           </div><!-- END OF: CONTENT -->
    
    
    <!-- Footer -->
	<div data-role="footer" data-theme="a" >
		<div data-role="navbar" data-theme="e">
            <ul>
                <li><a href="#home" class="ui-btn-active" data-icon="home">Home</a></li>
                <li><a href="#oferta" data-icon="grid">Oferta Turistica</a></li>
                <li><a href="#aboutus" data-icon="info">About Us</a></li>
                <li><a href="#geo" data-icon="star">Ubicacion</a></li>
            </ul>
        </div>
        <p class="copyright">&copy; 2012 Rutas moviles.com &nbsp;&nbsp;</p>	
	</div>
    
    
</div><!-- FIN DESCRIPCION SITIO#1  -->

<!-- GALERIA POR SITIO -->
<div data-role="page" id="iglesia1" data-title="Portfolio">

    <!-- Header -->
    <div data-role="header" class="header">
       <!--<a href="#post" data-rel="back" data-icon="arrow-l" data-transition="flip">REGRESAR</a> <h4>GALERIA IGLESIA #1</h4>-->
     <div data-role="navbar" data-theme="a" >
             <ul> 
             <li><a href="#oferta" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false"><img src="<?php echo base_url();?>images/regresar.png" width="32" height="32" alt="Visit our Twitter Feed"><br />
       REGRESAR</a>
    </a></li>
                 <li><a href="http://www.facebook.com/"data-show-count="false" data-show-screen-name="false"><img src="<?php echo base_url();?>images/white_facebook.png" width="32" height="32" alt="Follow Us on Facebook"><br />MEGUSTA</a>
    </a></li>
                <li><a href="#twitter" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false"><img src="<?php echo base_url();?>images/white_twitter_bird.png" width="32" height="32" alt="Visit our Twitter Feed"><br />TWITTEAR</a>
    </a></li>
    
   
             </ul> 
          </div>  
       
       
    </div><!-- END OF: Header -->

	<!-- Portfolio -->
	<ul id="gallery" class="gallery">
		<li><a rel="external" href="<?php echo base_url();?>images/full/001.jpg"><img src="<?php echo base_url();?>images/thumb/001.jpg" alt="Image 001" /></a></li>
		<li><a rel="external" href="<?php echo base_url();?>images/full/002.jpg"><img src="<?php echo base_url();?>images/thumb/002.jpg" alt="Image 002" /></a></li>
		<li><a rel="external" href="<?php echo base_url();?>images/full/003.jpg"><img src="<?php echo base_url();?>images/thumb/003.jpg" alt="Image 003" /></a></li>
		<li><a rel="external" href="<?php echo base_url();?>images/full/004.jpg"><img src="<?php echo base_url();?>images/thumb/004.jpg" alt="Image 004" /></a></li>
		<li><a rel="external" href="<?php echo base_url();?>images/full/005.jpg"><img src="<?php echo base_url();?>images/thumb/005.jpg" alt="Image 005" /></a></li>
		<li><a rel="external" href="<?php echo base_url();?>images/full/006.jpg"><img src="<?php echo base_url();?>images/thumb/006.jpg" alt="Image 006" /></a></li>
		<li><a rel="external" href="<?php echo base_url();?>images/full/007.jpg"><img src="<?php echo base_url();?>images/thumb/007.jpg" alt="Image 007" /></a></li>
		<li><a rel="external" href="<?php echo base_url();?>images/full/008.jpg"><img src="<?php echo base_url();?>images/thumb/008.jpg" alt="Image 008" /></a></li>
		<li><a rel="external" href="<?php echo base_url();?>images/full/009.jpg"><img src="<?php echo base_url();?>images/thumb/009.jpg" alt="Image 009" /></a></li>
		<li><a rel="external" href="<?php echo base_url();?>images/full/010.jpg"><img src="<?php echo base_url();?>images/thumb/010.jpg" alt="Image 010" /></a></li>
		<li><a rel="external" href="<?php echo base_url();?>images/full/011.jpg"><img src="<?php echo base_url();?>images/thumb/011.jpg" alt="Image 011" /></a></li>
		<li><a rel="external" href="<?php echo base_url();?>images/full/012.jpg"><img src="<?php echo base_url();?>images/thumb/012.jpg" alt="Image 012" /></a></li>
		<li><a rel="external" href="<?php echo base_url();?>images/full/013.jpg"><img src="<?php echo base_url();?>images/thumb/013.jpg" alt="Image 013" /></a></li>
		<li><a rel="external" href="<?php echo base_url();?>images/full/014.jpg"><img src="<?php echo base_url();?>images/thumb/014.jpg" alt="Image 014" /></a></li>
		<li><a rel="external" href="<?php echo base_url();?>images/full/015.jpg"><img src="<?php echo base_url();?>images/thumb/015.jpg" alt="Image 015" /></a></li>
		<li><a rel="external" href="<?php echo base_url();?>images/full/016.jpg"><img src="<?php echo base_url();?>images/thumb/016.jpg" alt="Image 016" /></a></li>
		<li><a rel="external" href="<?php echo base_url();?>images/full/017.jpg"><img src="<?php echo base_url();?>images/thumb/017.jpg" alt="Image 017" /></a></li>
		<li><a rel="external" href="<?php echo base_url();?>images/full/018.jpg"><img src="<?php echo base_url();?>images/thumb/018.jpg" alt="Image 018" /></a></li>
	</ul><!-- END OF: Portfolio -->


<!-- Footer -->
<div data-role="footer" data-position="fixed" data-id="myfooter" class="ui-footer ui-bar-a ui-footer-fixed fade ui-fixed-overlay" role="contentinfo" style="top: 543px; ">




	<!--<div data-role="footer" data-theme="a" >-->
		<div data-role="navbar" data-theme="e">
            <ul>
                <li><a href="#home" class="ui-btn-active" data-icon="home">Home</a></li>
                <li><a href="#oferta" data-icon="grid">Oferta Turistica</a></li>
                <li><a href="#aboutus" data-icon="info">About Us</a></li>
                <li><a href="#geo" data-icon="star">Ubicacion</a></li>
            </ul>
        </div>
        <p class="copyright">&copy; 2012 Rutas moviles.com &nbsp;&nbsp;</p>	
	</div>
    
</div><!-- END OF: GALERIA POR SITIO -->






<!-- DESCRIPCION SITIO#2 -->
<div data-role="page" id="volcan" data-title="Blog Post"  data-theme="a">

    <!-- Header -->
    <div data-role="header" class="yellow">
      <!-- <a href="#atractivos" data-rel="back" data-icon="arrow-l" data-transition="flip">Back</a> <h4>DESCRIPCION</h4>-->
      <div class="bannerr"></div>
       
    <!--inicio barra sociales y foto-->
           <div data-role="navbar" data-theme="a" >
             <ul> 
             <li><a href="#atractivos" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false"><img src="<?php echo base_url();?>images/regresar.png" width="32" height="32" alt="Visit our Twitter Feed"><br />
       REGRESAR</a>
    </a></li>
                 <li><a href="http://www.facebook.com/"data-show-count="false" data-show-screen-name="false"><img src="<?php echo base_url();?>images/white_facebook.png" width="32" height="32" alt="Follow Us on Facebook"><br />MEGUSTA</a>
    </a></li>
                <li><a href="#twitter" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false"><img src="<?php echo base_url();?>images/white_twitter_bird.png" width="32" height="32" alt="Visit our Twitter Feed"><br />TWITTEAR</a>
    </a></li>
    
     <li><a href="#iglesia1" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false"><img src="<?php echo base_url();?>images/foto.png" width="32" height="32" alt="Visit our Twitter Feed"><br />
       FOTOS</a>
    </a></li>
             </ul> 
          </div>
          <!--fin barra sociales y foto-->       
       
    </div><!-- END OF: Header -->
        <li class="title"> <div class="icontitle">C</div> <h1>VOLCAN TUNGURAHUA</h1>
        <h4>Via Baños</h4></li>
        <div data-role="content" class="content" data-theme="d">
        
        <!-- Content -->
        
           <div class="imdes"><img src="<?php echo base_url();?>images/img_480/volcan.jpg" /> </div>
           <!--<div class="imdes8"><img src="images/img_800/iglesia_01.jpg" /> </div>-->
          <div data-role="collapsible-set">
 
 <div data-role="content" class="laciudad">
  <H1> DESCRIPCION DEL DESTINO</H1>
  <p>Historia, antecedentes <p>
  <p>Es un cantón perteneciente a la Provincia de Tungurahua, se encuentra ubicada en la base del volcán Tungurahua, en el flanco oriental de la Cordillera de los Andes, sobre una meseta montañosa drenada por los ríos Bascún, Ulba y Pastaza que inciden directamente en la geografía de Baños. Su significativa diferencia de altitud, que va desde los 5016 m.s.n.m en la cima del volcán Tungurahua, pasando por los 1820 m.s.n.m a los que se encuentra la ciudad de Baños, hasta los 1050 m.s.n.m en el límite provincial con Pastaza, generan especiales condiciones climáticas en su camino hacia el oriente, lo que hace del cantón Baños uno de los sitios más privilegiados para la existencia de flora, fauna y paisajes únicos en el mundo.
</p>
  </div>
  
  
  <div data-role="collapsible" class="laciudad">
   <H1>UBICACION DEL DESTINO</H1>
   <p>Baños, una pequeña ciudad que se encuentra asentada en sobre una meseta basáltica, está rodeado de altas montañas en los andes ecuatorianos, tiene una extensión de 340 hectáreas; conocido en el mundo entero por sus bondades naturales, sus ríos, sus cascadas su flora y fauna, las aguas medicinales que brotan del fondo de la tierra, por el volcán Tungurahua.<br/><br/>

Al NORTE: Con la parroquia Lligua <br/>
Al SUR: Con la provincia de Chimborazo<br/>
Al ESTE: Con las parroquias Ulba y Río Verde.<br/>
Al Oeste: Con el Cantón Pelileo.<br/><br/>


Clima.- posee un clima ecuatorial, mesotérmico que va desde el  semi húmedo a húmedo, su temperatura fluctúa entre los 18 y 22 grados centígrados.<br/><br/>

Altitud.- Baños se encuentra ubicada a 1820 msnm.<br/><br/>

Ríos.- Los más importantes son: El Pastaza, en el cual se realiza el rafting, Bascun y Ulba.
</p>
  </div>
  
  <div data-role="collapsible" class="laciudad">
   <H1>QUE DEBEMOS SABER</H1>
   <p>Su cabecera es la ciudad de Baños; cuenta con una parroquia urbana que es Baños (La Matriz).<br/> Las parroquias rurales son: 

- Lligua
- Ulba
- Río Verde
- Río Negro</p> <br/>

<H1>LLIGUA</H1>
 <p>Parroquia ubicada a 3km de distancia,  vía asfaltada. Atractivos: una chorrera de más de 50m de longitud ubicada entre la Palma y Ozoguayco, un rio de aguas cristalinas que cruza por la parroquia, senderos, esplèndidos miradores naturales, una piscina  de agua fría cubierta.  
Sus habitantes viven de la agricultura y la ganadería, se produce tomate de árbol, granadilla, maíz, fréjol, durazno y zanahoria blanca. <br/><br/>

Atractivos naturales:Posee senderos aptos para realizar paseos a caballo,  excelentes miradores de la actividaddel volcán Tungurahua, siendo un sitio ideal para realizar avistamientos de objetos voladores no identificados (OVNIS), según  testimonios de varios de los moradores del lugar que han sido testigos de su presencia. 
</p>

<H1>ULBA</H1>
 <p>Parroquia ubicada a 5 minutos de la ciudad vía al Oriente, población  3.152 habitantes . Clima  templado, semi-húmedo, temperatura promedio  18ºC, ideal para la realización de actividades recreacionales al aire libre, así como actividades económicas de carácter agrícola y pecuario. <br/><br/>
Productos: mandarinas, tomate de árbol, tomate de carne, aguacate,  granadilla, zanahoria blanca, camote, papa china, fréjol, maíz.
Un alto porcentaje de la población también se dedica a la avicultura, porcicultura, actividades turísticas, gastronomía. Existen varios paraderos y establecimientos que ofrecen comidas típicas: fritada, caldo de gallina criolla, pollo asado, choclos con queso, parrilladas.<br/><br/>

Atractivos naturales: Río Ulba, Río Chamana, Río Verde Chico,   Río Cristal,   Río Valencia,   Río Santa Rosa,   Río Guamag,    Río Blanco, Río León,  Cascada del Silencio, Cascada Ulba, Cascadas de Chamana.</p>


 
 
</div>
  
 
</div>
           
           
           
      </div><!-- END OF: CONTENT -->
    
    
    <!-- Footer -->
	<div data-role="footer" data-theme="a" >
		<div data-role="navbar" data-theme="e">
            <ul>
                <li><a href="#home" class="ui-btn-active" data-icon="home">Home</a></li>
                <li><a href="#oferta" data-icon="grid">Oferta Turistica</a></li>
                <li><a href="#aboutus" data-icon="info">About Us</a></li>
                <li><a href="#geo" data-icon="star">Ubicacion</a></li>
            </ul>
        </div>
        <p class="copyright">&copy; 2012 Rutas moviles.com &nbsp;&nbsp;</p>	
	</div>
    
    
</div><!-- DESCRIPCION SITIO#2 -->


<!-- GEOLOCALIZACION-->
<div data-role="page" id="geo" name="geo" data-title="Blog Post"  data-theme="a" class = "geo">

    <!-- Header -->
    <div data-role="header" class="yellow">
      <!-- <a href="#atractivos" data-rel="back" data-icon="arrow-l" data-transition="flip">Back</a> <h4>DESCRIPCION</h4>-->
      <div class="bannerr"></div>
       
    <!--inicio barra sociales y foto-->
           
    <!--fin barra sociales y foto-->       
       
    </div><!-- END OF: Header -->
    
        <div data-role="content" class="content" data-theme="d">
        <!-- Content -->
        
<section>
	<p id="status">Estas en ... </p>
    <div id="mapa"></div>
</section>       
        </div>
        <!-- END OF: CONTENT -->
        
    <!-- Footer -->
	<div data-role="footer" data-theme="a" >
		<div data-role="navbar" data-theme="e">
            <ul>
                <li><a href="#home" class="ui-btn-active" data-icon="home">Home</a></li>
                <li><a href="#oferta" data-icon="grid">Oferta Turistica</a></li>
                <li><a href="#aboutus" data-icon="info">About Us</a></li>
                <!--<li><a href="ubicacion.html" data-icon="star">Ubicacion</a></li>-->
                <li><a href="#geo" data-icon="star">Ubicacion</a></li>
                <li><a href="" data-role="button" class="next" data-icon="forward" data-iconpos="notext">Next</a></li>
            </ul>
        </div>
        <p class="copyright">&copy; 2012 Rutas moviles.com &nbsp;&nbsp;</p>	
	</div>
</div><!-- DESCRIPCION SITIO#2 -->


</body>
</html>