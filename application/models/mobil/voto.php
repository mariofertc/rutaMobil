<?php

class Voto extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_total($lugar_id) {
        $this->db->select("count(*) as total");
        $this->db->from("votacion");
        $this->db->where("id_lugar", $lugar_id);
        $query = $this->db->get();
        return $query->row();
    }

    /**
     * Inserts or updates a comment
     */
    function save(&$data, $id = false) {
        if ($this->db->insert('votacion', $data)) {
            $data['id'] = $this->db->insert_id();
            return true;
        }
        return false;
    }

}

/* End of file voto.php */
/* Location: ./application/models/mobil/voto.php */