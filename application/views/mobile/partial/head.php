<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">


        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
        <title>Rutas moviles guia turistica</title>


        <link href="<?php echo base_url(); ?>js/jquery-mobile/jquery.mobile.theme-1.2.0.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>js/jquery-mobile/jquery.mobile.structure-1.2.0.css" rel="stylesheet" type="text/css"/>


        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery/jquery-1.8.2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery/jquery.mobile-1.2.0.js"></script>
        


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
        
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery/infobox.js"></script>
        
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
                        //Cruz de Bellavista -- Referencia a Baños
                        var latlng_banos = new google.maps.LatLng(-1.398773, -78.414838);
                        var latlng_current = new google.maps.LatLng(lat,lon);
                        //Ojos del Volcánn
                        //var latlng3 = new google.maps.LatLng(-1.378136,-78.43699);
                        
                        

                        //$("#status").text("Te encontre en: " + lat + " , " + lon);
                        $("#status").text("");
                        /*$("#mapa").css("height", 480).css("margin", "0 auto").css("width", 320);*/

                        var opcionesMapa = {
                            center: latlng_current,
                            zoom: 10,
                            mapTypeId: google.maps.MapTypeId.HYBRID
                        };

                        var mapa = new google.maps.Map($("#mapa")[0], opcionesMapa);

                        var goldStar = {
                            path: 'M 125,5 155,90 245,90 175,145 200,230 125,180 50,230 75,145 5,90 95,90 z',
                            //icon: new google.maps.MarkerImage('http://cdn1.iconfinder.com/data/icons/google_jfk_icons_by_carlosjj/128/maps.png'),
                            fillColor: "yellow",
                            fillOpacity: 0.8,
                            scale: 0.2,
                            strokeColor: "gold",
                            strokeWeight: 2
                        };
                        
                        var image = new google.maps.MarkerImage('http://cdn1.iconfinder.com/data/icons/google_jfk_icons_by_carlosjj/128/maps.png',
                        // This marker is 20 pixels wide by 32 pixels tall.
                        new google.maps.Size(20, 32));

                        var opcionesChinche = {
                            position: latlng_current,
                            map: mapa,
                            icon: "http://cdn1.iconfinder.com/data/icons/google_jfk_icons_by_carlosjj/128/maps.png"
                            //title: "Aqui estas!!"
                        };





                        var chinche = new google.maps.Marker(opcionesChinche);
                        chinche.setMap(mapa);
                        //google.maps.event.addListener(chinche, 'click', function() {            popup();       });
                        google.maps.event.addListener(chinche, "click", function() {
                            //                            infowindow.setContent("Te encuentras aqui!Distancia a Baños es: " +  (distance) + " km"); //sets the content of your global infowindow to string "Tests: "
                            infowindow.setContent("<div style='color:black'>Te encuentras aqui!</div><div style='color:black'>Distancia a Baños es: " +  (distance) + " km </div>"); //sets the content of your global infowindow to string "Tests: "
                            //                            infowindow.setContent("<div>Te encuentras aqui!</div><div>Distancia a Baños es:  km </div>"); //sets the content of your global infowindow to string "Tests: "
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


                        //var latlng2 = new google.maps.LatLng(lat, lon);
                        //Carga de los Lugares.
                        $.each($.parseJSON(coord), function() {
                            if(this != undefined && this.latitud != undefined)
                            {
                                //                                                alert(this.latitud + " " + this.longitud);
                                //                                var latlng = new google.maps.LatLng(-1.398773, -78.414838);
                                var latlng_lugares = new google.maps.LatLng(this.latitud , this.longitud);
                                var opcionesOjos = {
                                    position: latlng_lugares,
                                    map: mapa,
                                    icon: goldStar,
                                    title: this.titulo
                                };    
                                var chinche2 = new google.maps.Marker(opcionesOjos);
                                
                                //Aqui estas
                                //                                var latln = new google.maps.LatLng(lat, lon);
                                var distance_sitio = (google.maps.geometry.spherical.computeDistanceBetween(latlng_current, latlng_lugares)/1000).toFixed(2);
                                var titulo = this.titulo;
                                var coordenada = this.latitud + " - " + this.longitud;
                                google.maps.event.addListener(chinche2, "click", function() {
                                    infowindow.setContent("<div style='color:black'>"
                                        + titulo +
                                        "!</div><div style='color:black'>Distancia al lugar es: " +  (distance_sitio) + " km </div>" +
                                        "<div style='color:black'>Coordenadas: " +  coordenada + " </div>"); 
                                    infowindow.open(mapa,chinche2); 
                                });
                                
                                
                                /*
                                 */
                                var boxText = document.createElement("div");
//                                boxText.style.cssText = "border: 1px solid black; margin-top: 8px; background: yellow; padding: 5px; color:black";
                                boxText.style.cssText = "margin-top: 5px; background: rgba(25,245,245,0.4); padding: 5px; color:black; font-size:0.8em; text-align:center";
//                                boxText.innerHTML = "City Hall, Sechelt<br>British Columbia<br>Canada";
                                boxText.innerHTML = titulo;
                
                                var myOptions = {
                                    content: boxText
                                    ,disableAutoPan: false
                                    ,maxWidth: 0
                                    ,pixelOffset: new google.maps.Size(-20, 30)
                                    ,zIndex: null
                                    ,boxStyle: { 
                                        background: "url('tipbox.gif') no-repeat"
                                        ,opacity: 0.8
                                        ,width: "100px"
                                    }
                                    ,closeBoxMargin: "10px 2px 2px 2px"
                                    ,closeBoxURL: "http://www.google.com/intl/en_us/mapfiles/close.gif"
                                    ,infoBoxClearance: new google.maps.Size(1, 1)
                                    ,isHidden: false
                                    ,pane: "floatPane"
                                    ,enableEventPropagation: false
                                };

                                var ib = new InfoBox(myOptions);
                                ib.open(mapa, chinche2);
                                /**/

                            }
                        });

                        //Aqui estas
                        //var latlng2 = new google.maps.LatLng(lat, lon);
                        distance = (google.maps.geometry.spherical.computeDistanceBetween(latlng_current, latlng_banos)/1000).toFixed(2);
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
