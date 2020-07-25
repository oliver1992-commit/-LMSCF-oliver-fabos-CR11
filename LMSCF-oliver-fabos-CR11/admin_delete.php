<!DOCTYPE html>
<html>
    <head>
        <title>Delete</title>
    </head>
    <body>



<?php
session_start();
require_once "connection.php";

if(!isset($_SESSION["admin"]) && !isset($_SESSION["project"])) 
{
 header("Location : login.php");
 exit;
}
if(isset($_SESSION["project"]))
{
header("Location : login.php");
exit;
}
echo $_GET["admin_delete"];
if($_GET["admin_delete"])
{
    $sql_id = $_GET["admin_delete"];

    $sql_delete = "DELETE FROM animals WHERE animal_id = $sql_id";

    if($conn->query($sql_delete))
    {
       echo "<a href='admin_index.php'>You was delete the current details from place" .$sql_id. "</a>";
    }
}

$conn->close;


?>
</body>
</html>