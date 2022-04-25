<!--================ Start footer Area  =================-->
<footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
			    <div class="col-lg-3 col-md-9 single-footer-widget">
					<h4><a href="contact.php">Contactez-nous</a></h4>
					<ul>
						<li><a href="#"><i class="lnr lnr-envelope"></i> &nbsp 	intitutpereantonino.info@gmail.com </a></li>
						<li><a href="#"><i class="lnr lnr-phone"></i> &nbsp (+243) 974685965</a></li>
						<li><a href="#"><i class="lnr lnr-map-marker"></i> &nbsp Bukavu/Panzi/Av.J.Miruho. No356, Sud-kivu/RDC</a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-9 single-footer-widget">
					<h4>Nos sections</h4>
					<ul>
						<li><a href="#">Pedagogie generale</a></li>
						<li><a href="#">Commercial de gestion</a></li>
						<li><a href="#">Technique social</a></li>
						<li><a href="#">Informatique</a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-9 single-footer-widget">
					<h4>Pages</h4>
					<ul>
						<li><a href="index.php">Acceuil</a></li>
						<li><a href="appropos.php">Apropos de nous</a></li>
						<li><a href="cours.php">Cours</a></li>
						<li><a href="contact.php">Contact</a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-9 single-footer-widget">
					<h4>Resources</h4>
					<ul>
						<li><a href="#">Guides</a></li>
						<li><a href="#">Recherche</a></li>
						<li><a href="#">Experts</a></li>
						<li><a href="#">Livres</a></li>
					</ul>
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

						 $util_type = $row_type['utilisateur_type'] ?? null;
					?>
					
					<?php if($util_type == 'Professeur' || $util_type == 'Titulaire')
					{

					  ?>
					  <div class="row footer-bottom d-flex justify-content-between">
				          <p class="col-lg-12 col-sm-12 footer-text m-0 text-white"><i class="fa fa-user"></i>
						    <a href="index.php" class="text-uppercase"> Vous etes connectez en tant que prof <?php echo $nom_ensei; echo "&nbsp"; echo $prenom_ensei ?></a> &nbsp | &nbsp
					      </p>
			           </div>
					
					<?php 
					} 
				
				    else
					 {	 
					 
					 ?>
					 <div class="row footer-bottom d-flex justify-content-between">
				          <p class="col-lg-12 col-sm-12 footer-text m-0 text-white"><i class="fa fa-user" aria-hidden="true"></i>
						  <a href="index.php" class="text-uppercase"> Vous etes connectez en tant qu'eleve <?php echo $nom_eleve; echo "&nbsp"; echo $postnom_eleves ?></a> &nbsp | &nbsp
					      </p>
			           </div>  

				  <?php	} } ?>

			  <div class="row footer-bottom d-flex justify-content-between">
				<p class="col-lg-12 col-sm-12 footer-text m-0 text-white">Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tout droits réservés &nbsp | &nbsp
					INSTITUT<a href="index.php"> ANTONINO MANZOTI</a>
				</p>
			  </div>
		</div>
	</footer>
	<!--================ End footer Area  =================-->

<?php include("includes/scripts.php") ?>