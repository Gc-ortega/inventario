
<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Colecciones <small>Lista</small>
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
                    	<?php foreach ($colecciones as $item) :?>
                    		<div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        14
                                    </h3>
                                    <p>
                                        <?php echo  $item->nomb_cole;?>
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios7-briefcase-outline"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    VER MÁS <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <?php endforeach;?>
 						
                    </div>
                </section>
 	</aside>
