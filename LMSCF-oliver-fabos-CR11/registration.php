<?php
ob_start();
session_start();
if(isset($_SESSION['project'])!="")
{

    header("Location: index.php");

}

include_once "connection.php";

$error = false;

if(isset($_POST['btn-signup']))
{

$name = trim($_POST['userName']);

$name = strip_tags($name);

$name = htmlspecialchars($name);


$e_mail = trim($_POST['e_mail']);

$e_mail = strip_tags($e_mail);

$e_mail = htmlspecialchars($e_mail);


$password = trim($_POST['password_code']);

$password = strip_tags($password);

$password = htmlspecialchars($password);


if(empty($name))
{
    $error = true;
    $nameError = "Plase enter your full name";
}
elseif(strlen($name) < 3)
{
    $error = true;
    $nameError = "Your name should include at least 3 characters";
}
elseif(!preg_match("/^[a-zA-Z ]+$/",$name))
{
    $error = true;
    $nameError = "Your name should include letters and space";
}

if(!filter_var(FILTER_VALIDATE_EMAIL))
{
    $error = true;
    $emailError = "Please enter a valid E-mail";
}
else
{

    $query = "SELECT e_mail FROM users WHERE e_mail = '$e_mail'";
    
    $result = mysqli_query($conn,$query);

    $count = mysqli_num_rows($result);

    if($count!=0)
    {
        $error = true;
        $e_mailError = "The E-mail allready exists";
    }


}

if(empty($password))
{
    $error = true;
    $passwordError = "Enter your password please";
}
elseif(strlen($password) < 6)
{
    $error = true;
    $passwordError = "Your password should include at least 6 characters";
}

    $pass = hash('sha256', $password);



    if(!$error)
    {

        $sql_insert = "INSERT INTO users(userName,e_mail,password_code) VALUES('$name', '$e_mail', '$pass')";

  
        $res=mysqli_query($conn,$sql_insert);

        if($res)
        {
            $errTyp= "Success";
            $errMSG= "You registrated";
           unset($name);
           unset($e_mail);
           unset($password);
        }
        else
        {
            $errTyp = "Error";
            $errMSG = "You couldn't registrate";
        }


    }

}

?>

<!DOCTYPE html>

<html>
<head>
<title>Registration</title>

</head>

<body>


<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  autocomplete=off >

             <h2>Sign Up</h2>

            <ht/>
            <?php
            if(isset($errMSG))
            {
                ?>

                <div class="alert alert-<?php $errTyp; ?>"><?php echo $errMSG;?></div>
       <?php     } ?>



      <input type="text" placeholder="Name" name="userName" value="<?php $name ?>"
      maxlength="30" class="form-control" />

      <span class="text-danger" ><?php echo $nameError; ?></span>

      <input type="email" placeholder="E-mail" name="e_mail" value="<?php $e_mail; ?>"
      maxlength="40" class="form-control"/>

      <span class="text-danger" ><?php echo $e_mailError; ?></span>

      <input type="password" placeholder="Password" name="password_code" vlaue="<?php $password; ?>"
      maxlength="30" class="form-control"/>

      <span class="text-danger"><?php echo $passwordError; ?></span>

    <hr/>

      <button type="submit" name="btn-signup" class="btn btn-block btn-primary">Registrate</button>

    <hr/>

    <a href="login.php">Sign in here...</a>

</form>
</body>
</html>


<?php ob_end_flush(); ?>