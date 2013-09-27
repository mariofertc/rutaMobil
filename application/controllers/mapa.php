<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mapa extends CI_Controller {

    public function index() {
        $this->load->view('mobil/menu');
    }

    public function menu() {
        $this->load->view('mobil/menu');
    }

}

/* End of file mapa.php */
/* Location: ./application/controllers/mapa.php */