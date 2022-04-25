<?php
    session_start();
    session_destroy();
    echo "<script>window.open('login_titulaire.php','_self')</script>";
?>