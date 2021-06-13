<?php 

class Comercio extends CI_Model{
    
    public function __construct(){
        $this->load->database();
    }

    public function get_comercios(){
        $query = "SELECT * FROM `comercios` ORDER BY id DESC";
        if($result = $this->db->query($query)){
            return $result->result();
        }
        return false;
    }

    public function get_mercadopago($id){
        $query = "SELECT mercadopago_key FROM `comercios` WHERE id = ?;";
        if($result = $this->db->query($query, array('id' => $id))){
            return $result->row();
        }
        return false;
    }

    public function get_pagination($limit, $offset){
        $sql = "SELECT c.* FROM comercios AS c ORDER BY c.id DESC LIMIT ?, ?;";
        if($result = $this->db->query($sql, array(intVal($offset), intVal($limit)))){
            return $result->result();
        }
        return false;
    }

}

?>