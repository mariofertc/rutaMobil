<?php
class Provincia extends CI_Model {

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
        $query = $this->db->get('provincia', 10);
        return $query->result_array();
    }
	function get_provincia($id_provincia = null)
    {
		$this->db->from('provincia');
		if(isset($id_provincia))$this->db->where('id',$id_provincia);
        return $this->db->get();
    }
	function save_provincia($data = null)
    {
		$this->db->insert('provincia', $data);
        return  $this->db->insert_id();
    }
    function get_ciudad($id_provincia = null, $id_ciudad = null)
    {
        $this->db->from('ciudad', 10);
		$this->db->where('provincia_id',$id_provincia);

		if(isset($id_ciudad))$this->db->where('id',$id_ciudad);

        return $this->db->get();
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