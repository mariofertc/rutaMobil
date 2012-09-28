<!DOCTYPE HTML>
    <html lang="en-US">
    <head>
    <meta charset="UTF-8">
    <title>Main Page</title>
    <!--<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0a1/jquery.mobile-1.0a1.min.css" />
    <script src="http://code.jquery.com/jquery-1.4.3.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.0a1/jquery.mobile-1.0a1.min.js"></script>-->
	
	<!--<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.css" />
    <script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js"></script>-->
	
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.css" />
    <script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.0a1/jquery.mobile-1.0a1.min.js"></script>
	
    </head>
    <body>
    <!--<div data-role="page">
    <div data-role="header"><h1>Main Page</h1></div>
    <div data-role="content"><p><a href="#map">Map</a></p></div>
    </div>-->
	
	<div data-role="page" id="map"  data-theme="b" class="page-map" style="width:100%; height:100%;"  data-title="Rutas Móbiles - Menu Principal">
	<div data-role="header"><h1>Iglesia</h1></div>
	<div data-role="content" style="width:100%; height:100%; padding:0;"> 
		<div id="map_canvas" style="width:100%; height:100%;"></div>
	</div>
</div>



	
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">
    // When map page opens get location and display map
    $('.page-map').live("pageshow", function() {
    /*if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position){
    initialize(position.coords.latitude,position.coords.longitude);
    });
    }*/
	//if (map == null) 
	//CASA
	initialize(-1.2563565, -78.6198683);

    });
    function initialize(lat,lng) {
	//setupMap(lat,lng, 11, true);
    var latlng = new google.maps.LatLng(lat, lng);
	
	//var marker = new google.maps.Marker({position: latlng, map: map});
    //marker.setAnimation(google.maps.Animation.DROP);
	//setupMap(lat,lng, 11, true);
	//var latlng = new google.maps.LatLng(9845222, 787380);
    var myOptions = {
    zoom: 18,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
       };
       var map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);
    }
    </script>
    </body>
    </html>