<?php

/**
 * Archivo Controlador Lugares, Ecuadorinmobile 
 * 
 * @author Mario Torres <mariofertc@mixmail.com>
 * @version 1.0
 * @package Administrador
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once ("secure_area.php");

/**
 * Clase de Lugares
 * 
 * Controlador para manipular los Lugares
 * @package Administrador
 */
class Lugares extends Secure_area {

    /**
     * Constructor de la clase
     * @access public
     */
    function __construct() {
        parent::__construct('lugares');
    }

    /**
     * Listado de Lugares.
     * @access public
     * @param int $id Identificador de la Categoria
     */
    public function index($id = -1) {
        $data['controller_name'] = strtolower($this->uri->segment(1));
        $data['admin_table'] = get_lugar_admin_table();
        $data['form_width'] = $this->get_form_width();
        $data['form_height'] = $this->get_form_height();
        $data['id_categoria'] = $id;
        $this->load->view('lugares/manage', $data);
    }

    /**
     * Retorna los lugares de acuerdo al identificador de la categoria dado.
     * @param int $id_categoria
     * @access public
     * @return string JSON con los datos de los lugares
     */
    function mis_datos($id_categoria) {
        $aColumns = array(
            'id' => array('checked' => true, 'es_mas' => true),
            'nombre' => array('limit' => 13),
            'direccion' => array('limit' => 30),
            'coordenadas' => array('limit' => 30),
            'imagen_path' => array('limit' => 30),
            'nombre_enlace' => array('nombre' => 'nombre_enlace'));
        //Eventos Tabla
        $cllAccion = array(
            '1' => array(
                'function' => "view",
                'comun_language' => "comun_edit",
                'language' => "_update",
                'width' => $this->get_form_width(),
                'height' => $this->get_form_height(),
                'class' => 'thickbox'),
            '2' => array('function' => "fotos",
                'comun_language' => "fotos_foto",
                'language' => "_muestra",
                'height' => 200,
                'class' => 'boton_admin'));
        $cllWhere = 'categoria_id = ' . $id_categoria;
        echo getData('Lugar', $aColumns, $cllAccion, $cllWhere);
    }

    /**
     * Editar o Crear Nuevo Lugar.
     * @access public
     * @param int $id
     * @param int $categoria_id
     */
    function view($id = -1, $categoria_id = -1) {
        $data['info'] = $this->Lugar->get_info($id);
        $data['categoria_id'] = $categoria_id;
        $coordenada = json_decode($data['info']->coordenadas);

        $data['info']->latitud = isset($coordenada->latitud) ? $coordenada->latitud : 0;
        $data['info']->longitud = isset($coordenada->longitud) ? $coordenada->longitud : 0;
        $data['info']->altitud = isset($coordenada->altitud) ? $coordenada->altitud : 0;

        $this->load->view("lugares/form", $data);
    }

    /**
     * Almacena o Edita un Lugar
     * @param int $id
     * @access public
     * @return string JSON Indicando si se guardo o no.
     */
    function save($id = -1) {
        $coordenadas = json_encode(array('latitud' => $this->input->post('latitud'), 'longitud' => $this->input->post('longitud'), 'altitud' => $this->input->post('altitud')));

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
        
    }

    function suggest() {
        
    }

    /**
     * Elimina los items seleccionados
     * @return string JSON Indicando si se elimino o no el objeto.
     * @access public
     */
    function delete() {
        $data_to_delete = $this->input->post('ids');
        if ($this->Lugar->delete_list($data_to_delete)) {
            echo json_encode(array('success' => true, 'message' => $this->lang->line('lugares_successful_deleted') . ' ' .
                count($data_to_delete) . ' ' . $this->lang->line('lugares_one_or_multiple')));
        } else {
            echo json_encode(array('success' => false, 'message' => $this->lang->line('lugares_cannot_be_deleted')));
        }
    }

    /**
     * Obtiene la fila del datatable.
     * @access public
     * @return string Para actualizar o insertar en el datatable.
     */
    function get_row() {
        $id = $this->input->post('row_id');
        $data_row = get_lugar_data_row($this->Lugar->get_info($id), $this);
        echo $data_row;
    }

    /**
     * Valor del Ancho de la Forma Modal
     * @access public
     * @return int
     */
    function get_form_width() {
        return 600;
    }

    /**
     * Valor del Alto de la Forma Modal
     * @access public
     * @return int
     */
    function get_form_height() {
        return 380;
    }

    /**
     * Almacena la Fotografia del Lugar.
     * @param string $path
     * @return mixed Con el estado del proceso de conversion.
     */
    function do_upload($path) {
        $this->gallery_path = realpath(APPPATH . '../images/imglugar/') . '/' . $path;
        if (!file_exists($this->gallery_path)) {
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

/* End of file lugares.php */
/* Location: ./application/controllers/lugares.php */