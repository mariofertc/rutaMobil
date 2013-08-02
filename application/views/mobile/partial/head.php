<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">


        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
        <title>Rutas moviles guia turistica</title>


        <link href="<?php echo base_url(); ?>js/jquery-mobile/jquery.mobile.theme-1.2.0.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>js/jquery-mobile/jquery.mobile.structure-1.2.0.css" rel="stylesheet" type="text/css"/>


        <!--<script type="text/javascript" src="<?php // echo base_url();                ?>js/jquery/jquery-1.8.2.min.js"></script>-->
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
        <!--<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>-->
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery/jquery.mobile-1.2.0.js"></script>
        <!--<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery/jquery.mobile-1.3.1.js"></script>-->
        
        
        
        <script src="<?php echo base_url();?>js/common.js" type="text/javascript"></script>
        



        <!--== GALERIA==-->
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery/klass.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery/misc.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery/code.photoswipe.jquery-3.0.4.min.js"></script>

        <!--== GEOLOCALIZACION==-->
        <!--<script src="http://maps.google.com/maps/api/js?sensor=false"> </script>-->
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyASASA_pjRkAuGNn0_02vfc0eFGlLKH9hE&sensor=false&v=3&libraries=geometry"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/mapa/geoPosition.js"></script>


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
            sessionStorage.lugar_id =  0;
            sessionStorage.categoria_id =  0;
            //cambia combos
            $(document).on('change', 'select#oferta_select', function() { deg(this); });
            $(document).on('click', '#search_map', function() { 
                sessionStorage.categoria_id = $('#oferta_select').val();
                sessionStorage.lugar_id  = $('#lugar_select').val();
                geolocalizar();
            });
    
    function deg(obj){
        var val = obj.value;
        //        var el = $('select#lugar_select');
        //        var ids =  obj.val;
        //        alert(val);
        //        var id = $('select#categoria_select');
        //        var opt = $('<option />');
        //        $opt.val(val).text(val).appendTo($el);
        //        $('select#lugar_select').selectmenu('refresh');
        
        jQuery.ajax({ url: '<?php echo site_url('mobil') ?>/get_lugares/',
            data: {id: val},
            type: 'post',
            success: function(output) {
                var el = $('select#lugar_select');
                el.empty();
                el.append('<option value=0>Escoja un lugar...</option>');
                $.each(output, function() {
                    var opt = '<option value="'+this.id+'">'+this.nombre+'</option>';
                    el.append(opt);
                });
                $('select#lugar_select').selectmenu('refresh');
            },
            dataType: "json"
        });
    }

            //            function change_page(page_name) {
            //                $.mobile.changePage($('#' + page_name));
            //            }

