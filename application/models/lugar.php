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
    
    function get_all()
    {
        $query = $this->db->get('lugar', 10);
        return $query->result();
    }
    
    function get_by_categoria($categoria_id = null)
    {
        if($categoria_id == null)
            return null;
        $this->db->where('categoria_id', $categoria_id);
        $this->db->from('lugar');
        $this->db->limit(10);
        $query = $this->db->get();
        
        return $query;
    }

    function insert_entry()
    {
        $this->title   = $_POST['title']; // please read the below note
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->insert('entries', $this);
    }

    function update_entry()
    {
        $this->title   = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }

}