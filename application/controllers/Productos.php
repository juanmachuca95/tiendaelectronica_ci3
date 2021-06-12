<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* date_default_timezone_set('America/Argentina/Buenos_Aires');
 */
class Productos extends CI_Controller {

    private $view = "productos";

    public function __construct(){
        parent::__construct();
        $this->load->library(array(
            'template','session','pagination','configpagination',
            'form_validation', 'upload'
        ));
        $this->load->model('Autorizacion');
        $this->load->model('Producto');
        $this->load->model('Categoria');
        $this->perPage = 6;
    }

    public function index( $offset = 0 ){
        $status = ($this->session->is_logged) ? true : false;
		if(!$status){ return show_404(); }

        /** Pagination */
        $config = $this->configpagination->config(
            base_url('productos/index'), 
            count($this->Producto->getProductos()), 
            $this->perPage
        );

		$this->pagination->initialize($config);
        return $this->template->load('dashboard', $this->view.'/index', [
            'title' => 'Productos',
            'productos' => $this->Producto->get_pagination($config['per_page'], $offset)
        ]);
    }

    public function create(){
        $status = ($this->session->is_logged) ? true : false;
		if(!$status){ return show_404(); }

        return $this->template->load('dashboard', $this->view.'/create', [
            'title' => 'Productos',
            'categorias' => $this->Categoria->get_categorias()
        ]);
    }

    public function store(){
        $status = ($this->session->is_logged) ? true : false;
		if(!$status){ return show_404(); }

        $this->form_validation->set_rules('producto', 'Producto', 
            'required|max_length[255]'
        );
        $this->form_validation->set_rules('descripcion', 'Descripción', 
            'required|max_length[255]'
        );
        $this->form_validation->set_rules('categorias_id', 'Categoria', 
            'required'
        );
        $this->form_validation->set_rules('precio', 'Precio',
             'required|numeric');
        $this->form_validation->set_rules('stock', 'Stock', 'required|integer|min_length[0]');

        if (empty($_FILES['imagen']['name'])){
            $this->form_validation->set_rules('imagen', 'Imagen', 'required');
        }
       
        if (!$this->form_validation->run()){
            return $this->template->load('dashboard', $this->view.'/create', [
                'title' => 'Productos'
            ]);
        }

        $config['upload_path']          = 'assets/productos/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 800;
        $config['max_width']            = 1920;
        $config['max_height']           = 1720;
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('imagen')){
            $error = $this->upload->display_errors();
            return $this->template->load('dashboard', $this->view.'/create', [
                'title' => 'Productos',
                'error_image' => $error
            ]);
        }

        $img = $this->upload->data('file_name');
        $file_path = base_url('assets/productos/').$img;
        //echo '<a href="'.$file_path.'">imagen</a>'; // Funciona
        $activo = ($this->input->post('activo')) ? true : false;
        $data = [
            'producto' => $this->input->post('producto'),
            'categorias_id' => $this->input->post('categorias_id'),
            'descripcion' => $this->input->post('descripcion'),
            'precio'    => $this->input->post('precio'),
            'stock'     => $this->input->post('stock'),
            'imagen'    => $file_path,
            'activo'    => $activo
        ];
        if(!$this->Producto->create($data)){
            $this->session->set_flashdata('error', 'Ha ocurrido un error inesperado');
            return $this->template->load('dashboard', $this->view.'/create', ['title' => 'Productos']);
        }

