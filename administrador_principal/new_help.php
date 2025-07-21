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
    <link rel="stylesheet" href="../css/solicitud.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="../css/registro.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="../font/css/all.css?v=<?php echo time();?>">
    <title>Formulario de ayuda</title>
</head>
<body class="solicitud-body">
    <header class="header">
        <div class="titulo-header">Sistema de solicitud de ayudas</div>
        <div class="header-right">
            <a href="main.php"><button class="nav-btn"><i class="fa fa-home"></i> <span>Inicio</span></button></a>
            <button class="nav-btn"><i class="fa fa-user"></i> <span>Usuario</span></button>
            <a href="system_help.php"><button class="nav-btn"><i class="fa fa-arrow-left"></i> <span>Regresar</span></button></a>
        </div>
    </header>

<form class="formulario-ayuda" method="POST" autocomplete="off">
    <h2><i class="fa fa-hands-helping"></i> Formulario de ayuda</h2>

    <div class="titulo-seccion"><i class="fa fa-user"></i> Datos Personales</div>
    <div class="fila-formulario">
      <div class="campo-formulario">
        <label for="descripcion">Descripción</label>
        <input type="text" id="descripcion" name="descripcion" placeholder="Ejem: Ayuda para silla de ruedas" required>
      </div>
      <div class="campo-formulario">
        <label for="id_manual">Número de documento</label>
        <input type="text" id="id_manual" name="id_manual" placeholder="00004578" required>
      </div>
    </div>
    <div class="fila-formulario">
      <div class="campo-formulario">
        <label for="nombres_apellidos">Nombres y Apellidos</label>
        <input type="text" id="nombres_apellidos" name="nombres_apellidos" placeholder="Ejem: Pedro Elias Paez Gonzalez" required>
      </div>
      <div class="campo-formulario">
        <label for="ci_perso">Cédula de Identidad</label>
        <input type="text" id="ci_perso" name="ci_perso" placeholder="Ejem: V-12345678" required pattern="[0-9]+" title="Solo números">
      </div>
    </div>
    <div class="fila-formulario">
      <div class="campo-formulario">
        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
      </div>
      <div class="campo-formulario">
        <label for="telefono">Teléfono</label>
        <input type="text" id="telefono" name="telefono" placeholder="Ejem: 0414-1234567" required pattern="[0-9\-]+" title="Solo números y guiones">
      </div>
    </div>
    <div class="fila-formulario">
      <div class="campo-formulario">
        <label for="lugar_nacimiento">Lugar de Nacimiento</label>
        <input type="text" id="lugar_nacimiento" name="lugar_nacimiento" placeholder="Ejem: Caracas, Venezuela" required>
      </div>
      <div class="campo-formulario">
        <label for="estado_civil">Estado Civil</label>
        <select name="estado_civil" id="estado_civil" required>
          <option value="">Seleccione</option>
          <option value="Soltero/a">Soltero/a</option>
          <option value="Casado/a">Casado/a</option>
          <option value="Viudo/a">Viudo/a</option>
        </select>
      </div>
    </div>
    <div class="fila-formulario">
      <div class="campo-formulario">
        <label for="codigo_patria">Código de patria</label>
        <input type="text" id="codigo_patria" name="codigo_patria" placeholder="Ejem: 1234567890" required pattern="[0-9]+">
      </div>
      <div class="campo-formulario">
        <label for="serial_patria">Serial de Patria</label>
        <input type="text" id="serial_patria" name="serial_patria" placeholder="Ejem: ABC123456" required>
      </div>
    </div>
    <div class="fila-formulario">
      <div class="campo-formulario">
        <label for="nivel_instruc">Nivel de Instrucción</label>
        <select name="nivel_instruc" id="nivel_instruc" required>
          <option value="">Seleccione</option>
          <option value="Primaria">Primaria</option>
          <option value="Secundaria">Secundaria</option>
          <option value="Universidad">Universidad</option>
        </select>
      </div>
      <div class="campo-formulario">
        <label for="profesion">Profesión</label>
        <input type="text" id="profesion" name="profesion" placeholder="Ejem: Ingeniero, Médico, etc." required>
      </div>
    </div>
    <div class="fila-formulario">
      <div class="campo-formulario">
        <label for="trabajo1">¿Trabaja?</label>
        <select name="trabajo1" id="trabajo1" required>
          <option value="">Seleccione</option>
          <option value="Si">Sí</option>
          <option value="No">No</option>
        </select>
      </div>
      <div class="campo-formulario">
        <label for="trabajo">Trabajo</label>
        <input type="text" id="trabajo" name="trabajo" placeholder="Ejem: Ingeniero, Médico, etc." required>
      </div>
    </div>
    <div class="fila-formulario">
      <div class="campo-formulario">
        <label for="direc_trabajo">Dirección de Trabajo</label>
        <input type="text" id="direc_trabajo" name="direc_trabajo" placeholder="Ejem: Av. Principal, Edificio X" required>
      </div>
      <div class="campo-formulario">
        <label for="trabaja_public">¿Trabaja en el sector público?</label>
        <select name="trabaja_public" id="trabaja_public" required>
          <option value="">Seleccione</option>
          <option value="Si">Sí</option>
          <option value="No">No</option>
        </select>
      </div>
    </div>
    <div class="fila-formulario">
      <div class="campo-formulario">
        <label for="nombre_insti">Nombre de la Institución</label>
        <input type="text" id="nombre_insti" name="nombre_insti" placeholder="Ejem: Ministerio de Educación" required>
      </div>
      <div class="campo-formulario">
        <label for="comunidad">Comunidad</label>
        <input type="text" id="comunidad" name="comunidad" placeholder="Ejem: Barrio Altamira, etc." required>
      </div>
    </div>
    <div class="fila-formulario">
      <div class="campo-formulario">
        <label for="direc_habita">Dirección de Habitación</label>
        <input type="text" id="direc_habita" name="direc_habita" placeholder="Ejem: Calle X, Edificio Y" required>
      </div>
      <div class="campo-formulario">
        <label for="estruc_base">Estructura Base</label>
        <input type="text" id="estruc_base" name="estruc_base" placeholder="Ejem: Asamblea comunitaria, etc." required>
      </div>
    </div>

    <div class="titulo-seccion"><i class="fa fa-home"></i> Datos Físicos Ambientales</div>
    <div class="fila-formulario">
      <div class="campo-formulario">
        <label for="propiedad">Propiedad</label>
        <select name="propiedad" id="propiedad" required>
          <option value="">Seleccione</option>
          <option value="Casa">Casa</option>
          <option value="Apartamento">Apartamento</option>
          <option value="Rancho">Rancho</option>
          <option value="Otro">Otro</option>
        </select>
      </div>
      <div class="campo-formulario">
        <label for="propiedad_est">Tipo de Propiedad</label>
        <select name="propiedad_est" id="propiedad_est" required>
          <option value="">Seleccione</option>
          <option value="Propia">Propia</option>
          <option value="Prestada">Prestada</option>
          <option value="Alquiler">Alquiler</option>
        </select>
      </div>
    </div>
    <div class="campo-formulario">
      <label for="observaciones">Observaciones</label>
      <input type="text" id="observaciones" name="observaciones" placeholder="Detalles adicionales relevantes (Opcional)">
    </div>

    <div class="titulo-seccion"><i class="fa fa-money-bill"></i> Datos Socio-Económicos</div>
    <div class="fila-formulario">
      <div class="campo-formulario">
        <label for="nivel_ingreso">Nivel de Ingresos</label>
        <input type="text" id="nivel_ingreso" name="nivel_ingreso" placeholder="Ejem: 500 Bs" required pattern="[0-9]+">
      </div>
      <div class="campo-formulario">
        <label for="pension">¿Recibe Bonos?</label>
        <select name="pension" id="pension" required>
          <option value="">Seleccione</option>
          <option value="Si">Sí</option>
          <option value="No">No</option>
        </select>
      </div>
      <div class="campo-formulario">
        <label for="bono">¿Recibe Pensiones?</label>
        <select name="bono" id="bono" required>
          <option value="">Seleccione</option>
          <option value="Si">Sí</option>
          <option value="No">No</option>
        </select>
      </div>
    </div>

    <div class="titulo-seccion"><i class="fa fa-medkit"></i> Datos de Asistencia Médica</div>
    <div class="fila-formulario">
      <div class="campo-formulario">
        <label for="pers_patologia">Familiares con Patología</label>
        <input type="text" id="pers_patologia" name="pers_patologia" placeholder="Ejem: 2" required pattern="[0-9]+">
      </div>
    </div>

    <div class="titulo-seccion"><i class="fa fa-hand-holding-heart"></i> Tipo de Ayuda</div>
    <div class="fila-formulario">
      <div class="campo-formulario">
        <label for="tip_ayuda">Tipo de Ayuda</label>
        <select name="tip_ayuda" id="tip_ayuda" required>
          <option value="">Seleccione</option>
          <option value="Silla de Ruedas">Silla de Ruedas</option>
          <option value="Silla de Ruedas(Niño)">Silla de Ruedas(Niño)</option>
          <option value="Andadera">Andadera</option>
          <option value="Andadera (Niño)">Andadera (Niño)</option>
          <option value="Bastón 1 Punta">Bastón 1 Punta</option>
          <option value="Bastón 3 Puntas">Bastón 3 Puntas</option>
          <option value="Bastón 4 Puntas">Bastón 4 Puntas</option>
          <option value="Muletas">Muletas</option>
          <option value="Muletas (Niño)">Muletas (Niño)</option>
          <option value="Collarín">Collarín</option>
          <option value="Colchón Anti-escaras">Colchón Anti-escaras</option>
          <option value="Otros">Otros</option>
        </select>
      </div>
      <div class="campo-formulario">
        <label for="categoria">Categoría</label>
        <select name="categoria" id="categoria" required>
          <option value="">Seleccione</option>
          <option value="Ayudas técnicas">Ayudas técnicas</option>
          <option value="Medicamentos">Medicamentos</option>
          <option value="Laboratorio">Laboratorio</option>
          <option value="Enseres">Enseres</option>
        </select>
      </div>
    </div>
    <div class="fila-formulario">
      <div class="campo-formulario">
        <label for="remitente">Remitente</label>
        <input type="text" id="remitente" name="remitente" placeholder="Ejem: María González" required>
      </div>
      <div class="campo-formulario">
        <label for="observaciones_ayuda">Observaciones</label>
        <input type="text" id="observaciones_ayuda" name="observaciones_ayuda" placeholder="Detalles relevantes (Opcional)">
      </div>
    </div>

    <button type="submit" class="boton-enviar-ayuda"><i class="fa fa-paper-plane"></i> Enviar</button>
</form>

</body>
<script src="../js/verificar_sesiones.js"></script>
<script src="../js/trabajo_help.js"></script>
<script src="../js/patologia_help.js"></script>
<script src="../js/fechas_help.js"></script>
</html>