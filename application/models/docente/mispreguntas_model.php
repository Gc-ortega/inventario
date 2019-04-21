<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MisPreguntas_model extends CI_Model {

	
	public function OpcionGuardar($enunciado ){

		$resultados = $this->db->query("CALL SPU_OPCION_GUARDAR('".$enunciado ."')");  
		$this->db->free_db_resource();
		return $resultados->result();
	}
	public function PreguntaGuardar($enuncioado,$temporizador,$ureg,$publico){
		$resultados = $this->db->query("CALL SPU_PREGUNTA_GUARDAR('".$enuncioado."',".$temporizador.",'".$ureg."','".$publico."')");  
		$this->db->free_db_resource();
		return $resultados->result();
	}
	public function AlternativasGuardar($pregunta,$opcion,$flag){
		$resultados = $this->db->query("CALL SPU_ALTERNATIVA_GUARDAR(".$pregunta.",".$opcion.",'".$flag."')");  
		$this->db->free_db_resource();
		$FilasAfectadas = $this->db->affected_rows();
	
		if($FilasAfectadas == 1) {
			return true;
		}else{
			return false;
		}
	}
	public function PruebaGuardar($nombre,$descripcion,$asignatura,$imagen,$publico,$ureg){
		$resultados = $this->db->query("CALL SPU_PRUEBA_GUARDAR('".$nombre."','".$descripcion."',".$asignatura.",'".$imagen."','".$publico."','".$ureg."')");  
		$this->db->free_db_resource();
		return $resultados->result();
	}
	public function CuestionarioGuardar($pregunta,$prueba,$coleccion){
		$resultados = $this->db->query("CALL SPU_CUESTIONARIO_GUARDAR(".$pregunta.",".$prueba.",".$coleccion.")");
		$this->db->free_db_resource();
		$FilasAfectadas = $this->db->affected_rows();
	
		if($FilasAfectadas == 1) {
				return true;
		}else{
			return false;
		}
	}
	public function Alternativas(){

		$resultados = $this->db->query("CALL SPU_ALTERNATIVAS_4ULTIMOS()");  
		$this->db->free_db_resource();
		return $resultados->result();
	}
	public function Respuesta($id){

		$resultados = $this->db->query("CALL SPU_ALTERNATIVAS_RESPUESTA(".$id.")");  
		$this->db->free_db_resource();
	}

	public function PruebasListarPorUsu($usu){

		$resultados = $this->db->query("CALL SPU_PRUEBAS_LISTAR_PORUSU(".$usu.")");  
		$this->db->free_db_resource();
		return $resultados->result();
	}	
	/*
	public function GuardarPrueba($nombre,$descripcion,$imagen,$activo,$uregistro){

		$resultados = $this->db->query("CALL SPU_MEME_GUARDAR('".$nombre."','".$descripcion."','aun no','".$activo."',".$uregistro.")");  
		$this->db->free_db_resource();
		$FilasAfectadas = $this->db->affected_rows();
	
		if($FilasAfectadas == 1) {
				return true;
		  }else{
				return false;
		  }
	}*/
}
