<?php
class Secure_area extends CI_Controller 
{
	/*
	Controllers that are considered secure extend Secure_area, optionally a $module_id can
	be set to also check if a user can access a particular module in the system.
	*/
	function __construct($module_id=null)
	{
		parent::__construct();
		//Si no esta loggein, le ponemos usuario invitado
		 if(!$this->Empleado->is_logged_in())
		 {
			redirect('login');
//			 $this->Empleado->login('invitado','invitado');
		 }
		
		 if(!$this->Empleado->has_permission($module_id,$this->Empleado->get_logged_in_empleado_info()->persona_id))
		 {
		 redirect('sin_acceso/'.$module_id);
		 }
		//load up global data
		$logged_in_empleado_info=$this->Empleado->get_logged_in_empleado_info();
		$data['allowed_modules']=$this->Modulo->get_allowed_modulos($logged_in_empleado_info->persona_id);
		$data['user_info']=$logged_in_empleado_info;
		$this->load->vars($data);
	}
}
/*Fin del Archivo
	*/