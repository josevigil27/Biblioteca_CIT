<div class="formulario__campo">
    <label for="generoid" class="formulario__label">Genero</label>
    <select class="formulario__select" id="generoid" name="generoid">
        <option value="" selected disabled>- Seleccionar -</option>
        <?php foreach($generos as $genero) { ?>
            <option <?php echo ($libro->generoid === $genero->id) ? 'selected' : '' ?> value="<?php echo $genero->id; ?>"><?php echo $genero->nombre; ?></option>
        <?php } ?>
    </select>
</div>

<div class="formulario__campo">
    <label for="autorid" class="formulario__label">Autor</label>
    <select class="formulario__select" id="autorid" name="autorid">
        <option value="" selected disabled>- Seleccionar -</option>
        <?php foreach($autores as $autor) { ?>
            <option <?php echo ($libro->autorid === $autor->id) ? 'selected' : '' ?> value="<?php echo $autor->id; ?>"><?php echo $autor->nombre . ' ' . $autor->apellido; ?></option>
        <?php } ?>
    </select>
</div>

<div class="formulario__campo">
    <label for="nombre" class="formulario__label">Nombre</label>
    <input type="text"
           name="nombre"
           id="nombre"
           class="formulario__input"
           placeholder="Nombre del Genero"
           value="<?php echo $libro->nombre; ?>">
</div>

<div class="formulario__campo">
    <label for="sinopsis" class="formulario__label">Sinopsis</label>
    <textarea name="sinopsis"
              id="sinopsis"
              class="formulario__input"
              cols="30"
              rows="10"
              placeholder="Nombre del Genero">
        <?php echo htmlspecialchars($libro->sinopsis); ?>
    </textarea>
</div>