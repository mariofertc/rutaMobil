<?php
/**
 * Controlador Categorias Archivo, Ecuadorinmobile 
 * 
 * @author Mario Torres <mariofertc@mixmail.com>
 * @version 1.0
 * @package Administrador
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once ("persona_controller.php");
/**
 * Clase de Categorias
 * 
 * Controlador para acceder a las Categorías
 * @package Administrador
 */
class Categorias extends Secure_area {

    function __construct() {
        parent::__construct('categorias');
    }

    public function index() {
        $data['controller_name'] = strtolower($this->uri->segment(1));
        $data['admin_table'] = get_categoria_admin_table();
        $data['form_width'] = $this->get_form_width();
        $data['form_height'] = $this->get_form_height();
        //$this->output->enable_profiler(TRUE);
        $this->load->view('categorias/manage', $data);
    }

    function mis_datos() {
//		$data['controller_name'] = strtolower($this->uri->segment(1));
//		$data['form_width'] = $this->get_form_width();
//		$data['form_height'] = 150;
//		$aColumns = array('id','nombre', 'descripcion', 'nombre_enlace');
        $aColumns = array(
            'id' => array('checked' => true, 'es_mas' => true),
            'nombre' => array('limit' => 13),
            'descripcion' => array('limit' => 30),
            'nombre_enlace' => array('limit' => 15),
            'order' => array('limit' => 3));
        //Eventos Tabla
        $cllAccion = array(
            '1' => array(
                'function' => "view",
                'comun_language' => "comun_edit",
                'language' => "_update",
                'width' => $this->get_form_width(),
                'height' => $this->get_form_height(),
        'class'  => 'thickbox'),
            '2' => array('function' => "lugares",
                'comun_language' => "lugares_lugar",
                'language' => "_muestra",
                'height' => 200,
                'class'=>"boton_admin"));
        echo getData('Categoria', $aColumns, $cllAccion);
    }
    
    function lugares($id =  -1)
    {
        if($id == -1)
            return;
        redirect('lugares/index/'.$id);
        $this->Lugares->index($id);
    }

    function view($id = -1) {
        $data['info'] = $this->Categoria->get_info($id);

//		$estado = array('pendiente'=>'pendiente','solucionado'=>'solucionado');
        // $array=array("foo"=>1,"bar"=>2,"baz"=>3,4,5);		
//		$data['estado']=$estado;	
        $this->load->view("categorias/form", $data);
    }

    function save($id = -1) {
        $data = array(
            'nombre' => $this->input->post('categoria'),
            'icon' => $this->input->post('icono'),
            'descripcion' => $this->input->post('descripcion'),
            'nombre_enlace' => $this->input->post('enlace'),
            'ciudad_id' => 1,
            'order' => $this->input->post('order')
        );

        // $this->db->set('order_date', 'NOW()', FALSE);
        //$empleado_id=$this->Empleado->get_logged_in_empleado_info()->persona_id;

        $this->db->trans_start();
        try {
            if ($this->Categoria->save($data, $id)) {
                //Nueva Cat Insert
                if ($id == -1) {
                    echo json_encode(array('success' => true, 'message' => 'Categoria ' .
                        $data['nombre'] . ' creada.', 'id' => $data['id']));
                    $id = $data['id'];
                } else { //update incidencia
                    echo json_encode(array('success' => true, 'message' => 'Categoría ' .
                        $data['nombre'] . ' actualizada.', 'id' => $id));
                }
                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    echo json_encode(array('success' => false, 'Error al actualizar la  Categoría ' .
                        $data['nombre'], 'id' => -1));
                } else {
                    $this->db->trans_commit();
                }
            } else {//failure
                echo json_encode(array('success' => false, 'message' => 'Error al Actualizar la Categoría ' .
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
        if ($this->Categoria->delete_list($data_to_delete)) {
            echo json_encode(array('success' => true, 'message' => $this->lang->line('categorias_successful_deleted') . ' ' .
                count($data_to_delete) . ' ' . $this->lang->line('categorias_one_or_multiple')));
        } else {
            echo json_encode(array('success' => false, 'message' => $this->lang->line('categorias_cannot_be_deleted')));
        }
    }

    function mailto() {
        $people_to_email = $this->input->post('ids');

        if ($people_to_email != false) {
            $mailto_url = 'mailto:';
            foreach ($this->Incidencia->get_multiple_info($people_to_email)->result() as $persona) {
                $mailto_url.=$persona->email . ',';
            }
            //remove last comma
            $mailto_url = substr($mailto_url, 0, strlen($mailto_url) - 1);

            echo $mailto_url;
            exit;
        }
        echo '#';
    }

    function get_row() {
        $id = $this->input->post('row_id');
        $data_row = get_categoria_data_row($this->Categoria->get_info($id), $this);
        echo $data_row;
    }

    function get_form_width() {
        return 400;
    }

    function get_form_height() {
        return 360;
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */