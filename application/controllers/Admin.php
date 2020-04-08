<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Producto');
		$this->load->model('Autorizacion');
		$this->load->model('Pedido');
		$this->load->model('Usuario');
		$this->load->library(array('session'));
		//$this->load->helper('MY_templates');
	}

	public function index(){
		$dato = $this->session->userdata('is_logged');
		if($dato){
			$data = $this->getTemplate();
			$this->load->view('admin',$data);
		}else{
			return show_404();
		}
	}

	public function getTemplate(){
		
		$data = array(
			'entregados' => $this->Pedido->getPedidosEnviados(),
			'clientes' => $this->Usuario->getClientes(),
			'html' => $this->load->view('layout/html','', TRUE),
			'head' => $this->load->view('layout/head','',TRUE),
			'nav_admin' =>$this->load->view('layout/nav_admin','',TRUE),
			//'lista' => $this->Producto->getProductos(),
			//'listaAmigurrumis' => $this->Producto->getProductosAmigurrumis(),
		);	
		return $data;	
	}

	public function form_carga(){
		if($dato = $this->session->userdata('is_logged')){
			$data = $this->getTemplate();
			$data['form_carga'] =  $this->load->view('forms/form_carga','',TRUE);
			$this->load->view('admin',$data);
		}else{
			show_404();
		}
	}

	public function cargar(){
		$this->load->library('upload');
		//Configuracion para el archivo img
		$config['upload_path'] = 'assets/img/productos/';
		$config['allowed_types'] = 'gif|jpg|JPEG|png';
		$config['max_size'] = '10024';
		$config['max_width']  = '6000';
		$config['max_height']  = '6000';

		// Inicializa la configuración para el archivo 
		$this->upload->initialize($config);
		//$boton = $this->input->post('info_boton',true);
		//echo $boton;
		
		if(isset($_FILES['img'])){
			if ($this->upload->do_upload('img'))
			{
				// Mueve archivo a la carpeta indicada en la variable $data
				$data = $this->upload->data();

				// Path donde guarda el archivo..
				$url ="assets/img/productos/".$_FILES['img']['name'];

				// Array de datos para insertar en productos
				$data = array(
					'categoria' 	=> $this->input->post('categoria',true),
					'descripcion'	=> $this->input->post('descripcion',true),
					'precio'		=> $this->input->post('precio',true),
					'imagen'		=> $url,
					'boton_compra'  => $this->input->post('info_boton',true),
				);
				if($this->Producto->cargar($data)){//Estoy llamando al mi model.
					echo '<p class=" font-weight-bold bg-primary text-center text-white">Carga exitosa</p>';
					$this->load->view('admin', $this->getTemplate());
				}else{
					echo '<p class="font-weight-bold bg-danger text-center text-white ">Error al cargar</p>';
					$this->load->view('admin', $this->getTemplate());
				}
			}else{
				echo '<p class="font-weight-bold bg-warning text-center text-white ">Error al cargar imagen, extensión incorrecto o excede el tamaño permitido que es de: 2MB</p>';
					$this->load->view('admin', $this->getTemplate());
			}
		}else{
			redirect('admin','refresh');
		}
	}


	public function tablasProducto(){
		if($dato = $this->session->userdata('is_logged')){
			$data = $this->getTemplate();
			$data['tablasProducto'] = $this->load->view('tablasProducto','',TRUE);
			$this->load->view('admin',$data);
		}else{
			show_404();
		}
	}

	public function ver_Categoria(){
		if($admin = $this->session->userdata('is_logged')){
			$categoria = $this->input->post('eleccion',TRUE);
			//echo $categoria;
			if($categoria == '0'){
				$error = "No elegiste ninguna lista";
				$data = $this->getTemplate();
				$data['error'] = $error;
				$this->load->view('tablasProducto',$data);
			}else if($categoria == 'Todos'){
				//echo $categoria;
				$datos = $this->Producto->getProductos();
				$data = $this->getTemplate();
				$data['listaGeneral'] = $datos;
				//tengo que la vista TablaProducto
				$data['elegir'] = $this->load->view('tablasProducto','',true);
				$this->load->view('tablaCategoria',$data);
			}else{
				if($datos = $this->Producto->getProductosCategoria($categoria)){
					$data = $this->getTemplate();
					$data['listaGeneral'] = $datos;
					//tengo que la vista TablaProducto
					$data['elegir'] = $this->load->view('tablasProducto','',true);
					$this->load->view('tablaCategoria',$data);
				}else{
					$error = "La categoria elegida no tiene registros en base de datos.";
					$data = $this->getTemplate();
					$data['error'] = $error;
					$this->load->view('tablasProducto',$data);
				}
			}
		}else{
			show_404();
		}
	}


	public function editar($id = 0){
		$registro = $this->Producto->getProducto($id);	
		$data = $this->getTemplate();
		$data['registro'] = $registro;
		$this->load->view('forms/form_actualizacion',$data);
	}

	public function update(){
		$id 			= $this->input->post('id', true);
		$categoria 		= $this->input->post('categoria', true);
		$descripcion 	= $this->input->post('descripcion',true);
		$cantidad		= $this->input->post('stock',true);
		$precio			= $this->input->post('precio',true);
		$boton_compra  = $this->input->post('info_boton',true);
		
		//echo $id." ".$categoria." ".$descripcion." ".$precio." ".$_FILES['img']['name'];
		//var_dump($_FILES['img']['name']);
		//si no se recibio imagen
		if( $_FILES['img']['name'] == '' ){
			//echo "<br>"."No llego imagen";
			$data = array(
				'categoria' => $categoria,
				'descripcion' => $descripcion,
				'stock' => $cantidad,
				'precio' => $precio,
				'boton_compra' => $boton_compra,
			);
			if($this->Producto->actualizar($data, $id)){
				$data = $this->getTemplate();
				$data['mensaje']= "actualizacion exitosa en producto id = $id";
				$this->load->view('admin', $data);
			}else{
				$data = $this->getTemplate();
				$data['error']= "Actualiacion SIN exito en producto id = $id";
				$this->load->view('admin', $data);
			}
		}else{
			//echo "<br>"."Llego imagen : ".$_FILES['img']['name'];
			//Hay que modificar la imagen
			$this->load->library('upload');
			//Configuracion para el archivo img
			$config['upload_path'] = 'assets/img/productos/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '10024';
			$config['max_width']  = '6000;';
			$config['max_height']  = '6000';

			// Inicializa la configuración para el archivo 
			$this->upload->initialize($config);

			if ($this->upload->do_upload('img')){
				//echo "<br>"."cargada la imagen en carpeta";
				// Mueve archivo a la carpeta indicada en la variable $data
				$data = $this->upload->data();
				// Path donde guarda el archivo..
				$url ="assets/img/productos/".$_FILES['img']['name'];
				// Array de datos para insertar en productos
				$data = array(
					'categoria' => $categoria,
					'descripcion' => $descripcion,
					'stock' => $cantidad,
					'precio' => $precio,
					'imagen' => $url,
					'boton_compra' => $boton_compra,
				);
				//mando al model actualizar con los datos e imagen
				if($this->Producto->actualizar($data, $id)){
					$data = $this->getTemplate();
					$data['mensaje']= "Actualizacion Exitosa en producto id = $id";
					$this->load->view('admin', $data);
				}else{
					$data = $this->getTemplate();
					$data['error']= "Actualiacion SIN exito en producto id = $id";
					$this->load->view('admin', $data);
				}
			}else{
				//echo "<br>"."No se cargo en la carpeta";
				$data = $this->getTemplate();
				$data['error'] = $this->upload->display_errors();
				$this->load->view('admin', $data);
			}
		}
	}
	
	public function eliminar($id = 0){
		//echo $id;
		if($this->Producto->eliminar($id)){
			$data = $this->getTemplate();
			$data['mensaje'] = "Se dio de baja producto id = $id";
			$this->load->view('admin',$data);
		}else{
			$data = $this->getTemplate();
			$data['error'] = "No es posible dar de baja producto id = $id";
			$this->load->view('admin',$data);
		}
	}

	public function categoria(){
		if($admin = $this->session->userdata('is_logged')){
			$datos = $this->Producto->getCategorias();
			$data = $this->getTemplate();
			$data['categorias'] = $datos;
			$this->load->view('categoria',$data);
			
		}else{
			show_404();
		}
	}

	public function crearCategoria(){

		$data = array(
			'categoria' => $this->input->post('categoria',true),
			'descripcion' => $this->input->post('descripcion', true),
		);

		if($this->Producto->crearCategoria($data)){
			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}else{
			$datos = $this->Producto->getCategorias();
			$data = $this->getTemplate();
			$data['categorias'] = $datos;
			$data['error'] = "Error al insertar, verifique su bd";
			$this->load->view('categoria',$data);
		}

	}

	public function info(){
		if($admin = $this->session->userdata('is_logged')){
			$data = $this->getTemplate();
			$data['datos'] = $this->datosAdmin();
			$this->load->view('info_admin',$data);
		}else{
			show_404();
		}
	}

	public function datosAdmin(){
		if($data = $this->Autorizacion->getDatosAdmin()){
			return $data;
		}else{
			return false;
		}
	}

	public function actualizarDatosAdmin(){
		$data = array(
			'id' => $this->input->post('id', true),

			'nombre_admin' => $this->input->post('nombre', true),
			'celular' => $this->input->post('celular', true),
			'email' => $this->input->post('email', true),
			'contraseña' => $this->input->post('password', true),
			
		);

		if($this->Autorizacion->actualizarInfoAdmin($data, $data['id'])){
			//echo "Se realizaron los cambios correctamente";
			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}else{
			//echo "Fallo al hacer los cambios correctamente";
			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}
	}

	
	public function pedidos(){
		if($admin = $this->session->userdata('is_logged')){
			$data = $this->getTemplate();
			$data['todos_los_pedidos'] = $this->Pedido->getPedidosInfoAdmin();
			$this->load->view('pedidos', $data);
		}else{
			show_404();
		}
	}

	public function detalle($id){
		if($admin = $this->session->userdata('is_logged')){
			if($info = $this->Pedido->getDescripcionPedido($id) ){
				$info_preparada = unserialize($info->items);

				$data = $this->getTemplate();
				$data['pedido'] = $id;
				$data['info_items'] = $info_preparada;
				$data['productos'] = $this->Producto->getProductos();
				$data['resumen'] = $this->Pedido->infoPedidos($this->session->userdata('id_cliente'));
				$this->load->view('pedidos', $data);
			}
		}else{
			show_404();
		}
	}

	public function eliminarPedido($id){
		if($admin = $this->session->userdata('is_logged')){
			if($this->Pedido->eliminarUnPedido($id)){
				$data = $this->getTemplate();
				$data['mensaje'] = "¡Se elimino el pedido correctamente!.";
				$data['todos_los_pedidos'] = $this->Pedido->getPedidosInfoAdmin();
				$this->load->view('pedidos', $data);
			}else{
				$data = $this->getTemplate();
				$data['mensaje'] = "¡No se elimino el pedido correctamente!.";
				$data['todos_los_pedidos'] = $this->Pedido->getPedidosInfoAdmin();
				$this->load->view('pedidos', $data);
			}
		}else{
			show_404();
		}
	}
	
	public function confirmarPedido($id){

		if($admin = $this->session->userdata('is_logged')){
			if($items = $this->Pedido->getDescripcionPedido($id)){

				//print_r($items);
				//echo "<br>";
				$datos = unserialize($items->items);
				//echo "<br>";
				//print_r($datos);
				
				//echo "<br>";
				//echo "<br>";
				//echo "Cantidad de Items: ".count($datos);
				//echo "<br>";echo "<br>";
				$faltante = array();
				$sin_respaldo = false;
				for($i = 0; $i < count($datos); $i++){
				$cantidad = $datos[key($datos)];
				//	echo  key($datos)." ".$cantidad;
					if($cant = $this->Producto->stockProducto(key($datos), $cantidad)){
				//		echo "Hay Stock ".var_dump($cant)." <br><br>";
					}else{
						$sin_respaldo = true;
						$faltante[] = key($datos);
				//		echo "No hay stock: ".var_dump($cant)."<br><br>";
					}
					next($datos);
				}
				if($sin_respaldo){
					$data = $this->getTemplate();
					$data['mensaje'] = "El Pedido codigo $id : No tiene stock suficiente para cubrir esta demanda.  &#x1f515;";
					$data['faltante'] = $faltante;
					$data['todos_los_pedidos'] = $this->Pedido->getPedidosInfoAdmin();
					
					$this->load->view('pedidos', $data);
					//echo $faltante[0]." ".count($faltante);
				}else{
					//todo ok, confirmar el envio. 
					if($this->Producto->actualizarProductosVendidos($datos)){
						$this->Pedido->confirmarEnvio($id);
						$data = $this->getTemplate();
						$data['mensaje'] = "El Pedido codigo $id : ¡El pedido se autorizo a Envio correctamente &#x1f389;!.";
						$data['todos_los_pedidos'] = $this->Pedido->getPedidosInfoAdmin();
						
						$this->load->view('pedidos', $data);
					}else{
						$data = $this->getTemplate();
						$data['mensaje'] = "¡Error en el metodo final de confirmacion de envio!.";
						$data['todos_los_pedidos'] = $this->Pedido->getPedidosInfoAdmin();
						
						$this->load->view('pedidos', $data);
					}
					
				}


			}
		}else{
			show_404();
		}
	}
}
