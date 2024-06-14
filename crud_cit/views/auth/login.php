<div class="container-fluid ps-md-0">
    <div class="row g-0">
        <div class="d-none d-md-flex col-md-4 col-lg-6" style="background-image: url('/build/img/portadalibros.jpg'); background-size: cover; background-position: center;"></div>
            <div class="col-md-8 col-lg-6">
                <div class="d-flex align-items-center py-5" style="min-height: 100vh;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto" style="margin-top: -100px">
                                <h2 class="auth__heading"><?php echo $titulo; ?></h2>

                                <?php 
                                    require_once __DIR__ . '/../templates/alertas.php'; 
                                    
                                    if (isset($resultado) == 1) {
                                        echo '<p class="alerta alerta__exito">Usuario Registrado Correctamente</p>';
                                    }
                                ?>    

                                <form method="POST" action="/" class="formulario" novalidate>
                                    <div class="formulario__campo">
                                        <label for="correo" class="formulario__label">Email</label>
                                        <input type="email"
                                            name="correo"
                                            id="correo"
                                            class="formulario__input" 
                                            placeholder="Tu Email">
                                    </div>
                                    
                                    <div class="formulario__campo">
                                        <label for="password" class="formulario__label">Password</label>
                                        <input type="password" 
                                            name="password" 
                                            id="password" 
                                            class="formulario__input" 
                                            placeholder="Tu Password">
                                    </div>

                                    <input type="submit" value="Iniciar Sesion" class="formulario__submit">

                                    <div class="acciones">
                                        <a href="/registro" class="acciones__enlace">¿Aún no tienes una cuenta? Registrate</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>