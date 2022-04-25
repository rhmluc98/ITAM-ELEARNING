<?php include("includes/db.php") ?>


<!-- ************* Debut insertion eleves ************** -->
<?php 

    if(isset($_POST['modif_admin_password']))
    {
      $admin_id = $_POST['admin_id'];

      $ancien_pass = $_POST['ancien_pass'];
      $new_pass = $_POST['new_pass'];
      $repeat_password = $_POST['repeat_password'];

      $get_old_pass = "SELECT *FROM admins WHERE admin_password='$ancien_pass' AND id_admin='$admin_id'";
      $run_get = mysqli_query($con,$get_old_pass);

      if(mysqli_num_rows($run_get) > 0)
      {
         if($new_pass != $repeat_password) 
         {
          echo "<script>alert('Le nouveau mot de passe et repeter mot de passe doivent etre les memes!')</script>";
          echo "<script>window.open('admin_profile.php?code=$admin_id','_self')</script>";
         }
         else
         {
           $update_passe = "UPDATE admins SET admin_password='$new_pass' WHERE id_admin='$admin_id'";
           $run_update_pass = mysqli_query($con,$update_passe);

           if($run_update_pass)
           {
            echo "<script>alert('Votre mot de passe a etait modifier avec succes!')</script>";
            echo "<script>window.open('admin_profile.php?code=$admin_id','_self')</script>";
           }
         }
      }
      else
      {
        echo "<script>alert('C\'est ancien mot de passe n\'existe pas!')</script>";
        echo "<script>window.open('admin_profile.php?code=$admin_id','_self')</script>";
      }
    }

?>
<!-- ************* Debut insertion eleves ************** -->




<!-- ************* Debut insertion eleves ************** -->
<?php

