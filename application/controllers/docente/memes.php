<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Memes extends CI_Controller {

	public function __construct(){
        parent::__construct();
        if (!$this->session->userdata("login")) {
            redirect(base_url());
        }
        $this->load->model("docente/Memes_model");
    }

	public function Agregar()
	{
		$this->load->view('layouts/head');
		$this->load->view('docente/navegacion/header');
		$this->load->view('docente/navegacion/sidebar');
		$this->load->view('docente/memes/agregar');
		$this->load->view('layouts/footer');
	}
	public function guardar()
	{
		$nombre = $this->input->post("nombre_meme");
	    $descripcion = $this->input->post("descripcion_meme");
	    $imagen = $this->input->post("imagen_meme");
	    $activo = $this->input->post("activo_meme");

	    $res = $this->Memes_model->guardar($nombre, $descripcion,$imagen, $activo,$this->session->userdata("id_acc"));

	    if ($res) {
	    	$this->session->set_flashdata('Mensaje','<div class="callout callout-info"><h4>Guardado con éxito</h4></div>');
	    	redirect(base_url()."docente/Memes/agregar");
	    }else{
	    	$this->session->set_flashdata('Mensaje','<div class="callout callout-warning"><h4>Error, datos no guardado</h4></div>');
	    	redirect(base_url()."docente/Memes/agregar");
	    }
			
	}
	public function Listar()
	{
		$lista  = array('memes' => $this->Memes_model->ListarPorIdAcc($this->session->userdata("id_acc")));
		$this->load->view('layouts/head');
		$this->load->view('docente/navegacion/header');
		$this->load->view('docente/navegacion/sidebar');
		$this->load->view('docente/memes/listar',$lista);
		$this->load->view('layouts/footer');
	}

}
