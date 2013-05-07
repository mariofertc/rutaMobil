<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once ("secure_area.php");

class Comentarios extends Secure_area {

    function __construct() {
//		parent::__construct('incidencias');
        parent::__construct('comentarios');
    }

    public function index() {
        $data['controller_name'] = strtolower($this->uri->segment(1));
        $data['admin_table'] = get_comentario_admin_table();
        $data['form_width'] = $this->get_form_width();
        $data['form_height'] = $this->get_form_height();
        $this->load->view('comentario/manage', $data);
    }

    function mis_datos() {
        $aColumns = array(
            'id' => array('checked' => true, 'es_mas' => true),
            'nombre_comentario' => array('limit' => 13),
            'titulo' => array('limit' => 30),
            'email' => array('limit' => 30));
        //Eventos Tabla
        $cllAccion = array(
            '1' => array(
                'function' => "view",
                'comun_language' => "comun_edit",
                'language' => "_update",
                'width' => $this->get_form_width(),
                'height' => $this->get_form_height(),
                'class' => 'thickbox')
        );
        echo getData('Comentario', $aColumns, $cllAccion, null);
    }

    function view($id = -1, $categoria_id = -1) {
        //echo $categoria_id . $id;
        $data['info'] = $this->Comentario->get_info($id);
        $this->load->view("comentario/form", $data);
    }

    function save($id = -1) {
        $coordenadas = json_encode(array('latitud' => $this->input->post('latitud'), 'longitud' => $this->input->post('longitud')));

        $data = array(
            'nombre' => $this->input->post('lugar'),
            'direccion' => $this->input->post('direccion'),
            'coordenadas' => $coordenadas,
            'descripcion' => $this->input->post('descripcion'),
            'interes' => $this->input->post('interes'),
            'sector' => $this->input->post('sector'),
            'nombre_enlace' => $this->input->post('enlace'),
            'fecha_actualizacion' => date('Y-m-d h:i:s')
        );
//        echo json_encode(array('success' => false, 'message' => $_FILES['userfile']));
//        return;

        if (isset($_FILES['userfile'])) {
            //Subir Imagenes
            $resp_upload = $this->do_upload($this->input->post('enlace'));
            if (gettype($resp_upload) == "string") {
                $resp = array('success' => 'fail_upload', 'message' => 'Error al cargar la foto ' .
                    $data['nombre'] . '. ' . $resp_upload, 'id' => -1);
                echo json_encode($resp);
                return;
            } else {
                $data['imagen_path'] = $resp_upload['file_name'];
            }
        }

        if ($this->input->post('categoria_id') != -1)
            $data['categoria_id'] = $this->input->post('categoria_id');
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
                    echo json_encode(array('success' => false, 'message' => 'Error al actualizar el Lugar ' .
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
        if ($this->Comentario->delete_list($data_to_delete)) {
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
        return 380;
    }

    function get_form_height() {
        return 300;
    }

    function do_upload($path) {
//        $this->gallery_path = realpath(APPPATH.'../images/imglugar/'. $path);
        $this->gallery_path = realpath(APPPATH . '../images/imglugar/') . '/' . $path;
//exit($this->gallery_path."yo");
        if (!file_exists($this->gallery_path)) {
//exit($this->gallery_path."yo");
            //return false;
            mkdir($this->gallery_path, 0777);
        }

        $config = array(
            'allowed_types' => 'jpg|jpeg|gif|png',
            'upload_path' => $this->gallery_path,
            'max_size' => 2000
        );

        $this->upload->initialize($config);
        if (!$this->upload->do_upload())
            return $this->upload->display_errors();
        return $this->upload->data();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */