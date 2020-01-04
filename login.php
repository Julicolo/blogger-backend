<?php
    include 'dbh.php';

    function getPassword($connection) {
        $query = $connection->prepare("
            SELECT password
            FROM users
            WHERE username = ?
        ");

        $query->bind_param(
          's', $_POST['username']
        );

        $query->execute();

        $result = $query->get_result();

        while ($row = $result->fetch_assoc()) {
            $queryResult[] = $row;
        }

        return $queryResult[0]['password'];
    }

    $hash = getPassword($connection);

    if (password_verify($_POST['password'], $hash)) {
        $query = $connection->prepare("
            SELECT id, username, authLevel
            FROM users
            WHERE username = ? AND password = ?
        ");

        $query->bind_param(
          'ss', $_POST['username'], $hash
        );

        $query->execute();

        $result = $query->get_result();

        while ($row = $result->fetch_assoc()) {
            $resultsArray[] = $row;
        }

        echo json_encode($resultsArray);
    }

    $connection->close();