if (isset($_POST['insert_eleve'])) {
        
    $nom_eleve  = htmlspecialchars($_POST['nom_eleve']);
    $postnom = htmlspecialchars($_POST['postnom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $class_id = htmlspecialchars($_POST['classe_id']);
    $matricule = htmlspecialchars($_POST['matricule']);
    $sexe = htmlspecialchars($_POST['sexe']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $annee_sco = $_POST['annee_sco'];

    $photo = htmlspecialchars($_FILES['photo']['name']);
    $tmp_photo = htmlspecialchars($_FILES['photo']['tmp_name']);

    $get_eleve = "SELECT *FROM eleves WHERE matricule='$matricule'";
    $run_eleve = mysqli_query($con,$get_eleve);

    if(mysqli_num_rows($run_eleve) > 0)
    {
      echo "<script>alert('Il exist deja un eleve avec ce numero matricule \'$matricule\'.')</script>";
      echo "<script>window.open('ajout_eleves.php','_self')</script>";
    }

    $extension_fichier = explode('.',$photo);
    $ext_finale_fichier = strtolower(end($extension_fichier));
    $format_acceptable = array('jpg','png','jpeg');
 
    if(in_array($ext_finale_fichier,$format_acceptable))
    {

        move_uploaded_file($tmp_photo,"img/eleves_photos/$photo");

        $insert_eleve = "INSERT INTO eleves (nom_eleves,postnom_eleves,prenom_eleves,classe_id,matricule,Sexe,adresse,
        eleve_img,annee_insc) VALUES ('$nom_eleve','$postnom','$prenom','$class_id','$matricule','$sexe','$adresse','$photo','$annee_sco')";
        $run_insert = mysqli_query($con,$insert_eleve);

        if($run_insert)
        {
          echo "<script>alert('Eleve ajouter avec succes')</script>";
          echo "<script>window.open('eleves.php','_self')</script>";
        }
        else
        {
          echo "<script>alert('Echec d\'ajout')</script>";
          echo "<script>window.open('ajout_eleves.php','_self')</script>";
        }

    }

    else
    {
      echo"<script>alert('Ce format du fichier est insuportable')</script>";
      echo"<script>window.open('ajout_eleves.php','_self')</script>";
    }

  }
?>
<!-- ************* Fin insertion eleves ************** -->



<!-- ************* Debut modifier eleves ************** -->
<?php

if (isset($_POST['modif_eleve'])) {
        
    $id = $_POST['eleve_id'];
    $modif_nom  = htmlspecialchars($_POST['modif_nom']);
    $modif_postnom = htmlspecialchars($_POST['modif_postnom']);
    $modif_prenom = htmlspecialchars($_POST['modif_prenom']);
    $modif_classe = htmlspecialchars($_POST['modif_classe']);
    $modif_matricule = htmlspecialchars($_POST['modif_matricule']);
    $modif_sexe = htmlspecialchars($_POST['modif_sexe']);
    $modif_adresse = htmlspecialchars($_POST['modif_adresse']);

    $modif_photo = htmlspecialchars($_FILES['modif_photo']['name']);
    $tmp_modif_photo = htmlspecialchars($_FILES['modif_photo']['tmp_name']);

    $extension_fichier = explode('.',$modif_photo);
    $ext_finale_fichier = strtolower(end($extension_fichier));
    $format_acceptable = array('jpg','png','jpeg');
 
    if(in_array($ext_finale_fichier,$format_acceptable))
    {
        move_uploaded_file($tmp_modif_photo,"img/eleves_photos/$modif_photo");

        $modifier_eleve = "UPDATE eleves SET nom_eleves='$modif_nom', postnom_eleves='$modif_postnom', prenom_eleves='$modif_prenom',
        classe_id='$modif_classe', matricule='$modif_matricule', Sexe='$modif_sexe', adresse='$modif_adresse', 
        eleve_img='$modif_photo' WHERE id_eleves='$id'";
        $run_modif = mysqli_query($con,$modifier_eleve);

        if($run_modif)
        {
          echo "<script>alert('Eleve modifier avec succes')</script>";
          echo "<script>window.open('eleves.php','_self')</script>";
        }

        else
        {
          echo "<script>alert('Echec de modification')</script>";
          echo "<script>window.open('eleves.php','_self')</script>";
        }
      }

      else
      {
        echo"<script>alert('Ce format du fichier est insuportable')</script>";
        echo"<script>window.open('eleves.php','_self')</script>";
      }

  }

?>
<!-- ************* Fin modification eleves ************** -->


<!-- ************* debut supprimer eleves ************** -->
<?php  

  if(isset($_POST['supprimer_btn']))
  {
    $id_eleve = $_POST['supp_id'];

    $supprimer_eleve = "DELETE FROM eleves WHERE id_eleves='$id_eleve'";
    $run_supp = mysqli_query($con,$supprimer_eleve);

    if($run_supp)
    {
      echo "<script>alert('Eleve supprimer avec succes')</script>";
      echo "<script>window.open('eleves.php','_self')</script>";
    }
    else
    {
      echo "<script>alert('Echec de suppression')</script>";
      echo "<script>window.open('eleves.php','_self')</script>";
    }
  }

?>
<!-- ************* Fin supprimer eleves ************** -->



<!-- ************* Debut insertion enseignant ************** -->
<?php

   if(isset($_POST['insert_enseignant']))
   {
     $nom = $_POST['nom'];
     $postnom = $_POST['postnom'];
     $prenom = $_POST['prenom'];
     $matricule = $_POST['matricule'];
     $etat_civile = $_POST['etat_civile'];
     $sexe = $_POST['sexe'];
     $phone = $_POST['phone'];
     $adresse = $_POST['adresse'];
     $annee_sco = $_POST['annee_sco'];

     $photo = $_FILES['photo']['name'];
     $tmp_name = $_FILES['photo']['tmp_name'];

     $get_ensei = "SELECT *FROM enseignant WHERE matricule='$matricule'";
     $run_get_ensei = mysqli_query($con,$get_ensei);

     if(mysqli_num_rows($run_get_ensei) > 0)
     {
      echo "<script>alert('Il exist deja un enseignant avec ce numero matricule \'$matricule\'.')</script>";
      echo "<script>window.open('ajout_enseignants.php','_self')</script>";
     }

     elseif(strlen($phone) > 10 OR strlen($phone) < 10)
     {
      echo "<script>alert('Le numero de telephone doit avoir dix chiffres')</script>";
      echo "<script>window.open('ajout_enseignants.php','_self')</script>";
     }

     $extension_fichier = explode('.',$photo);
     $ext_finale_fichier = strtolower(end($extension_fichier));
     $format_acceptable = array('jpg','png','jpeg');
  
     if(in_array($ext_finale_fichier,$format_acceptable))
      {

          move_uploaded_file($tmp_name,"img/enseignants_photos/$photo");
          
          $insert_enseignant = "INSERT INTO enseignant (nom_enseignant, postnom_enseignant, prenom_enseignant, matricule,
          etat_civile, sexe, numero_telephone, addresse, date_insc, photo) VALUE ('$nom','$postnom','$prenom','$matricule',
          '$etat_civile','$sexe','$phone','$adresse','$annee_sco','$photo')";

          $run_ensei = mysqli_query($con,$insert_enseignant); 

          if($run_ensei)
          {
            echo "<script>alert('Enseignant ajouter avec succes')</script>";
            echo "<script>window.open('enseignants.php','_self')</script>";
          }
          else
          {
            echo "<script>alert('Echec d\'ajout')</script>";
            echo "<script>window.open('ajout_enseignants.php','_self')</script>";
          }

      }
      else
      {
        echo"<script>alert('Ce format du fichier est insuportable')</script>";
        echo"<script>window.open('ajout_enseignants.php','_self')</script>";
      }

}

?>
<!-- ************* Fin insertion enseignant ************** -->



<!-- ************* Debut modification enseignant ************** -->
<?php 

   if(isset($_POST['modif_enseignant']))
   {
     $enseignant_id = $_POST['enseignant_id'];
     $modif_nom = $_POST['modif_nom'];
     $modif_postnom = $_POST['modif_postnom'];
     $modif_prenom = $_POST['modif_prenom'];
     $modif_matricule = $_POST['modif_matricule'];
     $modif_etatciv = $_POST['modif_etatciv'];
     $modif_sexe = $_POST['modif_sexe'];
     $modif_numero = $_POST['modif_numero'];
     $modif_adresse = $_POST['modif_adresse'];
     $modif_photo = $_FILES['modif_photo']['name'];
     $tmp_modif_photo = $_FILES['modif_photo']['tmp_name'];

     $extension_fichier = explode('.',$modif_photo);
     $ext_finale_fichier = strtolower(end($extension_fichier));
     $format_acceptable = array('jpg','png','jpeg');
  
     if(in_array($ext_finale_fichier,$format_acceptable))
      {

        move_uploaded_file($tmp_modif_photo,"img/enseignants_photos/$modif_photo");

        $modifier_ensei = "UPDATE enseignant SET nom_enseignant='$modif_nom',postnom_enseignant='$modif_postnom',prenom_enseignant='$modif_prenom',
        matricule='$modif_matricule',etat_civile='$modif_etatciv',sexe='$modif_sexe',numero_telephone='$modif_numero',addresse='$modif_adresse',photo='$modif_photo' WHERE id_enseignant='$enseignant_id'";

        $run_modif = mysqli_query($con,$modifier_ensei);

        if($run_modif)
        {
          echo "<script>alert('Enseignant modifier avec succes')</script>";
          echo "<script>window.open('enseignants.php','_self')</script>";
        }

        else
        {
          echo "<script>alert('Echec de modification')</script>";
          echo "<script>window.open('enseignants.php','_self')</script>";
        }
      }

      else
      {
        echo"<script>alert('Ce format du fichier est insuportable')</script>";
        echo"<script>window.open('enseignants.php','_self')</script>";
      }
  }

?>
<!-- ************* Fin modification enseignant ************** -->



<!-- ************* Debut suppression enseignant ************** -->
<?php 

  if(isset($_POST['supprimer_ensei']))
  {
     $enseignant_id = $_POST['supp_ensei_id'];

     $supprimer_ensei = "DELETE FROM enseignant WHERE id_enseignant='$enseignant_id'";
     $run_supp_ensei = mysqli_query($con,$supprimer_ensei);

     if($run_supp_ensei)
     {
      echo "<script>alert('Enseignant supprimer avec succes')</script>";
      echo "<script>window.open('enseignants.php','_self')</script>";
     }
     else
     {
      echo "<script>alert('Echec de suppression')</script>";
      echo "<script>window.open('enseignants.php','_self')</script>";
     }
  }

?>
<!-- ************* Fin suppression enseignant ************** -->



<!-- ************* Debut insertion section ************** -->
<?php 

  if(isset($_POST['insert_section']))
  {
    $description = $_POST['nom_section'];
    $annee_sco = $_POST['annee_sco'];

    $insert_section = "INSERT INTO section (description,annee) VALUES ('$description','$annee_sco')";
    $run_section = mysqli_query($con,$insert_section);

    if($run_section)
    {
      echo "<script>alert('Section ajouter avec succes')</script>";
      echo "<script>window.open('affiche_section.php','_self')</script>";
    }
    else
    {
      echo "<script>alert('Echec d\'ajout')</script>";
      echo "<script>window.open('ajout_sections.php','_self')</script>";
    }
  }

?>
<!-- ************* Fin insertion section ************** -->



<!-- ************* Debut modification section ************** -->
<?php 

  if(isset($_POST['modif_section']))
  {
    $section_id = $_POST['section_id'];
    $modif_nom = $_POST['modif_nom'];

    $update_section = "UPDATE section SET description='$modif_nom' WHERE id_section='$section_id'";
    $run_update = mysqli_query($con,$update_section);

    if($run_update)
    {
      echo "<script>alert('Section modifier avec succes')</script>";
      echo "<script>window.open('affiche_section.php','_self')</script>";
    }
    else
    {
      echo "<script>alert('Echec de modification')</script>";
      echo "<script>window.open('ajout_sections.php','_self')</script>";
    }
  }

?>
<!-- ************* Fin modification section ************** -->



<!-- ************* Debut suppression section ************** -->
<?php 

  if(isset($_POST['supprimer_section']))
  {
     $section_id = $_POST['supp_section_id'];

     $supprimer_section = "DELETE FROM section WHERE id_section='$section_id'";
     $run_suppression = mysqli_query($con,$supprimer_section);

     if($run_suppression)
     {
      echo "<script>alert('Section supprimer avec succes')</script>";
      echo "<script>window.open('affiche_section.php','_self')</script>";
     }
     else
     {
      echo "<script>alert('Echec de suppression')</script>";
      echo "<script>window.open('affiche_section.php','_self')</script>";
     }
  }

?>
<!-- ************* Fin suppression section ************** -->



<!-- ************* Debut insertion classe ************** -->
<?php 

  if(isset($_POST['insert_classe']))
  {
    $description = $_POST['classe_desc'];
    $section_desc = $_POST['section_desc'];
    $id_titulaire = $_POST['id_titulaire'];

    $insert_classe = "INSERT INTO classes (description,section,id_titulaire) VALUES ('$description','$section_desc','$id_titulaire')";
    $run_classe = mysqli_query($con,$insert_classe);

    if($run_classe)
    {
      echo "<script>alert('Classe ajouter avec succes')</script>";
      echo "<script>window.open('classes.php','_self')</script>";
    }
    else
    {
      echo "<script>alert('Echec d\'ajout')</script>";
      echo "<script>window.open('ajout_classes.php','_self')</script>";
    }
  }

?>
<!-- ************* Fin insertion classe ************** -->



<!-- ************* Debut modification classe ************** -->
<?php 

  if(isset($_POST['modif_classe']))
  {
    $classe_id = $_POST['classe_id'];
    $classe_nom = $_POST['classe_nom'];
    $nom_section = $_POST['nom_section'];
    $titulaire = $_POST['titulaire'];

    $update_classe = "UPDATE classes SET description='$classe_nom', section='$nom_section', id_titulaire='$titulaire'  WHERE id_classe='$classe_id'";
    $run_update_classe = mysqli_query($con,$update_classe);

    if($run_update_classe)
    {
      echo "<script>alert('Classe modifier avec succes')</script>";
      echo "<script>window.open('classes.php','_self')</script>";
    }

    else
    {
      echo "<script>alert('Echec de modification')</script>";
      echo "<script>window.open('classes.php','_self')<script>";
    }
  }

?>
<!-- ************* Fin modification classe ************** -->



<!-- ************* Debut suppression classe ************** -->
<?php  

   if(isset($_POST['supprimer_classe']))
   {
    $classe_id = $_POST['supp_classe_id'];

    $supprimer_classe = "DELETE FROM classes WHERE id_classe='$classe_id'";
    $run_supp_section = mysqli_query($con,$supprimer_classe);

    if($run_supp_section)
    {
      echo "<script>alert('Classe supprimer avec succes')</script>";
      echo "<script>window.open('classes.php','_self')</script>";
     }
     else
     {
      echo "<script>alert('Echec de suppression')</script>";
      echo "<script>window.open('classes.php','_self')</script>";
     }

   }
?>
<!-- ************* Fin suppression classe ************** -->



<!-- ************* Debut insertion compte enseignant ************** -->
<?php

if(isset($_POST['insert_compte_ensei'])){
        
    $ensei_id = $_POST['ensei_id'];
    $nom_utili = $_POST['nom_utili'];
    $type = $_POST['type'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $acces = $_POST['acces'];
    $statut = $_POST['statut'];

    $get_compte_ensei = "SELECT *FROM comptes WHERE utilisateur_id='$ensei_id' AND login='$user_name'";
    $run_compte_ensei = mysqli_query($con,$get_compte_ensei);
    
    if(mysqli_num_rows($run_compte_ensei) > 0)
    {
        echo "<script>alert('$type $nom_utili a deja un compte')</script>";
        echo "<script>window.open('enseignants.php','_self')</script>";
    }
    else
    {

    $insert_compte_ensei = "INSERT INTO comptes (nom_utilisateur,utilisateur_type,login,utilisateur_password,acces,statut,utilisateur_id) 
    VALUES ('$nom_utili','$type','$user_name','$password','$acces','$statut','$ensei_id')";
    $run_compte_ensei = mysqli_query($con,$insert_compte_ensei);

    if($run_compte_ensei)
    {
      echo "<script>alert('Vous venez d\'atribuer un compte de type $type à l\'enseignant $nom_utili')</script>";
      echo "<script>window.open('enseignants.php','_self')</script>";
    }
    else
    {
      echo "<script>alert('Echec d\'atribution')</script>";
      echo "<script>window.open('enseignants.php','_self')</script>";
    }
    
  }
}

?>
<!-- ************* Fin insertion compte enseignant ************** -->



<!-- ************* Debut insertion compte eleve ************** -->
<?php

if(isset($_POST['insert_compte_eleve'])){
        
    $eleves_id = $_POST['eleves_id'];
    $noms_eleve = $_POST['noms_eleve'];
    $type_eleve = $_POST['type_eleve'];
    $username = $_POST['username'];
    $eleve_password = $_POST['eleve_password'];
    $eleve_acces = $_POST['eleve_acces'];
    $eleve_statut = $_POST['eleve_statut'];

    $get_compte = "SELECT *FROM comptes WHERE utilisateur_id='$eleves_id' AND login='$username'";
    $run_compte = mysqli_query($con,$get_compte);
    
    if(mysqli_num_rows($run_compte) > 0)
    {
        echo "<script>alert('$noms_eleve a deja un compte')</script>";
        echo "<script>window.open('eleves.php','_self')</script>";
    }
    else
    {

    $insert_compte_eleve = "INSERT INTO comptes (nom_utilisateur,utilisateur_type,login,utilisateur_password,acces,statut,utilisateur_id) 
    VALUES ('$noms_eleve','$type_eleve','$username','$eleve_password','$eleve_acces','$eleve_statut','$eleves_id')";
    $run_compte_eleve = mysqli_query($con,$insert_compte_eleve);

    if($run_compte_eleve)
    {
      echo "<script>alert('Vous venez d\'atribuer un compte à l\'eleve $noms_eleve')</script>";
      echo "<script>window.open('eleves.php','_self')</script>";
    }
    else
    {
      echo "<script>alert('Echec d\'atribution')</script>";
      echo "<script>window.open('eleves.php','_self')</script>";
    }

  }
    
}

?>
<!-- ************* Fin insertion compte eleve ************** -->



<!-- ************* Debut suppression compte ************** -->
<?php 

  if(isset($_POST['supprimer_compte_btn']))
  {
    $id_compte_supp = $_POST['supp_compte_id'];

    $supp_compte = "DELETE FROM comptes WHERE id_compte='$id_compte_supp'";
    $run_supp_compte = mysqli_query($con,$supp_compte);

    if($run_supp_compte)
    {
      echo "<script>alert('Compte supprimer avec succes')</script>";
      echo "<script>window.open('utilisateurs.php','_self')</script>";
    }
    else
    {
      echo "<script>alert('Echec de suppression')</script>";
      echo "<script>window.open('eleves.php','_self')</script>";
    }
  }

?>
<!-- ************* Fin suppression compte ************** -->


<!-- ************* Debut insertion horaire ************** -->
<?php

    if(isset($_POST['insert_horaire'])){

    $classe = $_POST['classe_id'];
    $jour_horaire = $_POST['jour'];
    $premier = $_POST['1ere_heure'];
    $deuxieme = $_POST['2ieme_heure'];
    $troisieme = $_POST['3ieme_heure'];
    $quatrieme = $_POST['4ieme_heure'];
    $cinquieme = $_POST['5ieme_heure'];
    $siexieme = $_POST['6ieme_heure'];
    $septieme = $_POST['7ieme_heure'];
    $huitieme = $_POST['8ieme_heure'];
        
    $inserser_horaire = "INSERT INTO horaire_classe (jour,premiere_h,deuxieme_h,troisieme_h,quatrieme_h,cinquieme_h,sixieme_h,
    septieme_h,huitieme_h,classe_id) VALUES ('$jour_horaire','$premier','$deuxieme','$troisieme','$quatrieme','$cinquieme',
    '$siexieme','$septieme','$huitieme',$classe)";
    $resultat_horaire = mysqli_query($con,$inserser_horaire);

    if ($resultat_horaire == 1) 
    {
      echo"<script>alert('L\'horaire à été ajoutée avec succès')</script>";
      echo"<script>window.open('ajout_horaire.php','_self')</script>";
    }
  }
?>
<!-- ************* Fin insertion horaire ************** -->



<!-- ************* Debut modification horaire ************** -->
<?php

    if(isset($_POST['modifier_horaire'])){

    $horaire_id = $_POST['horaire_id'];
    $modif_jour = $_POST['modif_jour'];
    $premier_h = $_POST['modif_1ere_heure'];
    $modif_2ieme_heure = $_POST['modif_2ieme_heure'];
    $modif_3ieme_heure = $_POST['modif_3ieme_heure'];
    $modif_4ieme_heure = $_POST['modif_4ieme_heure'];
    $modif_5ieme_heure = $_POST['modif_5ieme_heure'];
    $modif_6ieme_heure = $_POST['modif_6ieme_heure'];
    $modif_7ieme_heure = $_POST['modif_7ieme_heure'];
    $modif_8ieme_heure = $_POST['modif_8ieme_heure'];
        
    $modifier_horaire = "UPDATE horaire_classe SET jour='$modif_jour',premiere_h='$premier_h',deuxieme_h='$modif_2ieme_heure',
    troisieme_h='$modif_3ieme_heure',quatrieme_h='$modif_4ieme_heure',cinquieme_h='$modif_5ieme_heure',sixieme_h='$modif_6ieme_heure',
    septieme_h='$modif_7ieme_heure',huitieme_h='$modif_8ieme_heure' WHERE horaire_id='$horaire_id'";
    $run_modification = mysqli_query($con,$modifier_horaire);

    if ($run_modification == 1) 
    {
      echo"<script>alert('L\'horaire à été modifié avec succès')</script>";
      echo"<script>window.open('classes.php','_self')</script>";
    }
  }
?>
<!-- ************* Fin modification horaire ************** -->



<!-- ************* Debut suppression horaire ************** -->
<?php 

  if(isset($_POST['supprimer_horaire_btn']))
  {
    $id_horaire = $_POST['supp_hor_id'];

    $supprimer_horaire = "DELETE FROM horaire_classe WHERE horaire_id='$id_horaire'";
    $run_supp_hor = mysqli_query($con,$supprimer_horaire);

    if($run_supp_hor)
    {
      echo "<script>alert('Horaire supprimé avec succès')</script>";
      echo "<script>window.open('classes.php','_self')</script>";
     }
     else
     {
      echo "<script>alert('Echec de suppression')</script>";
      echo "<script>window.open('classes.php','_self')</script>";
     }
  }

?>
<!-- ************* Fin suppression horaire ************** -->



<!-- ************* Debut insertion image ************** -->
<?php

    if(isset($_POST['insert_image'])){

    $nom_image = $_POST['nom_image'];
    $annee_sco = $_POST['annee_sco'];
    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];
 
    $extension_fichier = explode('.',$image);
    $ext_finale_fichier = strtolower(end($extension_fichier));
    $format_acceptable = array('jpg','png','jpeg');
 
    if(in_array($ext_finale_fichier,$format_acceptable))
    {

        move_uploaded_file($tmp_image,"img/admin_photos/$image");
            
        $inserser_image = "INSERT INTO images (img_nom,img_fichier,annee_sco) VALUES ('$nom_image','$image','$annee_sco')";
        $run_insert = mysqli_query($con,$inserser_image);

        if ($run_insert) 
        {
          echo"<script>alert('L\'image à été ajoutée avec succès')</script>";
          echo"<script>window.open('images.php','_self')</script>";
        }
    }
    else
    {
      echo"<script>alert('Ce format du fichier est insuportable')</script>";
      echo"<script>window.open('ajout_image.php','_self')</script>";
    }
  }
