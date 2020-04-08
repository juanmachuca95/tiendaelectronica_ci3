<?php 

class Usuario extends CI_Model{
    function __construct(){
        $this->load->database();
    } 

    function getClientes(){
        if($query = $this->db->get('clientes')){
            return $query->result();
        }else{
            return false;
        }
    }

    function guardarCelular($id_cliente, $celular){
        $this->db->set('celular',$celular);
        $this->db->where('id_cliente', $id_cliente);
        $this->db->update('clientes');
    }
}
?>