<?php 
class User extends CI_Model{
    function __construct(){
        $this->load->database();
    } 

    public function active($id, $active){
        $this->db->set('activo', $active);
        $this->db->where('id', $id);
        $this->db->update('users');
    }

    public function create_user($data){
        if($this->db->insert('users', $data)){
            return $this->db->insert_id();
        }
        return false;
    }

    public function delete($id){
        if($this->db->delete('users', array('id' => $id))){
            return true;
        }
        return false;
    }

    public function find($id){
        $sql = "SELECT u.* FROM users AS u WHERE u.id = ?";
        if($result = $this->db->query($sql, array($id))){
            return $result->row();
        }
        return false;
    }

    public function get_users(){
        $sql = "SELECT u.*, e.direccion, e.telefono FROM users AS u LEFT JOIN envios AS e ON u.envios_id = e.id ORDER BY u.id DESC";
        if($result = $this->db->query($sql) ){
            return $result->result();
        }
        return false;
    }
     
    public function get_pagination($limit, $offset){
        $sql = "SELECT u.*, e.direccion, e.telefono FROM users AS u LEFT JOIN envios AS e ON u.envios_id = e.id ORDER BY u.id DESC LIMIT ?, ?";
        if($result = $this->db->query($sql, array(intVal($offset), intVal($limit)))){
            return $result->result();
        }
        return false;
    }

    public function update($id, $data){
        if($this->db->update('users',$data, array('id'=>$id))){
            return true;
        }
        return false;
    }
}
?>