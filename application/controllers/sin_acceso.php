<?php
class Sin_Acceso extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index($modulo_id='')
	{
		$data['modulo_nombre']=$this->Modulo->get_modulo_nombre($modulo_id);
		$this->load->view('no_access',$data);
	}
}
?>