?>
<!-- ************* Fin insertion image ************** -->


<!-- ************* Debut modification image ************** -->
<?php

    if(isset($_POST['modifier_image_btn'])){

    $image_id = $_POST['image_id'];
    $modif_nom_image = $_POST['modif_nom_image'];
    $modif_annee_sco = $_POST['modif_annee_sco'];

    $modif_image = $_FILES['modif_image']['name'];
    $modif_tmp_image = $_FILES['modif_image']['tmp_name'];

    $extension_fichier = explode('.',$modif_image);
    $ext_finale_fichier = strtolower(end($extension_fichier));
    $format_acceptable = array('jpg','png','jpeg');
 
    if(in_array($ext_finale_fichier,$format_acceptable))
    {

        move_uploaded_file($modif_tmp_image,"img/admin_photos/$modif_image");
            
        $modifier_image = "UPDATE images SET img_nom='$modif_nom_image',img_fichier='$modif_image',annee_sco='$modif_annee_sco' WHERE id_img='$image_id'";
        $run_modifier = mysqli_query($con,$modifier_image);

        if ($run_modifier) 
        {
          echo"<script>alert('L\'image à été modifiée avec succès')</script>";
          echo"<script>window.open('images.php','_self')</script>";
        }
    }

    else
    {
      echo"<script>alert('Ce format du fichier est insuportable')</script>";
      echo"<script>window.open('images.php','_self')</script>";
    }
  }
