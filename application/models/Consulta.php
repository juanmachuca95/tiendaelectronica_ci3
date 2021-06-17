<?php 

class Consulta extends CI_Model{
    function __construct(){
        $this->load->database();
    } 

    public function active($id, $active){
        $this->db->set('leido', $active);
        $this->db->where('id', $id);
        $this->db->update('consultas');
    }

    public function create($data){
        if($this->db->insert('consultas', $data)){
            return true;
        }
        return false;
    }

    public function delete($id){
        if($this->db->delete('consultas', array('id' => $id))){
            return true;
        }
        return false;
    }

    public function find($id){
        $sql = "SELECT * FROM consultas WHERE id=?";
        if($result = $this->db->query($sql, array('id' => $id))){
            return $result->row();
        }
        return false;
    }

    public function get_consultas(){
        $sql = $this->db->get('consultas');
        return $sql->result();
    }

    public function get_consultas_noleidas(){
        $sql = "SELECT * FROM consultas WHERE leido=0";
        if($result = $this->db->query($sql)){
            return $result->result();
        }
        return false;
    }

    function get_pagination($limit, $offset){
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('consultas');
        return $query->result();
    }
}
