<?php 
class Detalle extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function create($data){
        if($this->db->insert('detalles', $data)){
            return true;
        }
        return false;
    }
}