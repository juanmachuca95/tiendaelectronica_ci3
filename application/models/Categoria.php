<?php 

class Categoria extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    
    public function create($data){
        if($this->db->insert('categorias', $data)){
            return true;
        }
        return false;
    }

    public function delete($id){
        if($this->db->delete('categorias', array('id' => $id))){
            return true;
        }
        return false;
    }

    public function find($id){
        $query = $this->db->get_where('categorias', array('id' => $id));
        return $query->row();
    }

    public function get_categorias(){
        $this->db->order_by('id', 'desc');
        $sql = $this->db->get('categorias');
        return $sql->result();
    }

    public function get_pagination($limit, $offset){
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('categorias');
        return $query->result();
    }

    public function update($id, $data){
        if($this->db->update('categorias',$data, array('id'=>$id))){
            return true;
        }
        return false;
    }

    
}

?>