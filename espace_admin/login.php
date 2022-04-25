
<?php 

   session_start();
   include("includes/db.php");
   
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>E-LEARNING APP</title>

  <!-- Favicons -->
  <link href="img/ima10.jpg" rel="icon">
  <link href="img/ima9.jpg" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
      <form class="form-login" action="" method="post">
        <h2 class="form-login-heading">Connexion</h2>
        <div class="login-wrap">
          <input type="text" class="form-control" name="user_login" placeholder="Entrez votre email" required>
          <br>
          <input type="password" class="form-control" name="password" placeholder="Entrer votre mot de passe" required><br>
         
          <button class="btn btn-theme btn-block" type="submit" name="submit"><i class="fa fa-lock"></i> Se Connecter</button>
        </div>
      </form>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("img/back.jpg", {
      speed: 500
    });
  </script>
</body>

</html>

<?php
    
    if (isset($_POST['submit'])) {

        $login = mysqli_real_escape_string($con,$_POST['user_login']);
        $password = mysqli_real_escape_string($con,$_POST['password']);
        
        $get_admin = "SELECT *FROM admins WHERE admin_email='$login' AND admin_password='$password'";
        $run_admin = mysqli_query($con,$get_admin);
        $count_admin = mysqli_num_rows($run_admin);

        $get_ensei = "SELECT *FROM comptes WHERE login ='$login' AND utilisateur_password='$password'";
        $run_ensei = mysqli_query($con,$get_ensei);
        $count_ensei = mysqli_num_rows($run_ensei);

        $get_ensei_type = "SELECT *FROM comptes WHERE login ='$login' AND utilisateur_password='$password'";
        $run_ensei_type = mysqli_query($con,$get_ensei_type);
        $row_ensei_type = mysqli_fetch_array($run_ensei_type);

        $ensei_type = $row_ensei_type['utilisateur_type'] ?? null;
        $acces = $row_ensei_type['acces'] ?? null;

        if($count_admin == 1) 
        {
          $_SESSION['admin_email'] = $login;
          
          echo "<script>alert('Bienvenu administrateur')</script>";
          echo "<script>window.open('index.php','_self')</script>";
        }
        elseif($count_ensei == 1 AND $acces !== 'Interdit' AND $ensei_type == 'Professeur' OR $ensei_type == 'Titulaire')
        {
          $update_msg = mysqli_query($con, "UPDATE comptes SET statut='connecter' WHERE login ='$login'");

          $_SESSION['login'] = $login;
          
          echo "<script>alert('Bienvenu enseignant')</script>";
          echo "<script>window.open('session_enseignant.php','_self')</script>";
        }
        else 
        {
          echo "<script>alert('Votre login est incorrect ou soit vous n\'avez pas droit d\'acceder cette page')</script>";
          echo "<script>window.open('login.php','_self')</script>";
        }
    }
?>