        $this->session->set_flashdata('success', 'Se ha registrado un nuevo producto.');
        return redirect('productos');
    }

    public function edit($id){
        $status = ($this->session->is_logged) ? true : false;
		if(!$status){ return show_404(); }

        return $this->template->load('dashboard', $this->view.'/edit', [
            'title'     => 'Productos',
            'producto'  => $this->Producto->find($id),
            'categorias' => $this->Categoria->get_categorias()
        ]);
    }

    public function update($id){
        $status = ($this->session->is_logged) ? true : false;
		if(!$status){ return show_404(); }
    
        $this->form_validation->set_rules('producto', 'Producto', 
            'required|max_length[255]'
        );
        $this->form_validation->set_rules('descripcion', 'Descripción', 
            'required|max_length[255]'
        );
        $this->form_validation->set_rules('precio', 'Precio',
            'required|numeric');
        
        $this->form_validation->set_rules('stock', 'Stock', 'required|integer|min_length[0]');

    
        if (!$this->form_validation->run()){
            return $this->edit($id);
        }

        $data = [];
        $producto = $this->Producto->find($id);
        $activo = ($this->input->post('activo')) ? true : false;
        $data = [
            'producto' => $this->input->post('producto'),
            'categorias_id' => $this->input->post('categorias_id'),
            'descripcion' => $this->input->post('descripcion'),
            'stock' => $this->input->post('stock'),
            'precio'    => $this->input->post('precio'),
            'activo'    => $activo,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if (!empty($_FILES['imagen']['name'])){
            $config['upload_path']          = 'assets/productos/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 800;
            $config['max_width']            = 1920;
            $config['max_height']           = 1720;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('imagen')){
                $error = $this->upload->display_errors();
                return $this->template->load('dashboard', $this->view.'/edit', [
                    'title' => 'Productos',
                    'error_image' => $error
                ]);
            }

            $img = $this->upload->data('file_name');
            $file_path = base_url('assets/productos/').$img;
            $data['imagen'] = $file_path;
            $imagen_old = str_replace(base_url(), "", $producto->imagen);
            unlink($imagen_old);
        }
        
        if(!$this->Producto->update($id, $data)){
            $this->session->set_flashdata('error', 'Ha ocurrido un error inesperado');
            return $this->template->load('dashboard', $this->view.'/edit', ['title' => 'Productos']);
        }

        $this->session->set_flashdata('success', 'Se ha actualizado un producto.');
        return redirect('productos');
    }

    public function destroy($id){
        $status = ($this->session->is_logged) ? true : false;
		if(!$status){ return show_404(); }

        $producto = $this->Producto->find($id);
        if(!$this->Producto->delete($id)){
            $this->session->set_flashdata('error', 'Ha ocurrido un error inesperado');
            return $this->template->load('dashboard', $this->view.'/index', ['title' => 'Productos']); 
        }
        $url_imagen = $producto->imagen;
        $imagen_old = str_replace(base_url(), "", $url_imagen);
        unlink($imagen_old);
        $this->session->set_flashdata('success', 'Se ha eliminado un producto.');
        return redirect('productos');
    }

    public function show($id){
        $status = ($this->session->is_logged) ? true : false;
		if(!$status){ return show_404(); }

        return $this->template->load('dashboard', $this->view.'/show', ['title' => 'Productos', 'producto' => $this->Producto->find($id)]);
    }

    public function active($id, $active){
        $status = ($this->session->is_logged) ? true : false;
		if(!$status){ return show_404(); }
        
        $active = ($active == 0) ? true : false;
        $this->Producto->active($id, $active);
        redirect('productos');
    }

    public function catalogo( $offset = 0 ){
        /** Pagination */
        $config = $this->configpagination->config(
            base_url('catalogo'), 
            count($this->Producto->getProductos()), 
            $this->perPage
        );
		$this->pagination->initialize($config);
        return $this->template->load('app', $this->view.'/catalogo', [
            'productos' => $this->Producto->get_pagination($config['per_page'], $offset)
        ]);
    }

    public function detalle($id){
        return $this->template->load('app', $this->view.'/detalle', ['producto' => $this->Producto->find($id)]);
    }

    public function finder(){
        $this->form_validation->set_rules('producto', 'Producto', 
            'required|max_length[255]'
        );
        $this->form_validation->set_rules('categorias_id', 'Categoria',
        'required');

        if($this->form_validation->run() == FALSE)
        {
            return $this->catalogo();
        }

        $categorias_id = $this->input->post('categorias_id');
        $producto = $this->input->post('producto');
        $productos = $this->Producto->finder($categorias_id, $producto);
        
        return $this->template->load('app', $this->view.'/catalogo', [
            'productos' =>  $productos = $this->Producto->finder($categorias_id, $producto),
            'resultados' => 'Hay '.count($productos).' resultados para '.$producto 
        ]);
    }
}