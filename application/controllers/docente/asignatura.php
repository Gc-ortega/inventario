<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asignatura extends CI_Controller {

	public function __construct(){
        parent::__construct();
        if (!$this->session->userdata("login")) {
            redirect(base_url());
        }
        
    }

	public function index()
	{
		$this->load->view('layouts/head');
		$this->load->view('docente/navegacion/header');
		$this->load->view('docente/navegacion/sidebar');
		$this->load->view('docente/index');
		$this->load->view('layouts/footer');
	}

}
