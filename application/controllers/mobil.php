<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mobil extends CI_Controller {
	public function index()
	{
		//$this->load->view('mobil/bienvenido');
		//$this->load->view('mobil/menu');
		$this->load->view('mobile/partial/head.php');
		$this->load->view('mobile/home/content.php');
		$data['oferta'] = get_oferta($this->Categoria->get_all(), array('busqueda'=>true,'shadow'=>true));
		$this->load->view('mobile/oferta/content.php', $data);
		$this->load->view('mobile/inicio.php');
	}
	public function menu()
	{
		$this->load->view('mobil/menu');
	}
	public function mapa()
	{
		//$data['id_mapa'] = $id_mapa;
		$this->load->view('mobil/mapa');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */