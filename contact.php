
<?php include("includes/header.php") ?>
<?php include("includes/topbarnav.php") ?>

<?php 

$get_contact_baniere_img = "SELECT *FROM images WHERE img_nom='Baniere_contact'";
$run_contact_baniere_img = mysqli_query($con,$get_contact_baniere_img);
$row_contact_baniere_img = mysqli_fetch_array($run_contact_baniere_img);
$contact_baniere_img = $row_contact_baniere_img['img_fichier'];

?>
<style type="text/css">
.banner_area
{background: url('espace_admin/img/admin_photos/<?php echo $contact_baniere_img ?>') no-repeat center center;}

</style>

<?php 

   $get_descriptions = "SELECT *FROM ecole_info";
   $run_desc = mysqli_query($con,$get_descriptions);
   $row_desc = mysqli_fetch_array($run_desc);

   $nom_ecole = $row_desc['nom_ecole'];
   $ecole_desc = $row_desc['details_ecole'];
   $adresse_ecole = $row_desc['adresse_ecole'];
   $numero_telephone = $row_desc['numero_telephone'];
   $devise_ecole = $row_desc['devise_ecole'];
   $adresse_email = $row_desc['adresse_email'];

?>
<!--================Home Banner Area =================-->
<section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="banner_content text-center">
                            <h2>Contactez-nous</h2>
                            <p>Adresse email: <?php echo $adresse_email ?></p>
                            <p>Numero de telephone: (+243) <?php echo $numero_telephone ?></p>
                            <div class="page_link">
                                <a href="index.php">Acceuil</a>
                                <a href="contact.php">Contact</a>
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
                <div class="col-lg-3">
                    <div class="contact_info">
                        <div class="info_item">
                            <i class="lnr lnr-map-marker"></i>
                            <h6><?php echo $adresse_ecole ?></h6>
                            <p>République démocratique du Congo</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-phone-handset"></i>
                            <h6><a href="#">(+243) <?php echo $numero_telephone ?></a></h6>
                            <p>Du Lundi au Samedi de 7h à 17h</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-envelope"></i>
                            <h6><a href="#"><?php echo $adresse_email ?></a></h6>
                            <p>Envoi-nous votre requete!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <form action="" method="post" class="row contact_form" id="contactForm" novalidate="novalidate">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="exp_nom" placeholder="Entrez votre nom">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="exp_email" placeholder="Entrez l'adresse email ">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" name="sujet" placeholder="Sujet">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Tapez le message..."></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" name="contact_btn" value="" class="btn primary-btn">Envoyer Message</button>
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

   if(isset($_POST['contact_btn']))
   {
       $nom = $_POST['exp_nom'];
       $email = $_POST['exp_email'];
       $sujet = $_POST['sujet'];
       $message = $_POST['message'];

       $env_msg = "INSERT INTO messages_recu (nom_exp,email_exp,sujet,contenu_msg,date) VALUES ('$nom','$email','$sujet','$message',NOW())";
       $run_msg = mysqli_query($con,$env_msg);

       if($run_msg) 
       {
           echo "<script>alert('Votre message a ete envoye avec succes')</script>";
       }
       else {
        echo "<script>alert('Echec d\'envoi')</script>";
       }
   }

?>