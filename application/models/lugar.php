<?php
class Lugar extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_by_categoria($categoria_id = null)
    {
        if($categoria_id == null)
            return null;
        $this->db->where('categoria_id', $categoria_id);
        $this->db->from('lugar');
        $this->db->where('deleted', 0);
        $this->db->limit(10);
        $query = $this->db->get();
        
        return $query;
    }
    
    function get_photos($lugar_id = null)
    {
        if($lugar_id == null)
            return null;
        $this->db->where('id_lugar', $lugar_id);
        $this->db->where('deleted', 0);
        $this->db->from('fotos');
        $this->db->limit(10);
        $query = $this->db->get();
        
        return $query;
    }

    function getall() {
        $query = $this->db->get('lugar', 10);
        $this->db->where('deleted', 0);
        return $query;
    }

    function get_all($num = 0, $offset = 0, $where, $order = null) {
        if ($order == null)
            $order = "id";
        //$this->db->select('id','nombre');
        $this->db->from('lugar');
        if ($where != "")
            $this->db->where($where);
//        $this->db->where('deleted', 0);
        $this->db->where('deleted', 0);
        $this->db->order_by($order);
        $this->db->limit($offset + $num, $offset);

        return $this->db->get();
    }

    function get_total() {
        $this->db->select("count(*) as total");
        $this->db->from("lugar");
//        $this->db->where("deleted", 0);
        $query = $this->db->get();
        return $query->row();
    }

    /*
      Gets information about a particular item
     */

    function get_info($id) {
        $this->db->from('lugar');
        $this->db->where('id', $id);
        // $this->db->where('items.deleted',0);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            //Get empty base parent object, as $item_id is NOT an item
            $obj = new stdClass();
            $fields = $this->db->list_fields('lugar');
            foreach ($fields as $field) {
                $obj->$field = '';
            }

            return $obj;
        }
    }

    /*
      Inserts or updates a cat
     */

    function save(&$data, $id = false) {
        if (!$id or !$this->exists($id)) {
            if ($this->db->insert('lugar', $data)) {
                $data['id'] = $this->db->insert_id();
                return true;
            }
            return false;
        }

        $this->db->where('id', $id);
        if ($this->db->update('lugar', $data)) {
            return true;
        }
        return false;
    }

    /*
      Determines if a given item_id is an item
     */

    function exists($id) {
        //Bug php or mysql version, if it is char explicit convert to number.
        if (!is_numeric($id))
            return false;
        $this->db->from('lugar');
        $this->db->where('id', $id);
        // $this->db->where('deleted',0);
        $query = $this->db->get();
        return ($query->num_rows() == 1);
    }

    function delete_list($ids) {
        $success = false;

        //Run these queries as a transaction, we want to make sure we do all or nothing

        $this->db->where_in('id', $ids);
        try {
            $success = $this->db->update('lugar', array('deleted' => 1));
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