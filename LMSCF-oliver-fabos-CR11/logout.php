<?php 
session_start();

if(!isset($_SESSION['project']) || (!isset($_SESSION['admin'])))
{
    header("Location: login.php");
    exit;
}
elseif(isset($_SESSION['project']) || (isset($_SESSION['admin'])))
{
    header("Location: index.php");
}


if(isset($_GET['logout']))
{
    unset($_SESSION['projects']);
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}
?>