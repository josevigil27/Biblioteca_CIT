<div class="container-fluid px-4">
    <h1 class="mt-4"><?php echo $titulo?></h1>

    <div class="dashboard__contenedor-boton">
        <a class="dashboard__boton" href="/admin/generos/crear">
            <i class="fa-solid fa-circle-plus" style="padding-right:5px;"></i>
            Añadir Generos
        </a>
    </div>

    <?php
    if ($resultado == 1) {
        echo '<p class="alerta alerta__exito">Genero Creado Correctamente</p>';
    } else if ($resultado == 2) {
        echo '<p class="alerta alerta__exito">Genero Actualizado Correctamente</p>';
    } else if ($resultado == 3) {
        echo '<p class="alerta alerta__exito">Genero Eliminado Correctamente</p>';
    }
    ?>

    <div class="dashboard__contenedor">
        <?php if(!empty($generos)) { ?>
            <table id="datatables">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                <?php foreach($generos as $genero) { ?>
                    <tr>
                        <td>
                            <?php echo $genero->nombre; ?>
                        </td>
                        <td>
                            <a class="dashboard__boton-warning" href="/admin/generos/editar?id=<?php echo $genero->id; ?>" style="padding: 13px 18px">
                                <i class="fa-solid fa-user-pen"></i>
                            </a>
                        </td>

                        <td>
                            <form method="POST" action="/admin/generos/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $genero->id; ?>">
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
            <p class="text-center">No Hay Generos Aún</p>
        <?php } ?>
    </div>
</div>