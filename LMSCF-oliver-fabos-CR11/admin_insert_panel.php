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



?>

<!DOCTYPE html>
<html>
<head>
    <title>Input</title>
</head>

<body>
    <h1>Add new animals</h1>
<table>
    <h2><a href="admin_index.php">Back to the home page</a></h2>

<form action="admin_insert.php" method="post">
    <tr><td><input type="text" placeholder="name" name="animal_name"></td>
    <td><input type="text" placeholder="age" name="age"></td>
    <td><input list="breed" placeholder="breed" name="breed"></td>
    <datalist id="breed">
                    <option value="Domestic Animal">
                    <option value="Bird">
                    <option value="Mammal">
                    <option value="Insect">
                    <option value="Reptile">
                    <option value="Sea Animal">
                    <option value="Farm Animal">
                    <option value="Wild Animal">
                    </datalist></td></tr>
    <td><input list="size" placeholder="size" name="size"></td>
    <datalist id="size">
                    <option value="small">
                    <option value="large">
                    </datalist></td></tr>
    <td><input type="text" placeholder="hobby" name="hobby">
     <tr><td><input type="text" placeholder="description" name="animal_description"></td>
        <td><input list="available" placeholder="available" name="available"></td>
        <datalist id="available">
                    <option value="yes">
                    <option value="no">
                    </datalist></td></tr>
        <td><input list="age_description" placeholder="age_description" name="age_description"></td>
        <datalist id="age_description">
                    <option value="young">
                    <option value="senior">
                </datalist></td>
        <td><input type="date" placeholder="adopting from" name="available_from">
        <td><input type="text" placeholder="farm name" name="farm_name"></td>
        <td><input type="text" placeholder="city" name="city">
        <td><input type="text" placeholder="zip code" name="zip_code"></td>
        <td><input type="text" placeholder="farm address" name="farm_address"></td>
        <tr><td><input type="text" placeholder="animal image" name="animal_image">
        <td><input type="text" placeholder="farm image" name="farm_image"></td>
        <td><input type="submit" name="submit"></td></tr>
    </table>
</form>

</body>



</html>

<?php ob_end_flush();?>