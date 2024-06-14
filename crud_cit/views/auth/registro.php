<div class="container-fluid ps-md-0">
    <div class="row g-0">
        <div class="d-none d-md-flex col-md-4 col-lg-6" style="background-image: url('/build/img/portadalibros.jpg'); background-size: cover; background-position: center;"></div>
            <div class="col-md-8 col-lg-6">
                <div class="d-flex align-items-center py-5" style="min-height: 100vh;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto" style="margin-top: -70px">
                                <h2 class="auth__heading"><?php echo $titulo; ?></h2>

                                <?php require_once __DIR__ . '/../templates/alertas.php'; ?>

                                <form method="POST" action="/registro" class="formulario" novalidate>
                                    <div class="formulario__campo">
                                        <label for="nombre" class="formulario__label">Nombre</label>
                                        <input type="text"
                                            name="nombre"
                                            id="nombre"
                                            class="formulario__input"
                                            placeholder="Tu Nombre"
                                            value="<?php echo $usuario->nombre; ?>">
                                    </div>

                                    <div class="formulario__campo">
                                        <label for="apellido" class="formulario__label">Apellido</label>
                                        <input type="text"
                                            name="apellido"
                                            id="apellido"
                                            class="formulario__input"
                                            placeholder="Tu Apellido"
                                            value="<?php echo $usuario->apellido; ?>">
                                    </div>

                                    <div class="formulario__campo">
                                        <label for="telefono" class="formulario__label">Telefono</label>
                                        <input type="number"
                                            name="telefono"
                                            id="telefono"
                                            class="formulario__input"
                                            placeholder="Tu Telefono"
                                            value="<?php echo $usuario->telefono; ?>">
                                    </div>

                                    <div class="formulario__campo">
                                        <label for="email" class="formulario__label">Email</label>
                                        <input type="email"
                                            name="correo"
                                            id="email"
                                            class="formulario__input"
                                            placeholder="Tu Email"
                                            value="<?php echo $usuario->email; ?>">
                                    </div>

                                    <div class="formulario__campo">
                                        <label for="password" class="formulario__label">Password</label>
                                        <input type="password"
                                            name="password"
                                            id="password"
                                            class="formulario__input"
                                            placeholder="Tu Password">
                                    </div>

                                    <div class="formulario__campo">
                                        <label for="password2" class="formulario__label">Repetir Password</label>
                                        <input type="password"
                                            name="password2"
                                            id="password2"
                                            class="formulario__input"
                                            placeholder="Repetir Password">
                                    </div>

                                    <input type="submit" value="Crear Cuenta" class="formulario__submit">

                                    <div class="acciones">
                                        <a href="/" class="acciones__enlace">¿Ya tienes cuenta? Iniciar Sesión</a>
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
<main class="auth">

</main>