?>
<!-- ************* Fin modification image ************** -->



<!-- ************* Debut suppression image ************** -->
<?php 

   if(isset($_POST['supp_image_btn']))
   {
     $img_id = $_POST['supp_image_id'];

     $supp_img = "DELETE FROM images WHERE id_img='$img_id'";
     $run_supp = mysqli_query($con,$supp_img);
      
     if($run_supp)
     {
      echo"<script>alert('L\'image à été supprimée avec succès')</script>";
      echo"<script>window.open('images.php','_self')</script>";
     }
   }

?>
<!-- ************* Debut suppression image ************** -->


<!-- ************* Debut insertion info ecole ************** -->
<?php 

   if(isset($_POST['insert_ecole_info']))
   {
     $nom_ecole = $_POST['nom_ecole'];
     $adresse_ecole = $_POST['adresse_ecole'];
     $numero = $_POST['numero'];
     $adresse_email = $_POST['adresse_email'];
     $devise = $_POST['devise'];
     $description = $_POST['description'];
     $image = $_FILES['image']['name'];
     $tmp_image = $_FILES['image']['tmp_name'];

     move_uploaded_file($tmp_image,"img/admin_photos/$image");

     $insert_ecole_info = "INSERT INTO ecole_info (nom_ecole,adresse_ecole,numero_telephone,adresse_email,devise_ecole,
     details_ecole,photo_ecole) VALUE ('$nom_ecole','$adresse_ecole','$numero','$adresse_email','$devise','$description','$image')";
     $run_insert_ecole_info = mysqli_query($con,$insert_ecole_info);

     if($run_insert_ecole_info)
     {
      echo"<script>alert('L\'info à été ajoutée avec succès')</script>";
      echo"<script>window.open('affiche_apropos.php','_self')</script>";
    }

   }

