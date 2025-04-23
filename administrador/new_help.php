<?php 
require_once("control/new_help_script.php");
require_once("../control_general/sesionOut.php");
// En caso de qué un rol no perteneciente esté aquí, lo mande a redirigirse
require_once("control/validar_rol.php");
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
    <form method="POST" class="formulario-newhelp">
            <p class="titulo-index">Formulario de ayuda</p>
            <p>Datos Personales</p>

            <label for="titulo">Título del documento:</label>
            <input type="text" id="titulo" name="titulo" placeholder="Ejem: Ayuda para silla de ruedas" required>

            <label for="nombres_apellidos">Nombres y Apellidos:</label>
            <input type="text" id="nombres_apellidos" name="nombres_apellidos" placeholder="Ejem: Pedro Elias Paez Gonzalez" required>

            <label for="ci_perso">Cedula de Identidad:</label>
            <input type="text" id="ci_perso" name="ci_perso" placeholder="Ejem: V-12345678" required oninput="this.value = this.value.replace(/[^0-9]/g, '')">

            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>

            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" placeholder="Ejem: 0414-1234567" required oninput="this.value = this.value.replace(/[^0-9]/g, '')">

            <label for="lugar_nacimiento">Lugar de Nacimiento:</label>
            <input type="text" id="lugar_nacimiento" name="lugar_nacimiento" placeholder="Ejem: Caracas, Venezuela" required>

            <input type="hidden" name="edad">

            <label for="estado_civil">Estado Civil:</label>
            <select name="estado_civil" id="estado_civil" required>
                <option value="Soltero/a">Soltero/a</option>
                <option value="Casado/a">Casado/a</option>
                <option value="Viudo/a">Viudo/a</option>
            </select>

            <label for="codigo_patria">Código de patria:</label>
            <input type="text" id="codigo_patria" name="codigo_patria" placeholder="Ejem: 1234567890" required oninput="this.value = this.value.replace(/[^0-9]/g, '')">

            <label for="serial_patria">Serial de Patria:</label>
            <input type="text" id="serial_patria" name="serial_patria" placeholder="Ejem: ABC123456" required oninput="this.value = this.value.replace(/[^0-9]/g, '')">

            <label for="nivel_instruc">Nivel de Instrucción:</label>
            <select name="nivel_instruc" id="nivel_instruc" required>
                <option value="Primaria">Primaria</option>
                <option value="Secundaria">Secundaria</option>
                <option value="Universidad">Universidad</option>
            </select>

            <label for="profesion">Profesión:</label>
            <input type="text" id="profesion" name="profesion" placeholder="Ejem: Ingeniero, Médico, etc." required>

            <label for="trabajo1">¿Trabaja?</label>
            <select name="trabajo1" id="trabajo1" required>
                <option value="Si">Si</option>
                <option value="No" selected>No</option>
            </select>

            <label for="trabajo">Trabajo:</label>
            <input type="text" id="trabajo" name="trabajo" placeholder="Ejem: Ingeniero, Médico, etc." required>

            <label for="direc_trabajo">Dirección de Trabajo:</label>
            <input type="text" id="direc_trabajo" name="direc_trabajo" placeholder="Ejem: Av. Principal, Edificio X" required>

            <label for="trabaja_public">¿Trabaja en el sector público?</label>
            <select name="trabaja_public" id="trabaja_public" required >
                <option value="Si">Si</option>
                <option value="No" selected>No</option>
            </select>

            <label for="nombre_insti">Nombre de la Institución:</label>
            <input type="text" id="nombre_insti" name="nombre_insti" placeholder="Ejem: Ministerio de Educación" required>

            <label for="comunidad">Comunidad:</label>
            <input type="text" id="comunidad" name="comunidad" placeholder="Ejem: Barrio Altamira, etc." required>

            <label for="direc_habita">Dirección de Habitación:</label>
            <input type="text" id="direc_habita" name="direc_habita" placeholder="Ejem: Calle X, Edificio Y" required>

            <label for="estruc_base">Estructura Base:</label>
            <input type="text" id="estruc_base" name="estruc_base" placeholder="Ejem: Asamblea comunitaria, etc." required>

            <p>Datos Físicos Ambientales</p>
            <label for="propiedad">Propiedad</label>
            <select name="propiedad" id="propiedad" required>
                <option value="Casa">Casa</option>
                <option value="Apartamento">Apartamento</option>
                <option value="Rancho">Rancho</option>
                <option value="Otro">Otro</option>
            </select>

            <label for="propiedad_est">Propiedad</label>
            <select name="propiedad_est" id="propiedad_est" required>
                <option value="Propia">Propia</option>
                <option value="Prestada">Prestada</option>
                <option value="Alquiler">Alquiler</option>
            </select>

            <label for="observaciones">Observaciones:</label>
            <input type="text" id="observaciones" name="observaciones" placeholder="Detalles adicionales relevantes (Opcional)">

            <p>Datos Socio-Económicos</p>
            <label for="nivel_ingreso">Nivel de Ingresos:</label>
            <input type="text" id="nivel_ingreso" name="nivel_ingreso" placeholder="Ejem: 500 Bs" required oninput="this.value = this.value.replace(/[^0-9]/g, '')">

            <label for="pension">¿Recibe Bonos?</label>
            <select name="pension" id="pension" required>
                <option value="Si">Si</option>
                <option value="No">No</option>
            </select>

            <label for="bono">¿Recibe Pensiones?</label>
            <select name="bono" id="bono" required>
                <option value="Si">Si</option>
                <option value="No">No</option>
            </select>


            <p>Datos de Asistencia Médica</p>
            <label for="pers_patologia">Familiares con Patología:</label>
            <input type="text" id="pers_patologia" name="pers_patologia" placeholder="Ejem: 2" required>
            <div id="additional-patologias"></div>

            <p>Tipo de Ayuda</p>
            <label for="tip_ayuda">Tipo de Ayuda:</label>
            <input type="text" id="tip_ayuda" name="tip_ayuda" placeholder="Ejem: Medicinas, Equipos, etc." required>

            <label for="remitente">Remitente:</label>
            <input type="text" id="remitente" name="remitente" placeholder="Ejem: María González" required>

            <label for="observaciones_ayuda">Observaciones:</label>
            <input type="text" id="observaciones_ayuda" name="observaciones_ayuda" placeholder="Detalles relevantes (Opcional)">

            <button type="submit" name="btn" class="boton-newhelp">Enviar</button>
    </form>
</body>
<script src="../js/verificar_sesiones.js"></script>
<script src="../js/trabajo_help.js"></script>
<script src="../js/patologia_help.js"></script>
<script src="../js/fechas_help.js"></script>
<style>
    /* ELIMINA ESTO Y DALE EL ESTILO QUE QUIERAS DAVID ESTO LO PUSE NOMAS PA VERLO YO BONITO, EDITA EL CSS DIRECTAMENTE RECUERDA QUE AHORA SI SE ACTUALIZA ACORDE A LO QUE VAYAS HACIENDO */
    form{
        display:flex;
        flex-direction:column;
    }
</style>
</html>