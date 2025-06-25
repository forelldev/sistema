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

            <label for="titulo">Descripción:</label>
            <input type="text" id="titulo" name="descripcion" placeholder="Ejem: Ayuda para silla de ruedas" required>

            <label for="id_manual">Número de documento:</label>
            <input type="text" id="id_manual" name="id_manual" placeholder="00004578" required>

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
            <select name="comunidad" id="comunidad">
                <option>PALMICHAL</option>
                <option>LA ENSENADA</option>
                <option>CUJISAL</option>
                <option>EL CARDON</option>
                <option>AGUA AZUL</option>
                <option>ESPARRAMADERO</option>
                <option>CAJA DE AGUA</option>
                <option>PRODUCTORES DE CAMPO ALEGRE</option>
                <option>VILLAS DE YARA</option>
                <option>RENACER DE UN PUEBLO</option>
                <option>EL PARAISO</option>
                <option>DON ANTONIO</option>
                <option>MOTOCROSS</option>
                <option>ANA SUAREZ CENTRO</option>
                <option>LA MAPORITA</option>
                <option>EL JAGUEY</option>
                <option>SABANA DE TIQUIRE</option>
                <option>CERRO GRANDE</option>
                <option>TACARIGUITA</option>
                <option>REVOLUCION 106</option>
                <option>SIEMPRE ADELANTE 107 SAN JOSE</option>
                <option>MAIZANTA</option>
                <option>CREANDO CONCIENCIA</option>
                <option>UNIDAD Y ACCION</option>
                <option>MONTAÑITA I</option>
                <option>DANIEL CARIAS Y BANCO OBREROS</option>
                <option>MONTAÑITA III</option>
                <option>BARRIO BOLIVAR</option>
                <option>LA REALIDAD</option>
                <option>TEREPAIMA</option>
                <option>COLINAS DE TEREPAIMA (VOLUNTAD Y ACCION)</option>
                <option>BRISAS DE TEREPAIMA</option>
                <option>CASERIO DE CAÑAVERAL</option>
                <option>SOL BOLIVARIANO</option>
                <option>EL SALTO</option>
                <option>SABANA DE GUREMAL</option>
                <option>QUEBRADA GRANDE</option>
                <option>EL PLAYON</option>
                <option>BRISAS DEL PEGON</option>
                <option>ARENALES VIA EL SALTO</option>
                <option>CAMBURITO SECTOR LA CRISPINERA</option>
                <option>LA FLORIDA</option>
                <option>MONTANITA II BICENTENARIO</option>
                <option>II DE SEPTIEMBRE</option>
                <option>MONTAÑITA INDIO COY ( LIRIOS DEL VALLE)</option>
                <option>LA VICTORIA</option>
                <option>YACURAL</option>
                <option>TORBELLAN</option>
                <option>ANIMAS</option>
                <option>UVEDAL</option>
                <option>DON NICOLA</option>
                <option>EL SARURO</option>
                <option>PUEBLO UNIDO</option>
                <option>OVIDIO MARCHAN</option>
                <option>AGUA VIVA</option>
                <option>SAN ANTONIO LA TAPA</option>
                <option>BRISAS DE LA TAPA</option>
                <option>TAPA LA LUCHA</option>
                <option>EL POR VENIR</option>
                <option>FRANCISCA HERNANDEZ</option>
                <option>FABRICIO SEQUERA/ LA MORA</option>
                <option>RIVERA SANTA LUCIA</option>
                <option>ALDEA LA PAZ</option>
                <option>LA FUENTE</option>
                <option>CANAAN CELESTIAL TIERRA DE DIOS</option>
                <option>TOTUMILLO</option>
                <option>SAN ROQUE</option>
                <option>AMINTA ABREU</option>
                <option>LA VAQUERA BARRIO AJURO</option>
                <option>PIEDRA ARRIBA</option>
                <option>PIEDRA CENTRO</option>
                <option>SAN ANTONIO - LA PIEDRA</option>
                <option>PUEBLO NUEVO</option>
                <option>DON TEODORO</option>
                <option>TEOLINDA PAEZ</option>
                <option>SANTA EDUVIGE LOS RANCHOS</option>
                <option>PAZ BOLIVARIANA</option>
                <option>SOMOS TODOS</option>
                <option>URBANIZACION ARAGUANEY</option>
                <option>NUEVA ESPERANZA-CRISTO REY</option>
                <option>LOS REVOLUCIONARIOS</option>
                <option>VILLA OLIMPICA</option>
                <option>RAFAEL RANGEL</option>
                <option>SUEÑOS BOLIVARIANOS  SABANITA 1</option>
                <option>SECTOR LA VIRGEN</option>
                <option>LA ROCA DE LA SALVACIÓN</option>
                <option>URIBEQUE</option>
                <option>URBANIZACION SIMON RODRIGUEZ III</option>
                <option>URBANIZACION SIMON RODRIGUEZ I</option>
                <option>SANTA INES</option>
                <option>ALI PRIMERA PLATANALES</option>
                <option>JUAN BERNARDO NAHACA</option>
                <option>LA ORQUIDEA</option>
                <option>SABANITA 4/ ALI PRIMERA</option>
                <option>VILLA JARDIN</option>
                <option>UNION BOLIVARIANA /BOLIVARIANA 1</option>
                <option>TRICENTENARIA POPULAR</option>
                <option>EL PINAL</option>
                <option>EL POZON</option>
                <option>LIMONCITO</option>
                <option>EL CARMELERO</option>
                <option>AGUA NEGRA</option>
                <option>AGUA LINDA</option>
                <option>ALBARICAL</option>
                <option>LA PERDOMERA</option>
                <option>LA HILERA</option>
                <option>PEGON PASTOR GARCIA</option>
                <option>TRICENTENARIA 1</option>
                <option>TERMO YARACUY</option>
                <option>ENCRUCIJADA</option>
                <option>VALLES DE PEÑA</option>
                <option>HATO VIEJO</option>
                <option>CAMINO NUEVO</option>
                <option>SAN RAFAEL</option>
                <option>LOS TUBOS</option>
                <option>LOS PATIECITOS</option>
                <option>POTRERITO</option>
                <option>CAÑADA TEMA</option>
                <option>EL MILAGRO DE BARRIO AJURO I</option>
                <option>BARRIO AJURO LAS 4R</option>
                <option>SAN ANTONIO (LA REVOLUCION DE SAN ANTONIO)</option>
                <option>EL VAPOR</option>
                <option>ARENALES( VIA LAS VELAS)</option>
                <option>AMIGO TRES CALLEJONES</option>
                <option>GRANVEL</option>
                <option>LAS VELAS CENTRO</option>
                <option>5 Y 7 CASAS</option>
                <option>EL PALMAR</option>
                <option>YUMARITO</option>
                <option>SANTA BARBARA</option>
                <option>SANTA LUCIA</option>
                <option>LA CONCEPCION</option>
                <option>PILCO MAYO</option>
                <option>VILLAS SANTA LUCIA</option>
                <option>TIAMA</option>
                <option>LA BANDERA</option>
                <option>JOSE GREGORIO AMAYA</option>
                <option>LA TRILLA</option>
                <option>TIERRA AMARILLA</option>
                <option>EL CHIMBORAZO</option>
                <option>LA RURAL SECTOR 102</option>
                <option>EL JOBITO</option>
            </select>
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
            <input type="text" id="pers_patologia" name="pers_patologia" placeholder="Ejem: 2" required oninput="this.value = this.value.replace(/[^0-9]/g, '')">
            <div id="additional-patologias"></div>

            <p>Tipo de Ayuda</p>
            <label for="tip_ayuda">Tipo de Ayuda:</label>
            <select name="tip_ayuda" id="tip_ayuda">
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
            <p>Categoría:</p>
            <label for="categoria">Categoría</label>
            <select name="categoria" id="categoria">
                <option value="Ayudas técnicas">Ayudas técnicas</option>
                <option value="Medicamentos">Medicamentos</option>
                <option value="Laboratorio">Laboratorio</option>
                <option value="Enseres">Enseres</option>
            </select>
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