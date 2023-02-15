<?php
    // if(isset($_SESSION)&&(!isset($_GET['mess']) || empty($_GET['mess'])))
    // {
    //    header('Location:home.php');
    // }
    if(isset($_COOKIE["email"]))
    {
      header('Location:home.php');
    }
    if (!isset($_GET['mess']) || empty($_GET['mess'])) {
        header('Location: login.php');
        exit(); // don't execute any code after it!
      } 
      else {
      session_start();
      session_destroy();
      setcookie("email", "", time() - 60);
      setcookie("password", "", time() - 60);
      header('Location:index.php?mess=logout succesfully');
     }
     
?>