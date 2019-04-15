<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	public function __construct(){
        parent::__construct();
        if (!$this->session->userdata("login")) {
            redirect(base_url());
        }
        $this->load->model("navegacion/Navegacion_model");
    }

	public function index()
	{
		$nav = array();$subnav = array();
		$res=$this->Navegacion_model->Nav($this->session->userdata("id_perf"));
		foreach ($res as $item) {
			$rsub=$this->Navegacion_model->NavPorId($item->id_nav);
			if (count($rsub)!=0) {
				foreach ($rsub as $sub) {
					array_push($subnav, [ "Nombre" => $sub->nomb_nav, "Url" =>base_url()."docente/".$sub->url_nav] );
				}
				array_push($nav, [ "Nombre" => $item->nomb_nav, "Url" =>$subnav]  );
				$subnav = array();
			}else{
				array_push($nav, [ "Nombre" => $item->nomb_nav, "Url" =>base_url()."docente/".$item->url_nav]  );
			}
		}
		$lista  = array('Nav' => $nav);

		$this->load->view('layouts/head');
		$this->load->view('docente/navegacion/header');
		$this->load->view('docente/navegacion/sidebar',$lista);
		$this->load->view('docente/index');
		$this->load->view('layouts/footer');
	}

}
