<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Citaenviada extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Citas_model");
	}

	
	public function index()
	{
		/*$data  = array(
			'categorias' => $this->Categorias_model->getCategorias(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/categorias/list",$data);*/
		$this->load->view("layouts/encabezado");
        $this->load->view("mensajes/citaenproceso");
        $this->load->view("layouts/menugrande");
	}

	
}
