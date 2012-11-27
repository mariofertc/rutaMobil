<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//require_once ("secure_area.php");
//require_once ("interfaces/idata_controller.php");
//class Categoria extends Secure_area implements iData_controller
class Lugares extends CI_Controller {

    function __construct() {
//		parent::__construct('incidencias');
        parent::__construct();
    }

    public function index($id = -1) {
        $data['controller_name'] = strtolower($this->uri->segment(1));
        $data['admin_table'] = get_lugar_admin_table();
        $data['form_width'] = $this->get_form_width();
        $data['form_height'] = $this->get_form_height();
        $data['id_categoria'] = $id;
        $this->load->view('lugares/manage', $data);
    }

    function mis_datos($id_categoria) {
//		$data['controller_name'] = strtolower($this->uri->segment(1));
//		$data['form_width'] = $this->get_form_width();
//		$data['form_height'] = 150;
//		$aColumns = array('id','nombre', 'descripcion', 'nombre_enlace');
        $aColumns = array(
            'id' => array('checked' => true, 'es_mas' => true),
            'nombre' => array('limit' => 13),
            'direccion' => array('limit' => 30),
            'coordenadas' => array('limit' => 30),
            'imagen_path' => array('limit' => 30),
            'descripcion' => array('limit' => 30),
//            'categoria_id' => array('limit' => 30),
            'interes' => array('limit' => 30),
            'sector' => array('limit' => 30),
            'nombre_enlace' => array('nombre'=> 'nombre_enlace'));
        //Eventos Tabla
        $cllAccion = array(
            '1' => array(
                'function' => "view",
                'common_language' => "common_edit",
                'language' => "_update",
                'width' => $this->get_form_width(),
                'height' => $this->get_form_height(),
                'class' => 'thickbox'));
        $cllWhere = 'categoria_id = '.$id_categoria;
        echo getData('Lugar', $aColumns, $cllAccion, $cllWhere);
    }

    function view($id = -1) {
        $data['info'] = $this->Lugar->get_info($id);

//		$estado = array('pendiente'=>'pendiente','solucionado'=>'solucionado');
        // $array=array("foo"=>1,"bar"=>2,"baz"=>3,4,5);		
//		$data['estado']=$estado;	
        $this->load->view("lugares/form", $data);
    }

    function save($id = -1) {
        $data = array(
            'nombre' => $this->input->post('lugar'),
            'direccion' => $this->input->post('direccion'),
            'coordenadas' => $this->input->post('coordenadas'),
//            'imagen_path' => $this->input->post('imagen_path'),
            'descripcion' => $this->input->post('descripcion'),
            'interes' => $this->input->post('interes'),
            'sector' => $this->input->post('sector'),
            'nombre_enlace' => $this->input->post('enlace'),
        );

       

        $this->db->trans_start();
        try {
            if ($this->Lugar->save($data, $id)) {
                //Nuevo lug Insert
                if ($id == -1) {
                    echo json_encode(array('success' => true, 'message' => 'Lugar ' .
                        $data['nombre'] . ' creado.', 'id' => $data['id']));
                    $id = $data['id'];
                } else { //update incidencia
                    echo json_encode(array('success' => true, 'message' => 'Lugar ' .
                        $data['nombre'] . ' actualizado.', 'id' => $id));
                }
                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    echo json_encode(array('success' => false, 'Error al actualizar el Lugar ' .
                        $data['nombre'], 'id' => -1));
                } else {
                    $this->db->trans_commit();
                }
            } else {//failure
                echo json_encode(array('success' => false, 'message' => 'Error al Actualizar el Lugar ' .
                    $data['nombre'], 'id' => -1));
            }
        } catch (Exception $e) {
            $this->db->trans_off();
        }
    }

    function search() {
        $search = $this->input->post('search');
        $data_rows = get_incidencia_manage_table_data_rows($this->Incidencia->search($search), $this);
        echo $data_rows;
    }

    function suggest() {
        $suggestions = $this->Incidencia->get_search_suggestions($this->input->post('q'), $this->input->post('limit'));
        echo implode("\n", $suggestions);
    }

    function delete() {
        $data_to_delete = $this->input->post('ids');
        if ($this->Lugar->delete_list($data_to_delete)) {
            echo json_encode(array('success' => true, 'message' => $this->lang->line('lugares_successful_deleted') . ' ' .
                count($data_to_delete) . ' ' . $this->lang->line('lugares_one_or_multiple')));
        } else {
            echo json_encode(array('success' => false, 'message' => $this->lang->line('lugares_cannot_be_deleted')));
        }
    }

    function get_row() {
        $id = $this->input->post('row_id');
        $data_row = get_lugar_data_row($this->Lugar->get_info($id), $this);
        echo $data_row;
    }

    function get_form_width() {
        return 400;
    }

    function get_form_height() {
        return 330;
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */