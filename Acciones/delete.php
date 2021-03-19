<?php

$connect = new PDO('mysql:host=localhost;dbname=calendar;charset=utf8', 'root', '');

if(isset($_POST["id"]))
{
    $connect = new PDO('mysql:host=localhost;dbname=calendar;', 'root', '');
    $query = "DELETE FROM eventos WHERE id=:id";

    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':id' => $_POST['id']
        )
    );
}
?>