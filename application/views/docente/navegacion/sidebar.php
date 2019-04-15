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
                            <p>Hello, Jane</p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <?php 
                            for ($i=0; $i <sizeof($Nav); $i++) { 
                                if (is_array($Nav[$i]['Url'])){ ?>    
                                    <li class="treeview">
                                        <a href="#">
                                                    <i class="fa fa-edit"></i> <span><?php echo $Nav[$i]['Nombre']?></span>
                                                    <i class="fa fa-angle-left pull-right"></i>
                                                </a>
                                             <ul class="treeview-menu">
                                        <?php for ($j=0; $j<sizeof($Nav[$i]['Url']); $j++) { ?>
                                           
                                                <li><?php echo "<a href='".$Nav[$i]['Url'][$j]['Url']."'>" ?><i class="fa fa-angle-double-right"></i> <?php echo $Nav[$i]['Url'][$j]['Nombre']?></a></li>
                                           
                                        <?php } ?>    
                                         </ul>
                                    </li> 
                            <?php }else{?>  
                                       
                                <li>
                                    <a href="pages/widgets.html">
                                        <i class="fa fa-th"></i> <span><?php echo $Nav[$i]['Nombre']?></span> <small class="badge pull-right bg-green">new</small>
                                    </a>
                                </li>
                                <?php }
                            }
                        ?>
                            
                               
                        
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>