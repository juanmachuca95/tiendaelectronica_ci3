<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* date_default_timezone_set('America/Argentina/Buenos_Aires');
 */
class Comercios extends CI_Controller {

    private $view = "comercios";
    private $comercio;

    public function __construct(){
        parent::__construct();
        $this->load->library(array(
            'template','session','pagination','configpagination',
            'form_validation', 'upload'
        ));
        $this->load->model('Producto');
        $this->load->model('Comercio');
        $this->comercio = $this->Comercio->find(1);
        $this->perPage = 6;
    }

    public function index($offset = 0){
        $status = ($this->session->is_logged) ? true : false;
		if(!$status){ return show_404(); }

        /** Pagination */
        $config = $this->configpagination->config(
            base_url('productos/index'), 
            count($this->Comercio->get_comercios()), 
            $this->perPage
        );

		$this->pagination->initialize($config);
        return $this->template->load('dashboard', $this->view.'/index', [
            'title' => 'Comercios',
            'comercios' => $this->Comercio->get_pagination($config['per_page'], $offset)
        ]);
    }

    public function edit($id){
        $status = ($this->session->is_logged) ? true : false;
        if(!$status){ return show_404(); }

        return $this->template->load('dashboard', $this->view.'/edit', [
            'title' => 'Comercios',
            'comercio' => $this->Comercio->find($id),
        ]);
    }

    public function update($id){
        $status = ($this->session->is_logged) ? true : false;
        if(!$status){ return show_404(); }

        $this->form_validation->set_rules('comercio', 'Comercio', 'required|max_length[100]');
        $this->form_validation->set_rules('descripcion', 'Descripción','required|max_length[255]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('direccion', 'Dirección','required|max_length[255]');
        $this->form_validation->set_rules('telefono', 'Telefóno', 'required|max_length[25]');
        $this->form_validation->set_rules('mercadopago_key', 'MecadoPago', 'max_length[255]');

    
        if (!$this->form_validation->run()){
            return $this->edit($id);
        }

        $data = [];
        $data = [
            'comercio' => $this->input->post('comercio'),
            'direccion' => $this->input->post('direccion'),
            'descripcion' => $this->input->post('descripcion'),
            'telefono' => $this->input->post('telefono'),
            'email' => $this->input->post('email'),
            'mercadopago_key'    => $this->input->post('mercadopago_key'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if (!empty($_FILES['imagen']['name'])){
            $config['upload_path']          = 'assets/img/logos/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 800;
            $config['max_width']            = 6000;
            $config['max_height']           = 6000;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('imagen')){
                echo "<pre>";
                print_r($this->upload->display_errors());
                return false;
            }

            $img = $this->upload->data('file_name');
            $file_path = base_url('assets/img/logos/').$img;
            $data['imagen'] = $file_path;
            $imagen_old = str_replace(base_url('/'), "", $this->comercio->imagen);
            unlink($imagen_old);
        }
        
        if(!$this->Comercio->update($id, $data)){
            $this->session->set_flashdata('error', 'Ha ocurrido un error inesperado');
            return $this->template->load('dashboard', $this->view.'/edit', ['title' => 'Comercios']);
        }

        $this->session->set_flashdata('success', 'Se ha actualizado los datos de comercio.');
        return redirect('comercios');

    }
}
