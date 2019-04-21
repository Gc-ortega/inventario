<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Memes_model extends CI_Model {

	
	public function ListarPorIdAcc($id){

		$resultados = $this->db->query("CALL SPU_MEME_PORIDUREG('".$id."')");  
		$this->db->free_db_resource();
		return $resultados->result();
	}
	public function guardar($nombre,$descripcion,$imagen,$activo,$uregistro){

		$resultados = $this->db->query("CALL SPU_MEME_GUARDAR('".$nombre."','".$descripcion."','aun no','".$activo."',".$uregistro.")");  
		$this->db->free_db_resource();
		$FilasAfectadas = $this->db->affected_rows();
	
		if($FilasAfectadas == 1) {
				return true;
		  }else{
				return false;
		  }
	}
}
