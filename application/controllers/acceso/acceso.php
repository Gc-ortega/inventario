<?php
class Acceso extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$this->load->model("acceso/Acceso_model");
    }

    public function index()
    {
            $cuenta = $this->input->post("cuenta");
	        $clave = $this->input->post("clave");

	      	       
			$res = $this->Acceso_model->acceso($cuenta, sha1($clave));

			if (!$res) {
				$this->session->set_flashdata("error",'<div class="callout callout-danger">El usuario y/o contraseña son incorrectos</div>');
				redirect(base_url());

				
			}
			else{
				
				$data  = array(
					'id_acc' => $res->id_acc,
					'cuen_acc' => $res->cuen_acc,
					'clav_acc' => $res->clav_acc,
					'id_perf' => $res->id_perf,
					'dni_pers' => $res->dni_pers,
					'nomb_pers' => $res->nomb_pers,
					'apat_pers' => $res->apat_pers,
					'amat_pers' => $res->amat_pers,
					'fnac_pers' => $res->fnac_pers,
					'emai_pers' => $res->emai_pers,
					'celu_pers' => $res->celu_pers,
					'fregistro' => $res->freg_pers,
					'login' => TRUE
				);

				$this->session->set_userdata($data);

				if ($res->id_perf==1) {
					redirect(base_url()."docente/Principal");
				}elseif ($res->id_perf==2) {
					redirect(base_url()."estudiante/Principal");
				}
				
			}
	}
	 public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}