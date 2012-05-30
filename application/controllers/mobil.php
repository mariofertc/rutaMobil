<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mobil extends CI_Controller {
	public function index()
	{
		$this->load->view('mobil/bienvenido');
		$this->load->view('mobil/menu');
	}
	public function menu()
	{
		$this->load->view('mobil/menu');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */