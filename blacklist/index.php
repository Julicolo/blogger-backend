<?php
    include '../dbh.php';
    
    $userIp = $_SERVER['REMOTE_ADDR'];

    if (isset($_GET['me'])) {
        $query = $connection->prepare("
            SELECT COUNT(1) as valid
            FROM blacklist
            WHERE ip_adress = ?
        ");

        $query->bind_param(
          'i', $userIp
        );

        $query->execute();

        $result = $query->get_result();

        $resultsArray = [];

        while ($row = $result->fetch_assoc()) {
            $resultsArray[] = $row;
        }
    }
    else {
        $query = $connection->query("
            SELECT *
            FROM blacklist
            ORDER BY id DESC
        ");
        
        $resultsArray = [];
    
        while ($row = $query->fetch_assoc()) {
            $resultsArray[] = $row;
        }
    }

    $connection->close();
    
    echo json_encode($resultsArray);
