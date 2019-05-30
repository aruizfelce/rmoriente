<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estudios extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
	}

	
	public function index()
	{
		$this->load->view("layouts/encabezado");
        $this->load->view("informacion/estudios");
        $this->load->view("layouts/menugrande");
        $this->load->view("layouts/footer");
	}

	
}