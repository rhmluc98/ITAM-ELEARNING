<?php

  $password_titulaire = $_SESSION['password_titulaire'];

  $requete_titulaire = "SELECT * FROM titulaires WHERE password_titulaire='$password_titulaire'";
  $execute_requete = mysqli_query($bdd,$requete_titulaire);
  $nombre_ligne = mysqli_fetch_array($execute_requete);

  $id_titulaire = $nombre_ligne['id_titulaire'];
  $nom_titulaire = $nombre_ligne['nom_titulaire'];
  $postnom_titulaire = $nombre_ligne['postnom_titulaire'];
  $sexe_titulaire = $nombre_ligne['sexe_titulaire'];
  $telephone_titulaire = $nombre_ligne['telephone_titulaire'];
  $photo_titulaire = $nombre_ligne['photo_titulaire'];
  $id_classe = $nombre_ligne['id_classe'];

  $requete_classe = "SELECT libelle_classe FROM classes WHERE id_classe=$id_classe";
  $execute_classe = mysqli_query($bdd,$requete_classe);
  $nombre_classe = mysqli_fetch_array($execute_classe);

  $libelle_classe = $nombre_classe['libelle_classe'];

  $requete_eleve = "SELECT * FROM eleves WHERE id_classe=$id_classe";
  $execute_eleve = mysqli_query($bdd,$requete_eleve);
?>
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.php"><img src="img/<?php echo $photo_titulaire ?>" class="img-circle" width="80"></a></p>
          <h5 class="centered"><?php echo $nom_titulaire?> <?php echo $postnom_titulaire?></h5>
          <h5 class="centered"><?php echo $telephone_titulaire?></h5>
          <h5 class="centered"><?php echo $libelle_classe?></h5>
          <li class="mt">
            <a href="adminindex.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-archive"></i>
              <span>COTES</span>
              </a>
            <ul class="sub">
              <li><a href="ajout_cotes.php">AJOUTER</a></li>
              <li><a href="cotes.php">VISUALISER</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-archive"></i>
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
