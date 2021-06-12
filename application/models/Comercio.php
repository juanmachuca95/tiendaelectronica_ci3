<?php 

class Comercio extends CI_Model{
    
    public function __construct(){
        $this->load->database();
    }

    public function get_mercadopago($id){
        $query = "SELECT mercadopago_key FROM `comercios` WHERE id = ?;";
        if($result = $this->db->query($query, array('id' => $id))){
            return $result->row();
        }
        return false;
    }

}

?>