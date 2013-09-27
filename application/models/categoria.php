<?php

class Categoria extends CI_Model {

    var $title = '';
    var $content = '';
    var $date = '';

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function getall() {
        $this->db->where('deleted', 0);
        $this->db->order_by('order', 'asc');
        $query = $this->db->get('categoria');
        return $query;
    }

    function get_all($num = 0, $offset = 0, $where = null, $order = null) {
        if ($order == null)
            $order = "id";
        $this->db->from('categoria');
        if ($where != "")
            $this->db->where($where);
        $this->db->where('deleted', 0);
        $this->db->order_by($order);
        $this->db->limit($offset + $num, $offset);

        return $this->db->get();
    }

    function get_total() {
        $this->db->select("count(*) as total");
        $this->db->from("categoria");
        $this->db->where("deleted", 0);
        $query = $this->db->get();
        return $query->row();
    }

    /**
     * Gets information about a particular item
     */
    function get_info($id) {
        $this->db->from('categoria');
        $this->db->where('id', $id);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            //Get empty base parent object, as $item_id is NOT an item
            $obj = new stdClass();
            $fields = $this->db->list_fields('categoria');
            foreach ($fields as $field) {
                $obj->$field = '';
            }

            return $obj;
        }
    }

    /**
     * Inserts or updates a cat
     */
    function save(&$data, $id = false) {
        if (!$id or !$this->exists($id)) {
            if ($this->db->insert('categoria', $data)) {
                $data['id'] = $this->db->insert_id();
                return true;
            }
            return false;
        }

        $this->db->where('id', $id);
        if ($this->db->update('categoria', $data)) {
            return true;
        }
        return false;
    }

    /**
     * Determines if a given item_id is an item
     */
    function exists($id) {
        //Bug php or mysql version, if it is char explicit convert to number.
        if (!is_numeric($id))
            return false;
        $this->db->from('categoria');
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
            $success = $this->db->update('categoria', array('deleted' => 1));
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

/* End of file categoria.php */
/* Location: ./application/models/categoria.php */