
<?php include("includes/header.php") ?>

<?php include("includes/topbarnav.php") ?>

<?php

$get_home_baniere_img = "SELECT *FROM images WHERE img_nom='Baniere_accueil'";
$run_home_baniere_img = mysqli_query($con,$get_home_baniere_img);
$row_home_baniere_img = mysqli_fetch_array($run_home_baniere_img);
$home_baniere_img = $row_home_baniere_img['img_fichier'];

?>
<style type="text/css">
.home_banner_area
/* {background:url(espace_admin/img/admin_photos/<?php //echo $home_baniere_img ?>) no-repeat scroll center;} */
{background: linear-gradient(0deg, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('espace_admin/img/admin_photos/<?php echo $home_baniere_img ?>') no-repeat scroll center;}

</style>

<!--================ Start Home Banner Area =================-->
<section class="home_banner_area" style="">
		<div class="banner_inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="banner_content">
						     
							<h2>
								Bienvenu à l'<?php echo $nom_ecole ?>
							</h2>
							<p>
								<?php echo $details_ecole ?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Home Banner Area =================-->

	<!--================ Start Feature Area =================-->
	<section class="feature_area">
		<div class="container">
			<div class="row justify-content-end">
				<div class="col-lg-4">
					<div class="single_feature d-flex flex-row pb-30">
						<div class="icon">
							<span class="lnr lnr-home"></span>
						</div>
						
						<?php $get_classes = mysqli_query($con, "SELECT *FROM classes"); ?>
						<?php $get_sections = mysqli_query($con, "SELECT *FROM section"); ?>

						<div class="desc">
							<h4>Classes</h4>
							<p>
							Actuellement l’école fonctionne avec <?php echo mysqli_num_rows($get_classes) ?> classes  
							</p>
						</div>
					</div>
					<div class="single_feature d-flex flex-row pb-30">
						<div class="icon">
							<span class="fa fa-graduation-cap"></span>
						</div>
						<div class="desc">
							<h4>Sections</h4>
							<p>
							   Actuellement l’école fonctionne avec <?php echo mysqli_num_rows($get_classes) ?> sections
							</p>
						</div>
					</div>
					<div class="single_feature d-flex flex-row">
						<div class="icon">
							<span class="lnr lnr-book"></span>
						</div>
						<div class="desc">
							<a href="cours.php"><h4>Cours</h4>
							<p>
							   Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro, praesentium dicta aliquam autem
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Feature Area =================-->

	<!--================ Start Popular Courses Area =================-->
    <div class="popular_courses lite_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="main_title">
                        <h2>Tout les cours publies recemments</h2>
                        <p>L’encadrement et l’éducation de jeunes tout à les aidant à promouvoir le développement de la personne de tout un chacun.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- single course -->
				<?php 
			
					$get_cours = "SELECT *FROM t_cours WHERE cours_disponibilite = 1 ORDER BY 1 DESC LIMIT 0,8";
					$run_cours = mysqli_query($con,$get_cours);
					
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
                                <a href="cours.php"><?php echo $row_cours['titre_cours'] ?></a>
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


	<!--================ Start Department Area =================-->
	<div class="department_area section_gap">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
				    <div class="dpmt_courses">
					   <div class="row">
				        <?php 
							$get_section = "SELECT *FROM section";
							$run_section = mysqli_query($con,$get_section);
							
							while($row_section = mysqli_fetch_assoc($run_section))
							{
								$description = $row_section['description'];
						?>
					
						
							<!-- single course -->
							<div class="col-lg-4 col-md-4 col-sm-6 col-12 text-center mt-100">
								<div class="single_department">
									<div class="dpmt_icon">
										<?php 
										if($description == 'Commercial de gestion')
										{
											echo "<img src='img/dpmt/icon2.png' alt=''>";
										}
										elseif($description == 'Pedagogie Generale')
										{
											echo "<img src='img/dpmt/icon3.png' alt=''>";
										} 
										elseif($description == 'Technique sociale')
										{
											echo "<img src='img/dpmt/icon6.png' alt=''>";
										} 
										elseif($description == 'Architecture')
										{
											echo "<img src='img/dpmt/icon5.png' alt=''>";
										} 
										elseif($description == 'Literaire')
										{
											echo "<img src='img/dpmt/icon1.png' alt=''>";
										} 
										elseif($description == 'Informatque')
										{
											echo "<img src='img/dpmt/icon4.png' alt=''>";
										} 
										?>
										
									</div>
									<h4><?php echo $description ?></h4>
								</div>
							</div>
							<?php } ?>
						</div>
						
					</div>
					
				</div>
				
				<div class="offset-lg-1 col-lg-5">
					<div class="dpmt_right">
						<h1>Voir nos sections organisées</h1>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati deleniti eaque odio hic aut nobis, 
						   ipsam est voluptas reprehenderit perferendis dolorum repudiandae vero eius nulla sunt, fugit dolorem 
						   delectus cum? ipsum dolor sit amet consectetur adipisicing elit.</p>
						<p>Molestiae quia quasi assumenda. Ipsa, error magni? Quis!.. Deleniti consequuntur, et fugiat 
							pariatur magnam sint quisquam, cupiditate incidunt perferendis hic accusantium laudantium.</p>
						<a href="cours.php" class="primary-btn text-uppercase"><i class="fa fa-books"></i>Voir les cours</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================ End Department Area =================-->


  <?php include("includes/footer.php") ?>
  <?php include("includes/scripts.php") ?>