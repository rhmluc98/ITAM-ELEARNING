

<?php
  $ensei_session = $_SESSION['login'];
        
  $get_ensei = "SELECT * FROM enseignant WHERE matricule='$ensei_session'";
  $run_ensei = mysqli_query($con,$get_ensei);
  $row_ensei = mysqli_fetch_array($run_ensei);
      
  $id_ensei = $row_ensei['id_enseignant'];
  $nom_ensei = $row_ensei['nom_enseignant'];
  $prenom_ensei = $row_ensei['prenom_enseignant'];
  $photo_ensei = $row_ensei['photo'];

?>
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.php?code=<?php echo $id_ensei = $row_ensei['id_enseignant']; ?>"><img src="img/enseignants_photos/<?php echo $photo_ensei ?>" class="img-circle" width="80"></a></p>
          <h5 class="centered"><?php echo $nom_ensei ?> <?php echo $prenom_ensei ?></h5>
          <li class="mt">
            <a href="session_enseignant.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">  
            <span><a href="ensei_voir_classe.php"><i class="fa fa-home"></i>CLASSES</a></span>
          </li>
          <li class="sub-menu">  
            <span><a href="ensei_voir_cours.php"><i class="fa fa-book"></i>COURS</a></span>
          </li>
          <li class="sub-menu">  
            <span><a href="affiche_evaluations.php"><i class="fa fa-book"></i>EVALUATIONS</a></span>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-graduation-cap"></i>
              <span>RESULTATS</span>
              </a>
            <ul class="sub">
              <li><a href="ajout_resultats.php">AJOUTER</a></li>
              <li><a href="proclamation.php">VISUALISER</a></li>
            </ul>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>

    <section id="main-content">
      <section class="wrapper site-min-height">

