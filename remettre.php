
<?php include("includes/header.php") ?>
<?php 
  if(!isset($_SESSION['matricule']))
{
   echo "<script>alert('Vous devez vous connectez pour acceder a cette page!')</script>";
   echo "<script>window.open('connexion.php','_self')</script>";
} 
else{

?>

   <?php
   
      if(isset($_POST['btn_remettre']))
      {
          $eleve_matricule = $_SESSION['matricule'];
          $get_eleve_id = "SELECT *FROM eleves WHERE matricule='$eleve_matricule'";
          $run_eleve_id = mysqli_query($con,$get_eleve_id);
          $row_eleve_id = mysqli_fetch_array($run_eleve_id);

          $eleve_id = $row_eleve_id['id_eleves'];

            for($count = 0; $count < count($_POST['assertion']); $count++)
            {
                $assertion = $_POST['assertion'][$count];
                $id_question = $_POST['id_question'][$count];
                $id_cours = $_POST['id_cours'][$count];
                $id_prof = $_POST['id_prof'][$count];
                
                  $insert_correction = "INSERT INTO eleves_notes (reponse,date,question_id,cours_id,eleve_id,prof_id) VALUE ('$assertion',NOW(),'$id_question','$id_cours','$eleve_id','$id_prof')";
                  $run_corr = mysqli_query($con,$insert_correction);
            }

               $date = date("Y-m-d");
               $get_eleve_note = "SELECT *FROM eleves_notes WHERE date='$date' AND cours_id='$id_cours' AND eleve_id='$eleve_id'";
               $run_eleve_note = mysqli_query($con,$get_eleve_note);
               $row_eleve_note = mysqli_fetch_array($run_eleve_note);

               $question_id = $row_eleve_note['question_id'];
               $reponse = $row_eleve_id['reponse'];

            if($run_corr)
            {
                echo "<script>alert('Vous venez de remettre votre evaluation')</script>";
                echo "<script>window.open('cours.php','_self')</script>";
            }

      }
   
   ?>

<?php } ?>