<?php 
$pdo = new PDO ('mysql:host=localhost; dbname=calendar', 'root', '');
$sql = "SELECT id_area, nombre_area FROM areas ORDER BY id_area ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$areas = $stmt->fetchAll();
?>