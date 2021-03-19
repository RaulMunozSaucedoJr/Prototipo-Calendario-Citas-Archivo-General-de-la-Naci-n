<?php 
require_once("AccionesEmpleados\ConexionTablaEmpleados.php")
?>

<!DOCTYPE html>
<html>

<head>
    <!------------ BOOSTRAP ASSET´S ------------>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/moment.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js">
    </script>
    <!-- ETIQUETA META PARA CUANDO SE TENGA INACTIVIDAD POR TRES MINUTOS SE CIERRE SESIÓN -->
    <meta http-equiv="refresh" content="180;url=logout.php" />
    <!-------------------------------------------------------------------------------------->
    <!-- WEBCAMJS -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>-->
    <!-------------->
    <!-- TYPED JS --->
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.11"></script>
    <!--------------->
    <!-- SWEET ALERT -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!----------------->
    <!-- HOJA DE ESTILO PERSONALIZADA PARA FULL CALENDAR -->
    <link rel="stylesheet" href="/vista/css/FullCalendarPersonalizado.css">
    <!----------------------------------------------------->
    <!-- MOSTRAR Y OCULTAR TABLA DE CITAS -->
    <script src="/vista/js/hideshow.js"></script>
    <!-------------------------------------->
    <!-- VALIDACIÓN DE EMPLEADOS -------------------------->
    <script src="/vista/js/ValidacionEmpleados.js"></script>
    <!----------------------------------------------------->
    <!-- SUBMIT DE EMPLEADOS ------------------------------>
    <script src="/vista/js/Submit_Empleados.js"></script>
    <!----------------------------------------------------->
    <!-- TOMA FOTO DE EMPLEADO Y LA GUARDA EN LA BD -->
    <!--<script src="/vista/js/TomarFoto.js"></script>-->
    <!------------------------------------------------>
    <!----------- BORRA DE LA BD A LOS EMPLEADOS----------->
    <script src="/vista/js/Delete_Empleados.js"></script>
    <!-------------------------------------------------->
    <!-- Mensaje Navegador -->
    <script src="/vista/js/MensajeNavegador.js"></script>
    <!----------------------->

    <script src="/vista/js/MensajeNavegador.js"></script>

    <script src="/vista/js/DataTableSettings.js"></script>

    <link rel="shortcut icon" href="#" />

</head>