//            $('#geo').live('pagecreate', function (event, ui) {
//              $('#geo').live('pagebeforeshow', function (event, ui) {
//              $('#geo').live('pageinit', function (event, ui) {
              $('#geo').live('pageshow', function (event, ui) {
                
                //                google.maps.event.addListener(mapa, 'dblclick', function(event) {
                //                                    mapa.setCenter(mapa.getCenter());
                //                }); 
                geolocalizar();
                //                                google.maps.event.trigger(mapa, 'resize');
            });
            var mapa;
            function cargar(datos){
                $.ajax({
                    url: '<?php echo site_url("mobil") ?>/coordenadas',
                    data: {categoria_id:sessionStorage.categoria_id,
                    lugar_id:sessionStorage.lugar_id},
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
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        };
                        mapa = new google.maps.Map(document.getElementById("mapa"), opcionesMapa);
//                        var image = new google.maps.MarkerImage('http://cdn1.iconfinder.com/data/icons/google_jfk_icons_by_carlosjj/128/maps.png',null,null,null,new google.maps.Size(30, 30));
                        var opcionesChinche = {
                            position: latlng_current,
                            map: mapa
//                            icon: image
                        };

                        var chinche = new google.maps.Marker(opcionesChinche);
                        chinche.setMap(mapa);
                        //google.maps.event.addListener(chinche, 'click', function() {            popup();       });

                        infowindow = new google.maps.InfoWindow({   //infowindow options set
                            maxWidth: 320
                        });
                        google.maps.event.addListener(chinche, "click", function() {
                            //                            infowindow.setContent("Te encuentras aqui!Distancia a Baños es: " +  (distance) + " km"); //sets the content of your global infowindow to string "Tests: "
                            infowindow.setContent("<div id='hook' class = 'info_mapa'><h3>Te encuentras aqui!</h3><p>Distancia a Baños es: " +  (distance) + " km </p></div>"); //sets the content of your global infowindow to string "Tests: "
                            //                            infowindow.setContent("<div>Te encuentras aqui!</div><div>Distancia a Baños es:  km </div>"); //sets the content of your global infowindow to string "Tests: "
                            infowindow.open(mapa,chinche); //then opens the infowindow at the marker
                        });

                        //Carga de los Lugares.
                        var indice_lugar =  0;
                        $('#sitios_mapa').html("");
                        $.each($.parseJSON(coord), function() {
                            if(this.length >= 1){
                                $.each(this, function(){                                   
                                        if(this != undefined && this.latitud != undefined)
                                        {
                                            if(sessionStorage.categoria_id == this.id_categoria && $('#oferta_select').val() != this.id_categoria)
                                            {
                                                $('#oferta_select').val(this.id_categoria).trigger('change');
                                                $('select#oferta_select').selectmenu('refresh');
                                            }
                                            var latlng_lugares = new google.maps.LatLng(this.latitud , this.longitud);  
                                            var distance_sitio = (google.maps.geometry.spherical.computeDistanceBetween(latlng_current, latlng_lugares)/1000).toFixed(2);
                                            var arrive_time = (distance_sitio / 90).toFixed(2);
                                            var titulo = this.titulo;
                                            var coordenada = this.latitud + " - " + this.longitud;
                                            //Actualiza sitio contenido
                                            $('#distancia_'+this.id_lugar).html(distance_sitio + " Km");
                                            $('#distancia2_'+this.id_lugar).html(distance_sitio + " Km");
                                            $('#tiempo_'+this.id_lugar).html(arrive_time + " Horas");
                                            var icono = null;
                                            if(sessionStorage.lugar_id == this.id_lugar || sessionStorage.lugar_id ==  0)
                                            {
                                                indice_lugar ++;
                                                icono =  'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld='+ indice_lugar +'|0055FF|ffffff';
                                                var opcionesOjos = {
                                                    position: latlng_lugares,
                                                    map: mapa,
//                                                    icon: 'http://www.googlemapsmarkers.com/v1/'+ indice_lugar + '/0099FF',
                                                    icon: icono,
                                                    title: this.titulo,
                                                    
                                                    draggable: true
                                                };  
                                                var chinche2 = new google.maps.Marker(opcionesOjos);
                                                chinche2.setMap(mapa);
                                                google.maps.event.addListener(chinche2, "click", function() {
                                                    infowindow.setContent("<div id='hook' class='info_mapa'><h3>"
                                                        + titulo +
                                                        "</h3><p>Distancia al lugar es: " +  (distance_sitio) + " km </p>" +
                                                        "<p>Coordenadas: " +  coordenada + " </p></div>"); 
                                                    infowindow.open(mapa,chinche2); 
                                                });
                                            
                                                //Actualiza el listado de sitios
                                                $("#sitios_mapa").append('<li><img src='+ icono +' class="ui-li-thumb ui-corner-tr" style="z-index:100; padding:5px 5px">' + $('#distancia_'+this.id_lugar).parent().parent().clone().html() + '</li>');
                                                if(sessionStorage.lugar_id == this.id_lugar){
                                                    $('select#lugar_select option[value='+this.id_lugar+']').attr('selected', 'selected');
                                                    $('select#lugar_select').selectmenu('refresh');
                                                    
                                                    //Get route
                                                    var directionsService = new google.maps.DirectionsService();
                                                    var directionsRequest = {
                                                        origin: latlng_current,
                                                        destination: latlng_lugares,
                                                        travelMode: google.maps.DirectionsTravelMode.DRIVING,
                                                        unitSystem: google.maps.UnitSystem.METRIC
                                                    };
                                                    directionsService.route(
                                                        directionsRequest,
                                                        function(response, status)
                                                        {
                                                          if (status == google.maps.DirectionsStatus.OK)
                                                          {
                                                            new google.maps.DirectionsRenderer({
                                                              map: mapa,
                                                              directions: response
                                                            });
                                                          }
                                                          else
                                                            $("#error").append("Unable to retrieve your route<br />");
                                                        }
                                                      );
                                                }
                                            }
                                        }
                                });
                            }
                        });
                        //Añadir estilos al infoWindow.
                        google.maps.event.addListener(infowindow, "domready", function(){$('#hook').parent().parent().parent().siblings().addClass("info_mapa");});     
                        //Refresh Style
                        $('#sitios_mapa').listview('refresh');

                        //Aqui estas
                        //var latlng2 = new google.maps.LatLng(lat, lon);
                        distance = (google.maps.geometry.spherical.computeDistanceBetween(latlng_current, latlng_banos)/1000).toFixed(2);
                        //$("#status").append("Distancia a Baños="+(distance)+" kms");
                    }
                });

            }
            if (geoPosition.init()) {
                geolocalizar();
            }
                
            var id_evento;
            function geolocalizar()
            {
                //                navigator.geolocation.watchPosition(cargar,errorMapa,
                //{'enableHighAccuracy':false,'timeout':10000,'maximumAge':20000});
                if(id_evento != null)
                {
                    navigator.geolocation.clearWatch(id_evento);
                    id_evento  = null;
                    //                    alert("yo");
                }
                //                id_evento = navigator.geolocation.watchPosition(cargar,errorMapa, {'enableHighAccuracy':true});
                id_evento = navigator.geolocation.watchPosition(cargar,errorMapa,{maximumAge:Infinity, timeout:50000, enableHighAccuracy:true});

                
                //                navigator.geolocation.getCurrentPosition(cargar,errorMapa);

                $("#status").text("En tu busqueda ....");
            }

          
            function errorMapa()
            {
                $("#status").text("Tarde o temprano te encontrare");
            }
            
            //Comentarios
            var indexStorage = localStorage.length;
            function save_todo(){
                var username = $("#usuario").val();
                var comment = $("#comentario").val();
                var titulo = $("#titulo").val();
                if(comment.length){
                    $.ajax({ url: '<?php echo site_url() ?>/mobil/save_comments',
                        data: {
                            username: username,
                            comment: comment,
                            titulo: titulo,
                            lugar_id : sessionStorage.lugar_id
                        },
                        type: 'post',
                        dataType: "json",
                        success: function(output) {
                            todo = output.id_comment;
                            $("#comments_list_"+sessionStorage.lugar_id).append('<li><a href="index.html"><h3>' + username + '</h3><p><strong>' + titulo + 
                                '</strong></p><p>' + comment + '.</p><p class="ui-li-aside"><strong>' + new Date() + '</strong></p></a></li>');
                            // Refresh list so jquery mobile can apply iphone look to the list
                            $("#comments_list_"+sessionStorage.lugar_id).listview();
                            $("#comments_list_"+sessionStorage.lugar_id).listview("refresh");	
                        }
                    });                    
                    indexStorage++;
                }
            }
            $('#add_comment').live('pageshow', function(event, ui) {
                $('#id_lugar').text( sessionStorage.lugar_id);
            });
            <!--scripts flex slider-->
            
            
            <!-- TOP -->
