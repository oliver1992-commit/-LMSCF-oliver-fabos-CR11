<?php
session_start();

require_once 'connection.php';

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

if($_GET["update_panel"])
{
    $sql_id = $_GET["update_panel"];

    $sql_select = "SELECT * FROM animals WHERE animal_id = $sql_id";

    $sql_query = mysqli_query($conn, $sql_select);

    $row = $sql_query->fetch_assoc();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Update panel</title>
</head>
<body>


<table>
    <h2><a href="admin_index.php">Back to the home page</a></h2>

<form action="admin_update.php" method="post">
    <input type="hidden" name="animal_id" value="<?php echo $row["animal_id"] ?>">
    <tr><td><input type="text" placeholder="name" name="animal_name" value="<?php echo $row["animal_name"] ?>"></td>
    <td><input type="text" placeholder="age" name="age" value="<?php echo $row["age"] ?>"></td>
    <td><input list=breed placeholder="breed" name="breed" value="<?php echo $row["breed"] ?>"></td>
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
    <td><input list="size" placeholder="size" name="size" value="<?php echo $row["size"] ?>"></td>
    <datalist id="size">
                    <option value="small">
                    <option value="large">
                    </datalist></td></tr>
    <td><input type="text" placeholder="hobby" name="hobby" value="<?php echo $row["hobby"] ?>">
     <tr><td><input type="text" placeholder="description" name="animal_description" value="<?php echo $row["animal_description"] ?>"></td>
        <td><input list="available" placeholder="available" name="available" value="<?php echo $row["available"] ?>"></td>
        <datalist id="available">
                    <option value="yes">
                    <option value="no">
                    </datalist></td></tr>
        <td><input list="age_description" placeholder="age_description" name="age_description" value="<?php echo $row["age_description"] ?>"></td>
        <datalist id="age_description">
                    <option value="young">
                    <option value="senior">
                </datalist></td>
        <td><input type="date" placeholder="available from" name="available_from" value="<?php echo $row["available_from"] ?>">
        <td><input type="text" placeholder="farm name" name="farm_name" value="<?php echo $row["farm_name"] ?>"></td>
        <td><input type="text" placeholder="city" name="city" value="<?php echo $row["city"] ?>">
        <td><input type="text" placeholder="zip code" name="zip_code" value="<?php echo $row["zip_code"] ?>"></td>
        <td><input type="text" placeholder="farm address" name="farm_address" value="<?php echo $row["farm_address"] ?>"></td>
        <tr><td><input type="text" placeholder="animal image" name="animal_image" value="<?php echo $row["animal_image"] ?>">
        <td><input type="text" placeholder="farm image" name="farm_image" value="<?php echo $row["farm_image"] ?>"></td>
        <td><input type="submit" name="submit"></td></tr>
    </table>


</body>




</html>

<?php ob_end_flush();?>