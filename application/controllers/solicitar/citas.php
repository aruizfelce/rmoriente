<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Citas extends CI_Controller {

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
		$this->load->view("admin/categorias/list",$data);
		$this->load->view("layouts/footer");*/
        $this->load->view("layouts/encabezado");
        $this->load->view("admin/citas/add");
        $this->load->view("layouts/menugrande");
   
	}
    
    

	public function add(){

		/*$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/categorias/add");
		$this->load->view("layouts/footer");*/
        $this->load->view("admin/citas/add");
	}
    
    public function store(){
		$cedula = $this->input->post("cedula");
        $nombre = $this->input->post("nombre");
        $telefono = $this->input->post("telefono");
        $email = $this->input->post("email");
        $edad = $this->input->post("edad");
        $peso = $this->input->post("peso");
        
        $diacita = $this->input->post("diacita");
        $date = date_create($diacita);
        
        $turno = $this->input->post("turno");
        $informe = $this->input->post("informe");
        $informeimagen = "";
        
        $nombre_imagen = $cedula . "-" . rand(0, 1000) . "-" . $_FILES['archivo']['name'];
	    $tipo_imagen = $_FILES['archivo']['type'];
	    $tamano_imagen = $_FILES['archivo']['size'];
        
        if($tamano_imagen<=1000000){
            if($tipo_imagen=="image/jpeg" || $tipo_imagen=="image/png" || $tipo_imagen=="image/gif")
            {	
                $carpeta_destino = "uploads/";
                move_uploaded_file($_FILES['archivo']['tmp_name'], $carpeta_destino.$nombre_imagen);
                $informeimagen = $nombre_imagen;
            } else
                echo "Solo debe seleccionar imagenes";
        }else
            echo "El tamaño es muy grande";
		

		$data  = array(
			'cedula' => $cedula, 
            'nombre' => $nombre, 
            'telefono' => $telefono, 
            'email' => $email, 
            'edad' => $edad, 
            'peso' => $peso, 
            'diacita' => date_format($date, 'Y-m-d'),
            'turno' => $turno, 
            'informe' => $informe, 
            'informeimagen' => $informeimagen
           
		);
        
	if ($this->Citas_model->save($data)) {
			/*redirect(base_url()."solicitar/citas");*/
            redirect(base_url()."solicitar/citaenviada");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."solicitar/citas/add");
		}
	}

         
	public function edit($id){
		$data  = array(
			'categoria' => $this->Categorias_model->getCategoria($id), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/categorias/edit",$data);
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