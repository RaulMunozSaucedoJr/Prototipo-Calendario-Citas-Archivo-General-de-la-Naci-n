<?php  
 session_start();
 try  
 {  
    $connect = new PDO('mysql:host=localhost;dbname=calendar;charset=utf8', 'root', '');  
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
    $connect->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["usuario"])||empty($_POST["contrasena"])||empty(trim($_POST['usuario']))||empty(trim($_POST['contrasena'])))  
           {  
                $message = 
                '
                <script>
                swal({
                    title: "¡Usuario y/o Contraseña vacios!.",
                    text: "¡Por favor, verifique la información ingresada en el campo!.",
                    icon: "error",
                    timer: 2000,
                    closeOnClickOutside: true,
                    button: false,
                    closeOnEsc: true,
                });
                </script>
                ';  
           }
           else  
           {  
                $query = "SELECT * FROM empleados WHERE usuario = :usuario AND contrasena = :contrasena LIMIT 1";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array(  
                          'usuario'     =>     $_POST["usuario"],  
                          'contrasena'     =>     $_POST["contrasena"]  
                     )  
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                     $_SESSION["usuario"] = $_POST["usuario"];
                     $_SESSION["contrasena"] = $_POST["contrasena"];    
                     header("location:Recepcion.php");  
                }  
                else  
                {  
                     $message = 
                     '
                     <script>
                     swal({
                        title: "¡Usuario y/o Contraseña Incorrecto(s)!",
                        text: "¡Por favor, verifique la información ingresada en los campos!.",
                        icon: "error",
                        timer: 3000,
                        closeOnClickOutside: false,
                        button: false,
                        closeOnEsc: false,
                    });
                     </script>
                     ';  
                }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
 ?>
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
    <!------------------------------------------>
    <!-- TYPED JS --->
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.11"></script>
    <!--------------->
    <!-- SWEET ALERT -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!----------------->
    <!-- HOJA DE ESTILO PERSONALIZADA PARA FULL CALENDAR -->
    <link rel="stylesheet" href="/vista/css/FullCalendarPersonalizado.css">
    <!----------------------------------------------------->
    <!-- Mensaje Navegador -->
    <script src="/vista/js/MensajeNavegador.js"></script>
    <!----------------------->
    <!-- Validación Login -->
    <script src="/vista/js/ValidacionLogin.js"></script>
    <!---------------------->

    <link rel="shortcut icon" href="#" />

    <title>Login - Archivo General de la Nación</title>

</head>

<body oncontextmenu="return false;">

    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <h3 class="login-heading mb-4">¡Bienvenido!</h3>
                                <form method="POST" onSubmit="return ValidacionLogin()" autocomplete="off">
                                    <label>Usuario</label>
                                    <input type="text" name="usuario" id="usuario" class="form-control"
                                        data-toggle="tooltip" data-placement="top"
                                        title="Aquí va su usuario otorgado previamente." />
                                    <br />
                                    <label>Contraseña</label>
                                    <input type="password" name="contrasena" id="contrasena" class="form-control"
                                        data-toggle="tooltip" data-placement="top"
                                        title="Aquí va su contraseña otorgada previamente." />
                                    <br />
                                    <div class="row">
                                        <div class="col-md-6 col-lg-12 col-xl-6 mpt">
                                            <input type="submit" name="login" class="btn btn-outline-light btn-block"
                                                id="submit" value="Login" />
                                        </div>
                                        <div class="col-md-6 col-lg-12 col-xl-6 mpt">
                                            <button type="reset" value="Reset" id="reset"
                                                class="btn btn-outline-light btn-block">
                                                Limpiar
                                            </button>
                                        </div>
                                    </div>
                                    <div class="text-center mpt3">
                                        <div class="row no.gutters">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <?php  
                                                if(isset($message))  
                                                {  
                                                    echo '<label id="red" class="text-danger">'.$message.'</label>';  
                                                }  
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
$(function() {
    $('[data-toggle="tooltip"]').tooltip()
})
</script>
<script>
window.setTimeout(function() {
    $("#red").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
    });
}, 2000);
</script>
<script>
$(function() {
    $('#usuario').on('keypress', function(e) {
        if (e.which == 32)
            return false;
    });
});
$(function() {
    $('#contrasena').on('keypress', function(e) {
        if (e.which == 32)
            return false;
    });
});
</script>
<script>
window.oncontextmenu = function() {
    swal({
        title: "¡Click derecho NO esta permitido!.",
        text: "¡Por su comprensión, gracias!.",
        icon: "warning",
        timer: 4000,
        closeOnClickOutside: false,
        button: false,
        closeOnEsc: false,
    });
    return false;
}
</script>

</html>