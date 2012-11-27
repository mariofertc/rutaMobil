<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">


        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
        <title>Rutas moviles guia turistica</title>


        <link href="<?php echo base_url(); ?>js/jquery-mobile/jquery.mobile.theme-1.0.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>js/jquery-mobile/jquery.mobile.structure-1.0.min.css" rel="stylesheet" type="text/css"/>


        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery/jquery.mobile-1.0.1.js"></script>


        <!--== GALERIA==-->
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery/klass.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery/misc.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery/code.photoswipe.jquery-3.0.4.min.js"></script>

        <!--== GEOLOCALIZACION==-->
        <!--<script src="http://maps.google.com/maps/api/js?sensor=false"> </script>-->
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&v=3&libraries=geometry&key=AIzaSyASASA_pjRkAuGNn0_02vfc0eFGlLKH9hE"></script>


        <link href="<?php echo base_url(); ?>css/descripcion.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>css/photoswipe.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>css/my-styles.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>css/flexslider.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>/css/geo.css" rel="stylesheet" type="text/css">
        <!--== /Font ==-->
        <link href='http://fonts.googleapis.com/css?family=Terminal+Dosis' rel='stylesheet' type='text/css' />


        <!--scripts flex slider-->

        <script src="<?php echo base_url(); ?>js/jquery/jquery.flexslider.js"></script>
        <script type="text/javascript" charset="utf-8">
            $(window).load(function() {
                $('.flexslider').flexslider();
            });

            function change_page(page_name) {
                $.mobile.changePage($('#' + page_name));
            }

            $('#geo').live('pagecreate', function (event, ui) {
                geolocalizar();
            });
        
            function cargar(datos){
                $.ajax({
                    url: '<?php echo site_url("mobil") ?>/coordenadas',
                    type: "GET",
                    success: function(coord){
                        var lat = datos.coords.latitude;
                        var lon = datos.coords.longitude;
                        //Cruz de Bellavista
                        var latlng = new google.maps.LatLng(-1.398773, -78.414838);
                        //Ojos del Volcánn
                        var latlng3 = new google.maps.LatLng(-1.378136,-78.43699);

                        //$("#status").text("Te encontre en: " + lat + " , " + lon);
                        $("#status").text("");
                        /*$("#mapa").css("height", 480).css("margin", "0 auto").css("width", 320);*/

                        var coordenada = new google.maps.LatLng(lat,lon);
                        var opcionesMapa = {
                            center: coordenada,
                            zoom: 10,
                            mapTypeId: google.maps.MapTypeId.HYBRID
                        };

                        var mapa = new google.maps.Map($("#mapa")[0], opcionesMapa);

                        var goldStar = {
                            path: 'M 125,5 155,90 245,90 175,145 200,230 125,180 50,230 75,145 5,90 95,90 z',
                            fillColor: "yellow",
                            fillOpacity: 0.8,
                            scale: 0.2,
                            strokeColor: "gold",
                            strokeWeight: 2
                        };
                        var opcionesChinche = {
                            position: coordenada,
                            map: mapa,
                            icon: goldStar
                            //title: "Aqui estas!!"
                        };





                        var chinche = new google.maps.Marker(opcionesChinche);
                        chinche.setMap(mapa);
                        //google.maps.event.addListener(chinche, 'click', function() {            popup();       });
                        google.maps.event.addListener(chinche, "click", function() {
                            infowindow.setContent("<div>Te encuentras aqui!</div><div>Distancia a Baños es: " +  (distance) + " km </div>"); //sets the content of your global infowindow to string "Tests: "
                            infowindow.open(mapa,chinche); //then opens the infowindow at the marker

                        });
                        infowindow = new google.maps.InfoWindow({   //infowindow options set
                            maxWidth: 355
                        });



                        function popup() {
                            setTimeout(function () {
                                var newwindow = window.open('test.php','Test','width=800,height=500');
                                newwindow.focus();
                            }, 1);
                            return false;

                        }


                        
  
                        $.each($.parseJSON(coord), function() {
                            if(this != undefined && this.latitud != undefined)
                            {
                                //                                                alert(this.latitud + " " + this.longitud);
//                                var latlng = new google.maps.LatLng(-1.398773, -78.414838);
                                var latlng = new google.maps.LatLng(this.latitud , this.longitud);
                                var opcionesOjos = {
                                    position: latlng,
                                    map: mapa,
                                    icon: goldStar,
                                    title: this.titulo
                                };    
                                var chinche2 = new google.maps.Marker(opcionesOjos);

                            }
                        });

                        //                var latlng2 = new google.maps.LatLng(lat, lon);
                        //                distance = (google.maps.geometry.spherical.computeDistanceBetween(latlng, latlng2)/1000).toFixed(2);
                        //		-1 22 44, -78 26 13
                        //$("#status").append("Distancia a Baños="+(distance)+" kms");
                    }
                });

            }
            
            function geolocalizar()
            {
                navigator.geolocation.getCurrentPosition(cargar,errorMapa);

                $("#status").text("En tu busqueda ....");
            }

          
            function errorMapa()
            {
                $("#status").text("Tarde o temprano te encontrare");
            }

        </script>
        <!--scripts flex slider-->

    </head>
    <body>