?>
<!-- ************* Fin insertion info ecole ************** -->


<!-- ************* Debut modification info ecole ************** -->
<?php 

   if(isset($_POST['modifier_ecole_info_btn']))
   {
     $info_ecole_id = $_POST['info_ecole_id'];
     $modif_nom_ecole = $_POST['modif_ecole_nom'];
     $modif_adresse_ecole = $_POST['modif_adresse'];
     $modif_ecole_numero = $_POST['modif_numero'];
     $modif_adresse_email = $_POST['modif_email'];
     $modif_devise = $_POST['modif_devise'];
     $modif_description = $_POST['modif_description'];
     $modif_ecole_image = $_FILES['modif_info_photo']['name'];
     $modif_tmp_ecole_image = $_FILES['modif_info_photo']['tmp_name'];

     move_uploaded_file($modif_tmp_ecole_image,"img/admin_photos/$modif_ecole_image");

     $modif_ecole_info = "UPDATE ecole_info SET nom_ecole='$modif_nom_ecole',adresse_ecole='$modif_adresse_ecole',numero_telephone='$modif_ecole_numero',
     adresse_email='$modif_adresse_email',devise_ecole='$modif_devise',details_ecole='$modif_description',photo_ecole='$modif_ecole_image' WHERE id_info='$info_ecole_id'";
     $run_insert_ecole_info = mysqli_query($con,$modif_ecole_info);

     if($run_insert_ecole_info)
     {
      echo"<script>alert('L\'info à été modifiée avec succès')</script>";
      echo"<script>window.open('apropos_ecole.php','_self')</script>";
    }

   }

