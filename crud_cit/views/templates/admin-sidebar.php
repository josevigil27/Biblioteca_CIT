<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu" style="background-color: #282c31;">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Dashboard</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseInicio"
                   aria-expanded="false" aria-controls="collapseInicio">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-book"></i></div>
                    Biblioteca
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseInicio" aria-labelledby="headingOne"
                     data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?php echo pagina_actual('/index') ? 'active' : ''; ?>" href="/admin/index">Home</a>
                        <a class="nav-link <?php echo pagina_actual('/generos') ? 'active' : ''; ?>" href="/admin/generos">Generos</a>
                        <a class="nav-link <?php echo pagina_actual('/autores') ? 'active' : ''; ?>" href="/admin/autores">Autores</a>
                        <a class="nav-link <?php echo pagina_actual('/libros') ? 'active' : ''; ?>" href="/admin/libros">Libros</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small" style="font-weight: 300">Bienvenido:</div>
            <?php echo $_SESSION['nombre'].' '.$_SESSION['apellido']; ?>
        </div>
    </nav>
</div>