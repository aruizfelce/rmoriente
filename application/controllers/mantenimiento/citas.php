<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Citas extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Citas_model");
	}

	
	public function index()
	{
		$data  = array(
			'citas' => $this->Citas_model->getCitas(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/citas/list",$data);
		$this->load->view("layouts/footer");
        /*$this->load->view("admin/citas/list");*/
	}

	public function add2(){

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/citas/add");
		$this->load->view("layouts/footer");
        
	}
    
    public function add(){

		/*$this->load->view("layouts/header");
		$this->load->view("layouts/aside");*/
		$this->load->view("admin/citas/add");
		/*$this->load->view("layouts/footer");*/
        
	}
    
    public function store(){
		$cedula = $this->input->post("cedula");
        $nombre = $this->input->post("nombre");
        $telefono = $this->input->post("telefono");
        $email = $this->input->post("email");
        $edad = $this->input->post("edad");
        $peso = $this->input->post("peso");
        $dia = $this->input->post("dia");
        $turno = $this->input->post("turno");
        $informe = $this->input->post("informe");
        
        $nombre_imagen = $_FILES['archivo']['name'];
	    $tipo_imagen = $_FILES['archivo']['type'];
	    $tamano_imagen = $_FILES['archivo']['size'];
        
        if($tamano_imagen<=1000000){
            if($tipo_imagen=="image/jpeg" || $tipo_imagen=="image/png" || $tipo_imagen=="image/gif")
            {	
                //Ruta de la carpeta destino en el servidor
                $carpeta_destino = $_SERVER["DOCUMENT_ROOT"] . "/uploads/";

                //Mover la imagen del directorio temporal al directorio escogido
                move_uploaded_file($_FILES['archivo']['tmp_name'], $carpeta_destino.$nombre_imagen);
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
            'diacita' => $dia,
            'turno' => $turno, 
            'informe' => $informe 
            
		);
      
	if ($this->Citas_model->save($data)) {
			redirect(base_url()."mantenimiento/citas");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."mantenimiento/citas/add");
		}
	}

	public function edit($id){
		$data  = array(
			'cita' => $this->Citas_model->getCita($id), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/citas/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$idCita = $this->input->post("idCita");
		$nombre = $this->input->post("nombre");
		$descripcion = $this->input->post("descripcion");

		$data = array(
			'nombre' => $nombre, 
			'descripcion' => $descripcion,
		);

		if ($this->Citas_model->update($idCita,$data)) {
			redirect(base_url()."mantenimiento/citas");
		}
		else{
			$this->session->set_flashdata("error","No se pudo actualizar la informacion");
			redirect(base_url()."mantenimiento/citas/edit/".$idCitas);
		}
	}

	public function view($id){
		$data  = array(
			'cita' => $this->Citas_model->getCita($id), 
		);
		$this->load->view("admin/citas/view",$data);
	}
    
  

	public function delete($id){
		$data  = array(
			'estado' => "0", 
		);
		$this->Citas_model->update($id,$data);
		echo "mantenimiento/citas";
	}
}
