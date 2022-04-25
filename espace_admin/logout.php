
<?php
session_start();
include("includes/db.php");

   if(isset($_POST['logout_btn'])){

    $get_session = $_SESSION['login'];

    if($get_session == $_SESSION['login'])
    {
        $session_util = $_SESSION['login'];
        
        mysqli_query($con, "UPDATE comptes SET statut='deconneter' WHERE login='$session_util'");
        session_destroy();
        header("Location: login.php");
    
    }
    else
    {
        session_start();
        session_destroy();
        echo "<script>window.open('login.php','_self')</script>";
    }
    
  }
?>