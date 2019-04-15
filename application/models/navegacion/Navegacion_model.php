<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Navegacion_model extends CI_Model {

	
	public function Nav($perfil){

		$resultados = $this->db->query("CALL SPU_NAVEGACION_PORPERFIL('".$perfil."')");  
		$this->db->free_db_resource();
		return $resultados->result();
	}
	public function NavPorId($id){

		$resultados = $this->db->query("CALL SPU_NAVEGACION_PORID(".$id.")");  
		$this->db->free_db_resource();
		return $resultados->result();
	}
}
