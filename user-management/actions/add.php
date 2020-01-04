<?php
    include '../../dbh.php';

    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['authLevel'])) {
        $query = $connection->prepare("
            INSERT INTO users (username, password, authLevel)
            VALUES (?, ?, ?)
        ");

        $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $query->bind_param(
          'sss', $_POST['username'], $hash, $_POST['authLevel']
        );

        $query->execute();

        if ($query->affected_rows === 1) echo json_encode('success!');
    }

    $connection->close();
