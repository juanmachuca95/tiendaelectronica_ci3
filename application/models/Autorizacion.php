<?php

    class Autorizacion extends CI_Model{
        function __construct(){
            $this->load->database();
        }
        
        function login_admin($admin,$contrasenia){
            $data = $this->db->get_where('contacto', array('email' => $admin, 'contraseña' => $contrasenia ));
            if($data->result()){
                return $data->row();
            }else{
                return false;
            }
        }

        public function login($email, $password){
            $sql = "SELECT * FROM users WHERE email = ?";
            if($result = $this->db->query($sql, array($email))){
                $row = $result->row();
                if (password_verify($password, $row->password)) {
                    return $row;
                }
            }
            return false;
        }

        function registrar($data){
            if($this->db->insert('clientes', $data)){
                return true;
            }else{
                return false;
            }
        }

        function store($data){
            if($this->db->insert('users', $data)){
                return true;
            }
            return false;
        }

        function login_usuario($admin, $contrasenia){
            $data = $this->db->get_where('clientes', array('correo' => $admin, 'password' => $contrasenia ));
            if($data->result()){
                return $data->row();
            }else{
                return false;
            }
        }


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