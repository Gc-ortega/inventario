 	<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Colecciones 
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
                    <div class="row ">
 						<!-- general form elements -->
 						<div class="col-md-6" style="">
                            <div class="box box-primary">
                                <form action="<?php echo base_url();?>docente/Colecciones/Guardar" method="post">
                                    <div class="box-body">
                                        <?php echo $this->session->flashdata('Mensaje'); ?>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nombre</label>
                                            <input type="text" class="form-control" name="nombre_coleccion" placeholder="Ejemplo: Pruebas de quinto grado">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Descripción</label>
                                            <input type="text" class="form-control" name="descripcion_coleccion" placeholder="Tema1 de quinto grado">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Imagen</label>
                                            <input type="file" name="imagen_coleccion">
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="activo_coleccion"> Activo
                                            </label>
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </form>
                            </div><!-- /.box -->
                        </div>
                    </div>
                </section>
 	</aside>