//            $(window).scroll(function(){
//if (window.pageYOffset >= 1500) {
//$('#scroll-up:not(:visible)').fadeIn();
//} else {
//$('#scroll-up:visible').fadeOut();
//}
//}); 
            
             var backToTop = {
            init: function () {
//                $('html, body').append('<a href="" id="backToTop" data-role="button"   data-corners="false" data-icon="arrow-u" data-theme="b">Back to top</a>');

                var section2 = '<a href="" id="backToTop" data-role="button"   data-corners="false" data-icon="arrow-u" data-theme="b">Back to top</a>';
                myClone2 = $(section2);                 
                myClone2.appendTo("html").trigger('create');
                
                $('#backToTop').click(backToTop.click);
//                $(window).bind('scrollstart', backToTop.scrollStart);
//                $(window).bind('scrollstop', backToTop.scrollStop);
                $(window).on('scrollstart', backToTop.scrollStart);
                $(window).on('scrollstop', backToTop.scrollStop);
                
                
//                $('body').trigger('create');
//                $('#oferta').trigger('pagecreate');
            },
            click: function () {
                $('html, body').animate({scrollTop: 0}, 400);
            },
            scrollStart: function () {
                $('#backToTop').hide();
            },
            scrollStop: function () {
                var windowHeight = $(window).height();
                if (window.pageYOffset > windowHeight) {
                    $('#backToTop').fadeIn('slow');
                }
            }
        };
        
//        $('#geo').live('pagecreate', function (event, ui) {
//                geolocalizar();
//            });

//        $('#oferta').live('pageinit', function (event, ui) {
        $(document).on('pageinit', '#home',function (event, ui) {
            backToTop.init();
        });
        </script>
        

    </head>
    <body>
