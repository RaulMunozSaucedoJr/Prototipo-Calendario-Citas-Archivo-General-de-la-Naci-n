<?php

$conexion=mysqli_connect('localhost','root','','calendar');

if(isset($_GET["delete"])){
    $id=$_GET["delete"];
    $conexion->query("DELETE FROM eventos WHERE id=$id") or die ($conexion->error());
}

?>