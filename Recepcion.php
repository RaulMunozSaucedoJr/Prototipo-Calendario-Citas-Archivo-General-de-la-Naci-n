<?php 
require_once("AccionesRecepcion\ConexionTabla.php");
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
        maximum-scale=3.0, minimum-scale=1.0, user-scalable=yes, shrink-to-fit=no viewport-fit=cover">

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
    <!-- SWEET ALERT -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!----------------->
    <!-- TYPED JS --->
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.11"></script>
    <!--------------->
    <!-- HOJA DE ESTILO PERSONALIZADA PARA FULL CALENDAR -->
    <link rel="stylesheet" href="/vista/css/FullCalendarPersonalizado.css">
    <!----------------------------------------------------->
    <!-------------------BORRAR CITAS ------------------>
    <script src="/vista/js/Delete_Recepcion.js"></script>
    <!-------------------------------------------------->
    <!-- MOSTRAR Y OCULTAR TABLA DE CITAS -->
    <script src="/vista/js/hideshow.js"></script>
    <!-------------------------------------->
    <!-- Mensaje Navegador -->
    <!----------------------->

    <!--<script src="/vista/js/MensajeNavegador.js"></script>-->

    <script src="/vista/js/DataTableSettings.js"></script>

    <link rel="shortcut icon" href="#" />

</head>

<body>
    <div class="one">

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
                            echo '<h6 >Bienvenido - '.$_SESSION["usuario"].'</h6>';  
                            echo '<a id="cerrar_sesion" class="text-white" href="logout.php">Cerrar Sesión</a>';  
                        }  
                        else  
                        {  
                            header("location:Login_Usuarios.php");  
                        }  
                        ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/RegistroEmpleado.php">Registro Empleados</a>
                    </li>
                </ul>
            </div>
        </nav>


        <div class="container-fluid mtp" id="Recepcion">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <!-- MENSAJE ACERCA DE LOS USUARIOS REGISTRADOS Y SU POSIBLE ELIMINACIÓN DEL SISTEMA, POR MEDIO DE LA TABLA -->
                    <div class="alert alert-warning" role="alert">
                        ¡Al <b id="red"> Eliminar </b> una cita, esta <b id="red"> NO </b> podra ser recuperada!.
                    </div>

                    <!-- BOTON PARA MOSTRAR / OCULTAR TABLA: INFORMACIÓN DE INVESTIGADORES: HORARIO ENTRADA Y SALIDA -->
                    <button type="button" class="btn btn-outline-light" id="mostrar_ocultar"
                        onClick="hideshow()">Mostrar /
                        Ocultar Tabla</button>
                </div>

                <div class="col-sm-12 col-lg-12 col-md-12 area" id="citas">

                    <div class="col-sm-12 col-lg-12 margin mtp">
                        <label class="control-label">
                            <b>TABLA DE CITAS</b>
                        </label>
                    </div>

                    <table class="table table-responsive w-auto table-borderless" id="tabla_citas">
                        <thead class="table-info">
                            <tr>
                                <th scope="col">I.D.</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido Paterno</th>
                                <th scope="col">Apellido Materno</th>
                                <th scope="col">No. Investigador</th>
                                <th scope="col">Institución</th>
                                <th scope="col">Motivo</th>
                                <th scope="col">Hora de Entrada</th>
                                <th scope="col">Hora de Salida</th>
                                <th scope="col">Coleccion</th>
                                <th scope="col">Serie</th>
                                <th scope="col">Caja</th>
                                <th scope="col">Pieza</th>
                                <th scope="col">Tema</th>
                                <th scope="col">Correo</th>
                                <th scope="col" style="display:none;">I.D Calendario</th>
                                <th scope="col">Title</th>
                                <th scope="col" style="display:none;">Start Event</th>
                                <th scope="col" style="display:none;">End Event</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>

                        <tbody id="tb_citas">
                            <?php 
						$sql="SELECT * from eventos ORDER BY id ASC ";
						$result=mysqli_query($conexion,$sql);

						while($mostrar=mysqli_fetch_array($result)){
						?>
                            <tr>
                                <td><?php echo $mostrar['id'] ?></td>
                                <td><?php echo $mostrar['nombre'] ?></td>
                                <td><?php echo $mostrar['apellido_paterno'] ?></td>
                                <td><?php echo $mostrar['apellido_materno'] ?></td>
                                <td><?php echo $mostrar['numero_investigador'] ?></td>
                                <td><?php echo $mostrar['institucion'] ?></td>
                                <td><?php echo $mostrar['motivo'] ?></td>
                                <td><?php echo $mostrar['hora_entrada'] ?></td>
                                <td><?php echo $mostrar['hora_salida'] ?></td>
                                <td><?php echo $mostrar['coleccion'] ?></td>
                                <td><?php echo $mostrar['serie'] ?></td>
                                <td><?php echo $mostrar['caja'] ?></td>
                                <td><?php echo $mostrar['pieza'] ?></td>
                                <td><?php echo $mostrar['tema'] ?></td>
                                <td><?php echo $mostrar['correo'] ?></td>
                                <td style="display:none;"><?php echo $mostrar['id_calendario'] ?></td>
                                <td><?php echo $mostrar['title'] ?></td>
                                <td style="display:none;"><?php echo $mostrar['start_event'] ?></td>
                                <td style="display:none;"><?php echo $mostrar['end_event'] ?></td>
                                <td>
                                    <a href="Recepcion.php?delete=<?php echo $mostrar['id'];?>"
                                        class="btn btn-outline-danger btn-md btn-block" id="delete">Eliminar</a>
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


<!-- DATA TABLE -->
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
<!---------------->

<!-- ASSET´S LOCALES DE DATA TABLE -->
<script src="/datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
<script src="/datatables/JSZip-2.5.0/jszip.min.js"></script>
<script src="/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
<script src="/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script src="/datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
<!----------------------------------->

<script>
$(document).ready(function() {
    $('#tabla_citas').DataTable();
    dom: 'lBfrtip',
        buttons: [
            'pdf'
        ]
    "lengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
    ]
});
</script>

<script>
$(function() {
    $('[data-toggle="tooltip"]').tooltip()
});
</script>

</html>