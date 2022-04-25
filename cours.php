<?php include("includes/header.php") ?>
<?php 
  if(!isset($_SESSION['matricule']))
{
   echo "<script>alert('Vous devez vous connectez pour acceder aux cours!')</script>";
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


<!--================Home Banner Area =================-->
<section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="banner_content text-center">
                            <h2>Cours</h2>
                            <div class="page_link">
                                <a href="index.php">Acceuil</a>
                                <a href="cours.php">Cours</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================ Start Popular Courses Area =================-->
    <div class="popular_courses lite_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="main_title">

                        <?php 
                        
                            $session = $_SESSION['matricule'];
                            $get_type = "SELECT *FROM comptes WHERE login='$session'";
                            $run_type = mysqli_query($con,$get_type);
                            $row_type = mysqli_fetch_array($run_type);
        
                            $type = $row_type['utilisateur_type'];
                            
                            if($type == 'eleve')
                            {
                        
                        ?>
                         <h2>Tout les cours disponible dans votre classe</h2>

                        <?php 
                        
                         }else
                         {
                        ?>
                            <h2>Tout les cours publiés</h2>
                        
                        <?php } ?>
                        <p>There is a moment in the life of any aspiring astronomer that it is time to buy that first
                            telescope. It’s
                            exciting to think about setting up your own viewing station.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- single course -->
				<?php 
			
                    $session = $_SESSION['matricule'];
                    $get_type = "SELECT *FROM comptes WHERE login='$session'";
                    $run_type = mysqli_query($con,$get_type);
                    $row_type = mysqli_fetch_array($run_type);

                    $type = $row_type['utilisateur_type'];
                    
                    if($type == 'eleve')
                    {
                        $session = $_SESSION['matricule'];
                        $get_eleve_classe = "SELECT *FROM eleves WHERE matricule='$session'";
                        $run_eleve_classe = mysqli_query($con,$get_eleve_classe);
                        $row_eleve_classe = mysqli_fetch_array($run_eleve_classe);

                        $eleve_id = $row_eleve_classe['id_eleves'];
                        $classe_id = $row_eleve_classe['classe_id'];
                    
					    $get_cours = "SELECT *FROM t_cours WHERE cours_disponibilite = 1 AND id_classe='$classe_id' ORDER BY 1 DESC";
					    $run_cours = mysqli_query($con,$get_cours);

                    }
                    else 
                    {
                        $session = $_SESSION['matricule'];
                        $get_prof_id = "SELECT *FROM enseignant WHERE matricule='$session'";
                        $run_prof_id = mysqli_query($con,$get_prof_id);
                        $row_prof_id = mysqli_fetch_array($run_prof_id);

                        $prof_id = $row_prof_id['id_enseignant'];

                        $get_cours = "SELECT *FROM t_cours WHERE cours_disponibilite = 1 AND id_enseignant='$prof_id' ORDER BY 1 DESC";
					    $run_cours = mysqli_query($con,$get_cours);
                    }

					if(mysqli_num_rows($run_cours) > 0)
					{
						while($row_cours = mysqli_fetch_array($run_cours))
						{
							$prof_id = $row_cours['id_enseignant'];
							$get_prof = "SELECT *FROM enseignant WHERE id_enseignant='$prof_id'";
							$run_prof = mysqli_query($con,$get_prof);
							$row_prof = mysqli_fetch_array($run_prof);
							
							$nom_prof = $row_prof['nom_enseignant'];
							$prenom_prof = $row_prof['prenom_enseignant'];
							$photo_prof = $row_prof['photo'];

							$get_cours_img = "SELECT *FROM images WHERE img_nom='Cours_img'";
							$run_get = mysqli_query($con,$get_cours_img);
							$row_cours_img = mysqli_fetch_array($run_get);
							$cours_img = $row_cours_img['img_fichier'];
                ?>
                <div class="col-lg-3 col-md-6">
                    <div class="single_course">
                        <div class="course_head overlay">
                            <img class="img-fluid w-100" src="espace_admin/img/admin_photos/<?php echo $cours_img ?>" alt="">
                            <div class="authr_meta">
                                <img src="espace_admin/img/enseignants_photos/<?php echo $photo_prof ?>" alt="" width="60" height="60" style="border-radius: 100%">
                                <span><?php echo $prenom_prof; echo "&nbsp"; echo $nom_prof ?></span>
								
                            </div>
                        </div>
                        <div class="course_content">
                            <h4>
                                <a href="detail_cours.php"><?php echo $row_cours['titre_cours'] ?></a>
                            </h4>
                            <p><?php
							
							   $details = $row_cours['introduction_gene'];
							   if(strlen($details) > 120)
							   {
								  echo substr($details,0,120) . '...';
							   }
							   else
							   {
								  echo $details; 
							   }
							   

							?></p>
                            <div class="course_meta d-flex justify-content-between">
                                <div>
                                    <span class="meta_info">
                                        <!-- <form action="detail_cours.php" method="post">
                                            <input type="hidden" name="cours_id" value="<?php echo $row_cours['id_cours'] ?>">
                                           <button type="submit" name="detail_cours_btn" class="btn btn-default"><i class="lnr lnr-eye"></i>Voir plus</button>
                                        </form> -->
                                        <a type="button" href="detail_cours.php?cours_id=<?php echo $row_cours['id_cours'] ?>" class="btn btn-default"><i class="lnr lnr-eye"></i>Voir plus</a>
                                    </span>
                                </div>
                                <div>
                                    <span class="meta_info">
                                        <a href="#commentaires">
                                            <i class="lnr lnr-bubble"></i>
                                            <?php 
                                            
                                               $course_id = $row_cours['id_cours'];
                                               $get_comments = "SELECT *FROM discussions WHERE id_cour='$course_id'";
                                               $run_comments = mysqli_query($con,$get_comments);

                                               echo mysqli_num_rows($run_comments);
                                            
                                            ?>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <?php 
				  } 
			
			        }
					else
					{
						echo "<p class='text-white bg bg-danger' style='padding: 8px; font-size:22px'>Pas de cours publier pour l'instant</p>";
					} 
				?>
                
                </div>
                    </div>
                </div>
				
                
    <!--================ End Popular Courses Area =================-->


<?php include("includes/footer.php") ?>
<?php include("includes/scripts.php") ?>

<?php } ?>