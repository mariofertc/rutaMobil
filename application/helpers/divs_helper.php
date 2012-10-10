<?php
function get_oferta($oferta_items, $opciones)
{
	$data_div = '<div data-role="content" data-theme="d">';
	if(isset($opciones['busqueda']) == true)
		$data_div .= '<ul data-role="listview" data-dividertheme="e" class="titulo" data-inset="true" data-filter="true" data-filter-placeholder="Qué atractivo buscas?" data-autodividers="true">';
	else
		$data_div .= '<ul data-role="listview" data-dividertheme="e" class="titulo" data-inset="true" data-autodividers="true">';

	
	foreach($oferta_items->result() as $oferta)
	{
		$data_div .= '<li><a href="#'.$oferta->nombre_enlace.
				'"> <div class="icon">'.$oferta->icon.
				'</div> <h1>'.$oferta->nombre.
				'</h1><p>'.$oferta->descripcion.
				'</p><!--<img src="images/vote.png">--> <!--<span class="ui-li-count">10 km</span>--></a></li>';
	}
	$data_div .= "</ul>";
	//Shadow
	if(isset($opciones['shadow']) == true)
		$data_div .= '<div class="shadow2box"><img src="images/shadow.png" class="shadow2" alt="shadow"></div>';
	$data_div .= "</div>";
	return $data_div;
}
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */