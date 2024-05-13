<div class="container">
    <form action="cliente.php?action=<?php echo ($action == 'update') ? 'change&id_cliente=' . $datos['id_cliente'] : 'save'; ?>" method="post" enctype="multipart/form-data">
        <h2><?php echo ($action == 'update') ? 'Editar' : 'Nuevo'; ?> Cliente</h2>
        <div class="mb-3">
            <label for="Inputcliente" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="Inputcliente" name="nombre" required="required" value="<?php echo (isset($datos["nombre"])) ? $datos["nombre"] : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="InputPrimer_Apellido" class="form-label">Primer Apellido</label>
            <input type="text" class="form-control" id="InputPrimer_Apellido" name="primer_apellido" required="required" value="<?php echo (isset($datos["primer_apellido"])) ? $datos["primer_apellido"] : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="InputSegundo_Apellido" class="form-label">Segundo Apellido</label>
            <input type="text" class="form-control" id="InputSegundo_Apellido" name="segundo_apellido" required="required" value="<?php echo (isset($datos["segundo_apellido"])) ? $datos["segundo_apellido"] : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="InputRfc" class="form-label">RFC</label>
            <input type="text" class="form-control" id="InputRfc" name="rfc" value="<?php echo (isset($datos["rfc"])) ? $datos["rfc"] : ''; ?>">
        </div>
        <div class="col-lg-6">
            <fieldset class="form-group">
                <div class="row">
                    <div class="form-check radio_check">
                        <input class="form-check-input" type="radio" name="radio_select" id="radiosfoto" value="1" checked>
                        <label class="form-check-label" for="radiosfoto">Seleccionar Foto</label>
                    </div>
                    <div class="form-check radio_check">
                        <input class="form-check-input" type="radio" name="radio_select" id="radiotfoto" value="0">
                        <label class="form-check-label" for="radiotfoto">Tomar Foto</label>
                    </div>
                </div>
            </fieldset>
            <div class="container_radio">
                <input type="file" class="form-control-file video_container" name="fotografia" id="subirfoto" value="<?php echo (isset($datos["fotografia"])) ? $datos["fotografia"] : ''; ?>" accept="image/*">
                <video id="video" autoplay="autoplay" class="video_container none"></video>
            </div>
        </div>
        <canvas id="canvas" class="none"></canvas>
        <input type="submit" class="btn btn-primary" name="save" value="Guardar">
    </form>
</div>