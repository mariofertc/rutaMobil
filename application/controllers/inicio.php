<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

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