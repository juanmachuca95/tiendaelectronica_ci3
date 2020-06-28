<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Producto');
		$this->load->model('Autorizacion');
		$this->load->model('Pedido');
		$this->load->model('Usuario');
		$this->load->library(array('session', 'pagination'));
	}

	public function index(){
		
		if($this->session->userdata('is_logged')){
			$data = $this->getTemplate();
			$this->load->view('admin',$data);
		}else{
			return show_404();
		}
	}

	public function getTemplate(){
		$data = array(
			'html' => $this->load->view('layout/html','', TRUE),
			'head' => $this->load->view('layout/head','',TRUE),			
		);	
		return $data;	
	}

	//Cargador de la vista crear productos
	function cargar_producto(){
		//echo "metodo cargar producto";
		$data = $this->getTemplate();
		$data['form'] = $this->load->view('forms/form_carga','',true);
		$this->load->view('admin/crearProducto',$data);	
	}

	//vista para editar productos
	function editar_producto($offset = 0){
		$productos = $this->Producto->getProductos();

		$config['base_url'] = base_url('admin/editar_producto/');
		$config['total_rows'] = count($productos);
		$config['per_page'] = 6;

		//Estilos
		$config['full_tag_open'] 	= '<div class="pagging text-center"><nav><ul class="pagination m-0 px-1 pb-4">';
		$config['full_tag_close'] 	= '</ul></nav></div>';
		$config['num_tag_open'] 	= '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']	= '</span></li>';
		$config['cur_tag_open']		= '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']	= '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']	= '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']	= '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']	= '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span></li>'; 
		$config['first_tag_open']	= '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close']	= '</span></li>';
		$config['last_tag_open']	= '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close'] = '</span></li>';
		$this->pagination->initialize($config);

		$lista = $this->Producto->getPaginacion($config['per_page'], $offset);
		$data = $this->getTemplate();
		$data['listaGeneral'] = $lista;
		$this->load->view('admin/editarProducto',$data);
	}

	//cargador de la vista Pedidos.
	function pedidos($page = 1){
		if($admin = $this->session->userdata('is_logged')){
			$page--;
			if($page < 0){
				$page = 0;
			}
			$page_size = 2;
			$offset = $page * $page_size;
			$data = $this->getTemplate();
			$data['todos_los_pedidos'] = $this->Pedido->getPedidosInfoAdmin($page_size, $offset);
			$data['current_page'] 		= $page;
			$data['last_page'] 			= ceil($this->Pedido->getCantidadPedidos() / $page_size );
			$data['cantidad_pedidos'] 	= $this->Pedido->getCantidadPedidos();
			$data['entregados']			= $this->Pedido->getCantidadPedidosEntregados();
			$this->load->view('pedidos', $data);
		}else{
			show_404();
		}
	}

	//cargador de la vista Usuarios.
	function usuarios(){
		if( $this->session->userdata('is_logged')){
			$data = $this->getTemplate();
			$data['todos_los_usuarios'] = $this->Usuario->getClientes();
			$data['cant_usuarios']		= count($data['todos_los_usuarios']);
			$this->load->view('usuarios',$data);
		}else{
			show_404();
		}	
	}

	//Funcion de carga del producto. 
	public function cargar(){
		$this->load->library('upload');
		$config['upload_path'] = 'assets/img/productos/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = '10024';
		$config['max_width']  = '6000';
		$config['max_height']  = '6000';
		// Inicializa la configuración para el archivo 
		$this->upload->initialize($config);
		
		if(isset($_FILES['img'])){
			if ($this->upload->do_upload('img')){
				// Mueve archivo a la carpeta indicada en la variable $data
				$data = $this->upload->data();
				// Path donde guarda el archivo..
				$url ="assets/img/productos/".$_FILES['img']['name'];
				// Array de datos para insertar en productos
				$data = array(
					'categoria' 	=> $this->input->post('categoria',true),
					'stock' 		=> $this->input->post('stock', true),
					'descripcion'	=> $this->input->post('descripcion',true),
					'precio'		=> $this->input->post('precio',true),
					'imagen'		=> $url,
					'boton_compra'  => $this->input->post('info_boton',true),
				);
				if($this->Producto->cargar($data)){//Estoy llamando al mi model.
					$msj = "El producto se creo Correctamente";
					$this->session->set_flashdata('msj',$msj);
					$this->cargar_producto();
				}else{
					$msj = "No fue posible cargar el producto";
					$this->session->set_flashdata('msj',$msj);
					$this->cargar_producto();
				}
			}
		}
	}

	//Nuevo forma de actualizar registro desde la tabla.. 
	function editRegistro(){
		if(isset($_POST['codigo'])){
			$codigo 		= $_POST['codigo'];
			$categoria		= $_POST['categoria'];
			$descripcion	= $_POST['descripcion'];
			$cantidad		= $_POST['stock'];
			$precio			= $_POST['precio'];

			$data = array(
				'categoria' 	=> $categoria,
				'descripcion' 	=> $descripcion,
				'stock' 		=> $cantidad,
				'precio' 		=> $precio,
			);
			if(isset($_FILES['file'])){
				$this->load->library('upload');
				$config['upload_path'] = 'assets/img/productos/';
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['max_size'] = '10024';
				$config['max_width']  = '6000;';
				$config['max_height']  = '6000';
				$this->upload->initialize($config);
				if ($this->upload->do_upload('file')){
					$url ="assets/img/productos/".$_FILES['file']['name'];
					$data['imagen'] = $url;
					if($this->Producto->actualizar($data, $codigo)){
						echo true;
					}else{
						echo false;
					}
				}
			}else{
				if($this->Producto->actualizar($data, $codigo)){
					echo true;
				}else{
					echo false;
				}
			}
		}
	}

	/*Eliminacion de un producto por codigo Id*/
	function eliminar($id = 0){
		if($this->Producto->eliminar($id)){
			$msj = "Se dio de baja producto id = $id";
			$this->session->set_flashdata('msj', $msj);
			$this->editar_producto();
		}else{
			$msj = "No fue posible dar de baja producto id = $id. Intentalo nuevamente mas tarde.";
			$this->session->set_flashdata('msj', $msj);
			$this->editar_producto();
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
				$data['todos_los_pedidos'] = $this->Pedido->getPedidosInfoAdmin(2, 0);
				$data['current_page'] = 1;
				$data['last_page'] = ceil($this->Pedido->getCantidadPedidos() / 2);
				$data['cantidad_pedidos'] = $this->Pedido->getCantidadPedidos();
				$this->load->view('pedidos', $data);
			}else{
				$data = $this->getTemplate();
				$data['mensaje'] = "¡No se elimino el pedido correctamente!.";
				
				$data['todos_los_pedidos'] = $this->Pedido->getPedidosInfoAdmin(2, 0);
				$data['current_page'] = 1;
				$data['last_page'] = ceil($this->Pedido->getCantidadPedidos() / 2);
				$data['cantidad_pedidos'] = $this->Pedido->getCantidadPedidos();
				$this->load->view('pedidos', $data);
			}
		}else{
			show_404();
		}
	}
	
	public function confirmarPedido($id){

		if($admin = $this->session->userdata('is_logged')){
			$pedidoYaConfirmado = $this->Pedido->getConfirmado();
			if($items = $this->Pedido->getDescripcionPedido($id) && $pedidoYaConfirmado == false){
				//print_r($items);
				//echo "<br>";
				$datos = unserialize($items->items);
				//echo "<br>";
				//print_r($datos);
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
					$data['todos_los_pedidos'] = $this->Pedido->getPedidosInfoAdmin(2, 0);
					$data['current_page'] = 1;
					$data['last_page'] = ceil($this->Pedido->getCantidadPedidos() / 2);
					$data['cantidad_pedidos'] = $this->Pedido->getCantidadPedidos();
					$this->load->view('pedidos', $data);
					//echo $faltante[0]." ".count($faltante);
				}else{
					//todo ok, confirmar el envio. 
					if($this->Producto->actualizarProductosVendidos($datos)){
						$this->Pedido->confirmarEnvio($id);
						$data = $this->getTemplate();
						$data['mensaje'] = "El Pedido codigo $id : ¡El pedido se autorizo a Envio correctamente &#x1f389;!.";
						$data['todos_los_pedidos'] = $this->Pedido->getPedidosInfoAdmin(2, 0);
						$data['current_page'] = 1;
						$data['last_page'] = ceil($this->Pedido->getCantidadPedidos() / 2);
						$data['cantidad_pedidos'] = $this->Pedido->getCantidadPedidos();
						$this->load->view('pedidos', $data);
					}else{
						$data = $this->getTemplate();
						$data['mensaje'] = "¡Error en el metodo final de confirmacion de envio!.";
						$data['todos_los_pedidos'] = $this->Pedido->getPedidosInfoAdmin(2, 0);
						$data['current_page'] = 1;
						$data['last_page'] = ceil($this->Pedido->getCantidadPedidos() / 2);
						$data['cantidad_pedidos'] = $this->Pedido->getCantidadPedidos();
						$this->load->view('pedidos', $data);
					}	
				}
			}else{
				$msj = "El pedido ya ha sido confirmado";
				$this->session->set_flashdata('msj',$msj);
				$this->pedidos();
			}
		}else{
			show_404();
		}
	}


	public function eliminarUsuario($id = 0){
		if($this->Usuario->eliminarUsuario($id)){
			$mensaje = "<p class='bg-success text-white font-weight-normal p-4'>Se elimino correctamente el usuario $id </p>";
			$this->session->set_flashdata('msj', $mensaje); 
			$this->usuarios();
		}else{
			$mensaje = "<p class='bg-danger text-white font-weight-normal p-4'>El usuario id : '$id' tiene pedidos pendientes, no se puede eliminar por el momento.</p>";
			$this->session->set_flashdata('msj', $mensaje); 
			$this->usuarios();
		}
	}
}
