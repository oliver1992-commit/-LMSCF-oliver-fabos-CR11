<?php
ob_start();
session_start();
require_once "connection.php";


if(!isset($_SESSION['admin']) && !isset($_SESSION['project'])) 
{
 header("Location : login.php");
 exit;
}
if(isset($_SESSION['project']))
{
header("Location : login.php");
exit;
}



if (isset($_POST["submit"]))
 {
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


        
    

  
    $sql_insert = "INSERT INTO `animals`(`animal_name`, `age`, `breed`, `size`, `hobby`, `animal_description`,`available`, `age_description`, `available_from`,`farm_name`, `city`, `zip_code`, `farm_address`,`animal_image`, `farm_image`)
     VALUES ('$name','$age','$breed','$size','$hobby','$description','$available','$age_description','$available_from','$farm_name','$city','$zip_code','$farm_address','$animal_image','$farm_image')";

    if (mysqli_query($conn, $sql_insert)) {
        echo "<a href='admin_index.php'><h1>The upload was successful!!!</h1></a>";
       echo $find_farm_id = $_GET['id'];
    } else {
        die($conn->error);
    }
}


?>

<?php ob_end_flush();?>

