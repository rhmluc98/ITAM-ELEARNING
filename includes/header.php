

<?php 

  session_start();
  include("includes/db.php") 

?>

<!doctype html>
<html lang="en">

 <head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Intitut Pere Antonino Manzoti</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="vendors/linericon/style.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
	<link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
	<link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
	<link rel="stylesheet" href="vendors/animate-css/animate.css">
	<script src="../espace_admin/lib/jquery/jquery-3.6.0.min.js"></script>
	<!-- main css -->
	<link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php 

  $get_info_ecole = "SELECT *FROM ecole_info";
  $run_info_ecole = mysqli_query($con,$get_info_ecole);
  $row_info_ecole = mysqli_fetch_array($run_info_ecole);

  $nom_ecole = $row_info_ecole['nom_ecole'];
  $numero_tele = $row_info_ecole['numero_telephone'];
  $adresse_email = $row_info_ecole['adresse_email'];
  $details_ecole = $row_info_ecole['details_ecole'];

?>
	<!--================ Start Header Menu Area =================-->
	<header class="header_area">
		<div class="header-top">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6 col-sm-6 col-4 header-top-left">
						<a href="tel:+243<?php echo $numero_tele ?>">
							<span class="lnr lnr-phone"></span>
							<span class="text">
								<span class="text">(+243) <?php echo $numero_tele ?></span>
							</span>
						</a>
						<a href="<?php echo $adresse_email ?>">
							<span class="lnr lnr-envelope"></span>
							<span class="text">
								<span class="text"><?php echo $adresse_email ?></span>
							</span>
						</a>
					</div>

					<?php 
					
					   if(!isset($_SESSION['matricule']))
					   {
						  echo "<div class='col-lg-6 col-sm-6 col-8 header-top-right'>
						            <a href='connexion.php' class='text-uppercase'><i class='fa fa-sign-in'></i> Connectez-vous ici</a>
					            </div>
					        "; 
					   }
					   else
					   {
						 $session = $_SESSION['matricule'];
						 $eleve = "SELECT *FROM eleves WHERE matricule='$session'";
						 $run_eleve = mysqli_query($con,$eleve);
						 $row_eleve = mysqli_fetch_array($run_eleve);

						 $nom_eleve = $row_eleve['nom_eleves'] ?? null;
						 $postnom_eleves = $row_eleve['postnom_eleves'] ?? null;

						 $ensei = "SELECT *FROM enseignant WHERE matricule='$session'";
						 $run_ensei = mysqli_query($con,$ensei);
						 $row_ensei = mysqli_fetch_array($run_ensei);

						 $nom_ensei = $row_ensei['nom_enseignant'] ?? null;
						 $prenom_ensei = $row_ensei['prenom_enseignant'] ?? null;

						 $get_type = "SELECT *FROM comptes WHERE login='$session'";
						 $run_type = mysqli_query($con,$get_type);
						 $row_type = mysqli_fetch_array($run_type);

						 $util_type = $row_type['utilisateur_type'];
					?>
					
					<?php if($util_type == 'Professeur' || $util_type == 'Titulaire')
					{

					  ?>
					  <div class="col-lg-6 col-sm-6 col-8 header-top-right">
						<a href="index.php" class="text-uppercase"><i class="fa fa-user"></i> Vous etes connectez en tant que prof <?php echo $nom_ensei; echo "&nbsp"; echo $prenom_ensei ?></a>
					</div>
					
					<?php 
					} 
				
				    else
					 {	 
					 
					 ?>
					 <div class="col-lg-6 col-sm-6 col-8 header-top-right">
						<a href="index.php" class="text-uppercase"><i class="fa fa-user"></i> Vous etes connectez en tant qu'eleve <?php echo $nom_eleve; echo "&nbsp"; echo $postnom_eleves ?></a>
					</div>

				  <?php	} } ?>

				      
					 
				</div>
			</div>
		</div>
