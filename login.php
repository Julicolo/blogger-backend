<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: *');
    
    $_POST = json_decode(file_get_contents('php://input'), true);

    echo json_encode($_POST);

    