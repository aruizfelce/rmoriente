<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presupuestos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Presupuestos_model");
	}

	
	public function index()
	{
		/*$data  = array(
			'categorias' => $this->Categorias_model->getCategorias(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/categorias/list",$data);
		$this->load->view("layouts/footer");*/
        $this->load->view("layouts/encabezado");
        $this->load->view("admin/presupuestos/add");
        $this->load->view("layouts/menugrande");
       
	}

	public function add(){

		/*$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/categorias/add");
		$this->load->view("layouts/footer");*/
        $this->load->view("admin/presupuestos/add");
	}
    
    public function store(){
		$cedula = $this->input->post("cedula");
        $nombre = $this->input->post("nombre");
		

		$data  = array(
			'cedula' => $cedula, 
            'nombre' => $nombre 
			
		);
      
	if ($this->Citas_model->save($data)) {
			/*redirect(base_url()."solicitar/citas");*/
            redirect(base_url()."solicitar/presupuestoenviado");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."solicitar/presupuestos/add");
		}
	}

	public function edit($id){
		$data  = array(
			'categoria' => $this->Categorias_model->getCategoria($id), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/presupuestos/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$idCategoria = $this->input->post("idCategoria");
		$nombre = $this->input->post("nombre");
		$descripcion = $this->input->post("descripcion");
        

		$data = array(
			'nombre' => $nombre, 
			'descripcion' => $descripcion,
		);

		if ($this->Categorias_model->update($idCategoria,$data)) {
			redirect(base_url()."mantenimiento/categorias");
		}
		else{
			$this->session->set_flashdata("error","No se pudo actualizar la informacion");
			redirect(base_url()."mantenimiento/categorias/edit/".$idCategoria);
		}
	}

	public function view($id){
		$data  = array(
			'categoria' => $this->Categorias_model->getCategoria($id), 
		);
		$this->load->view("admin/categorias/view",$data);
	}

	public function delete($id){
		$data  = array(
			'estado' => "0", 
		);
		$this->Categorias_model->update($id,$data);
		echo "mantenimiento/categorias";
	}
}
