<?php

    class Producto extends CI_Model{
        function __construct(){
            $this->load->database();
        }        
        
        //cargar producto a la base de datos (create)
        function cargar($datos){
            if($this->db->insert('productos',$datos)){
                return true;
            }
            return false;
        }

        
        public function create($data){
            if($this->db->insert('productos', $data)){
                return true;
            }
            return false;
        }
        
        public function delete($id){
            if($this->db->delete('productos', array('id' => $id))){
                return true;
            }
            return false;
        }
        
        public function find($id){
            $query = "SELECT c.categoria, p.* FROM productos AS p INNER JOIN categorias AS c ON p.categorias_id = c.id WHERE p.id = ?";
            if($result = $this->db->query($query, array('id' => $id))){
                return $result->row();
            }
            return false;
        }

        public function finder($categorias_id, $producto){
            $query = "SELECT c.categoria, p.* FROM productos AS p INNER JOIN categorias AS c ON p.categorias_id = c.id WHERE p.producto LIKE ? AND p.categorias_id = ?;";
            if($result = $this->db->query($query, array('%'.$this->db->escape_like_str($producto).'%', $categorias_id) )){
                return $result->result();
            }
            return [];
        }

        public function get_productos(){
            $query = "SELECT c.categoria, p.* FROM productos AS p INNER JOIN categorias AS c ON p.categorias_id = c.id";
            if($result = $this->db->query($query)){
                return $result->row();
            }
            return false;
        }
        
        public function update($id, $data){
            if($this->db->update('productos',$data, array('id'=>$id))){
                return true;
            }
            return false;
        }


        public function active($id, $active){
            $this->db->set('activo', $active);
            $this->db->where('id', $id);
            $this->db->update('productos');
        }

        //toda la tabla de productos
        function getProductos(){
            if($sql = $this->db->get('productos')){
                return $sql->result();
            }
            return false;
        }


        //update
        function actualizar($data, $id){
            if($this->db->update('productos',$data, array('id'=>$id)) ){
                return true;
            }
            return false;
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

        function datosProducto($codigo){
            $this->db->where('id',$codigo);
            $sql = $this->db->get('productos');
            if($sql->num_rows() == 1){
                return $sql->row();
            }
            return false;
        }

        public function getPaginacion($limit, $offset){
            $sql = $this->db->get_where('productos', array('activo' => 1), $limit, $offset);
            return $sql->result();
        }

        public function get_pagination($limit, $offset){
            $sql = "SELECT c.categoria, p.* FROM productos AS p INNER JOIN categorias AS c ON p.categorias_id = c.id ORDER BY p.id DESC LIMIT ?, ?;";
            if($result = $this->db->query($sql, array(intVal($offset), intVal($limit)))){
                return $result->result();
            }
            return false;
            
            /* $this->db->order_by('id', 'desc');
            $this->db->limit($limit, $offset);
            $query = $this->db->get('productos');
            return $query->result() */;
        }
    }   

?>