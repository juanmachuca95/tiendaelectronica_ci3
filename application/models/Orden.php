<?php 
date_default_timezone_set('America/Argentina/Buenos_Aires');

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

    public function get_orden($id){
        $sql = "SELECT o.*, u.nombre, u.apellido, u.activo, u.email, u.direccion, u.telefono FROM users AS u INNER JOIN orden AS o ON o.users_id = u.id WHERE o.id=?;";
        if($result = $this->db->query($sql, array('id' => $id))){
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

    public function get_ordenes_nuevas(){ // En base al dia actual
        $date  = date('Y-m-d H:i:s');
        $date1 = date("Y-m-d", strtotime("+1 day", strtotime($date))) . " 00:00:00"; 
        $sql = "SELECT * FROM orden WHERE created_at BETWEEN CURDATE() and CURDATE() + INTERVAL 1 DAY;";
        if($result = $this->db->query($sql)){
            return $result->result();
        }
        return false;
    }

    public function get_pagination($limit, $offset) {
        $sql = "SELECT o.*, u.nombre, u.apellido, u.direccion, u.direccion, u.email FROM orden as o INNER JOIN users as u ON o.users_id = u.id ORDER BY o.id DESC LIMIT ?, ?;";
        if($result = $this->db->query($sql, array(intVal($offset), intVal($limit)))){
            return $result->result();
        }
        return false;
    }

    public function update_pagado($id, $payment_id){
        $sql = "UPDATE orden SET payment_id=?, status='pagado' WHERE id=?;";
        if($this->db->query($sql, array('payment_id'=> intVal($payment_id), 'id' => intVal($id)))){
            return true;
        }
        return false;
    }

    public function update_impago($id, $payment_id){
        $sql = "UPDATE orden SET payment_id=?, status='impago' WHERE id=?;";
        if($this->db->query($sql, array('payment_id'=> intVal($payment_id), 'id' => intVal($id)))){
            return true;
        }
        return false;
    }

    public function set_payment_id($id, $payment_id){
        $sql = "UPDATE orden SET payment_id=? WHERE id=?;";
        if($this->db->query($sql, array('payment_id'=> intVal($payment_id), 'id' => intVal($id)))){
            return true;
        }
        return false;
    }

}

?>