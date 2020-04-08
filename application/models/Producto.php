<?php

    class Producto extends CI_Model{
        function __construct(){
            $this->load->database();
        }        
        
        //cargar producto a la base de datos (create)
        function cargar($datos){
            if($this->db->insert('productos',$datos)){
                return true;
            }else{
                return false;
            }
        }

        //toda la tabla de productos
        function getProductos(){
            if($sql = $this->db->get('productos')){
                return $sql->result();
            }else{
                return false;
            }
        }

        //tabla por categoria
        function getProductosCategoria($categoria){
            if($sql = $this->db->get_where('productos', array('categoria' => $categoria))) {
                return $sql->result();
            }else{
                return false;
            }           
        }

        //read datos
        function getProducto($id){
            if($data = $this->db->get_where('productos', array('id' => $id))) {
                return $data->result();
            }else{
                return false;
            }

        }

        //update
        function actualizar($data, $id){

            if($this->db->update('productos',$data,array('id'=>$id)) ){
                return true;
            }else{
                return false;
            }

        }

        function eliminar($id){

            if($this->db->delete('productos', array('id' => $id))){
                return true;
            }else{
                return false;
            }

        }

        //funcion para el buscador de la pagina
        function buscar($dato){

            $query = $this->db->query("select * from productos where descripcion like '%$dato%';");
            return $query->result();
        
        }

        //desde Controller Clientes
        function productosPedidos($data){
            $this->db->where_in('id', $data);
            $this->db->from('productos');
            $query = $this->db->get();
            if($query){
                return $query->result();
            }else{
                return false;
            }

        }

        function getCategorias(){
            if($sql = $this->db->get('categoria')){
                return $sql->result();
            }else{
                return false;
            }
        }

        function crearCategoria($datos){
            if($this->db->insert('categoria',$datos)){
                return true;
            }else{
                return false;
            }
        }

        //consulta sobre si hay estock para un producto por el Id
        function stockProducto($codigo, $cantidad){
            $this->db->select('stock');
            $this->db->where("id = $codigo");
            $query = $this->db->get('productos');
            $stock = $query->row('stock');
            if(intval($stock) >= $cantidad){
                return true;
            }else{
                return false;
            }
        }

        function actualizarProductosVendidos($data){
            foreach ($data as $key => $value) {
                $codigo = $key;
                $cantidad = $value;
                $this->db->select('stock');
                $this->db->where('id', $codigo);
                $dato = $this->db->get('productos');

                $actualizar = $dato->row('stock') - $cantidad;

                $this->db->set('stock', $actualizar);
                $this->db->where('id', $codigo);
                $this->db->update('productos');
            }
                

            return true;
        }
    }   

?>