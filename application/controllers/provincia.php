<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lugares extends CI_Controller {

    public function index() {
        $this->load->view('inicio');
    }

    public function ver() {
        $data['lugares'] = $this->Lugar->get_all();
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
            $data = array('nombre' => $this->input->post('nombre'),
                'descripcion' => $this->input->post('descripcion'));
            $data['id'] = $this->Provincia->save_provincia($data);
            echo json_encode($data);
            return;
        }
    }

    public function provinciaView() {
        $this->load->view("lugares/provinciaView");
    }

}

/* End of file provincia.php */
/* Location: ./application/controllers/provincia.php */