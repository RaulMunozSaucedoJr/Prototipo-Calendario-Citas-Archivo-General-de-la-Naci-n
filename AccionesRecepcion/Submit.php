<?php

$connect = new PDO('mysql:host=localhost;dbname=calendar;charset=utf8', 'root', '');
    
if(($_POST["nombre"])&&($_POST["apellido_paterno"])&&($_POST["apellido_materno"])&&($_POST["numero_investigador"])&&($_POST["institucion"])&&($_POST["motivo"])&&($_POST["hora_entrada"])
&&($_POST["hora_salida"])&&($_POST["coleccion"])&&($_POST["serie"])
&&($_POST["caja"])&&($_POST["pieza"])&&($_POST["tema"])&&($_POST["correo"]))
{
    $query = "INSERT INTO eventos (nombre, apellido_paterno, apellido_materno, numero_investigador, institucion, 
    motivo, hora_entrada, hora_salida, coleccion, serie, caja, pieza, tema, correo)
    VALUES (:nombre,:apellido_paterno, :apellido_materno, :numero_investigador, :institucion, :motivo, 
    :hora_entrada, :hora_salida, :coleccion, :serie, :caja, :pieza, :tema, :correo)";

    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':nombre' => $_POST['nombre'],
            ':apellido_paterno' => $_POST['apellido_paterno'],
            ':apellido_materno' => $_POST['apellido_materno'],
            ':numero_investigador' => $_POST['numero_investigador'],
            ':institucion' => $_POST['institucion'],
            ':motivo' => $_POST['motivo'],
            ':hora_entrada' => $_POST['hora_entrada'],
            ':hora_salida' => $_POST['hora_salida'],
            ':coleccion' => $_POST['coleccion'],
            ':serie' => $_POST['serie'],
            ':caja' => $_POST['caja'],
            ':pieza' => $_POST['pieza'],
            ':tema' => $_POST['tema'],
            ':correo' => $_POST['correo']
        )
    );

}
?>