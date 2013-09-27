<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        if ($this->Empleado->is_logged_in()) {
            redirect('home');
        } else {
            $this->form_validation->set_rules('username', 'Usuario', 'callback_login_check');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->run();
            $this->form_validation->set_rules('username', 'lang:login_username', 'callback_login_check');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('login');
            } else {
                redirect('home');
            }
        }
    }

    function login_check($username) {
        $password = $this->input->post("password");

        if (!$this->Empleado->login($username, $password)) {
            $this->form_validation->set_message('login_check', 'Clave o Usuario Incorrectos');
            return false;
        }
        return true;
    }

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */