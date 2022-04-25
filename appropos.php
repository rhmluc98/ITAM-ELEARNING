
<?php include("includes/header.php") ?>

<?php include("includes/topbarnav.php") ?>

<?php 

$get_apropos_baniere_img = "SELECT *FROM images WHERE img_nom='Baniere_apropos'";
$run_apropos_baniere_img = mysqli_query($con,$get_apropos_baniere_img);
$row_apropos_baniere_img = mysqli_fetch_array($run_apropos_baniere_img);
$apropos_baniere_img = $row_apropos_baniere_img['img_fichier'];

?>
<style type="text/css">
.banner_area
{background: url('espace_admin/img/admin_photos/<?php echo $apropos_baniere_img ?>') no-repeat center center;}

</style>

<?php 

   $get_eleves = "SELECT *FROM eleves";
   $run_eleves = mysqli_query($con,$get_eleves);

   $count_eleves = mysqli_num_rows($run_eleves);
   $nombre_eleves = $count_eleves - 1;

   $get_descriptions = "SELECT *FROM ecole_info";
   $run_desc = mysqli_query($con,$get_descriptions);
   $row_desc = mysqli_fetch_array($run_desc);

   $nom_ecole = $row_desc['nom_ecole'];
   $ecole_desc = $row_desc['details_ecole'];
   $adresse_ecole = $row_desc['adresse_ecole'];
   $numero_telephone = $row_desc['numero_telephone'];
   $devise_ecole = $row_desc['devise_ecole'];
   $adresse_email = $row_desc['adresse_email'];
   $photo_ecole = $row_desc['photo_ecole'];

?>
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="banner_content text-center">
                            <h2><?php echo $nom_ecole ?></h2>
                            <p><?php echo $devise_ecole ?></p>
                            <div class="page_link">
                                <a href="index.php">Acceuil</a>
                                <a href="appropos.php">Apropos</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================ Start Department Area =================-->
    <div class="department_area section_gap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 text-center">
                    <img class="img-fluid" src="espace_admin/img/admin_photos/<?php echo $photo_ecole ?>" alt="">
                </div>

                <div class="offset-lg-1 col-lg-6">
                    <div class="dpmt_right">
                        <h1>Plus de <?php echo $nombre_eleves ?> eleves sont inscrits à l'institut Antonino Manzoti </h1>
                        <p><?php echo $ecole_desc ?></p>
                        <p>Adresse physique: <?php echo $adresse_ecole ?></p>
                        <p>Adresse electronique: <?php echo $adresse_email ?></p>
                        <p>Numero de telephone: (+243) <?php echo $numero_telephone ?></p>
                        <a href="cours.php" class="primary-btn text-uppercase">Voir les Cours</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================ End Department Area =================-->

    <!--================ Start Instructor Area =================-->
    <div class="instructors_area lite_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="main_title">
                        <h2>Nos enseignants permanents</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- single-instructor -->
                <?php 
                
                   $get_profs = "SELECT *FROM enseignant";
                   $run_prof = mysqli_query($con,$get_profs);

                   while($row = mysqli_fetch_assoc($run_prof)) 
                   {
                
                ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_instructor">
                        <div class="author">
                            <img src="espace_admin/img/enseignants_photos/<?php echo $row['photo'] ?>" alt="" width="145" height="150">
                        </div>
                        <div class="author_decs">
                            <h4><?php echo $row['nom_enseignant'] ?> <?php echo $row['prenom_enseignant'] ?></h4>
                            <p class="profession">Telephone: (+243) <?php echo $row['numero_telephone'] ?></p>
                            <p>Prof. <?php echo $row['nom_enseignant'] ?> enseigne a l'<?php echo $nom_ecole ?> depuis <?php echo $row['date_insc'] ?>.</p>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!--================ End Instructor Area =================-->

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
						<a href="#" class="primary-btn text-uppercase"><i class="fa fa-books"></i>Voir les cours</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================ End Department Area =================-->

    

  <?php include("includes/footer.php") ?>
  <?php include("includes/scripts.php") ?>