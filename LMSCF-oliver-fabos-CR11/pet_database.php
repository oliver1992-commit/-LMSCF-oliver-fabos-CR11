<?php



    define('serverHost', 'localhost');
    define('userName', 'root');
    define('password', '');
    define('database', 'pet_database');

    $conn=mysqli_connect(serverHost,userName,password);

    $createDb = "CREATE DATABASE pet_database";

    $sql_query = mysqli_query($conn,$createDb);

    if(!$sql_query)
    {
        die("The datebase dosen't works" . $conn->error);
    }


?>