?>
<!-- ************* Fin modification info ecole ************** -->


<!-- ************* Debut suppression info ecole ************** -->
<?php  

   if(isset($_POST['supprimer_info_btn']))
   {
     $supp_info_id = $_POST['supp_info_id'];

     $supp_info = "DELETE FROM ecole_info WHERE id_info='$supp_info_id'";
     $run_supp_info = mysqli_query($con,$supp_info);

     if($run_supp_info)
     {
      echo"<script>alert('L\'info à été supprimiée avec succès')</script>";
      echo"<script>window.open('apropos_ecole.php','_self')</script>";
     }
   }

?>
<!-- ************* Fin suppression info ecole ************** -->


<!-- ************* Debut insertion cours ************** -->
<?php 

  if(isset($_POST['publier_cours']))
  {
    
   $id_classe = $_POST['id_classe'];
   $id_ensei = $_POST['id_ensei'];
   $diponibilite_cours = $_POST['diponibilite_cours'];
   $titre_cours = $_POST['titre_cours'];
   $nombre_heure = $_POST['nombre_heure'];
   $intro_gene = $_POST['intro_gene'];
   $synth_gene = $_POST['synth_gene'];
   $fichier = $_FILES['fichier_cours'];
   $nom_fichier = $fichier['name'];
   $tmp_fichier_cours = $fichier['tmp_name'];
   $taille_fichier = $fichier['size'];
   $erreur_fichier = $fichier['error'];

   $extension_fichier = explode('.',$nom_fichier);
   $ext_finale_fichier = strtolower(end($extension_fichier));
   $format_acceptable = array('pdf','docx','doc','xlsx','lsx','pptx','epub','mobi','ps','azw','tex','csv','odt','odp','html');

   if(in_array($ext_finale_fichier,$format_acceptable))
   {
      if($erreur_fichier === 0)
      {
          if($taille_fichier <= 2000000) //2MB
          {
            $fichier_cours_nom = $id_classe."_".$titre_cours.".".$ext_finale_fichier;
            move_uploaded_file($tmp_fichier_cours,"fichiers_cours/$fichier_cours_nom");

            $get_cours = "SELECT *FROM t_cours WHERE fichier_pdf='$fichier_cours_nom'";
            $run_get_cours = mysqli_query($con,$get_cours);

            if(mysqli_num_rows($run_get_cours) > 0)
            {
              echo"<script>alert('Ce cours est déjà publié dans cette classe')</script>";
              echo"<script>window.open('ensei_voir_classe.php','_self')</script>";
            }
            elseif(strlen($intro_gene) > 1200 || strlen($synth_gene) > 600)
            {
              echo"<script>alert('L\'introduction et la synthese ne peuvent pas depasser le nombre de caracteres prevus')</script>";
              echo"<script>window.open('ensei_voir_classe.php','_self')</script>";
            }

            else
            {
                $insert_cours = "INSERT INTO t_cours (titre_cours,nombre_heures,introduction_gene,synthese_gene,fichier_pdf,id_classe,id_enseignant,date,cours_disponibilite) VALUES ('$titre_cours',
                '$nombre_heure','$intro_gene','$synth_gene','$fichier_cours_nom','$id_classe','$id_ensei',Now(),$diponibilite_cours)";

                $run_cours = mysqli_query($con,$insert_cours);

                if($run_cours)
                {
                  echo"<script>alert('Le cours à été publié avec succès')</script>";
                  echo"<script>window.open('ensei_voir_cours.php','_self')</script>";
                }
                else
                {
                  echo"<script>alert('Le cours n\'a pas été publié, erreur inconnu')</script>";
                  echo"<script>window.open('ensei_voir_classe.php','_self')</script>";
                }
              }

          }
          else
          {
            echo"<script>alert('Le fichier est trop volumineux, il ne peut pas depasser 2MB')</script>";
            echo"<script>window.open('ensei_voir_classe.php','_self')</script>";
          }
      }
      else
      {
        echo"<script>alert('Le fichier n\'a pas été chargé')</script>";
        echo"<script>window.open('ensei_voir_classe.php','_self')</script>";
      }

    }
    else
    {
      echo"<script>alert('Ce format du fichier est insuportable')</script>";
      echo"<script>window.open('ensei_voir_classe.php','_self')</script>";
    }
  }

