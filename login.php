<?php
    include 'dbh.php';

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $query = $connection->prepare("
            SELECT id, username, authLevel
            FROM users
            WHERE username = ? AND password = ?
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

