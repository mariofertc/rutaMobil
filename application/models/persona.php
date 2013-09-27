<?php

class Persona extends CI_Model {

    /**
     *  Determines whether the given person exists 
     */
    function exists($persona_id) {
        $this->db->from('persona');
        $this->db->where('persona.persona_id', $persona_id);
        $query = $this->db->get();

        return ($query->num_rows() == 1);
    }

    function get_all($num = 0, $offset = 0, $where = null, $order = null) {
        if ($order == null)
            $order = "persona_id";
        $this->db->from('persona');
        if ($where != "")
            $this->db->where($where);
        $this->db->order_by($order);
        $this->db->limit($offset + $num, $offset);

        return $this->db->get();
    }

    function get_total() {
        $this->db->select("count(*) as total");
        $this->db->from("persona");
        $query = $this->db->get();
        return $query->row();
    }

    /**
     * Gets information about a person as an array.
     */
    function get_info($persona_id) {
        $query = $this->db->get_where('persona', array('persona_id' => $persona_id), 1);

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            //create object with empty properties.
            $fields = $this->db->list_fields('persona');
            $persona_obj = new stdClass;

            foreach ($fields as $field) {
                $persona_obj->$field = '';
            }

            return $persona_obj;
        }
    }

    /**
     * Inserts or updates a person
     */
    function save(&$persona_data, $persona_id = false) {
        if (!$persona_id or !$this->exists($persona_id)) {
            if ($this->db->insert('persona', $persona_data)) {
                $persona_data['persona_id'] = $this->db->insert_id();
                return true;
            }

            return false;
        }

        $this->db->where('persona_id', $persona_id);
        return $this->db->update('persona', $persona_data);
    }

    /**
     * Deletes one Person
     */
    function delete($person_id) {
        return true;
        ;
    }

    /**
     * Deletes a list of people
     */
    function delete_list($person_ids) {
        return true;
    }

}

/* End of file persona.php */
/* Location: ./application/models/persona.php */