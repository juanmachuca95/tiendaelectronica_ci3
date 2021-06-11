<?php

    class Autorizacion extends CI_Model{
        function __construct(){
            $this->load->database();
        }
        
        public function login($email, $password){
            $sql = 
            "SELECT u.* FROM users AS u WHERE u.email = ?";
            if($result = $this->db->query($sql, array($email))){
                $row = $result->row();
                if (password_verify($password, $row->password)) {
                    return $row;
                }
            }
            return false;
        }

        function create($data){
            $sql = "INSERT INTO users (nombre, apellido, email, password, roles_id) 
                VALUES (?, ?, ?, ?, ?)";
            if($result = $this->db->query($sql, array(
                $data['nombre'], 
                $data['apellido'],
                $data['email'],
                $data['password'],
                $data['roles_id']))
            ){
                return true;
            }
            return false;
            
        }

        /* FORMA CORTA
        function create($data){
            if($this->db->insert('users', $data)){
                return true;
            }
            return false;
        } */



        function actualizarInfoAdmin($data, $id ){
            if($this->db->update('contacto', $data, "id = $id" ) ) {
                return true;
            }else{
                return false;
            }
        }

        function getDatosAdmin(){
            if($dato = $this->db->get('contacto')){
                return $dato->row();
            }
            else{
                return false;
            }
        }
    }
?>