?>
<!-- ************* Fin insertion cours ************** -->



<!-- ************* Debut insertion contenu cours ************** -->
<?php 

  if(isset($_POST['insert_chapitre']))
  {

    for($count = 0; $count < count($_POST['cours2']); $count++)
    {
      
      $cours2 = $_POST['cours2'][$count];
      $titre = $_POST['titre'][$count];
      $contenu = $_POST['contenu'][$count];
      $id_classe = $_POST['id_classe'][$count];
      
        $requete_contenu = "INSERT INTO lecons (cours,titre,contenu,id_class) VALUES ('$cours2','$titre','$contenu','$id_classe')";
        $run_contenu = mysqli_query($con,$requete_contenu); 
      }

      if($run_contenu)
      {
        echo"<script>alert('Enregistrement recu')</script>";
        echo"<script>window.open('ensei_voir_classe.php','_self')</script>";
      }


}

?>
<!-- ************* Fin insertion contenu cours ************** -->


<!-- ************* Debut insertion horaire cours ************** -->
<?php 

  if(isset($_POST['insert_hor_cours']))
  {
    if(empty($_POST['cours']))
      {
        echo"<script>alert('Remplissez le champs cours svp!')</script>";
        echo"<script>window.open('ensei_voir_classe.php','_self')</script>";
      }
      else 
      {

    for($compte = 0; $compte < count($_POST['cours']); $compte++)
    {
      
      $cours = $_POST['cours'][$compte];
      $jour = $_POST['jour'][$compte];
      $endroit = $_POST['endroit'][$compte];
      $heure_debut = $_POST['heure_debut'][$compte];
      $heure_fin = $_POST['heure_fin'][$compte];
      $id_classe = $_POST['id_classe'][$compte];
      
        $requete_hor = "INSERT INTO horaire_cours (nom_cours,jour,endroit,heure_debut,heure_fin,class_id) VALUES ('$cours','$jour','$endroit','$heure_debut','$heure_fin','$id_classe')";
        $run_req = mysqli_query($con,$requete_hor); 
      }

    }

    if($run_req)
    {
      echo"<script>alert('L\'horaire à été publié avec succès')</script>";
      echo"<script>window.open('ensei_voir_cours.php','_self')</script>";
    }
 
}

