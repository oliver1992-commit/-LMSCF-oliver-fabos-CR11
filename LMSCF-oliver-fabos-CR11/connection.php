<?php
error_reporting( ~E_DEPRECATED & ~E_NOTICE );

define('serverHost', 'localhost');
define('userName', 'root');
define('password', '');
define('database', 'pet_database');

$conn=mysqli_connect(serverHost,userName,password,database);

if(!$conn)
{
    die("The connection coulden't establish" . mysqli_connect_error());
}

?>