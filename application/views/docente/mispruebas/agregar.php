<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Mis pruebas 
                        <small >Agregar</small>
                    </h1>
                     <!-- 
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Forms</a></li>
                        <li class="active">General Elements</li>
                    </ol>-->
                </section>

                <!-- Main content -->
                <section class="content ">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Custom Tabs -->
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <?php if (isset($_SESSION["Prueba"])) {
                                        echo '<li><a href="#tab_1" data-toggle="tab">Prueba</a></li>';
                                    }else{
                                        echo '<li class="active"><a href="#tab_1" data-toggle="tab">Prueba</a></li>';
                                    }?>
                                    <?php if (isset($_SESSION["Prueba"])) {
                                        echo '<li class="active"><a href="#tab_2" data-toggle="tab">Preguntas</a></li>';
                                    }else{
                                        echo '<li><a href="#tab_2" data-toggle="tab">Preguntas</a></li>';
                                    }?>
                                    <li><a href="#tab_2" data-toggle="tab">Finalizar</a></li>
                                    <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                                </ul>
                                <div class="tab-content">
                                    <?php if (isset($_SESSION["Prueba"])) {
                                        echo '<div class="tab-pane" id="tab_1" disable>';
                                    ?>
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Nombre</label>
                                                    <input type="text" class="form-control" name="nombre_prue" value="<?php echo $_SESSION["Prueba"]["p_nombre"]; ?>" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Descripción</label>
                                                    <input type="text" class="form-control" name="descripcion_prue" value="<?php echo $_SESSION["Prueba"]["p_nombre"]; ?>" disabled>
                                                </div>
                                                <!-- select -->
                                                <div class="form-group">
                                                    <label>Asignatura</label>
                                                    <select class="form-control" name="asignatura_prue">
                                                        <option>Otro</option>
                                                    </select>
                                                </div>
                                            </div><!-- /.box-body -->
                                    <?php 
                                    }else{
                                        echo '<div class="tab-pane active" id="tab_1">';
                                    ?>
                                    	<form action="<?php echo base_url();?>docente/mispruebas/prueba" method="post">
		                                    <div class="box-body">
		                                        <?php echo $this->session->flashdata('Mensaje');
                                                ?>
		                                        <div class="form-group">
		                                            <label for="exampleInputEmail1">Nombre</label>
		                                            <input type="text" class="form-control" name="nombre_prue" placeholder="Ejemplo: Prueba 1">
		                                        </div>
		                                        <div class="form-group">
		                                            <label for="exampleInputPassword1">Descripción</label>
		                                            <input type="text" class="form-control" name="descripcion_prue" placeholder="Prueba para quinto grado, las preguntas tienen cromometro">
		                                        </div>
                                                <!-- select -->
                                                <div class="form-group">
                                                    <label>Asignatura</label>
                                                    <select class="form-control" name="asignatura_prue">
                                                        <?php echo $Asignatura;?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Colección</label>
                                                    <select class="form-control" name="coleccion_prue">
                                                        <?php echo $Coleccion;?>
                                                    </select>
                                                </div>
		                                        <div class="form-group">
		                                            <label for="exampleInputFile">Imagen</label>
		                                            <input type="file" name="imagen_prue">
		                                        </div>
		                                        <div class="checkbox">
		                                            <label>
		                                                <input type="checkbox" name="publico_meme"> Publico
		                                            </label>
		                                        </div>
		                                    </div><!-- /.box-body -->
		                                    <div class="box-footer">
                                        		<button type="submit" class="btn btn-primary">Guardar</button>
                                    		</div>
                                		</form>
                                    <?php }?>
                                </div><!-- /.tab-pane -->
                                    <?php if (isset($_SESSION["Prueba"])) {
                                        echo '<div class="tab-pane active" id="tab_2">';
                                    ?>
                                    <div class="row">
                                            <div class="col-md-3 col-sm-4">
                                                <a class="btn btn-block btn-primary" data-toggle="modal" data-target="#compose-modal"><i class="fa fa-pencil" ></i> Agregar</a>
                                            </div>
                                            <div class="col-md-3 col-sm-4">
                                                <a class="btn btn-block btn-primary" href="<?php echo base_url();?>docente/mispruebas/finalizar" ><i class="fa fa-pencil"></i> Finalizar</a>
                                            </div>
                                    </div>
                                    <br>
                                    <?php
                                            if (isset($_SESSION["preguntas"])){
                                                    foreach ($_SESSION["preguntas"] as $clave => $valor) {
                                  ?>
                                            <div class='box box-info'>
                                                <div class='box-header'>
                                                    <h3 class='box-title'><?php  echo "Pregunta ".($clave+1);?><small></small></h3>
                                                    <!-- tools box -->
                                                    <div class="pull-right box-tools">
                                                        <button class="btn btn-info btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                                        <button class="btn btn-info btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                                    </div><!-- /. tools -->
                                                </div><!-- /.box-header -->
                                                <div class='box-body pad'style="margin-top: 0;padding-top: 0;">
                                    <?php
                                                        foreach ($valor as $cla => $val) {
                                                            if ($cla=="pregunta") {
                                      ?>
                                            <div class="page-header" style="margin-top: 0;padding-top: 0;margin-bottom: 5px; padding-bottom: 5px; font-size: 1.1em"><?php echo  $val; ?></div>
                                    <?php
                                                            }else{
                                                            echo '<span class="fa fa-fw fa-circle"></span>'.$val."</br>";   
                                                            }
                                                        }
                                    ?>
                                            
                                    
                                                </div>
                                               
                                            
                                            </div><!-- ./row -->
                                    <?php 
                                                       
                                                        

                                                    }
                                    }else{
                                                echo "No hay preguntas";
                                            }
                                    }else{
                                        echo '<div class="tab-pane" id="tab_2">';
                                    ?>
                                        <!-- compose message btn -->
                                        <div class="row">
                                            <div class="col-md-3 col-sm-4">
                                                <a class="btn btn-block btn-primary" data-toggle="modal" data-target="#compose-modal" disabled><i class="fa fa-pencil" ></i> Agregar</a>
                                            </div>
                                            <div class="col-md-3 col-sm-4">
                                                <a class="btn btn-block btn-primary" href="<?php echo base_url();?>docente/mispruebas/finalizar" disabled><i class="fa fa-pencil"></i> Finalizar</a>
                                            </div>
                                        </div>
                                    <?php }?>
                                        <!-- COMPOSE MESSAGE MODAL -->
                                        <div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Agregar pregunta</h4>
                                                    </div>
                                                    <form action="<?php echo base_url();?>docente/mispruebas/pregunta" method="post">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Cronometro</label>
                                                                <select class="form-control" name="cronometro">
                                                                    <option value="10">10 segundos</option>
                                                                    <option value="20">20 segundos</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Definición de la pregunta:</label>
                                                                <input type="text" class="form-control" name="pregunta" placeholder="¿definición?">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Alternativa Nro 1:</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <input type="radio" name="respuesta" value="a1">
                                                                    </span>
                                                                    <input type="text" class="form-control" name="a1">
                                                                </div><!-- /input-group -->
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Alternativa Nro 2:</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <input type="radio" name="respuesta" value="a2">
                                                                    </span>
                                                                    <input type="text" class="form-control" name="a2">
                                                                </div><!-- /input-group -->
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Alternativa Nro 3:</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <input type="radio" name="respuesta" value="a3">
                                                                    </span>
                                                                    <input type="text" class="form-control" name="a3">
                                                                </div><!-- /input-group -->
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Alternativa Nro 4:</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <input type="radio" name="respuesta" value="a4">
                                                                    </span>
                                                                    <input type="text" class="form-control" name="a4">
                                                                </div><!-- /input-group -->
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer clearfix">

                                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>

                                                            <button type="submit" class="btn btn-primary pull-left"><i class="fa fa-envelope"></i> Guardar</button>
                                                        </div>
                                                    </form>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                    </div><!-- /.tab-pane -->
                                </div><!-- /.tab-content -->
                            </div><!-- nav-tabs-custom -->
                        </div><!-- /.col -->



                        <div class="col-md-6" style="">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Agregar</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                               
                            </div><!-- /.box -->
                        </div>
                    </div> <!-- /.row -->
                    
                </section>
    </aside>