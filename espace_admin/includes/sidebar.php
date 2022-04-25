

<?php
  $admin_session = $_SESSION['admin_email'];
        
  $get_admin = "SELECT * FROM admins WHERE admin_email='$admin_session'";
  $run_admin = mysqli_query($con,$get_admin);
  $row_admin = mysqli_fetch_array($run_admin);
      
  $id_admin = $row_admin['id_admin'];
  $nom_admin = $row_admin['nom_admin'];
  $postnom_admin = $row_admin['postnom_admin'];
  $photo_admin = $row_admin['img_admin'];

?>
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="admin_profile.php?code=<?php echo $id_admin = $row_admin['id_admin']; ?>"><img src="img/admin_photos/<?php echo $photo_admin ?>" style="border-radius: 100%" width="70" height="70"></a></p>
          <h5 class="centered" style="text-color:white"><a href="admin_profile.php?code=<?php echo $id_admin = $row_admin['id_admin']; ?>"><?php echo $nom_admin ?> <?php echo $postnom_admin ?></a></h5>
          <li class="mt">
            <a href="index.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-graduation-cap"></i>
              <span>INSTITUT ANTONINO </span>
              </a>
            <ul class="sub">
              <li><a href="apropos_ecole.php">AJOUTER</a></li>
              <li><a href="affiche_apropos.php">VISUALISER</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-users"></i>
              <span>ELEVES</span>
              </a>
            <ul class="sub">
              <li><a href="ajout_eleves.php">AJOUTER</a></li>
              <li><a href="eleves.php">VISUALISER</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-users"></i>
              <span>ENSEIGNANTS</span>
              </a>
            <ul class="sub">
              <li><a href="ajout_enseignants.php">AJOUTER</a></li>
              <li><a href="enseignants.php">VISUALISER</a></li>
            </ul>
          </li>
          
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-folder-open"></i>
              <span>SECTION</span>
              </a>
            <ul class="sub">
              <li><a href="ajout_sections.php">AJOUTER</a></li>
              <li><a href="affiche_section.php">VISUALISER</a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-home"></i>
              <span>CLASSES</span>
            </a>
            <ul class="sub">
              <li><a href="ajout_classes.php">AJOUTER</a></li>
              <li><a href="classes.php">VISUALISER</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-book"></i>
              <span>IMAGES</span>
            </a>
            <ul class="sub">
              <li><a href="ajout_image.php">AJOUTER</a></li>
              <li><a href="images.php">VISUALISER</a></li>
            </ul>
          </li>
          
          <li class="sub-menu">  
            <span><a href="utilisateurs.php"><i class="fa fa-users"></i>UTILISATEURS</a></span>
          </li>
          <li class="sub-menu">  
            <span><a href="affiche_mssg.php"><i class="fa fa-envelope"></i>Messages</a></span>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>

    <section id="main-content">
      <section class="wrapper site-min-height">

