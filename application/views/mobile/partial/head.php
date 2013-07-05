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

            //            function change_page(page_name) {
            //                $.mobile.changePage($('#' + page_name));
            //            }

            $('#geo').live('pagecreate', function (event, ui) {
                
                //                google.maps.event.addListener(mapa, 'dblclick', function(event) {
                //                                    mapa.setCenter(mapa.getCenter());
                //                }); 
                geolocalizar();
                //                                google.maps.event.trigger(mapa, 'resize');
            });
            //            $('#home').live('pagecreate', function (event, ui) {
            //                geolocalizar();
            //            });
            var mapa;
            function cargar(datos){
                $.ajax({
                    url: '<?php echo site_url("mobil") ?>/coordenadas',
                    type: "GET",
                    success: function(coord){
                        //alert(coord);
                        //alert(sessionStorage.categoria_id);
                        var lat = datos.coords.latitude;
                        var lon = datos.coords.longitude;
                        //alert(coordenadas_current);
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
                        //                        document.getElementById("mapa").html("<div></div>");
                        mapa = new google.maps.Map(document.getElementById("mapa"), opcionesMapa);
                        //                        mapa = new google.maps.Map($("#mapa")[0], opcionesMapa);
                        
                        //                        google.maps.event.addDomListener(window, 'resize', function() {
                        //                            mapa.setCenter(latlng_current);
                        //                        });

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
                        
                        
                        



                        //Carga de los Lugares.
                        $.each($.parseJSON(coord), function() {
                            if(this.length > 1){
                                var esOferta = true;
                                $.each(this, function(){
                                    if(esOferta){      
//                                        alert(sessionStorage.categoria_id +  '-'+ this.id);
                                        if(sessionStorage.categoria_id == this.id)
                                        {
//                                            alert(this.id);
//                                            var myselect = $("select#oferta_select");
//                                            myselect[0].selectedIndex = 3;
//                                            myselect[0]. = 3;
                                            $('select#oferta_select option[value='+this.id+']').attr('selected', 'selected');
//                                            $('select#oferta_select option[value='+this.id+']').attr('selected', 'selected');
                                            $('select#oferta_select').selectmenu('refresh');
//                                            myselect.selectmenu("refresh");
                                        }
                                        esOferta = false;
                                    }
                                    else{
                                        if(this != undefined && this.latitud != undefined)
                                        {
                                            var latlng_lugares = new google.maps.LatLng(this.latitud , this.longitud);  
                                            var distance_sitio = (google.maps.geometry.spherical.computeDistanceBetween(latlng_current, latlng_lugares)/1000).toFixed(2);
                                            var titulo = this.titulo;
                                            var coordenada = this.latitud + " - " + this.longitud;
                                            //Actualiza sitio contenido
                                            $('#distancia_'+this.id_lugar).html(distance_sitio + " Km");
                                            $('#distancia2_'+this.id_lugar).html(distance_sitio + " Km");
                                            
                                            if(sessionStorage.lugar_id == this.id_lugar)
                                            {                     
//                                            alert(sessionStorage.lugar_id + "-" + this.id_lugar);
                                                var opcionesOjos = {
                                                    position: latlng_lugares,
                                                    map: mapa,
                                                    icon: goldStar,
                                                    title: this.titulo
                                                };  
                                                var chinche2 = new google.maps.Marker(opcionesOjos);
                                                chinche2.setMap(mapa);
                                                google.maps.event.addListener(chinche2, "click", function() {
                                                    infowindow.setContent("<div style='color:black'>"
                                                        + titulo +
                                                        "</div><div style='color:black'>Distancia al lugar es: " +  (distance_sitio) + " km </div>" +
                                                        "<div style='color:black'>Coordenadas: " +  coordenada + " </div>"); 
                                                    infowindow.open(mapa,chinche2); 
                                                });
                                            }
                                        }
                                    }
                                    if(sessionStorage.categoria_id == this.id)
                                    {
                                       
                                    }
                                    
                                    
                                });
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
        
        //cambia combos
        $(document).on('change', 'select#oferta_select', function() { deg(this); });

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
//                alert(output);
                $('select#lugar_select').empty();
                $.each(output, function() {
//                    alert (this.nombre + "-" + this.id);
                    var el = $('select#lugar_select');
                    var opt = '<option value="'+this.id+'">'+this.nombre+'</option>';
                    el.append(opt);
                    $('select#lugar_select').selectmenu('refresh');
                });
            },
            dataType: "json"
        });
    }
        </script>
        

    </head>
    <body>
