	
	<div class="main_menu">
		<nav class="navbar navbar-expand-lg navbar-light">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<a class="navbar-brand logo_h" href="index.php"><span style="font-weight:bolder; font-size:30px">INSTITUT<span style="color:blue">ANTONINO</span></span></a>
				<span>
					<a class="justify-content-between d-flex" href="#">
						<span class="or" id="countdownSuccess" style = "padding: 10px; color: white; font-size: 22px;"></span>
					</a>
				</span>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
					<ul class="nav navbar-nav menu_nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="index.php">Acceuil</a></li>
						<li class="nav-item"><a class="nav-link" href="appropos.php">Apropos de nous</a></li>
						<li class="nav-item"><a class="nav-link" href="cours.php">Cours</a></li>
						<li class="nav-item submenu dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								aria-expanded="false">Nos sections</a>
							<ul class="dropdown-menu">
								<?php 
								
								  $get_section = "SELECT *FROM section";
								  $run_section = mysqli_query($con,$get_section);

								  while ($row_section = mysqli_fetch_assoc($run_section)) 
								    {
								?>
								<li class="nav-item"><a class="nav-link" href="#"><?php echo $row_section['description'] ?></a></li>
								<?php } ?>
							</ul>
						</li>
						<li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
						<?php if(!isset($_SESSION['matricule']))
						{ 
						 ?>

						<li class="nav-item"><a class="nav-link" href="connexion.php">Connexion</a></li>
						<?php 
						}
						else
						{
						  ?>
						   <li class="nav-item"><form action="deconnexion.php" method="post"><button type="submit" name="logout_btn" class="btn btn-default nav-link" onclick="return confirm('Voulez-vous vraiment vous deconnectez?')">Deconnexion</button></form></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</nav>
	</div>
</header>
	<!--================ End Header Menu Area =================-->