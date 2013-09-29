<?php

/**
 * Archivo Controlador Inicio, Ecuadorinmobile 
 * 
 * @author Mario Torres <mariofertc@mixmail.com>
 * @version 1.0
 * @package FrontEnd
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Clase de Categorias
 * 
 * Controlador que redirige al Controlador Mobil.
 * @package FrontEnd
 */
class Inicio extends CI_Controller {

    /**
     * Index del Sitio Ecuadorinmobile.
     * @see http://ecuadorinmobile.com
     */
    public function index() {
        redirect(site_url("mobil"));
    }

}

/* End of file inicio.php */
/* Location: ./application/controllers/inicio.php */