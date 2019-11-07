<?php
    include '../../dbh.php';

    if (isset($_POST['add'])) {
        $query = $connection->prepare("
            INSERT INTO blacklist (ip_adress)
            VALUES (?)
        ");

        $query->bind_param(
          's', $_POST['add']
        );

        $query->execute();

        $selectQuery = $connection->prepare("
            SELECT *
            FROM blacklist 
            WHERE ip_adress = ?
        ");

        $selectQuery->bind_param(
          's', $_POST['add']
        );

        $selectQuery->execute();

        $result = $selectQuery->get_result();
        
        $connection->close();
        
        echo json_encode($result->fetch_assoc());
    }


