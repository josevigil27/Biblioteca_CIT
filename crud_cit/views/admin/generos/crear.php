<div class="container-fluid px-4">
    <h1 class="mt-4"><?php echo $titulo?></h1>

    <div class="dashboard__contenedor-boton">
        <a class="dashboard__boton" href="/admin/generos">
            <i class="fa-solid fa-circle-arrow-left" style="padding-right:5px;"></i>
            Volver
        </a>
    </div>

    <div class="dashboard__formulario">
        <?php include_once __DIR__ . './../../templates/alertas.php'; ?>

        <form method="POST" action="/admin/generos/crear" enctype="multipart/form-data" class="formulario" novalidate>
            <?php include_once __DIR__ . '/formulario.php'; ?>
            <input class="formulario__submit formulario__submit--registrar" type="submit" value="Guardar Genero">
        </form>
    </div>
</div>