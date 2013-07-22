<?php

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        if ($this->Empleado->is_logged_in()) {
            redirect('home');
        } else {
            // $this->form_validation->set_rules('username', 'lang:login_username', 'callback_login_check');
            $this->form_validation->set_rules('username', 'Usuario', 'callback_login_check');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->run();
//			redirect('home');
            $this->form_validation->set_rules('username', 'lang:login_username', 'callback_login_check');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('login');
            } else {
                //echo "yap";
                // $this->load->view('home');
                redirect('home');
                // header('Location: '.site_url('home').', true, 302');
                // header('url='.site_url('home'));


                // exit;
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

?>