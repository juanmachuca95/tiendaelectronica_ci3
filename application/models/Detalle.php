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

    public function get_detalles($id){
        $query = "SELECT d.*, p.producto FROM detalles AS d INNER JOIN productos AS p ON p.id = d.productos_id WHERE orden_id = ?;";
        if($result = $this->db->query($query, array('id' => $id))){
            return $result->result();
        }
        return false;
    }
}