<body>

    <!--BANNER DE GOBIERNO DE MÉXICO & ARCHIVO GENERAL DE LA NACIÓN -->
    <img src="/vista/img/fondoGuiaCompleto.jpg" class="img-fluid fixed" alt="Gobierno de México">
    <!---------------------------------------------------------------->

    <nav class="navbar navbar-light amber lighten-4 mb-4 sticky-top">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler first-button" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent20" aria-controls="navbarSupportedContent20" aria-expanded="false"
            aria-label="Toggle navigation">
            <div class="animated-icon1"><span></span><span></span><span></span></div>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent20">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active text-white">
                    <?php  
                        session_start();  
                        if(isset($_SESSION["usuario"]))  
                        {  
                            echo '<h6>Bienvenido - '.$_SESSION["usuario"].'</h6>';  
                            echo '<a id="cerrar_sesion" class="text-white" href="logout.php">Cerrar Sesión</a>';  
                        }  
                        else  
                        {  
                            header("location:Login_Usuarios.php");  
                        }  
                        ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/Recepcion.php">Recepción</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid mtp" id="Recepcion">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <!-- MENSAJE ACERCA DE LOS USUARIOS REGISTRADOS Y SU POSIBLE ELIMINACIÓN DEL SISTEMA, POR MEDIO DE LA TABLA -->
                <div class="alert alert-warning" role="alert">
                    ¡Al <b id="red"> Eliminar </b> a un empleado <b id="red"> NO </b> podra ser recuperado!. ¡A menos
                    que se vuelva a registrar!
                </div>
            </div>

            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <form method="post" onSubmit="return ValidacionEmpleados()" id="formulario_empleados"
                    action="/AccionesEmpleados/storeImage.php">
                    <div class="row">

                        <!-- Tomar Foto del empleado -->
                        <!--<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="col-sm-6 col-md-12 col-lg-12 col-xl-12 mpt">
                                <div id="my_camera">
                                </div>
                                <input type=button value="Take Snapshot" onClick="take_snapshot()">
                                <input type="hidden" name="image" class="image-tag">
                            </div>

                            <div class="col-sm-6 col-md-12 col-lg-12 col-xl-12 mpt">
                                <div id="results">Your captured image will appear here...</div>
                            </div>
                        </div>-->

                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mpt">
                            <!-- MENSAJE SOBRE REGISTRO DE EMPLEADOS -->
                            <div class="alert alert-warning" role="alert">
                                Los campos marcados con un <b id="red">*</b> son <b id="red">OBLIGATORIOS</b>
                            </div>
                        </div>
                        <!-- NOMBRE(S) DEL EMPLEADO -->
                        <div class="col-md-12 col-lg-12 col-xl-6 mpt3">
                            <label class="control-label"><b id="red">*</b>Nombre(s)</label>
                            <input class="form-control" placeholder="Nombre(s)" type="text" name="nombre_empleado"
                                id="nombre_empleado" data-toggle="tooltip" data-placement="top"
                                title="Recuerde escribir correctamente su(s) nombre(s).">
                        </div>
                        <!-- APELLIDO PATERNO EMPLEADO -->
                        <div class="col-md-12 col-lg-12 col-xl-6 mpt3">
                            <label class="control-label"><b id="red">*</b>Apellido Paterno</label>
                            <input class="form-control" placeholder="Apellido Paterno" type="text" name="ap_empleado"
                                id="ap_empleado" data-toggle="tooltip" data-placement="top"
                                title="Recuerde escribir correctamente su apellido paterno.">
                        </div>
                        <!-- APELLIDO MATERNO EMPLEADO -->
                        <div class="col-md-12 col-lg-12 col-xl-6 mpt3">
                            <label class="control-label"><b id="red">*</b>Apellido Materno</label>
                            <input class="form-control" placeholder="Apellido Materno" type="text" name="am_empleado"
                                id="am_empleado" data-toggle="tooltip" data-placement="top"
                                title="Recuerde escribir correctamente su apellido materno">
                        </div>
                        <!-- TELEFONO FIJO EMPLEADO -->
                        <div class="col-md-12 col-lg-12 col-xl-6 mpt3">
                            <label class="control-label"><b id="red">*</b>Telefono Fijo</label>
                            <input class="form-control" placeholder="Telefono Fijo" type="text"
                                name="telefono_fijo_empleado" id="telefono_fijo_empleado" data-toggle="tooltip"
                                data-placement="top"
                                title="Recuerde escribir correctamente su teléfono fijo correctamente.">
                        </div>
                        <!-- TELEFONO MOVIL EMPLEADO -->
                        <div class="col-md-12 col-lg-12 col-xl-6 mpt3">
                            <label class="control-label"><b id="red">*</b>Telefono Movil</label>
                            <input class="form-control" placeholder="Telefono Movil" type="text"
                                name="telefono_movil_empleado" id="telefono_movil_empleado" data-toggle="tooltip"
                                data-placement="top" title="Recuerde escribir correctamente sus teléfono movil.">
                        </div>
                        <!-- NUMERO IDENTIFICADOR EMPLEADO -->
                        <div class="col-md-12 col-lg-12 col-xl-6 mpt3">
                            <label class="control-label"><b id="red">*</b>Numero Empleado</label>
                            <input class="form-control" placeholder="Numero de Trabajador" type="text"
                                name="numero_empleado" id="numero_empleado" data-toggle="tooltip" data-placement="top"
                                title="Recuerde escribir CORRECTAMENTE EL NUMERO IDENTIFICADOR DE EMPLEADO.">
                        </div>
                        <!-- USUARIO -->
                        <div class="col-md-12 col-lg-12 col-xl-6 mpt3">
                            <label class="control-label"><b id="red">*</b>Usuairo</label>
                            <input class="form-control" placeholder="Usuario" type="text" name="usuario" id="usuario"
                                data-toggle="tooltip" data-placement="top" title="Recuerde escribir su usuario.">
                        </div>
                        <!-- CONTRASEÑA -->
                        <div class="col-md-12 col-lg-12 col-xl-6 mpt3">
                            <label class="control-label"><b id="red">*</b>Contraseña</label>
                            <input class="form-control" placeholder="Contraseña" type="password" name="contrasena"
                                id="contrasena" data-toggle="tooltip" data-placement="top"
                                title="Recuerde ingresar una contraseña segura, pero a la vez que se acuerde de ella.">
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mpt">
                            <small id="red">El Usuario y la Contraseña NO pueden llevar espacios en blanco</small>
                        </div>

                        <!-- CORREO ELECTRÓNICO EMPLEADO -->
                        <div class="col-md-12 col-lg-12 col-xl-12 mpt">
                            <label class="control-label"><b id="red">*</b>Correo Electrónico</label>
                            <input class="form-control" placeholder="Correo Electrónico" type="text"
                                name="correo_empleado" id="correo_empleado" data-toggle="tooltip" data-placement="top"
                                title="Recuerde escribir correctamente su correo electrónico.">
                        </div>
                    </div>
                    <!-- ACCIONES DE BOTONES: REGISTRAR | LIMPIAR -->
                    <div class="row">
                        <div class="col-md-6 col-lg-12 col-xl-6 mpt">
                            <button type="submit" id="submit" class="btn btn-outline-light btn-block">
                                Registrar
                            </button>
                        </div>

                        <div class="col-md-6 col-lg-12 col-xl-6 mpt">
                            <button type="reset" value="Reset" id="reset" class="btn btn-outline-light btn-block">
                                Limpiar
                            </button>
                        </div>
                    </div>
                    <!----------------------------------------------->
                </form>
            </div>

            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8 mpt">
                <div class="col-md-12 col-lg-12">
                    <!-- BOTON PARA MOSTRAR / OCULTAR TABLA DE EMPLEADOS -->
                    <button type="button" class="btn btn-outline-light btn-md" id="mostrar_ocultar"
                        onClick="hideshow()">Mostrar /
                        Ocultar Tabla</button>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="citas">

                    <div class="col-sm-12 col-md-12 col-lg-12 col-sl-12 mtp">
                        <label class="control-label">
                            <b>TABLA DE EMPLEADOS</b>
                        </label>
                    </div>

                    <table class="table table-responsive w-auto table-borderless" id="tabla_empleados">
                        <thead class="table-info">
                            <tr>
                                <th scope="col">I.D.</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido Paterno</th>
                                <th scope="col">Apellido Materno</th>
                                <th scope="col">Telefóno Fijo</th>
                                <th scope="col">Telefóno Movil</th>
                                <th scope="col">Numero Trabajador</th>
                                <th scope="col">Usuario</th>
                                <th scope="col" style="display:none">Contraseña</th>
                                <th scope="col">Correo Electrónico</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>

                        <tbody id="tb_empleados">
                            <?php 
						$sql="SELECT * from empleados ORDER BY id ASC ";
						$result=mysqli_query($conexion,$sql);

						while($mostrar=mysqli_fetch_array($result)){
						?>
                            <tr>
                                <td><?php echo $mostrar['id'] ?></td>
                                <td><?php echo $mostrar['nombre_empleado'] ?></td>
                                <td><?php echo $mostrar['ap_empleado'] ?></td>
                                <td><?php echo $mostrar['am_empleado'] ?></td>
                                <td><?php echo $mostrar['telefono_fijo_empleado'] ?></td>
                                <td><?php echo $mostrar['telefono_movil_empleado'] ?></td>
                                <td><?php echo $mostrar['numero_empleado'] ?></td>
                                <td><?php echo $mostrar['usuario'] ?></td>
                                <td style="display:none"><?php echo $mostrar['contrasena'] ?></td>
                                <td><?php echo $mostrar['correo_empleado'] ?></td>
                                <td>
                                    <a href="RegistroEmpleado.php?delete=<?php echo $mostrar['id'];?>"
                                        class="btn btn-outline-danger btn-sm btn-block" id="delete">Eliminar</a>

                                </td>
                            </tr>
                            <?php 
						}
						?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

<!-- ASSET´S ONLINE DE DATA TABLE -->
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
<!----------------------------------->

<!-- ASSET´S LOCALES DE DATA TABLE -->
<script src="/datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
<script src="/datatables/JSZip-2.5.0/jszip.min.js"></script>
<script src="/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
<script src="/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script src="/datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
<!----------------------------------->
<script>
$(document).ready(function() {
$('#tabla_empleados').DataTable();
fixedHeader: true,
    dom: 'lBfrtip',
    buttons: [
        'pdf'
    ]
"lengthMenu": [
    [10, 25, 50, -1],
    [10, 25, 50, "All"]
]
});
});
</script>

<script>
$(function() {
    $('[data-toggle="tooltip"]').tooltip()
})
</script>

<!--<script language="JavaScript">
Webcam.set({
    width: 400,
    height: 200,
    image_format: 'jpeg',
    jpeg_quality: 100
});

Webcam.attach('#my_camera');

function take_snapshot() {
    Webcam.snap(function(data_uri) {
        $(".image-tag").val(data_uri);
        document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
    });
}
</script>-->

</html>