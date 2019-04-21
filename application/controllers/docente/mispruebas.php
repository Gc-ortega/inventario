<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MisPruebas extends CI_Controller {

	public function __construct(){
        parent::__construct();
        if (!$this->session->userdata("login")) {
            redirect(base_url());
        }
        $this->load->model("docente/MisPreguntas_model");
        $this->load->model("asignatura/Asignatura_model");
        $this->load->model("coleccion/Coleccion_model");
    }

	public function Agregar()
	{
		$res=$this->Asignatura_model->Listar();
		$res_c=$this->Coleccion_model->Listar();
		$asgi="";$cole="";
		foreach ($res as $item) {
			$asgi.='<option value="'.$item->id_asig.'">'.$item->nomb_asig.'</option>';
		}
		foreach ($res_c as $item_c) {
			$cole.='<option value="'.$item_c->id_cole.'">'.$item_c->nomb_cole.'</option>';
		}
		$lista  = array('Asignatura' => $asgi,
						'Coleccion' => $cole);
		$this->load->view('layouts/head');
		$this->load->view('docente/navegacion/header');
		$this->load->view('docente/navegacion/sidebar');
		$this->load->view('docente/mispruebas/agregar',$lista);
		$this->load->view('layouts/footer');
	}

	public function Listar()
	{
		
		/*$lista  = array('Pruebas' => $this->MisPreguntas_model->PruebasListarPorUsu($this->session->userdata("id_acc")));*/
		$fecha_anterior='0000-00-00';$pruebas="";
		$res_pruebas=$this->MisPreguntas_model->PruebasListarPorUsu($this->session->userdata("id_acc"));
		foreach ($res_pruebas as $item) {
			if ($item->freg_prue==$fecha_anterior) {
				$pruebas.=	'<li>
                                    <i class="fa fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
                                        <h3 class="timeline-header"><a href="#">'.$item->nomb_prue.'</a> sent you and email</h3>
                                        <div class="timeline-body">
                                            '.$item->desc_prue.'
                                        </div>
                                        <div class="timeline-footer">
                                            <a class="btn btn-primary btn-xs">Ver Más</a>
                                            <a class="btn btn-primary btn-xs">Editar</a>
                                            <a class="btn btn-danger btn-xs">Eliminar</a>
                                        </div>
                                    </div>
                    		</li>';
			}else{
				$pruebas.='	<li class="time-label">
                                    <span class="bg-green">
                                     '.$item->freg_prue.'
                                    </span>
                    		</li>';
                $pruebas.=	'<li>
                                    <i class="fa fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
                                        <h3 class="timeline-header"><a href="#">'.$item->nomb_prue.'</a> sent you and email</h3>
                                        <div class="timeline-body">
                                            '.$item->desc_prue.'
                                        </div>
                                        <div class="timeline-footer">
                                            <a class="btn btn-primary btn-xs">Ver Más</a>
                                            <a class="btn btn-primary btn-xs">Editar</a>
                                            <a class="btn btn-danger btn-xs">Eliminar</a>
                                        </div>
                                    </div>
                    		</li>';
			}
			$fecha_anterior=$item->freg_prue;
		}


		$lista  = array('Pruebas' => $pruebas);




		$this->load->view('layouts/head');
		$this->load->view('docente/navegacion/header');
		$this->load->view('docente/navegacion/sidebar');
		$this->load->view('docente/mispruebas/listar',$lista);
		$this->load->view('layouts/footer');
	}
	public function prueba(){

	    if (isset($_SESSION["Prueba"])){

	    }else{
		    $prueba  = array(
					'p_nombre' => $this->input->post("nombre_prue"),
					'p_descripcion' => $this->input->post("descripcion_prue"),
					'p_asignatura' => $this->input->post("asignatura_prue"),
					'p_coleccion' => $this->input->post("coleccion_prue"),
					'p_imagen' => $this->input->post("imagen_prue"),
					'p_publico' =>$this->input->post("publico_meme"),
					'prueba' => TRUE
				);
			$_SESSION["Prueba"] =$prueba;
		}
		redirect(base_url()."docente/mispruebas/Agregar");
	}
	public function pregunta(){
		if (isset($_SESSION["preguntas"])){
			$pregunta  = (object)array(
					//'cronometro' => $this->input->post("cronometro"),
					'pregunta' => $this->input->post("pregunta"),
					'alternativa1' => $this->input->post("a1"),
					'alternativa2' => $this->input->post("a2"),
					'alternativa3' => $this->input->post("a3"),
					'alternativa4' =>$this->input->post("a4"),
					'respuesta' => $this->input->post("respuesta")
				);
			//$preguntas  = array("pregunta"  => $pregunta);
			array_push($_SESSION["preguntas"],$pregunta);
	    }else{
	    	$pregunta  = (object)array(
	    			//'cronometro' => $this->input->post("cronometro"),
					'pregunta' => $this->input->post("pregunta"),
					'alternativa1' => $this->input->post("a1"),
					'alternativa2' => $this->input->post("a2"),
					'alternativa3' => $this->input->post("a3"),
					'alternativa4' =>$this->input->post("a4"),
					'respuesta' => $this->input->post("respuesta")
				);
	    	//preguntas  = array("pregunta"  => $pregunta);
	    	//$obj = (object) array('1' => 'foo');
			$_SESSION["preguntas"] =array($pregunta);
	    }
		redirect(base_url()."docente/mispruebas/Agregar");
	}
	public function finalizar(){
		if (isset($_SESSION["Prueba"]) and isset($_SESSION["preguntas"])){
			$nom=$_SESSION["Prueba"]["p_nombre"];
			$des=$_SESSION["Prueba"]["p_descripcion"];
			$asi=$_SESSION["Prueba"]["p_asignatura"];
			$cole=$_SESSION["Prueba"]["p_coleccion"];
			$ima=$_SESSION["Prueba"]["p_imagen"];
			$pub=$_SESSION["Prueba"]["p_publico"];
			$ure=$this->session->userdata("login");

			$res_prueba = $this->MisPreguntas_model->PruebaGuardar($nom,$des,$asi,$ima,$pub,$ure);
			foreach ($res_prueba as $prue) {
				$prueba=$prue->id_prue;
			}
			foreach ($_SESSION["preguntas"] as $clave => $valor) {
				foreach ($valor as $cla => $val) {
                    if ($cla=="pregunta") {
                    	$res_pregunta = $this->MisPreguntas_model->PreguntaGuardar($val,10,$ure,$pub);//falta el cronometro
						foreach ($res_pregunta as $pre) {
							$pregunta=$pre->id_preg;
						}
						$this->MisPreguntas_model->CuestionarioGuardar($pregunta,$prueba,$cole);
                    }elseif($cla=="respuesta"){
                    	$respuesta = $this->MisPreguntas_model->Alternativas();
                    	if ($val=="a1") {
                    		$c=1;
                    		foreach ($respuesta as $a1) {
                    			if ($c==1) {
                    				$this->MisPreguntas_model->Respuesta($a1->id_alte);
                    			}
                    			$c++;
                    		}
                    	}elseif ($val=="a2") {
                    		$c=1;
                    		foreach ($respuesta as $a2) {
                    			if ($c==2) {
                    				$this->MisPreguntas_model->Respuesta($a2->id_alte);
                    			}
                    			$c++;
                    		}
                    	}elseif ($val=="a3") {
                    		$c=1;
                    		foreach ($respuesta as $a3) {
                    			if ($c==3) {
                    				$this->MisPreguntas_model->Respuesta($a3->id_alte);
                    			}
                    			$c++;
                    		}
                    	}else{
                    		$c=1;
                    		foreach ($respuesta as $a4) {
                    			if ($c==4) {
                    				$this->MisPreguntas_model->Respuesta($a4->id_alte);
                    			}
                    			$c++;
                    		}
                    	}

                    }else{
                    	$res_opcion = $this->MisPreguntas_model->OpcionGuardar($val);
						foreach ($res_opcion as $opc) {
							$opcion=$opc->id_opci;
						}
						$res_alternativa = $this->MisPreguntas_model->AlternativasGuardar($pregunta,$opcion,"no");
                    }
                }
			}
		}
		unset(
			$_SESSION["Prueba"],
			$_SESSION["preguntas"]
		);
		redirect(base_url()."docente/mispruebas/Agregar");
	}
}
