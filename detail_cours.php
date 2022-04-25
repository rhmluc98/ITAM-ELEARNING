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

<?php 

   if(isset($_GET['cours_id']))
   {
       $cours_id = $_GET['cours_id'];

       $get_cours = "SELECT *FROM t_cours WHERE id_cours='$cours_id'";
       $run_cours = mysqli_query($con,$get_cours);

       while($row_cours = mysqli_fetch_assoc($run_cours))
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
                            <h2><?php echo $row_cours['titre_cours'] ?></h2>
                            
                            <div class="page_link">
                                <a href="index.php">Home</a>
                                <a href="cours.php">Courses</a>
                                <a href="cours.php">Details</a>
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
                <div class="col-lg-8 course_details_left">
                    <?php
                        $get_cours_img = "SELECT *FROM images WHERE img_nom='Cours_img'";
                        $run_get = mysqli_query($con,$get_cours_img);
                        $row_cours_img = mysqli_fetch_array($run_get);
                        $cours_img = $row_cours_img['img_fichier'];
                    ?>
                    <div class="main_image">
                        <img class="img-fluid" src="espace_admin/img/admin_photos/<?php echo $cours_img ?>" alt="">
                    </div>
                    <div class="content_wrapper">
                        <h4 class="title">Introduction General</h4>
                        <div class="content">
                            <?php echo $row_cours['introduction_gene'] ?>
                        </div>

                        <h4 class="title">Synthese du cours</h4>
                        <div class="content">
                            <?php echo $row_cours['synthese_gene'] ?>
                        </div>

                        <h4 class="title">Contenu du cours</h4>
                        <div class="content">
                            <?php 
                                $titre_cours = $row_cours['titre_cours'];
                                $id_class = $row_cours['id_classe'];

                                $get_lecons = "SELECT *FROM lecons WHERE cours='$titre_cours' AND id_class='$id_class'";
                                $run_lecons = mysqli_query($con,$get_lecons);
                                $voirdetails = 0;

                                if(mysqli_num_rows($run_lecons))
                                {
                                    while($row_lecons = mysqli_fetch_array($run_lecons))
                                    {
                                        $voirdetails += 1;
                                        $datatarget = 'datatarget'.$voirdetails;

                            ?>
                            <ul class="course_list">
                                <li class="justify-content-between d-flex">
                                <p><?php echo $row_lecons['titre'] ?></p>
                                    <div class="modal fade" id="<?php echo $datatarget ?>" tabindex="-1" rol="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-hearder">
                                                    <h5 class="modal-title" id="exampleModalLabel" style="text-align:center"><?php echo $row_lecons['titre'] ?></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                  <!-- contenu du chapitre -->
                                                  <div class="card-body">
                                                     <p><?php echo $row_lecons['contenu'] ?></p>
                                                 </div>
                                            </div>
                                        </div>
                                   </div>
                                   <a type="button" class="primary-btn text-uppercase" data-toggle="modal" data-target="#<?php echo $datatarget ?>">Details</a>
                                </li>
                            </ul><br>
                            <?php 
                                } 
                             
                             }
                             else
                             {
                                echo "<p class='text-white bg bg-danger' style='padding: 5px; font-size:16px'>Pas de contenu pour l'instant</p>";
                             } 
                             ?>
                        </div>
                    </div>

                    <?php 
                    
                        $util_session = $_SESSION['matricule'];
                        $get_type = "SELECT *FROM comptes WHERE login='$util_session'";
                        $run_type = mysqli_query($con,$get_type);
                        $row_type = mysqli_fetch_array($run_type);

                        $type = $row_type['utilisateur_type'];

                        if($type === 'eleve')
                        {
                            

                    ?>
                         <a href="questionnaire.php?id_cours=<?php echo $row_cours['id_cours'] ?>" class="primary-btn text-uppercase enroll" onclick="return confirm('Etes-vous pres pour faire cette evaluation? Une fois ckiquer sur le bouton \'OK\' Vous ne pouvez pas revenir en arriere et le chrono sera immediatement lancer!')"><i class="fa fa-edit"></i> Faire l'evaluation</a>
                         
                    <?php
                    
                      } 
                      else
                      {
                
                      }

                    ?>
                </div>
                
                <div class="col-lg-4 right-contents">
                    <ul>
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
                        <li>
                            <a class="justify-content-between d-flex" href="#">
                                <p>Titre du cours </p>
                                <span class="or"><?php echo $row_cours['titre_cours']?></span>
                            </a>
                        </li>
                        <li>
                            <a class="justify-content-between d-flex" href="#">
                                <p>Nombre d'heurs/semaine</p>
                                <span class="or"><?php echo $row_cours['nombre_heures'] ?></span>
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
                        <li>
                            <a class="justify-content-between d-flex" href="#commentaire">
                                <p>Commentaires</p>
                                <span class="or">
                                    <?php 
                                
                                        $course_id = $row_cours['id_cours'];
                                        $get_comments = "SELECT *FROM discussions WHERE id_cour='$course_id'";
                                        $run_comments = mysqli_query($con,$get_comments);

                                        echo mysqli_num_rows($run_comments); 
                                
                                    ?>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <a href="espace_admin/fichiers_cours/<?php echo $row_cours['fichier_pdf'] ?>" class="primary-btn text-uppercase enroll"><i class="fa fa-download"></i> Telechargez le cours ici</a>

                    <h4 class="title">Horaire du cours</h4>
                    <div class="content">
                        <div class="review-top row pt-40">
                            <div class="col-lg-12">
                                <h6 class="mb-15">Soyez connectez suivant l'horaire ci-desous</h6>
                                <?php 
                                
                                   $titre_cours = $row_cours['titre_cours'];
                                   $id_class = $row_cours['id_classe'];

                                   $get_hor = "SELECT *FROM horaire_cours WHERE nom_cours='$titre_cours' AND class_id='$id_class'";
                                   $run_hor = mysqli_query($con,$get_hor);

                                   if(mysqli_num_rows($run_hor))
                                   {
                                       while($row_hor = mysqli_fetch_array($run_hor))
                                        {
                                
                                ?>
                                <div class="row d-flex flex-row reviews justify-content-between">
                                    <span class="col-md-3"><?php echo $row_hor['jour'] ?></span>
                                    <div class="star col-md-6">
                                        <h6>De <?php echo $row_hor['heure_debut'] ?> à <?php echo $row_hor['heure_fin'] ?></h6>
                                    </div>
                                    <span class="col-md-3"><?php echo $row_hor['endroit'] ?></span>
                                </div>
                                <?php 
                                    } 
                                 
                                  }
                                  else
                                  {
                                    echo "<p class='text-white bg bg-danger' style='padding: 5px; font-size:16px'>Pas d'horaire publier pour l'instant</p>";
                                  } 
                                ?>
                                
                            </div>
                        </div>
                        
                        <?php 
                        
                           $util_session = $_SESSION['matricule'];
                           $get_type = "SELECT *FROM comptes WHERE login='$util_session'";
                           $run_type = mysqli_query($con,$get_type);
                           $row_type = mysqli_fetch_array($run_type);

                           $type = $row_type['utilisateur_type'];
                        
                           if($type == 'eleve')
                           {

                        ?>
                        <div style="background: #9999aa; color: white; padding: 10px;">
                            <h4 class="title">Actuellement connectes</h4>

                            <?php 
                                $get_eleve_connecter = "SELECT *FROM comptes WHERE statut='connecter' AND utilisateur_type='eleve'";
                                $run_eleves_connecter = mysqli_query($con,$get_eleve_connecter);
                        
                                if(mysqli_num_rows($run_eleves_connecter) > 0)
                                {
                                    while($row_eleves_connecte = mysqli_fetch_assoc($run_eleves_connecter)) 
                                    {  
                            ?>
                           
                            <p><i class="fa fa-circle" style="color: green;font-weight: bolder"></i> <?php echo $row_eleves_connecte['nom_utilisateur'] ?></p>
                            <?php  } 
                        
                            } 
                            else
                            {
                                echo "<h4 style='color: white; backgraound-color: red; padding: 8px'>Aucun eleve n'est connecter pour l'instant</h4>";
                            }
                        ?>
                        </div>
                        <?php 
                           }
                           else
                           {
                        ?>
                            <div style="background: #9999aa; color: white; padding: 10px;">
                            <h4 class="title">Actuellement connectes</h4>

                            <?php 
                                $get_eleve_connecter = "SELECT *FROM comptes WHERE statut='connecter' AND utilisateur_type='eleve'";
                                $run_eleves_connecter = mysqli_query($con,$get_eleve_connecter);
                        
                                if(mysqli_num_rows($run_eleves_connecter) > 0)
                                {
                                    while($row_eleves_connecte = mysqli_fetch_assoc($run_eleves_connecter)) 
                                    {  
                            ?>
                           
                            <p><i class="fa fa-circle" style="color: green;font-weight: bolder"></i> <?php echo $row_eleves_connecte['nom_utilisateur'] ?></p>

                            <?php  }
                            
                            echo "<a href='eleves_connectes.php?' class='primary-btn text-uppercase enroll'><i class='fa fa-download'></i> Telechargez la liste</a>";
                        
                            } 
                            else
                            {
                                echo "<h4 style='color: white; backgraound-color: red; padding: 8px'>Aucun eleve n'est connecter pour l'instant</h4>";
                            }
                        ?>
                        </div>
                        <?php
                           }
                        ?>

                        <?php 
                           $session = $_SESSION['matricule'];
                           $get_exp = mysqli_query($con,"SELECT id_compte FROM comptes WHERE login='$session'");
                           $row_exp = mysqli_fetch_array($get_exp);

                           $exp_id = $row_exp['id_compte'];
                        ?>
                        <div class="feedeback" id="commentaire">
                            <h6>Votre question</h6>
                            <form action="espace_admin/code.php" method="post">
                                <input type="hidden" name="expediteur_id" value="<?php echo $exp_id ?>">
                                <input type="hidden" name="id_cours" value="<?php echo $row_cours['id_cours'] ?>">
                                <textarea name="message" class="form-control" cols="10" rows="10" placeholder="Message..." required></textarea>
                                <div class="mt-10 text-right">
                                    <button type="submit" name="question" class="primary-btn text-right text-uppercase">Envoyez</button>
                                </div>
                            </form>
                        </div>
                            
                        <div class="comments-area mb-30">

                            <?php 
                            
                               $expediteur_id = $exp_id;
                               $id_COURS = $row_cours['id_cours'];


                               $get_comments = "SELECT *FROM discussions WHERE id_cour='$id_COURS' order by date DESC";
                               $run_commets = mysqli_query($con,$get_comments);
                               $voircomments = 0;

                               if(mysqli_num_rows($run_commets) > 0)
                               {
                                   while ($row_comments = mysqli_fetch_assoc($run_commets)) 
                                   {

                                    $voircomments += 1;
                                    $commenttarget = 'commenttarget'.$voircomments;
                                       
                                     $id_expediteur = $row_comments['id_exp'];
                                     $get_expediteur = "SELECT *FROM comptes WHERE id_compte ='$id_expediteur'";
                                     $run_expediteur = mysqli_query($con,$get_expediteur);
                                     $row_expediteur = mysqli_fetch_array($run_expediteur);

                                     $expediteur_type = $row_expediteur['utilisateur_type'];
                                     $util_id = $row_expediteur['utilisateur_id'];

                                     if($expediteur_type == 'eleve')
                                     {
                                         $get_eleve_photo = "SELECT *FROM eleves WHERE id_eleves='$util_id'";
                                         $run_eleve_photo = mysqli_query($con,$get_eleve_photo);
                                         $row_eleve_photo = mysqli_fetch_array($run_eleve_photo);

                                         $eleve_photo = $row_eleve_photo['eleve_img'];
                                         $nom_eleves = $row_eleve_photo['nom_eleves'];
                                         $postnom_eleves = $row_eleve_photo['postnom_eleves'];
                                     }
                                     else
                                     {
                                        $get_ensei_photo = "SELECT *FROM enseignant WHERE id_enseignant='$util_id'";
                                        $run_ensei_photo = mysqli_query($con,$get_ensei_photo);
                                        $row_ensei_photo = mysqli_fetch_array($run_ensei_photo);

                                        $enseignant_photo = $row_ensei_photo['photo'];
                                        $prenom_enseignant = $row_ensei_photo['prenom_enseignant'];
                                        $nom_enseignant = $row_ensei_photo['nom_enseignant'];
                                     }


                            ?>
                            <div class="comment-list">
                                <div class="single-comment single-reviews justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <?php 

                                        if($expediteur_type == 'eleve')
                                        {
                                    
                                            ?>
                                        <div class="thumb">
                                            <img src="espace_admin/img/eleves_photos/<?php echo $eleve_photo ?>" style="border-radius: 100%" width="70" height="70" alt="">
                                        </div>
                                        <?php 
                                         
                                         }
                                         else
                                         {
                                           ?>
                                            <div class="thumb">
                                                 <img src="espace_admin/img/enseignants_photos/<?php echo $enseignant_photo ?>" style="border-radius: 100%" width="70" height="70" alt="">
                                            </div>
                                          
                                        <?php } ?>

                                        <div class="desc">
                                            <?php if($expediteur_type == 'eleve'){ echo "<h5><a href='#'>$nom_eleves $postnom_eleves</a></h5>"; } else{echo "<h5><a href='#'>$prenom_enseignant $nom_enseignant</a></h5>"; } ?>
                                            <p><?php 
                                                 $anc_date = $row_comments['date'];
                                                 $date = date_create($anc_date);
                                                 $nouv = date_format($date,'d-m-Y'.' à '.'H:i:s');
                                                 echo $nouv;
                                            ?></p>
                                            <p class="comment" style="margin-top: -15px"><?php echo $row_comments['contenu']; ?> </p>

                                            <ul class="course_list">
                                                <li class="justify-content-between d-flex">
                                                    <div class="modal fade" id="<?php echo $commenttarget ?>" tabindex="-1" rol="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-hearder">
                                                                    <h5 class="modal-title" id="exampleModalLabel" style="text-align: center">Ecrire votre reponse</h5>
                                                         
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="card-body">
                                                                <p>
                                                                    <form action="espace_admin/code.php" method="post">
                                                                        <input type="hidden" name="expeti_id" value="<?php echo $exp_id ?>">
                                                                        <input type="hidden" name="courses_id" value="<?php echo $id_COURS ?>">
                                                                        <input type="hidden" name="messages_id" value="<?php echo $row_comments['message_id']; ?>">
                                                                        <textarea type="text" name="reponse_contenu" class="form-control" rows="3" placeholder="Message..."></textarea>
                                                                       <button type="submit" name="send_response" value="" class="btn btn-primary" style="margin-left: 380px; font-size: 10px; margin-top: 10px">Envoye</button>
                                                                    </form>
                                                                </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                    <button type="button" class="btn btn-primary" style="margin-left: 150px; font-size: 10px" data-toggle="modal" data-target="#<?php echo $commenttarget ?>">Repondre</button>
                                                </li>
                                            </ul>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <?php 
                            
                               $comment_id = $row_comments['message_id'];

                               $get_response = "SELECT *FROM reponse_discution WHERE message_id='$comment_id' order by date ASC";
                               $run_response = mysqli_query($con,$get_response);

                               if(mysqli_num_rows($run_response) > 0)
                               {
                                   while ($row_response = mysqli_fetch_assoc($run_response)) 
                                   {
                                       
                                     $id_expedi = $row_response['id_expediteur'];
                                     $get_expedi = "SELECT *FROM comptes WHERE id_compte ='$id_expedi'";
                                     $run_expedi = mysqli_query($con,$get_expedi);
                                     $row_expedi = mysqli_fetch_array($run_expedi);

                                     $expedi_type = $row_expedi['utilisateur_type'];
                                     $utilisateur_id = $row_expedi['utilisateur_id'];

                                     if($expedi_type == 'eleve')
                                     {
                                         $get_elev_photo = "SELECT *FROM eleves WHERE id_eleves='$utilisateur_id'";
                                         $run_elev_photo = mysqli_query($con,$get_elev_photo);
                                         $row_elev_photo = mysqli_fetch_array($run_elev_photo);

                                         $elev_photo = $row_elev_photo['eleve_img'];
                                         $nom_eleve = $row_elev_photo['nom_eleves'];
                                         $postnom_eleve = $row_elev_photo['postnom_eleves'];
                                     }
                                     else
                                     {
                                        $get_enseignant_photo = "SELECT *FROM enseignant WHERE id_enseignant='$utilisateur_id'";
                                        $run_enseignant_photo = mysqli_query($con,$get_enseignant_photo);
                                        $row_enseignant_photo = mysqli_fetch_array($run_enseignant_photo);

                                        $enseig_photo = $row_enseignant_photo['photo'];
                                        $prenom_ensei = $row_enseignant_photo['prenom_enseignant'];
                                        $nom_ensei = $row_enseignant_photo['nom_enseignant'];
                                     }


                            ?>
                            <div class="comment-list" style="margin-left: 90px">
                                <div class="single-comment single-reviews justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <?php 

                                        if($expedi_type == 'eleve')
                                        {

                                            ?>
                                        <div class="thumb">
                                            <img src="espace_admin/img/eleves_photos/<?php echo $elev_photo ?>" style="border-radius: 100%" width="70" height="70" alt="">
                                        </div>
                                        <?php 
                                        
                                        }
                                        else
                                        {
                                        ?>
                                            <div class="thumb">
                                                <img src="espace_admin/img/enseignants_photos/<?php echo $enseig_photo ?>" style="border-radius: 100%" width="70" height="70" alt="">
                                            </div>
                                        
                                        <?php } ?>
                                        <div class="desc">
                                        <?php if($expedi_type == 'eleve'){ echo "<h5><a href='#'>$nom_eleve $postnom_eleve</a></h5>"; } else{echo "<h5><a href='#'>$prenom_ensei $nom_ensei</a></h5>"; } ?>
                                            <p><?php 
                                                 $ancien_date = $row_response['date'];
                                                 $ladate = date_create($ancien_date);
                                                 $nouvelle = date_format($ladate,'d-m-Y'.' à '.'H:i:s');
                                                 echo $nouvelle;
                                            ?></p>
                                            <p class="comment" style="margin-top: -15px"><?php echo $row_response['contenu_reponse'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } } ?>
                         <?php } } ?>   
                         
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Course Details Area =================-->
<?php
     }
   }
?>

<?php include("includes/footer.php") ?>
<?php include("includes/scripts.php") ?>

<?php } ?>
