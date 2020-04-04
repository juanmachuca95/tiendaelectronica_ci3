<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Producto');
        $this->load->model('Pedido');
    } 

    public function index(){
        //si no hay pedidos en lista confirmados.
        $data = $this->getTemplate();
        $this->load->view('cliente', $data);
    }

    public function getTemplate(){ 
        //si el usuario cargo items.. habra que mostrar

		$data = array (
			'html' => $this->load->view('layout/html','', TRUE ),
			'head' => $this->load->view('layout/head','',TRUE ),
            'nav' => $this->load->view('layout/nav','', TRUE ),	
            'nav_cliente' => $this->load->view('layout/nav_cliente','', true),
            'footer' => $this->load->view('layout/footer','', TRUE ),	
		);
		return $data;	
    }


    //Agrego los id de productos al carrito de compra
    public function items($id = 0){
        //prever que el admin no pueda, ni el que no esta registrado puedan hacer Pedidos

        if(true == $this->session->userdata('is_logged_user')){

            //var_dump($id) devuelve el string con el codigo;
            $items = $this->session->userdata('items');
            $items[] = $id;
            //var_dump($items);
            $datos = array_count_values($items);
            //echo $datos[$id];

            if($this->Producto->stockProducto($id, $datos[$id] ) ){
                $this->session->set_userdata('items', $items);//Recargo el la variable de session
                $mensaje ="Items cargados al carrito &#x1f6d2;";
                $data = $this->getTemplate();
                $data['mensaje'] = $mensaje;
                $data['lista'] = $this->Producto->getProductos();
                $this->load->view('galeria', $data);
                
            }else{
                $error = "No es posible cargarlo, debido al faltante de stock";
                $data = $this->getTemplate();
                $data['mensaje'] = $error;
                $data['lista'] = $this->Producto->getProductos();
                $this->load->view('galeria', $data);
                
            }
            
             
        }else if(true == $this->session->userdata('is_logged')){
            //es el admin
            $mensaje ="El administrador no puede realizar Pedidos.";

            $data = $this->getTemplate();
            $data['mensaje'] = $mensaje;
            $this->load->view('galeria',$data);
        }else{
            $error = "Debes iniciar sesion para hacer Pedidos.";
            $data = $this->getTemplate();
            $data['mensaje'] = $error;
            $data['lista'] = $this->Producto->getProductos();
            $this->load->view('login', $data);
        }
        
    }


    public function listaDeItems(){
        $data = $this->session->userdata('items');
        if($data){
            $resultado = $this->Producto->productosPedidos($data);
            if($resultado){
                return $resultado;
            }else{
                return false;
            }
        }
    }

    public function eliminarItem($id){
        $items = $this->session->userdata('items');
        //var_dump($items);
        //echo $items[0]." ".$items[1]." "$items[2];
        $items = array_diff($items, array($id));
        //echo count($items);
        $this->session->set_userdata('items', $items);
        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }

    public function cargarPedido(){
        
        $id_cliente = $this->session->userdata('id_cliente');
        /*
        resultado de var_dump($items); 
        array(4) { [0]=> string(2) "39" [1]=> string(2) "39" [2]=> string(2) "36" [3]=> string(2) "35" }
        var_dump($datos);
        array(3) { [39]=> int(2) [36]=> int(1) [35]=> int(1) }*/

        if($this->session->userdata('items') !== null){
            $items = $this->session->userdata('items');      
            $datos = array_count_values($items);
        }
        //Es la unica forma que encontre de guardar un arrat en la base de datos. 
        /*print_r( $guardo_los_items = serialize($datos));
        echo"<br>";
        print_r( unserialize($guardo_los_items) );
        */
        
        if(!empty($datos)  && $id_cliente){
            //serializo los datos del array
            $lista_de_items = serialize($datos);

            if($this->Pedido->cargarPedido($lista_de_items , $id_cliente) ){
                $this->session->set_userdata('items', null);
                $this->pedidosConfirmados();
            }else{
                $data = $this->getTemplate();
                $data['error'] = "No se ha podido confirmar el pedido";
            }
        }else{
            return false;
        }
    }



    public function cancelarPedido($id=0){

        $id_cliente = $this->session->userdata('id_cliente');
        if($this->Pedido->cancelarPedido($id_cliente, $id)){
            $this->pedidosConfirmados();
        }else{
            return false;
        }
    }

    //vista aqui el usuario tiene que el resumen de sus pedidos .. 
    public function carrito(){
        $data = $this->getTemplate();
        $data['listaPedidos'] = $this->listaDeItems();
        $this->load->view('carrito',$data);
    }

    public function pedidosConfirmados(){       
        $data = $this->getTemplate();
        $data['resumen'] = $this->Pedido->infoPedidos($this->session->userdata('id_cliente'));
        $this->load->view('pedidosConfirmados', $data);
        //echo "vista de pedidos confirmados";
    }

    public function mostrarItems($id = 0){

        if($info = $this->Pedido->getDescripcionPedido($id)){
            
            $info_preparada = unserialize($info->items);
            //var_dump($datos_items);

            $data = $this->getTemplate();
            $data['info_items'] = $info_preparada;
            $data['id_pedido'] = $id;
            $data['estado'] = $this->Pedido->getEstadoPedido($id); //true o false si esta confirmado el envio del pedido
            $data['productos'] = $this->Producto->getProductos();
            $data['resumen'] = $this->Pedido->infoPedidos($this->session->userdata('id_cliente'));
            $this->load->view('pedidosConfirmados', $data);
        }else{
            $data = $this->getTemplate();
            $data['resumen'] = $this->Pedido->infoPedidos($this->session->userdata('id_cliente'));
            $this->load->view('pedidosConfirmados', $data);
            echo "fallo al buscar datos";
        }
        
    }
}
?>