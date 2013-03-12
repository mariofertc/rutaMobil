<?php

function get_oferta($oferta_items, $opciones) {
    $data_div = '<div data-role="content" data-theme="d">';
    if (isset($opciones['busqueda']) == true)
        $data_div .= '<ul data-role="listview" data-dividertheme="e" class="titulo" data-inset="true" data-filter="true" data-filter-placeholder="Qué atractivo buscas?" data-autodividers="true">';
    else
        $data_div .= '<ul data-role="listview" data-dividertheme="e" class="titulo" data-inset="true" data-autodividers="true">';


    foreach ($oferta_items->result() as $oferta) {
        $data_div .= '<li><a href="#' . $oferta->nombre_enlace .
                '"> <div class="icon">' . $oferta->icon .
                '</div> <h1>' . $oferta->nombre .
                '</h1><p>' . $oferta->descripcion .
                '</p><!--<img src="images/vote.png">--> <!--<span class="ui-li-count">10 km</span>--></a></li>';
    }
    $data_div .= "</ul>";
    //Shadow
    if (isset($opciones['shadow']) == true)
        $data_div .= '<div class="shadow2box"><img src="' . base_url() . 'images/shadow.png" class="shadow2" alt="shadow"></div>';
    $data_div .= "</div>";
    return $data_div;
}

function get_lugares($oferta_items, $opciones, $ci) {
    $data_div = '';
    foreach ($oferta_items->result() as $oferta) {
        $data_div .= '<div data-role="page" id="' . $oferta->nombre_enlace . '" data-theme="d">';
        //Encabezado
        $data_div .= $ci->load->view('mobile/partial/head_share', '', true);
        //Titulo
        $data_div .= '<li class="title"> <div class="icontitle">' . $oferta->icon .
                '</div> <h1>' . $oferta->nombre .
                '</h1><h4>' . $oferta->descripcion . '</h4></li>';
        $data_div .= '<div data-role="content" data-theme="d" class="conte" >';
        if (isset($opciones['busqueda']) == true)
            $data_div .= '<ul data-role="listview" data-dividertheme="e" class="titulo" data-inset="true" data-filter="true" data-filter-placeholder="Qué ' . $oferta->nombre . ' buscas?" data-autodividers="true">';
        else
            $data_div .= '<ul data-role="listview" data-dividertheme="e" class="titulo" data-inset="true" data-autodividers="true">';
//        $data_div .= '<li><a href="#' . $oferta->nombre_enlace .
//                '"> <div class="icon">' . $oferta->icon .
//                '</div> <h1>' . $oferta->nombre .
//                '</h1><p>' . $oferta->descripcion .
//                '</p><!--<img src="images/vote.png">--> <!--<span class="ui-li-count">10 km</span>--></a></li>';
        $lugares = $ci->Lugar->get_by_categoria($oferta->id);

        foreach ($lugares->result() as $lugar) {
            $data_div .= '<li><a href="#' . $lugar->nombre_enlace .
                    '"> <img src="' . base_url() . 'images/imglugar/' . $lugar->nombre_enlace . '/' . $lugar->imagen_path .
                    '" width  = "340" height = "279"> <h1>' . $lugar->nombre .
                    '</h1><p>' . $lugar->descripcion .
                    '</p><img src="' . base_url() . 'images/vote.png"> <span class="ui-li-count">10 km</span></a></li>';
        }
        $data_div .= "</ul>";
        //Shadow
        if (isset($opciones['shadow']) == true)
            $data_div .= '<div class="shadow2box"><img src="' . base_url() . 'images/shadow.png" class="shadow2" alt="shadow"></div>';
        $data_div .= "</div>";
        $data_div .= $ci->load->view('mobile/partial/footer_page', '', true);
        $data_div .= "</div>";
    }

    return $data_div;
}

