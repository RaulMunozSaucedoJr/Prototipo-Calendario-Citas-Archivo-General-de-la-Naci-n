<?php

$connect = new PDO('mysql:host=localhost;dbname=calendar;charset=utf8', 'root', '');
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
$connect->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

if(($_POST["nombre_empleado"])&&($_POST["ap_empleado"])&&($_POST["am_empleado"])&&($_POST["telefono_fijo_empleado"])
&&($_POST["telefono_movil_empleado"])&&($_POST["numero_empleado"])&&($_POST["usuario"])
&&($_POST["contrasena"])&&($_POST["correo_empleado"]))
{
    $query = "INSERT INTO empleados (nombre_empleado, ap_empleado, am_empleado, telefono_fijo_empleado,
    telefono_movil_empleado, numero_empleado, usuario, contrasena, correo_empleado)
    VALUES (:nombre_empleado, :ap_empleado, :am_empleado, :telefono_fijo_empleado, :telefono_movil_empleado,
    :numero_empleado, :usuario, :contrasena, :correo_empleado)";

    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':nombre_empleado' => $_POST['nombre_empleado'],
            ':ap_empleado' => $_POST['ap_empleado'],
            ':am_empleado' => $_POST['am_empleado'],
            ':telefono_fijo_empleado' => $_POST['telefono_fijo_empleado'],
            ':telefono_movil_empleado' => $_POST['telefono_movil_empleado'],
            ':numero_empleado' => $_POST['numero_empleado'],
            ':usuario' => $_POST['usuario'],
            ':contrasena' => $_POST['contrasena'],
            ':correo_empleado' => $_POST['correo_empleado']
        )
    );

}
?>