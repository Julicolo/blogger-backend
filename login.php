<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: *');
    
    $_POST = json_decode(file_get_contents('php://input'), true);

    $connection = new mysqli('localhost', 'root', 'root', 'blog');
    $connection->set_charset('utf8');

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $query = $connection->prepare("
            SELECT users.id, users.username, users.admin
            FROM users
            WHERE users.username = ? AND users.password = ?
        ");

        $query->bind_param(
          'ss', $_POST['username'], $_POST['password']
        );

        $query->execute();

        $result = $query->get_result();

        while ($row = $result->fetch_assoc()) {
            $resultsArray[] = $row;
        }

        echo json_encode($resultsArray);
    }

    $connection->close();

