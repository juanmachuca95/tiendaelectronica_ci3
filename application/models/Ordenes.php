<?php 
class Orden extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function active($id, $active){
        $this->db->set('activo', $active);
        $this->db->where('id', $id);
        $this->db->update('orden');
    }

    public function delete($id){
        if($this->db->delete('orden', array('id' => $id))){
            return true;
        }
        return false;
    }

    public function find($id){
        $sql = "SELECT u.*, e.direccion, e.telefono FROM orden AS u LEFT JOIN envios AS e ON u.envios_id = e.id WHERE u.id = ?";
        if($result = $this->db->query($sql, array($id))){
            return $result->row();
        }
        return false;
    }

    public function get_ordenes(){
        $sql = "SELECT u.*, e.direccion, e.telefono FROM users AS u LEFT JOIN envios AS e ON u.envios_id = e.id ORDER BY u.id DESC";
        if($result = $this->db->query($sql) ){
            return $result->result();
        }
        return false;
    }
     
    public function get_pagination($limit, $offset){
        $sql = "SELECT o.*, u.direccion, u.telefono FROM orden AS u INNER JOIN users AS u ON u.id = o.id ORDER BY u.id DESC LIMIT ?, ?";
        if($result = $this->db->query($sql, array(intVal($offset), intVal($limit)))){
            return $result->result();
        }
        return false;
    }


}

?>