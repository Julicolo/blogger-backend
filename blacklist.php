<?php
    include 'dbh.php';

    $query = $connection->query("
        SELECT *
        FROM blacklist
    ");

    while ($row = $query->fetch_assoc()) {
        $resultsArray[] = $row;
    }

    echo json_encode($resultsArray);

    if (isset($_POST['add'])) {
        $query = $connection->prepare("
            INSERT INTO blacklist (ip_adress)
            VALUES (?)
        ");

        $query->bind_param(
          's', $_POST['add']
        );

        $query->execute();

        if ($query->affected_rows === 1) echo json_encode('successfully added!');
    }

        if (isset($_POST['delete'])) {
        $query = $connection->prepare("
            DELETE FROM blacklist
            WHERE id = ?
        ");

        $query->bind_param(
          'i', $_POST['delete']
        );

        $query->execute();

        if ($query->affected_rows === 1) echo json_encode('successfully deleted!');
    }

    $connection->close();
