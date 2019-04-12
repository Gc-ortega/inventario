<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acceso_model extends CI_Model {

	
	public function acceso($cuenta, $clave){

		$resultados = $this->db->query("CALL SPU_ACCESO_INGRESAR('".$cuenta."','".$clave."')");  
		if ($resultados->num_rows() > 0){
			return $resultados->row();
		}
		else{
			return false;
		}
	}
}
