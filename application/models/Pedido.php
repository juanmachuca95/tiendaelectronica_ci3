<?php 

class Pedido extends CI_Model{
    function __construct(){
        $this->load->database();
    } 

    function cargarPedido($items, $id_cliente){
        //No olvidar que los items del pedido se guardan serializados
        $data = array(
            'id_cliente' => $id_cliente,
            'items' => $items,
        );

        if( $this->db->insert('pedidos', $data) ){
            return true;
        }else{
            return false;
        }
    }

    function infoPedidos($id_cliente){
        if($query = $this->db->get_where('pedidos', "id_cliente = $id_cliente" )){
            return $query->result();
        }else{
            return false;
        }


    }

    function cancelarPedido($id_cliente, $id_pedido){
        $this->db->where("id_cliente = $id_cliente");
        $this->db->where("id_pedido = $id_pedido");
        if($this->db->delete('pedidos')){
            return true;
        }else{
            return false;
        }
    }

    function getDescripcionPedido($id){
        
        $this->db->select('items');
        if($query = $this->db->get_where('pedidos', "id_pedido = $id")){
            return $query->row();
        }else{
            return false;
        }
    }

    function getPedidosInfoAdmin(){
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

    function eliminarUnPedido($id){
        $this->db->where("id_pedido = $id");
        if($this->db->delete('pedidos') ){
            return true;
        }else{
            return false;
        }
    }

    function confirmarEnvio($id){
        $this->db->set('entregado', 1);
        $this->db->where("id_pedido = $id");
        if($this->db->update('pedidos')){
            return true;
        }else{
            return false;
        }
    }

    function getEstadoPedido($id){
        $this->db->select('entregado');
        $this->db->where("id_pedido = $id");
        $query = $this->db->get('pedidos');
        if($query == true){
            return $query->row();
        }else{
            return false;
        }
    }
}

?>