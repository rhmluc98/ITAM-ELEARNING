<?php
    session_start();
    include("includes/db.php");

    if(!isset($_SESSION['admin_email']))
    {
        header("location:login.php");
    }

    else
    {
?>


<?php 

   if(isset($_GET['permission_btn']))
   {
       $utilisateur_id = $_GET['permission_id'];

       $get_utilisateur = "SELECT *FROM comptes WHERE id_compte='$utilisateur_id'";
       $run_utilisateur = mysqli_query($con,$get_utilisateur);
       $row_utilisateur = mysqli_fetch_array($run_utilisateur);

       $id_utilisateur = $row_utilisateur['id_compte'];
       $utilisateur_acces = $row_utilisateur['acces'];
       $utilisateur_noms = $row_utilisateur['nom_utilisateur'];

       if($utilisateur_acces == 'Permis')
       {
        $update_acces = "UPDATE comptes SET acces='Interdit' WHERE id_compte='$id_utilisateur'";
        $run_update = mysqli_query($con,$update_acces);

        if($run_update)
        {
          echo "<script>alert('Vous venez d\'interdire l\'acces à $utilisateur_noms')</script>";
          echo "<script>window.open('utilisateurs.php','_self')</script>";
        }
        
       }
       else
       {
        $update_acces = "UPDATE comptes SET acces='Permis' WHERE id_compte='$id_utilisateur'";
        $run_update = mysqli_query($con,$update_acces);

        if($run_update)
        {
          echo "<script>alert('Vous venez de permettre l\'acces à $utilisateur_noms')</script>";
          echo "<script>window.open('utilisateurs.php','_self')</script>";      
        }

       }
       
   }

?>















<?php } ?>