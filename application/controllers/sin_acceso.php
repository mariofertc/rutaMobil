<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sin_Acceso extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    /**
     * 
     * @access public
     * @param string $modulo_id
     * @return string Vista de Usuario
     */
    function index($modulo_id = '') {
        $data['modulo_nombre'] = $this->Modulo->get_modulo_nombre($modulo_id);
        $this->load->view('no_access', $data);
    }

}

/* End of file Sin_Acceso.php */
/* Location: ./application/controllers/Sin_Acceso.php */