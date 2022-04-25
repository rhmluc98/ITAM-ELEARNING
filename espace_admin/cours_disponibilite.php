<?php
    session_start();
    include("includes/db.php");

    if(!isset($_SESSION['login']))
    {
        header("location:login.php");
    }

    else
    {
?>


<?php 

   if(isset($_GET['c_disponibilite_btn']))
   {
       $cours_id = $_GET['c_disponibilite_id'];

       $get_cours = "SELECT *FROM t_cours WHERE id_cours='$cours_id'";
       $run_cours = mysqli_query($con,$get_cours);
       $row_cours = mysqli_fetch_array($run_cours);

       $id_cours = $row_cours['id_cours'];
       $disponibilite = $row_cours['cours_disponibilite'];
       $titre_cours = $row_cours['titre_cours'];

       if($disponibilite == '1')
       {
            $update_disponibilite = "UPDATE t_cours SET cours_disponibilite='0' WHERE id_cours='$id_cours'";
            $run_update = mysqli_query($con,$update_disponibilite);

            if($run_update)
            {
                echo "<script>alert('Vous venez de retirer le cours \'$titre_cours\' sur la platform')</script>";
                echo "<script>window.open('ensei_voir_cours.php','_self')</script>";
            }
       }

       else
       {
            $update_disponibilite = "UPDATE t_cours SET cours_disponibilite='1' WHERE id_cours='$id_cours'";
            $run_update = mysqli_query($con,$update_disponibilite);

            if($run_update)
            {
                echo "<script>alert('Vous venez de remettre le cours \'$titre_cours\' sur la platform')</script>";
                echo "<script>window.open('ensei_voir_cours.php','_self')</script>";
            }
        }
    }

?>


<?php } ?>