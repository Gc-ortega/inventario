<div class="form-box" id="login-box">
            <div class="header">I.E JPB</div>
            <form action="<?php echo base_url();?>acceso/Acceso" method="post">
                <div class="body bg-gray">
                    <?php echo $this->session->flashdata('error'); ?>  
                    <div class="form-group">
                        <input type="text" name="cuenta" class="form-control" placeholder="cuenta"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="clave" class="form-control" placeholder="clave"/>
                    </div>         
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Recordar
                    </div>
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block"> Iniciar sesión</button>  
                    
                    <p><a href="#">Recuperar mi clave</a></p>
                    
                    <a href="register.html" class="text-center">Registrarme</a>
                </div>
            </form>

            <div class="margin text-center">
                <span>Sign in using social networks</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

            </div>
        </div>