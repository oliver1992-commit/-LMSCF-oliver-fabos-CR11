<!DOCTYPE html>

<html>
<head>
<title>Small animals</title>
</head>

<body>

    <h1>Large animals</h1>

    <a href="index.php">Back to the Home page</a>


</body>


</html>


<?php

ob_start();
session_start();

require_once "connection.php";

if(!isset($_SESSION['project']))
{
    header("Location: login.php");
    exit;
}

if(isset($_GET['large_animals']))
{
/*$select = mysqli_query($conn, "SELECT * FROM animals WHERE size = 'small'");*/

$select = mysqli_query($conn,"SELECT * FROM `animals`
WHERE size = 'large'");


if($select->num_rows == 0)
{
    echo "No result";
}
elseif($select->num_rows == 1)
{
 $fetch =  mysqli_fetch_assoc($select);

 echo "<br>"."Animal name:"." ".$fetch["animal_name"]."</br>"."Age:"." ".$fetch["age"]."</br>"."Breed:"." ".$fetch["breed"]."</br>"."Size:"." ".$fetch["size"]."</br>"."Hobby:"." ".$fetch["hobby"]."</br>".
 "Description:"." ".$fetch["animal_description"]."</br>"."Available for adopting:"." ".$fetch["available"]."</br>"."Adult:"." ".$fetch["age_description"]."</br>"."Available for adopting from:"." ".$fetch["available_from"]."</br>".
 "Farm name:"." ".$fetch["farm_name"]."</br>"."Location:"." ".$fetch["city"]."</br>"."Zip code:"." ".$fetch["zip_code"]."</br>"."Address:"." ".$fetch["farm_address"]."</br>"."Animal image:"." ".$fetch["animal_image"]."</br>"."Farm image:"." ".$fetch["farm_image"]."</br>";    
    }
else
{
    $fetches = mysqli_fetch_all($select,MYSQLI_ASSOC);

    foreach($fetches as $values)
    {
        echo "<br>"."Animal name:"." ".$values["animal_name"]."</br>"."Age:"." ".$values["age"]."</br>"."Breed:"." ".$values["breed"]."</br>"."Size:"." ".$values["size"]."</br>"."Hobby:"." ".$values["hobby"]."</br>".
        "Description:"." ".$values["animal_description"]."</br>"."Available for adopting:"." ".$values["available"]."</br>"."Adult:"." ".$values["age_description"]."</br>"."Available for adopting from:"." ".$values["available_from"]."</br>".
        "Farm name:"." ".$values["farm_name"]."</br>"."Location:"." ".$values["city"]."</br>"."Zip code:"." ".$values["zip_code"]."</br>"."Address:"." ".$values["farm_address"]."</br>"."Animal image:"." ".$values["animal_image"]."</br>"."Farm image:"." ".$values["farm_image"]."</br>";    
     }
}

}
?>
<?php ob_end_flush();?>


