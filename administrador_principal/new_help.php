<?php
require_once("control/new_help_script.php");
require_once("../control_general/sesionOut.php");
// En caso de qué un rol no perteneciente esté aquí, lo mande a redirigirse
require_once("control/validar_rol.php");
require_once("../control_general/conexion.php");

$consulta = $conexion->query("SELECT comunidad FROM comunidades ORDER BY comunidad ASC");

// Incluir el script de autocompletado
require_once("control/help_script.php"); // Esto ahora poblará $datos y definirá get_value()
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/styleindex.css?v=<?php echo time();?>">
    <title>Formulario de ayuda</title>
</head>
<body class="container-body">
    <header class="header-main">
        <div class="header-systemhelp">
            <p class="titulo-systemhelp">Formulario de ayuda</p>
            <nav class="menu-systemhelp">
                <ul>
                    <li><a href="">Usuario</a>
                        <ul>
                            <li><a href="../control_general/logout.php">Cerrar Sesión</a></li>
                        </ul>
                    </li>
                    <li><a href="system_help.php">Volver atrás</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <form method="POST" class="formulario-newhelp" id="form_help">
            <p class="titulo-index">Formulario de ayuda</p>
            <p>Datos Personales</p>

            <label for="titulo">Descripción:</label>
            <input type="text" id="titulo" name="descripcion" placeholder="Ejem: Ayuda para silla de ruedas" required value="<?php echo get_value('descripcion'); ?>">

            <label for="id_manual">Número de documento:</label>
            <input type="text" id="id_manual" name="id_manual" placeholder="00004578" required value="<?php echo get_value('id_manual'); ?>">

            <label for="nombres_apellidos">Nombres y Apellidos:</label>
            <input type="text" id="nombres_apellidos" name="nombres_apellidos" placeholder="Ejem: Pedro Elias Paez Gonzalez" required value="<?php echo get_value('nombres_apellidos'); ?>">

            <label for="ci_perso">Cedula de Identidad:</label>
            <input type="text" id="ci_perso" name="ci_perso" placeholder="Ejem: V-12345678" required oninput="this.value = this.value.replace(/[^0-9]/g, '')" value="<?php echo get_value('ci_perso'); ?>">

            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required value="<?php echo get_value('fecha_nacimiento'); ?>">

            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" placeholder="Ejem: 0414-1234567" required oninput="this.value = this.value.replace(/[^0-9]/g, '')" value="<?php echo get_value('telefono'); ?>">

            <label for="lugar_nacimiento">Lugar de Nacimiento:</label>
            <input type="text" id="lugar_nacimiento" name="lugar_nacimiento" placeholder="Ejem: Caracas, Venezuela" required value="<?php echo get_value('lugar_nacimiento'); ?>">

            <input type="hidden" name="edad" value="<?php echo get_value('edad'); ?>">

            <label for="estado_civil">Estado Civil:</label>
            <select name="estado_civil" id="estado_civil" required>
                <?php $current_estado_civil = get_value('estado_civil'); ?>
                <option value="Soltero/a" <?php echo ($current_estado_civil == 'Soltero/a') ? 'selected' : ''; ?>>Soltero/a</option>
                <option value="Casado/a" <?php echo ($current_estado_civil == 'Casado/a') ? 'selected' : ''; ?>>Casado/a</option>
                <option value="Viudo/a" <?php echo ($current_estado_civil == 'Viudo/a') ? 'selected' : ''; ?>>Viudo/a</option>
            </select>

            <label for="codigo_patria">Código de patria:</label>
            <input type="text" id="codigo_patria" name="codigo_patria" placeholder="Ejem: 1234567890" required oninput="this.value = this.value.replace(/[^0-9]/g, '')" value="<?php echo get_value('codigo_patria'); ?>">

            <label for="serial_patria">Serial de Patria:</label>
            <input type="text" id="serial_patria" name="serial_patria" placeholder="Ejem: ABC123456" required oninput="this.value = this.value.replace(/[^0-9]/g, '')" value="<?php echo get_value('serial_patria'); ?>">

            <label for="nivel_instruc">Nivel de Instrucción:</label>
            <select name="nivel_instruc" id="nivel_instruc" required>
                <?php $current_nivel_instruc = get_value('nivel_instruc'); ?>
                <option value="Primaria" <?php echo ($current_nivel_instruc == 'Primaria') ? 'selected' : ''; ?>>Primaria</option>
                <option value="Secundaria" <?php echo ($current_nivel_instruc == 'Secundaria') ? 'selected' : ''; ?>>Secundaria</option>
                <option value="Universidad" <?php echo ($current_nivel_instruc == 'Universidad') ? 'selected' : ''; ?>>Universidad</option>
            </select>

            <label for="profesion">Profesión:</label>
            <input type="text" id="profesion" name="profesion" placeholder="Ejem: Ingeniero, Médico, etc." required value="<?php echo get_value('profesion'); ?>">

            <label for="trabajo1">¿Trabaja?</label>
            <select name="trabajo1" id="trabajo1" required>
                <?php $current_trabajo1 = get_value('trabajo1'); ?>
                <option value="Si" <?php echo ($current_trabajo1 == 'Si') ? 'selected' : ''; ?>>Si</option>
                <option value="No" <?php echo ($current_trabajo1 == 'No' || empty($current_trabajo1)) ? 'selected' : ''; ?>>No</option>
            </select>

            <label for="trabajo">Trabajo:</label>
            <input type="text" id="trabajo" name="trabajo" placeholder="Ejem: Ingeniero, Médico, etc." required value="<?php echo get_value('trabajo'); ?>">

            <label for="direc_trabajo">Dirección de Trabajo:</label>
            <input type="text" id="direc_trabajo" name="direc_trabajo" placeholder="Ejem: Av. Principal, Edificio X" required value="<?php echo get_value('direc_trabajo'); ?>">

            <label for="trabaja_public">¿Trabaja en el sector público?</label>
            <select name="trabaja_public" id="trabaja_public" required >
                <?php $current_trabaja_public = get_value('trabaja_public'); ?>
                <option value="Si" <?php echo ($current_trabaja_public == 'Si') ? 'selected' : ''; ?>>Si</option>
                <option value="No" <?php echo ($current_trabaja_public == 'No' || empty($current_trabaja_public)) ? 'selected' : ''; ?>>No</option>
            </select>

            <label for="nombre_insti">Nombre de la Institución:</label>
            <input type="text" id="nombre_insti" name="nombre_insti" placeholder="Ejem: Ministerio de Educación" required value="<?php echo get_value('nombre_insti'); ?>">

            <label for="comunidad">Comunidad:</label>
            <select name="comunidad" id="comunidad" required>
                    <?php
                    $current_comunidad = get_value('comunidad');
                    // Reinicia el puntero del resultado de la consulta si ya se usó
                    if ($consulta) {
                        mysqli_data_seek($consulta, 0);
                    }
                    while ($fila = mysqli_fetch_assoc($consulta)) {
                        $selected = ($fila['comunidad'] == $current_comunidad) ? 'selected' : '';
                        echo '<option value="' . htmlspecialchars($fila['comunidad']) . '" ' . $selected . '>' . htmlspecialchars($fila['comunidad']) . '</option>';
                    }
                    ?>
                    <option value="plus">Agregar Comunidad</option>
            </select>

            <label for="direc_habita">Dirección de Habitación:</label>
            <input type="text" id="direc_habita" name="direc_habita" placeholder="Ejem: Calle X, Edificio Y" required value="<?php echo get_value('direc_habita'); ?>">

            <label for="estruc_base">Estructura Base:</label>
            <input type="text" id="estruc_base" name="estruc_base" placeholder="Ejem: Asamblea comunitaria, etc." required value="<?php echo get_value('estruc_base'); ?>">

            <p>Datos Físicos Ambientales</p>
            <label for="propiedad">Propiedad</label>
            <select name="propiedad" id="propiedad" required>
                <?php $current_propiedad = get_value('propiedad'); ?>
                <option value="Casa" <?php echo ($current_propiedad == 'Casa') ? 'selected' : ''; ?>>Casa</option>
                <option value="Apartamento" <?php echo ($current_propiedad == 'Apartamento') ? 'selected' : ''; ?>>Apartamento</option>
                <option value="Rancho" <?php echo ($current_propiedad == 'Rancho') ? 'selected' : ''; ?>>Rancho</option>
                <option value="Otro" <?php echo ($current_propiedad == 'Otro') ? 'selected' : ''; ?>>Otro</option>
            </select>

            <label for="propiedad_est">Propiedad</label>
            <select name="propiedad_est" id="propiedad_est" required>
                <?php $current_propiedad_est = get_value('propiedad_est'); ?>
                <option value="Propia" <?php echo ($current_propiedad_est == 'Propia') ? 'selected' : ''; ?>>Propia</option>
                <option value="Prestada" <?php echo ($current_propiedad_est == 'Prestada') ? 'selected' : ''; ?>>Prestada</option>
                <option value="Alquiler" <?php echo ($current_propiedad_est == 'Alquiler') ? 'selected' : ''; ?>>Alquiler</option>
            </select>

            <label for="observaciones">Observaciones:</label>
            <input type="text" id="observaciones" name="observaciones" placeholder="Detalles adicionales relevantes (Opcional)" value="<?php echo get_value('observaciones'); ?>">

            <p>Datos Socio-Económicos</p>
            <label for="nivel_ingreso">Nivel de Ingresos:</label>
            <input type="text" id="nivel_ingreso" name="nivel_ingreso" placeholder="Ejem: 500 Bs" required oninput="this.value = this.value.replace(/[^0-9]/g, '')" value="<?php echo get_value('nivel_ingreso'); ?>">

            <label for="pension">¿Recibe Bonos?</label>
            <select name="pension" id="pension" required>
                <?php $current_pension = get_value('pension'); ?>
                <option value="Si" <?php echo ($current_pension == 'Si') ? 'selected' : ''; ?>>Si</option>
                <option value="No" <?php echo ($current_pension == 'No') ? 'selected' : ''; ?>>No</option>
            </select>

            <label for="bono">¿Recibe Pensiones?</label>
            <select name="bono" id="bono" required>
                <?php $current_bono = get_value('bono'); ?>
                <option value="Si" <?php echo ($current_bono == 'Si') ? 'selected' : ''; ?>>Si</option>
                <option value="No" <?php echo ($current_bono == 'No') ? 'selected' : ''; ?>>No</option>
            </select>

            <p>Datos de Asistencia Médica</p>
            <label for="pers_patologia">Familiares con Patología:</label>
            <input type="text" id="pers_patologia" name="pers_patologia" placeholder="Ejem: 2" required oninput="this.value = this.value.replace(/[^0-9]/g, '')" value="<?php echo get_value('pers_patologia'); ?>">
            <div id="additional-patologias"></div>

            <p>Tipo de Ayuda</p>
            <label for="tip_ayuda">Tipo de Ayuda:</label>
            <select name="tip_ayuda" id="tip_ayuda">
                <?php $current_tip_ayuda = get_value('tip_ayuda'); ?>
                <option value="Silla de Ruedas" <?php echo ($current_tip_ayuda == 'Silla de Ruedas') ? 'selected' : ''; ?>>Silla de Ruedas</option>
                <option value="Silla de Ruedas(Niño)" <?php echo ($current_tip_ayuda == 'Silla de Ruedas(Niño)') ? 'selected' : ''; ?>>Silla de Ruedas(Niño)</option>
                <option value="Andadera" <?php echo ($current_tip_ayuda == 'Andadera') ? 'selected' : ''; ?>>Andadera</option>
                <option value="Andadera (Niño)" <?php echo ($current_tip_ayuda == 'Andadera (Niño)') ? 'selected' : ''; ?>>Andadera (Niño)</option>
                <option value="Bastón 1 Punta" <?php echo ($current_tip_ayuda == 'Bastón 1 Punta') ? 'selected' : ''; ?>>Bastón 1 Punta</option>
                <option value="Bastón 3 Puntas" <?php echo ($current_tip_ayuda == 'Bastón 3 Puntas') ? 'selected' : ''; ?>>Bastón 3 Puntas</option>
                <option value="Bastón 4 Puntas" <?php echo ($current_tip_ayuda == 'Bastón 4 Puntas') ? 'selected' : ''; ?>>Bastón 4 Puntas</option>
                <option value="Muletas" <?php echo ($current_tip_ayuda == 'Muletas') ? 'selected' : ''; ?>>Muletas</option>
                <option value="Muletas (Niño)" <?php echo ($current_tip_ayuda == 'Muletas (Niño)') ? 'selected' : ''; ?>>Muletas (Niño)</option>
                <option value="Collarín" <?php echo ($current_tip_ayuda == 'Collarín') ? 'selected' : ''; ?>>Collarín</option>
                <option value="Colchón Anti-escaras" <?php echo ($current_tip_ayuda == 'Colchón Anti-escaras') ? 'selected' : ''; ?>>Colchón Anti-escaras</option>
                <option value="Otros" <?php echo ($current_tip_ayuda == 'Otros') ? 'selected' : ''; ?>>Otros</option>
            </select>
            <p>Categoría:</p>
            <label for="categoria">Categoría</label>
            <select name="categoria" id="categoria">
                <?php $current_categoria = get_value('categoria'); ?>
                <option value="Ayudas técnicas" <?php echo ($current_categoria == 'Ayudas técnicas') ? 'selected' : ''; ?>>Ayudas técnicas</option>
                <option value="Medicamentos" <?php echo ($current_categoria == 'Medicamentos') ? 'selected' : ''; ?>>Medicamentos</option>
                <option value="Laboratorio" <?php echo ($current_categoria == 'Laboratorio') ? 'selected' : ''; ?>>Laboratorio</option>
                <option value="Enseres" <?php echo ($current_categoria == 'Enseres') ? 'selected' : ''; ?>>Enseres</option>
            </select>
            <label for="remitente">Remitente:</label>
            <input type="text" id="remitente" name="remitente" placeholder="Ejem: María González" required value="<?php echo get_value('remitente'); ?>">

            <label for="observaciones_ayuda">Observaciones:</label>
            <input type="text" id="observaciones_ayuda" name="observaciones_ayuda" placeholder="Detalles relevantes (Opcional)" value="<?php echo get_value('observaciones_ayuda'); ?>">

            <button type="submit" name="btn" class="boton-newhelp">Enviar</button>
    </form>

    <form method="POST" class="formulario-newhelp" id="form_comunidad" style="display: none;">
    <p class="titulo-index">Agregar nueva comunidad</p>
    <label for="nombre_comunidad" class="label-configuracionuser">Nombre de la comunidad</label>
    <input type="text" name="nombre_comunidad" placeholder="Nombre de comunidad" class="input-configuracionuser" required>
    <button type="submit" name="crear_comunidad" class="button-configuracionuser">Registrar Comunidad</button>
    </form>


</body>
<script src="../js/verificar_sesiones.js"></script>
<script src="../js/trabajo_help.js"></script>
<script src="../js/patologia_help.js"></script>
<script src="../js/fechas_help.js"></script>
<script>
    document.getElementById('comunidad').addEventListener('change', function() {
    if (this.value === 'plus') {
        document.getElementById('form_help').style.display = 'none';
        document.getElementById('form_comunidad').style.display = 'block';
    } else {
        document.getElementById('form_help').style.display = 'block';
        document.getElementById('form_comunidad').style.display = 'none';
    }
});
</script>
<style>
    /* ELIMINA ESTO Y DALE EL ESTILO QUE QUIERAS DAVID ESTO LO PUSE NOMAS PA VERLO YO BONITO, EDITA EL CSS DIRECTAMENTE RECUERDA QUE AHORA SI SE ACTUALIZA ACORDE A LO QUE VAYAS HACIENDO */
    form{
        display:flex;
        flex-direction:column;
    }
</style>
</html>