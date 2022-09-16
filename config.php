<?php
    session_start();
    define('DB_HOST', 'localhost');
    define('DB_USER', 'Mateusz');
    define('DB_PASS', '123456');
    define('DB_NAME', 'chat');

    $conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

    if($conn->connect_error){
        die('Connection Failed' . $conn->connect_error);
    }

?>

<!DOCTYPE html>
<html lang="en" class="bg-[#111111]">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talk To Mat</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>