<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

//include_once(APPPATH."libraries/chain-selects/chainselects.php");

class Lugares extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 * 	- or -
	 * 		http://example.com/index.php/welcome/index
	 * 	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {
		$this->load->view('inicio');
	}

	public function ver() {
//		$prov = $this->Provincia->get_all();
//		$cllProv = array();
//		foreach ($prov as $provincia) {
//			$cllProv[$provincia['id']] = $provincia['nombre'];
//		}
//
//		$data['provincia'] = $cllProv;
		$data['lugares'] = $this->Lugar->get_all();

		//set_include_path(get_include_path().PATH_SEPARATOR.'your_new_dir_path');

		$this->load->view('lugares/administrar', $data);
	}

	public function dataLoad() {
		$id_provincia = $this->input->post('id_provincia');
		if ($id_provincia == "") {
			$prov = $this->Provincia->get_provincia();
			echo json_encode($prov->result());
			return;
		}

		$ciu = $this->Provincia->get_ciudad($id_provincia);
		echo json_encode($ciu->result());
	}

	public function dataSave() {
		$id_provincia = $this->input->post('id_provincia');
		if ($id_provincia == "1") {
			$data = array('nombre'=>$this->input->post('nombre'),
					'descripcion'=>$this->input->post('descripcion'));
			$data['id'] = $this->Provincia->save_provincia($data);
			echo json_encode($data);
			return;
		}

//		$ciu = $this->Provincia->get_ciudad($id_provincia);
//		echo json_encode($ciu->result());
	}

	public function provinciaView() {
		$this->load->view("lugares/provinciaView");
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */