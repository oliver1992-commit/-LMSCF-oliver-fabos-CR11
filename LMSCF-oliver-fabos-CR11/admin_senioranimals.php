<!DOCTYPE html>

<html>
<head>
<title>Senior animals</title>
</head>

<body>

    <h1>Senior animals</h1>

    <a href="admin_index.php">Back to the Home page</a>


</body>


</html>


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
if(isset($_GET['admin_senioranimals']))
{


$select = mysqli_query($conn,"SELECT * FROM `animals`
WHERE age_description = 'senior'");


if($select->num_rows == 0)
{
    echo "No result";
}
elseif($select->num_rows == 1)
{
 $fetch =  mysqli_fetch_assoc($select);

 echo "<br>"."Animal name:"." ".$fetch["animal_name"]."</br>"."Age:"." ".$fetch["age"]."</br>"."Breed:"." ".$fetch["breed"]."</br>"."Size:"." ".$fetch["size"]."</br>"."Hobby:"." ".$fetch["hobby"]."</br>".
 "Description:"." ".$fetch["animal_description"]."</br>"."Available for adopting:"." ".$fetch["available"]."</br>"."Adult:"." ".$fetch["age_description"]."</br>"."Available for adopting from:"." ".$fetch["available_from"]."</br>".
 "Farm name:"." ".$fetch["farm_name"]."</br>"."Location:"." ".$fetch["city"]."</br>"."Zip code:"." ".$fetch["zip_code"]."</br>"."Address:"." ".$fetch["farm_address"]."</br>"."Animal image:"." ".$fetch["animal_image"]."</br>"."Farm image:"." ".$fetch["farm_image"]."</br>".
 "<a href='admin_update_panel.php?update_panel=".$fetch["animal_id"]."'>Update</a>"."</br><a href='admin_delete.php?admin_delete=".$fetch["animal_id"]."'>Delete</a></br>";  
   }
else
{
    $fetches = $select->fetch_all(MYSQLI_ASSOC);

    foreach($fetches as $values)
    {
        echo "<br>"."Animal name:"." ".$values["animal_name"]."</br>"."Age:"." ".$values["age"]."</br>"."Breed:"." ".$values["breed"]."</br>"."Size:"." ".$values["size"]."</br>"."Hobby:"." ".$values["hobby"]."</br>".
        "Description:"." ".$values["animal_description"]."</br>"."Available for adopting:"." ".$values["available"]."</br>"."Adult:"." ".$values["age_description"]."</br>"."Available for adopting from:"." ".$values["available_from"]."</br>".
        "Farm name:"." ".$values["farm_name"]."</br>"."Location:"." ".$values["city"]."</br>"."Zip code:"." ".$values["zip_code"]."</br>"."Address:"." ".$values["farm_address"]."</br>"."Animal image:"." ".$values["animal_image"]."</br>"."Farm image:"." ".$values["farm_image"]."</br>".
        "<a href='admin_update_panel.php?update_panel=".$fetch["animal_id"]."'>Update</a>"."</br><a href='admin_delete.php?admin_delete=".$fetch["animal_id"]."'>Delete</a></br>";    
          }
}

}
?>
<?php ob_end_flush();?>