function get_lugar($oferta_items, $opciones, $ci) {
    $data_div = '';
    foreach ($oferta_items->result() as $oferta) {
        $lugares = $ci->Lugar->get_by_categoria($oferta->id);
        foreach ($lugares->result() as $lugar) {
            $data_div .= '<div data-role="page" id="' . $lugar->nombre_enlace . '" data-theme="d" data-title="' . $lugar->nombre . '">';
            //Encabezado            
            $data_div .= $ci->load->view('mobile/partial/head_share_photo', array('id' => $lugar->nombre_enlace . '1'), true);
            //Titulo
            $data_div .= '<li class="title"> <div class="icontitle">' . $oferta->icon .
                    '</div> <h1>' . $lugar->nombre .
                    '</h1><h4>Sector ' . $lugar->sector . '</h4></li>';
            $data_div .= '<div data-role="content" data-theme="d" class="conte" >';

            $data_div .= "<div class = 'flexslider'>" . '<ul class = "slides">';
            foreach ($ci->Lugar->get_photos($lugar->id)->result() as $row) {
                if (isset($row->imagen_path))
                    $data_div .= '<li class = "" style = "width: 100%; float: left; margin-right: -100%; position: relative; display: none;">' .
                            '<img src = "' . base_url() . 'images/imglugar/' . $lugar->nombre_enlace . '/' . $row->imagen_path . '">' .
                            '</li>';
            }
            $data_div .= "</ul>" . '<ol class = "flex-control-nav flex-control-paging"><ul class = "flex-direction-nav"></div>';
            $data_div .= '<div data-role="collapsible-set"><div data-role="content" class="laciudad">';
            $data_div .= "<H1>DATOS IMPORTANTES</H1> <p>... </p>";
            $data_div .= '<ul class = "items"><li class = "atrib" name = "opiniones"><div class = "icon3">S</div><h1>27 OPINIONES</h1>
            <img src = "images/vote.png"></li><li class="atrib" name="distancia">
<div class="icon3">S</div>
<h1>DISTANCIA</h1>
<p>10 Km</p>
</li>
<li class="atrib" name="tllegada">
<div class="icon3">S</div>
<h1>TIMEPO DE LLEGADA</h1>
<p>4 Horas</p>
</li>
<li class="atrib" name="altitud">
<div class="icon3">S</div>
<h1>ALTITUD</h1>
<p>1000 Metros</p>
</li>
<li class="atrib" name="llevar">
<div class="icon3">S</div>
<h1>QUE DEBES LLEVAR</h1>
<p>Ropa ligera</p>
</li></ul>';


            $data_div .= "<p>" . $lugar->descripcion . "</p></div>";
            $data_div .= '<div data-role="collapsible" class="laciudad">';
            $data_div .= "<H1> UBICACION DEL DESTINO </h1>";
            $data_div .= "<p>" . $lugar->direccion . "</p></div>";
            $data_div .= '<div data-role="collapsible" class="laciudad">';
            $data_div .= "<H1> QUE DEBEMOS SABER </H1>";
            $data_div .= "<p>" . $lugar->interes . "</p></div></div>";

            //Shadow
            if (isset($opciones['shadow']) == true)
                $data_div .= '<div class="shadow2box"><img src="' . base_url() . 'images/shadow.png" class="shadow2" alt="shadow"></div>';
            $data_div .= "</div>";
            $data_div .= $ci->load->view('mobile/partial/footer_page', '', true);
            $data_div .= "</div>";
        }
    }

    return $data_div;
}

function get_photos($oferta_items, $opciones, $ci) {
    $data_div = '';
    $val = 0;
    foreach ($oferta_items->result() as $oferta) {
        $lugares = $ci->Lugar->get_by_categoria($oferta->id);
        foreach ($lugares->result() as $lugar) {
            //<div data-role="page" id="iglesia1" data-title="Portfolio">
            $data_div .= '<div data-role="page" id="' . $lugar->nombre_enlace . '1" data-theme="d" data-title="' . $lugar->nombre . '">';
            //Encabezado

            $data_div .= $ci->load->view('mobile/partial/head_share', '', true);
            //Titulo
            $data_div .= '<ul id="gallery' . $val++ . '" class="gallery">';
            $row = $ci->Lugar->get_photos($lugar->id);
            foreach ($row->result() as $photo) {
                $data_div .= '<li><a rel="external" href="' . base_url() . 'images/imglugar/' . $lugar->nombre_enlace . '/' . $photo->imagen_path . '"><img src="' . base_url() . 'images/imglugar/' . $lugar->nombre_enlace . '/thumbs/' . $photo->imagen_path . '" alt="Image 018" /></a></li>';
            }
            $data_div .= '</ul>';

            $data_div .= $ci->load->view('mobile/partial/footer_page', '', true);
            $data_div .= "</div>";
        }
    }

    return $data_div;
}

function get_geo($oferta_items, $opciones, $ci) {
    $data_div = '<div data-role="page" id="geo" data-title="Mapa"  data-theme="a">';
    //Encabezado            
    $data_div .= $ci->load->view('mobile/partial/head_share', '', true);
    foreach ($oferta_items->result() as $oferta) {
        $lugares = $ci->Lugar->get_by_categoria($oferta->id);
        foreach ($lugares->result() as $lugar) {
            
        }
    }
    $data_div .= '<section><div id="mapa"></div></section>';
    $data_div .= $ci->load->view('mobile/partial/footer_page', '', true);
    $data_div .= "</div>";
    return $data_div;
}

function get_aboutus($ci) {
    $data_div = '<div data-role="page" id="aboutus" data-title="Mapa"  data-theme="a">';
    //Encabezado            
    $data_div .= $ci->load->view('mobile/partial/head_share', '', true);
    //Contenido
    $data_div .= $ci->load->view('mobile/about/content', '', true);
    $data_div .= $ci->load->view('mobile/partial/footer_page', '', true);
    return $data_div;
}

/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editors.
 */