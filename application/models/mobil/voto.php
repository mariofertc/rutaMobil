<?php

class Voto extends CI_Model {
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function getall($lugar_id) {
        $this->db->where('id_lugar', $lugar_id);
        $this->db->order_by('fecha', 'asc');
        $this->db->where('deleted', 0);
        $query = $this->db->get('comentario');
        return $query;
    }

    function get_all($num = 0, $offset = 0, $where, $order = null) {
        if ($order == null)
            $order = "id";
        //$this->db->select('id','nombre');
        $this->db->from('comentario');
        if ($where != "")
            $this->db->where($where);
        $this->db->where('deleted', 0);
        $this->db->order_by($order);
        $this->db->limit($offset + $num, $offset);

        return $this->db->get();
    }

    function get_total($lugar_id) {
        $this->db->select("count(*) as total");
        $this->db->from("votacion");
//        $this->db->where("deleted", 0);
        $this->db->where("id_lugar", $lugar_id);
        $query = $this->db->get();
        return $query->row();
    }

    /*
      Gets information about a particular item
     */

    function get_info($id) {
        $this->db->from('comentario');
        $this->db->where('id', $id);
        // $this->db->where('items.deleted',0);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            //Get empty base parent object, as $item_id is NOT an item
            $obj = new stdClass();
            $fields = $this->db->list_fields('comentario');
            foreach ($fields as $field) {
                $obj->$field = '';
            }

            return $obj;
        }
    }

    /*
      Inserts or updates a comment
     */

    function save(&$data, $id = false) {
        if ($this->db->insert('votacion', $data)) {
            $data['id'] = $this->db->insert_id();
            return true;
        }
        return false;
    }

    /*
      Determines if a given item_id is an item
     */

    function delete_list($ids) {
        $success = false;

        //Run these queries as a transaction, we want to make sure we do all or nothing

        $this->db->where_in('id', $ids);
        try {
            $success = $this->db->update('comentario', array('deleted' => 1));
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
            } else {
                $this->db->trans_commit();
            }
        } catch (Exception $e) {
            $this->db->trans_off();
        }
        return $success;
    }

}