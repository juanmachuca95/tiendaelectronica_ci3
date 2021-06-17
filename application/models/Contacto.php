<?php 


class Contacto extends CI_Model{
    private $table = 'contactos';


    public function __construct(){
        $this->load->database();
    }


    public function active($id, $active){
        $this->db->set('leido', $active);
        $this->db->where('id', $id);
        $this->db->update($this->table);
    }

    public function create($data){
        if($this->db->insert($this->table, $data)){
            return true;
        }
        return false;
    }

     public function delete($id){
        if($this->db->delete($this->table, array('id' => $id))){
            return true;
        }
        return false;
    }

     public function find($id){
        $query = "SELECT c.*, u.nombre, u.apellido, u.email FROM contactos AS c INNER JOIN users AS u ON c.users_id = u.id WHERE c.id = ?";
        if($result = $this->db->query($query, array('id' => $id))){
            return $result->row();
        }
        return false;
    }

    public function get_contactos(){
        $query = "SELECT c.*, u.nombre, u.apellido, u.email FROM contactos AS c INNER JOIN users AS u ON c.users_id = u.id";
        if($result = $this->db->query($query)){
            return $result->result();
        }
        return false;
    }

    function get_pagination($limit, $offset){
    $sql = "SELECT c.*, u.nombre, u.email FROM contactos AS c INNER JOIN users AS u ON c.users_id = u.id ORDER BY c.id DESC LIMIT ?, ?;";
    if($result = $this->db->query($sql, array(intVal($offset), intVal($limit)))){
        return $result->result();
    }
    return false;
    }


}

?>