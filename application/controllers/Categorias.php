<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller{
    private $view = 'categorias';

    public function __construct(){
        parent::__construct();
        $this->load->library(array(
            'template','session','pagination','configpagination',
            'form_validation', 'upload', 'myformvalidation'
        ));
        $this->load->model('Autorizacion');
        $this->load->model('Categoria');
        $this->perPage = 6;
    }

    public function index( $offset = 0 ){
        $status = ($this->session->is_logged) ? true : false;
		if(!$status){ return show_404(); }

        /** Pagination */
        $config = $this->configpagination->config(
            base_url('categorias/index'), 
            count($this->Categoria->get_categorias()), 
            $this->perPage
        );

		$this->pagination->initialize($config);
        return $this->template->load('dashboard', $this->view.'/index', [
            'title' => 'Categorias',
            'categorias' => $this->Categoria->get_pagination($config['per_page'], $offset)
        ]);
    }

    public function create(){
        $status = ($this->session->is_logged) ? true : false;
		if(!$status){ return show_404(); }

        return $this->template->load('dashboard', $this->view.'/create', ['title' => 'Categorias']);
    }

    public function store(){
        $status = ($this->session->is_logged) ? true : false;
		if(!$status){ return show_404(); }

        $this->form_validation->set_rules('categoria', 'Categoria', 
            'required|max_length[255]|exist[categorias.id]'
        );
       
        if (!$this->form_validation->run()){
            return $this->template->load('dashboard', $this->view.'/create', [
                'title' => 'Categorias'
            ]);
        }

        if(!$this->Categoria->create([
            'categoria' => $this->input->post('categoria')
        ])){
            $this->session->set_flashdata('error', 'Ha ocurrido un error inesperado');
            return $this->template->load('dashboard', $this->view.'/create', ['title' => 'Categorias']);
        }

        $this->session->set_flashdata('success', 'Se ha registrado un nuevo producto.');
        return redirect('categorias');
    }

    public function edit($id){
        $status = ($this->session->is_logged) ? true : false;
		if(!$status){ return show_404(); }

        return $this->template->load('dashboard', $this->view.'/edit', [
            'title'     => 'Categorias',
            'categoria'  => $this->Categoria->find($id)
        ]);
    }

    public function update($id){
        $status = ($this->session->is_logged) ? true : false;
		if(!$status){ return show_404(); }

        $this->form_validation->set_rules('categoria', 'Categoria', 
            'required|max_length[255]'
        );

        if (!$this->form_validation->run()){
            return $this->template->load('dashboard', $this->view.'/edit', [
                'title' => 'Categorias'
            ]);
        }

        if(!$this->Categoria->update($id, [
            'categoria' => $this->input->post('categoria')
        ])){
            $this->session->set_flashdata('error', 'Ha ocurrido un error inesperado');
            return $this->template->load('dashboard', $this->view.'/edit', ['title' => 'Categorias']);
        }

        $this->session->set_flashdata('success', 'Se ha actualizado una categoria.');
        return redirect('categorias');
    }

    public function destroy($id){
        $status = ($this->session->is_logged) ? true : false;
		if(!$status){ return show_404(); }

        $categoria = $this->Categoria->find($id);
        if(!$this->Categoria->delete($id)){
            $this->session->set_flashdata('error', 'Ha ocurrido un error inesperado');
            return $this->template->load('dashboard', $this->view.'/index', ['title' => 'Categorias']); 
        }
        $this->session->set_flashdata('success', 'Se ha eliminado un producto.');
        return redirect('categorias');
    }


    public function search(){
        if($_GET['get'] == 'ok'){
            $categorias = $this->Categoria->get_categorias();
            echo json_encode($categorias);
        }
    }
}