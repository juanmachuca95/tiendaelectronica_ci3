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

    public function create($data){
        if($this->db->insert('orden', $data)){
            return $this->db->insert_id();
        }
        return false;
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
        $sql = "SELECT o.*, u.* FROM users AS u INNER JOIN orden AS o ON o.users_id = u.id ORDER BY o.id DESC";
        if($result = $this->db->query($sql) ){
            return $result->result();
        }
        return false;
    }

    public function get_pagination($limit, $offset) {
        $sql = "SELECT o.*, u.* FROM orden as o INNER JOIN users as u ON o.users_id = u.id ORDER BY o.id DESC LIMIT ?, ?;";
        if($result = $this->db->query($sql, array(intVal($offset), intVal($limit)))){
            return $result->result();
        }
        return false;
    }

}

?>