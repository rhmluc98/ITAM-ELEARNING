
<?php
session_start();

include("includes/db.php");

    if(isset($_POST['logout_btn'])){
    
    $session_util = $_SESSION['matricule'];

    mysqli_query($con, "UPDATE comptes SET statut='deconneter' WHERE login='$session_util'");
    session_destroy();
    header("Location: index.php");
  }
?>