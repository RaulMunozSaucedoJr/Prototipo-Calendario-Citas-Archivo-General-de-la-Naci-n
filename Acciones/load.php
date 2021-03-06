<?php
        
        $connect = new PDO('mysql:host=localhost;dbname=calendar;charset=utf8', 'root', '');

        $data = array();

        $query = "SELECT * FROM eventos ORDER BY id";

        $statement = $connect->prepare($query);

        $statement->execute();

        $result = $statement->fetchAll();

        foreach($result as $row)
        {
                $data[] = array(
                        'id' => $row["id"],
                        'title' => $row["title"],
                        'start' => $row["start_event"],
                        'end' => $row["end_event"],
                );
        }

        echo json_encode($data);
?>