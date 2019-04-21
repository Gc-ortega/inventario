   <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url();?>assets/img/avatar3.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p><?php echo substr($this->session->userdata("nomb_pers"), 0,1).". ".$this->session->userdata("apat_pers")?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Buscar..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="treeview">
                            <a href="#">
                                        <i class="fa fa-edit"></i> <span>Colecciones</span>
                                        <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url();?>docente/colecciones/agregar"><i class="fa fa-angle-double-right"></i>Agregar</a></li>
                                <li><a href="<?php echo base_url();?>docente/colecciones/listar"><i class="fa fa-angle-double-right"></i>Listar</a></li>
                             </ul>
                        </li> 
                        <li>
                            <a href="pages/widgets.html">
                                <i class="fa fa-th"></i> <span>Informes</span> <small class="badge pull-right bg-green">Nuevo</small>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                        <i class="fa fa-edit"></i> <span>Mis pruebas</span>
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                 <ul class="treeview-menu">

                                    <li><a href="<?php echo base_url();?>docente/mispruebas/agregar"><i class="fa fa-angle-double-right"></i>Agregar</a></li>
                                    <li><a href="<?php echo base_url();?>docente/mispruebas/listar"><i class="fa fa-angle-double-right"></i>Listar</a></li>
                             </ul>
                        </li> 
                        <li class="treeview">
                            <a href="#">
                                        <i class="fa fa-edit"></i> <span>Memes</span>
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                 <ul class="treeview-menu">

                                    <li><a href="<?php echo base_url();?>docente/memes/agregar"><i class="fa fa-angle-double-right"></i>Agregar</a></li>
                                    <li><a href="<?php echo base_url();?>docente/memes/listar"><i class="fa fa-angle-double-right"></i>Listar</a></li>
                             </ul>
                        </li> 
                        
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>