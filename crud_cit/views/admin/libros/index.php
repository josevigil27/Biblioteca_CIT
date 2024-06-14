<div class="container-fluid px-4">
    <h1 class="mt-4"><?php echo $titulo?></h1>

    <div class="dashboard__contenedor-boton">
        <a class="dashboard__boton" href="/admin/libros/crear">
            <i class="fa-solid fa-circle-plus" style="padding-right:5px;"></i>
            Añadir Libros
        </a>
    </div>

    <?php
    if ($resultado == 1) {
        echo '<p class="alerta alerta__exito">Libro Creado Correctamente</p>';
    } else if ($resultado == 2) {
        echo '<p class="alerta alerta__exito">Libro Actualizado Correctamente</p>';
    } else if ($resultado == 3) {
        echo '<p class="alerta alerta__exito">Libro Eliminado Correctamente</p>';
    }
    ?>

    <div class="dashboard__contenedor">
        <?php if(!empty($libros)) { ?>
            <table id="datatables">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Genero</th>
                    <th>Autor</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                <?php foreach($libros as $libro) { ?>
                    <tr>
                        <td>
                            <?php echo $libro->nombre; ?>
                        </td>
                        <td>
                            <?php echo $libro->genero->nombre; ?>
                        </td>
                        <td>
                            <?php echo $libro->autor->nombre . ' ' . $libro->autor->apellido;?>
                        </td>
                        <td>
                            <a class="dashboard__boton-warning" href="/admin/libros/editar?id=<?php echo $libro->id; ?>" style="padding: 13px 18px">
                                <i class="fa-solid fa-user-pen"></i>
                            </a>
                        </td>

                        <td>
                            <form method="POST" action="/admin/libros/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $libro->id; ?>">
                                <button class="dashboard__boton-danger" type="submit" style="padding: 15px 20px">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <p class="text-center">No Hay Libros Aún</p>
        <?php } ?>
    </div>
</div>