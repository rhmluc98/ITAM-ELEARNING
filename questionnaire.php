<?php include("includes/header.php") ?>

<?php 

  if(!isset($_SESSION['matricule']))
{
   echo "<script>alert('Vous devez vous connectez pour effectuer cette interrogation!')</script>";
   echo "<script>window.open('connexion.php','_self')</script>";
} 
else{

?>

<?php

$get_cours_baniere_img = "SELECT *FROM images WHERE img_nom='Baniere_cours'";
$run_cours_baniere_img = mysqli_query($con,$get_cours_baniere_img);
$row_cours_baniere_img = mysqli_fetch_array($run_cours_baniere_img);
$cours_baniere_img = $row_cours_baniere_img['img_fichier'];

?>
<style type="text/css">
.banner_area

{background: url('espace_admin/img/admin_photos/<?php echo $cours_baniere_img ?>') no-repeat center center;}

</style>


<?php include("includes/topbarnav.php") ?>

<?php 

   if(isset($_GET['id_cours']))
   {
       $cours_id = $_GET['id_cours'];

       $get_cours = "SELECT *FROM t_cours WHERE id_cours='$cours_id'";
       $run_cours = mysqli_query($con,$get_cours);

       while($row_cours = mysqli_fetch_assoc($run_cours))
       {

?>

<?php 
                         
    if(isset($_GET['id_cours']))

         $date = date('Y-m-d');
         $c_id = $row_cours['id_cours'];
         $get_eval = "SELECT *FROM evaluations WHERE cours_id='$c_id'";
         $run_eval = mysqli_query($con,$get_eval);

        if(mysqli_num_rows($run_eval) > 0)
        {
                         
?>
<!--================Home Banner Area =================-->
<section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="banner_content text-center">
                            <h2>Evaluation en <?php echo $row_cours['titre_cours'] ?></h2>
                            
                            <div class="page_link">
                                <a href="index.php">Home</a>
                                <a href="cours.php">Courses</a>
                                <a href="cours.php">Details</a>
                                <a href="#">Evaluation</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================ Start Course Details Area =================-->
    <section class="course_details_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-md-6 right-contents">
                    <ul>
                        <li>
                            <a class="justify-content-between d-flex" href="#">
                                <p>Titre du cours </p>
                                <span class="or"><?php echo $row_cours['titre_cours']?></span>
                            </a>
                        </li>
                        <li>
                            <?php 
                            
                            $date = date('Y-m-d');
                            $c_id = $row_cours['id_cours'];
                            $get_eval = "SELECT *FROM evaluations WHERE cours_id='$c_id'";
                            $run_eval = mysqli_query($con,$get_eval);
                            $row_eval = mysqli_fetch_array($run_eval);

                            $minute = $row_eval['duree'];

                            ?>
                            <a class="justify-content-between d-flex" href="#">
                                <p>Duree:</p>
                                <span class="or"><?php echo $minute ?> minutes</span>
                            </a>
                        </li>
                        <li>
                           <a class="justify-content-between d-flex" href="#">
                               <p>Date:</p>
                               <span class="or" id="countdownSuccess"><?php echo date('d-m-Y') ?></span>
                           </a>
                        </li>
                        <li>
                            <?php 
                                $id_class = $row_cours['id_classe'];
                                $get_class = "SELECT *FROM classes WHERE id_classe='$id_class'";
                                $run_classe = mysqli_query($con,$get_class);
                                $row_classe = mysqli_fetch_array($run_classe);

                                $nom_classe = $row_classe['description'];
                                $nom_section = $row_classe['section'];
                            ?>
                            <a class="justify-content-between d-flex" href="#">
                                <p>Classe</p>
                                <span class="or"><?php echo $nom_classe ?><sup>e</sup><?php echo $nom_section ?></span>
                            </a>
                        </li>
                        <?php 
                            $id_prof = $row_cours['id_enseignant'];
                            $get_nom_prof = "SELECT *FROM enseignant WHERE id_enseignant='$id_prof'";
                            $run_nom_prof = mysqli_query($con,$get_nom_prof);
                            $row_nom_prof = mysqli_fetch_array($run_nom_prof);

                            $nom_prof = $row_nom_prof['nom_enseignant'];
                            $prenom_enseignant = $row_nom_prof['prenom_enseignant'];
                        ?>
                        
                        <li>
                            <a class="justify-content-between d-flex" href="#">
                                <p>Nom du professeur</p>
                                <span class="or"><?php echo $prenom_enseignant ?> <?php echo $nom_prof ?></span>
                            </a>
                        </li>
                    </div>
                    <div class="col-md-6 right-contents" id="quetions">
                        <ul>
                            <li class="justify-content-between d-flex" href="#">
                            <p style="color: black;">Instructions</p>
                            
                        </li>
                        <div style="background: gray; color: white; padding: 10px;">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint reiciendis non itaque accusamus, 
                                perspiciatis voluptas cumque quia expedita labore reprehenderit cum distinctio minima doloremque 
                                totam dolore sit sapiente quam eos reprehenderit cum distinctio minima doloremque 
                                totam dolore sit sapiente quam eos?</p>
                        </div>
                        </ul>
                    </div>
                </div>
                
                <div class="row">
                    
                    <?php 
                    
                      $date = date('Y-m-d');
                      $c_id = $row_cours['id_cours'];
                      $get_eval = "SELECT *FROM evaluations WHERE cours_id='$c_id'";
                      $run_eval = mysqli_query($con,$get_eval);
                      $num = 0;

                      while($row_eval = mysqli_fetch_assoc($run_eval))
                      {
                        $num++;

                        $get_ensei
                    
                    ?>
                    <form action="remettre.php" method="post">
                    <div class="col-md-12 right-contents" id="quetions">
                        <ul>
                            <li class="justify-content-between">
                                <p style="font-size:30px;"><?php echo $num.'.' ?> &nbsp <?php echo $row_eval['question'] ?> / <?php echo $row_eval['ponderation'] ?></p>
                                <div style="font-size:22px"><br>
                                <p><span><input type="checkbox" name="assertion[]" value="assertion1"></span>&nbsp <?php echo $row_eval['assertion1'] ?></p>
                                <p><span><input type="checkbox" name="assertion[]" value="assertion2"></span>&nbsp <?php echo $row_eval['assertion2'] ?></p>
                                <p><span><input type="checkbox" name="assertion[]" value="assertion3"></span>&nbsp <?php echo $row_eval['assertion3'] ?></p>
                                <p><span><input type="checkbox" name="assertion[]" value="assertion4"></span>&nbsp <?php echo $row_eval['assertion4'] ?></p>
                                <p><span><input type="checkbox" name="assertion[]" value="assertion5"></span>&nbsp <?php echo $row_eval['assertion5'] ?></p>
                                <p><span><input type="hidden" name="id_question[]" value="<?php echo $row_eval['evaluation_id'] ?>"></span></p>
                                <p><span><input type="hidden" name="id_cours[]" value="<?php echo $row_eval['cours_id'] ?>"></span></p>
                                <p><span><input type="hidden" name="id_prof[]" value="<?php echo $id_prof ?>"></span></p>
                                </div>
                            </li>
                        </ul>
                    </div> 
                    <?php } ?> 
                </div>
                <button type="submit" name="btn_remettre" class="primary-btn text-uppercase enroll btn btn-default" onclick="return confirm('Etes-vous sur de vouloir remettre?')"><i class="fa fa-file-submit"></i> Remettre</button>
                </form>
            </div>
        </div>
    </section>
    <!--================ End Course Details Area =================-->

    <?php 

            }
            else
            {
                echo "<script>alert('Aucune evaluation n\'est disponible pour l\'instant')</script>";
                echo "<script>window.open('detail_cours.php?cours_id=$c_id','_self')</script>";
            }
        }
     }
    ?>


<script type="text/javascript">


    let startingMunites = <?php echo $minute ?>;
    let time = startingMunites * 60;

    const countDownEl = document.getElementById('countdownSuccess');

    setInterval(updateCountdown, 1000);

    function updateCountdown()
    {
        const minutes = Math.floor(time / 60);
        let seconds = time % 60;

        seconds = seconds < 10 ? '0' + seconds : seconds;

        countDownEl.innerHTML = `Timing: ${minutes} : ${seconds}`;

        if(time > 0)
        {
            time--;

            if(time < 60)
            {
               countDownEl.style.backgroundColor='red';
               countDownEl.style.color='white';
            }
            else
            {
                countDownEl.style.backgroundColor='green';
                countDownEl.style.color='white';
            }
        }
        
        else
        {
            alert('Le temps est ecouler!');
            window.close('questionnaire.php','_self');


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
 
                        if($run_corr)
                        {
                            echo "<script>alert('Vous venez de remettre votre evaluation')</script>";
                            echo "<script>window.open('cours.php','_self')</script>";
                        }

                    }
                ?>


            window.open('detail_cours.php?cours_id=<?php echo $c_id ?>','_self');
        }
    }

    
</script>

<?php include("includes/footer.php") ?>
<?php include("includes/scripts.php") ?>

<?php } ?>
