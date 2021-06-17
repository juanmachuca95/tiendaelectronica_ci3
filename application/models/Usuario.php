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

    function getClientesConPedido(){
        $this->db->select( '*');
        $this->db->from('clientes');
        $this->db->where("entregado = 0");
        $this->db->join('pedidos','clientes.id_cliente = pedidos.id_cliente', 'inner');

        if($query = $this->db->get()){
            return $query->result();
        }else{
            return false;
        }
    }

    function eliminarUsuario($id=0){
        
        $this->db->where("id_cliente = $id");
        $this->db->where("entregado = 0");
        $dato = $this->db->get('pedidos');
        if($dato->num_rows() > 0){
            return false;
        }else{
            $this->db->where("id_cliente = $id");
            $this->db->delete('clientes');
            return true;
        }

    }
}
?>