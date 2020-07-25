<!DOCTYPE html>
<html>
    <head>
        <title>Update</title>
    </head>
<body>
 <h1>Update</h1>
<?php

session_start();

require_once "connection.php";

if(!isset($_SESSION['admin']) && (!isset($_SESSION['project'])))
{
    header("Location: login.php");
    exit;
}

if(isset($_SESSION['project']))
{
    header("Location: login.php");
    exit;
}

if($_POST)
{   
    $id = $_POST["animal_id"];
    $name = $_POST["animal_name"];
    $age = $_POST["age"];
    $breed = $_POST["breed"];
    $size = $_POST["size"];
    $hobby = $_POST["hobby"];
    $description = $_POST["animal_description"];
    $available = $_POST["available"];
    $age_description = $_POST["age_description"];
    $available_from = $_POST["available_from"];
    $farm_name = $_POST["farm_name"];
    $city = $_POST["city"];
    $zip_code = $_POST["zip_code"];
    $farm_address = $_POST["farm_address"];
    $animal_image = $_POST["animal_image"];
    $farm_image = $_POST["farm_image"];

    $sql_update = "UPDATE `animals` SET `animal_name` = '$name', `age` = '$age', `breed` = '$breed', `size` = '$size', `hobby` = '$hobby', `animal_description` = '$description',
    `available` = '$available', `age_description` = '$age_description', `available_from` = '$available_from', `farm_name` = '$farm_name', `city` = '$city', `zip_code` = '$zip_code',
     `farm_address` = '$farm_address', `animal_image` = '$animal_image', `farm_image` = '$farm_image' WHERE `animal_id` = $id";

     if(mysqli_query($conn,$sql_update))
     {
        echo "<a href='admin_index.php'>Success,you could update your project,Back to the home page</a>";
     }
     else
     {
        die("Something dosen't works right" . mysqli_error($conn));
     }


}
?>
</body>

</html>

<?php ob_end_flush();?>