?>
<!-- ************* Fin insertion horaire cours ************** -->



<!-- ************* Debut insertion evaluation ************** -->
<?php 

    if(isset($_POST['insert_evaluation']))
    {
      for($count2 = 0; $count2 < count($_POST['question']); $count2++)
      {
        
        $question = $_POST['question'][$count2];
        $ponderation = $_POST['ponderation'][$count2];
        $duree = $_POST['duree'][$count2];
        $assertion1 = $_POST['assertion1'][$count2];
        $assertion2 = $_POST['assertion2'][$count2];
        $assertion3 = $_POST['assertion3'][$count2];
        $assertion4 = $_POST['assertion4'][$count2];
        $assertion5 = $_POST['assertion5'][$count2];
        $reponse = $_POST['reponse'][$count2];
        $id_cours = $_POST['id_cours'][$count2];
        
          $insert_eval = "INSERT INTO evaluations (question,ponderation,duree,assertion1,assertion2,assertion3,assertion4,assertion5,reponse,cours_id,date) 
          VALUES ('$question','$ponderation','$duree','$assertion1','$assertion2','$assertion3','$assertion4','$assertion5','$reponse','$id_cours',NOW())";
          $run_evaluation = mysqli_query($con,$insert_eval); 
        }

      if($run_evaluation)
      {
        echo"<script>alert('L\'evaluation à été publié avec succès')</script>";
        echo"<script>window.open('ensei_voir_cours.php','_self')</script>";
      }      
    }

?>
<!-- ************* Fin insertion evaluation ************** -->


<!-- ************* Debut suppression message ************** -->
<?php 

  if(isset($_POST['supprimer_mssg']))
  {
    $id_messg = $_POST['supp_mssg_id'];

    $supp_messg = "DELETE FROM messages_recu WHERE massage_id='$id_messg'";
    $run_supp_messg = mysqli_query($con,$supp_messg);

    if($run_supp_messg)
    {
      echo "<script>alert('Ce message a été supprimé avec succès')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
  }

?>
<!-- ************* Fin suppression message ************** -->


<!-- ************* Debut envoi commentaires ************** -->
<?php 

if(isset($_POST['question']))
{
    $expediteur_id = $_POST['expediteur_id'];
    $message = $_POST['message'];
    $id_cours = $_POST['id_cours'];

    $insert_mssg = "INSERT INTO discussions (contenu,date,id_exp,id_cour) VALUES ('$message',NOW(),'$expediteur_id','$id_cours')";
    $run_mess = mysqli_query($con,$insert_mssg);

    if($run_mess)
    {
        echo "<script>alert('Votre question est envoye avec succes')</script>";
        echo "<script>window.open('../detail_cours.php?cours_id=$id_cours','_self')</script>";
    }
    else
    {
       echo "<script>alert('Votre question n\'est pas envoye')</h4>";
        header('Location: ../detail_cours.php?cours_id=$id_cours');
    }

}

?>
<!-- ************* Fin envoi commentaires ************** -->


<!-- ************* Debut envoi reponse aux commentaires ************** -->
<?php 

if(isset($_POST['send_response']))
{
    $expeti_id = $_POST['expeti_id'];
    $courses_id = $_POST['courses_id'];
    $messages_id = $_POST['messages_id'];
    $reponse_contenu = $_POST['reponse_contenu'];

    $insert_response = "INSERT INTO reponse_discution (contenu_reponse,date,id_expediteur,id_course,message_id) VALUES ('$reponse_contenu',NOW(),'$expeti_id','$courses_id','$messages_id')";
    $run_response = mysqli_query($con,$insert_response);

    if($run_response)
    {
        echo "<script>alert('Votre reponse a etais envoyer avec succes')</script>";
        echo "<script>window.open('../detail_cours.php?cours_id=$courses_id','_self')</script>";
    }
    else
    {
        echo "<script>alert('Votre reponse n\'est pas envoye')</h4>";
        header('Location: ../detail_cours.php?cours_id=$courses_id');
    }

}

?>
<!-- ************* Fin envoi reponse aux commentaires ************** -->