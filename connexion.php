
<?php include("includes/header.php") ?>

<?php include("includes/topbarnav.php") ?>

<?php

$get_cours_baniere_img = "SELECT *FROM images WHERE img_nom='Baniere_connexion'";
$run_cours_baniere_img = mysqli_query($con,$get_cours_baniere_img);
$row_cours_baniere_img = mysqli_fetch_array($run_cours_baniere_img);
$cours_baniere_img = $row_cours_baniere_img['img_fichier'];

?>
<style type="text/css">
.banner_area

{background: url('espace_admin/img/admin_photos/<?php echo $cours_baniere_img ?>') no-repeat center center;}

</style>
<!--================Home Banner Area =================-->
<section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="banner_content text-center">
                            <h2>Connectez-vous</h2>
                            <div class="page_link">
                                <a href="index.php">Acceuil</a>
                                <a href="connexion.php">Connexion</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Contact Area =================-->
    <section class="contact_area section_gap">
        <div class="container">
            
            <div class="row">
                <div class="col-lg-12">
                    <form class="row contact_form" action="" method="post" id="contactForm" novalidate="novalidate">
                        <div class="col-md-9">
                            <label for="">Numero matricule</label>
                            <div class="input-group-icon mt-15">
								<div class="icon"><i class="fa fa-user" aria-hidden="true"></i></div>
								<input type="number" name="matricule" placeholder="Entrez votre numero matricule" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Entrez votre numero matricule'"
								 required class="single-input">
							</div><br>
                            <label for="">Mot de passe</label>
                            <div class="input-group-icon mt-15">
								<div class="icon"><i class="fa fa-lock" aria-hidden="true"></i></div>
								<input type="password" name="password" placeholder="Entrez votre mot de passe" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Entrez votre mot de passe'"
								 required class="single-input">
							</div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" value="" name="eleve_login" class="btn primary-btn"><i class="fa fa-sign-in"></i> Connexion</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--================Contact Area =================-->


<?php include("includes/footer.php") ?>
<?php include("includes/scripts.php") ?>

<?php 

  if(isset($_POST['eleve_login'])){

      $matricule = mysqli_real_escape_string($con,$_POST['matricule']);
      $password = mysqli_real_escape_string($con,$_POST['password']);

      $get_util = "SELECT *FROM comptes WHERE login='$matricule' AND utilisateur_password='$password' AND acces='Permis'";
      $run_util = mysqli_query($con,$get_util);
      $count = mysqli_num_rows($run_util);
        
      if($count == 1){

        $update_msg = mysqli_query($con, "UPDATE comptes SET statut='connecter' WHERE login ='$matricule'");

        $_SESSION['matricule'] = $matricule;

        echo "<script>alert('Connexion reussi, Bienvenu!')</script>";
        echo "<script>window.open('cours.php','_self')</script>";
      }

      else
      {
        echo "<script>alert('Votre matricule ou mot de passe est incorrect! Si vous ne parvevez pas à vous connectez, merci de contacter votre administrateur')</script>";
      }

    }

?>
