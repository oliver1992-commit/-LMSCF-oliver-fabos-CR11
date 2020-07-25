<?php

session_start();


require_once "connection.php";

if(!isset($_SESSION['project']))
{
    header("Location: login.php");
    exit;
}
if(isset($_POST["submit"]))
{
    $sql_adopt = $_GET['adopt'];

    $sql_user = $_SESSION['project'];

    $adoption_date = $_POST['adoption_date'];

    $sql_insert = "INSERT INTO adoption(adopt_time, fk_users_id, fk_animal_id) VALUES('$adoption_date', '$sql_user', '$sql_adopt')";

    $sql_update = "UPDATE animals SET available = 'no' WHERE animal_id = $sql_adopt";

    if(mysqli_query($conn,$sql_insert) && mysqli_query($conn,$sql_update))
    {
        echo "<a href='adopt_animals.php'><h2>Congratulation you get be a parent, you adopted your animal .<br>Back to the home page</a></h2><br>";
    }


}
?>

<!DOCTYPE html>
<html>


<head>
<title>Adopt process</title>
</head>
<h1>Adopt your animal</h1>
<body>
<form method="post"> 

<input type="date" name="adoption_date">
<input type="submit" name="submit">


</form>




</body>


</html>