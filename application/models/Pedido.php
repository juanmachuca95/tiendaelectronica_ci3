<?php 

class Pedido extends CI_Model{
    function __construct(){
        $this->load->database();
        $this->load->model('Producto');
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

    function getPedidosInfoAdmin($page_size, $offset){
        $this->db->select( '*');
        $this->db->from('clientes');
        $this->db->limit($page_size, $offset);
        $this->db->where("entregado = 0");
        $this->db->join('pedidos','clientes.id_cliente = pedidos.id_cliente', 'inner');

        if($query = $this->db->get()){
            return $query->result();
        }else{
            return false;
        }
    }

    /*Cantidad de pedidos pendientes*/
    function getCantidadPedidos(){
        $this->db->select( '*');
        $this->db->from('clientes');
        $this->db->where('entregado', 0);
        $this->db->join('pedidos','clientes.id_cliente = pedidos.id_cliente', 'inner');

        if($query = $this->db->get()){
            return $query->num_rows();
        }
        return false;
    }

    /*Total de pedidos entregados*/
    function getCantidadPedidosEntregados(){
        $this->db->select( '*');
        $this->db->from('clientes');
        $this->db->where('entregado', 1);
        $this->db->join('pedidos','clientes.id_cliente = pedidos.id_cliente', 'inner');

        if($query = $this->db->get()){
            return $query->num_rows();
        }
        return false;
    }

    function getPedidoYaEntregado($id){
        $this->db->where('id_pedido', $id);
        $this->db->where('entregado', 1);
        $sql = $this->db->get('pedidos');
        if($sql->num_rows() == 1){
            return true;
        }
        return false;
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

    function getPedidosEnviados(){
        $this->db->select( '*');
        $this->db->from('clientes');
        $this->db->where("entregado = 1");
        $this->db->join('pedidos','clientes.id_cliente = pedidos.id_cliente', 'inner');

        if($query = $this->db->get()){
            return $query->result();
        }else{
            return false;
        }
    }

    function getPaginate($limit, $offset){
        $sql = $this->db->get('pedidos', $limit, $offset);
        return $sql->result();
    }
}

?>