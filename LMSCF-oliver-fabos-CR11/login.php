<?php
ob_start();
session_start();

require_once "connection.php";

if(isset($_SESSION['project'])!="")
{
    header("Location: login.php");
    exit;
}


$errror=false;

if(isset($_POST['btn-login']))
{

    $e_mail = trim($_POST['e_mail']);

    $e_mail = strip_tags($e_mail);

    $e_mail = htmlspecialchars($e_mail);


    $password = trim($_POST['password_code']);

    $password = strip_tags($password);

    $password = htmlspecialchars($password);


    if(empty($e_mail))
    {
        $error = true;
        $e_mailError = "Please enter your E-mail";
    } 
    elseif(!filter_var(FILTER_VALIDATE_EMAIL))
    {
        $error = true;
        $e_mailError = "Your E-mail is not valid";
    }

    if(empty($password))
    {
        $error = true;
        $passwordError = "Enter your password";
    }



    if(!$error)
    {

        $pass = hash('sha256', $password);

        $res = mysqli_query($conn, "SELECT * FROM users WHERE e_mail = '$e_mail'");

        $row = mysqli_fetch_array($res, MYSQLI_ASSOC);

        $count = mysqli_num_rows($res);

       
        if($count==1 && $row['password_code']==$pass)
        {
            if($row['users_type'] == 'admin')
            {
                $_SESSION['admin'] = $row['users_id'];
                header("Location: admin_index.php");
                echo "great job";
            }
            else
            {
            $_SESSION['project'] = $row['users_id'];
            header("Location: index.php");
            echo "Succces";
            }
        }
        else
        {
        $errMSG = "Incorrect credentials, Try again";
        }


    }


}
?>


<!DOCTYPE html>

<html>

<head>

<title>Login</title>


</head>

<body>
<h2>Sign In.</h2 >
            <hr />
           
            <?php
  if ( isset($errMSG) ) {
echo  $errMSG; ?>
             
               <?php
  }
  ?>
<form method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" autocomplate = off > 


    <input type="email" placeholder="E-mail" name="e_mail" 
    class="form-control" value="<?php echo $e_mail ?>" maxlength = "40" />

    <span class= "text-danger" ><?php echo $e_mailError; ?></span>

    <input type="password" name="password_code" placeholder="Password"  maxlength="20"
 class="form-control"/>

    <span class="text-danger"><?php echo $passwordError ?></span>
    <hr/>

    <button type="submit" name="btn-login">Login</button>

    <hr/>

    <a href="registration.php">Sign up here...</a>

</form>



</body>



</html>

<?php ob_end_flush();?>