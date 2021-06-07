<?php 

class Consulta extends CI_Model{
    function __construct(){
        $this->load->database();
    } 

    public function create($data){
        if($this->db->insert('consultas', $data)){
            return true;
        }
        return false;
    }

    public function get_consultas(){
        $sql = $this->db->get('consultas');
        return $sql->result();
    }

    function get_pagination($limit, $offset){
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('consultas');
        return $query->result();
    }
}
