<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Citas_model extends CI_Model {

	public function getCitas(){
		$this->db->where("estado","0");
		$resultados = $this->db->get("citas");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("citas",$data);
	}
    
	public function getCita($id){
		$this->db->where("id",$id);
		$resultado = $this->db->get("citas");
		return $resultado->row();

	}

	public function update($id,$data){
		$this->db->where("id",$id);
		return $this->db->update("citas",$data);
	}
    
    function subir($titulo,$imagen)
    {
        $data = array(
            'titulo' => $titulo,
            'ruta' => $imagen
        );
        return $this->db->insert('imagenes', $data);
    }
}
