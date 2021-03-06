<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presupuestos_model extends CI_Model {

	public function getPresupuestos(){
		$this->db->where("estado","0");
		$resultados = $this->db->get("presupuestos");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("presupuestos",$data);
	}
    
	public function getPresupuesto($id){
		$this->db->where("id",$id);
		$resultado = $this->db->get("presupuestos");
		return $resultado->row();

	}

	public function update($id,$data){
		$this->db->where("id",$id);
		return $this->db->update("presupuestos",$data);
	}
}
