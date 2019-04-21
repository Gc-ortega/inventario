 	<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Memes 
                        <small class=" pull-right">Usted puede agregar sus propios memes.</small>
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
                                <div class="box-header">
                                    <h3 class="box-title">Agregar</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form action="<?php echo base_url();?>docente/memes/Guardar" method="post">
                                    <div class="box-body">
                                        <?php echo $this->session->flashdata('Mensaje'); ?>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nombre</label>
                                            <input type="text" class="form-control" name="nombre_meme" placeholder="Ejemplo: imagen risa">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Descripción</label>
                                            <input type="text" class="form-control" name="descripcion_meme" placeholder="dibjo de risa">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Imagen</label>
                                            <input type="file" name="imagen_meme">
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="activo_meme"> Activo
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
