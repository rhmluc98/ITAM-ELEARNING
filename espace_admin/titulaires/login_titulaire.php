<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>publication</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

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
        <h2 class="form-login-heading">IMANI PANZI</h2>
        <div class="login-wrap">
          <input type="text" class="form-control" name="login_titulaire" placeholder="<--Entrez votre login-->" autofocus>
          <br>
          <input type="password" class="form-control" name="password_titulaire" placeholder="<--Entrez votre password-->">
          <label class="checkbox">
          </label>
          <button class="btn btn-theme btn-block" type="submit" name="submit"><i class="fa fa-lock"></i> Connexion</button>
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
    $.backstretch("img/login-bg.jpg", {
      speed: 500
    });
  </script>
</body>

</html>

<?php
    $bdd = mysqli_connect("localhost","root","","publication");

    if (isset($_POST['submit'])) {

        $login_titulaire = $_POST['login_titulaire'];
        $password_titulaire = $_POST['password_titulaire'];

        $verification = "SELECT * FROM titulaires WHERE login_titulaire='$login_titulaire' AND password_titulaire='$password_titulaire'";
        $resultat_verification = mysqli_query($bdd,$verification);
        $enregistrement_titulaire = mysqli_num_rows($resultat_verification);

        if ($enregistrement_titulaire==1) {
          session_start();
          $_SESSION['password_titulaire']=$password_titulaire;

          echo "<script>alert('Bienvenu')</script>";
          echo "<script>window.open('titulaireindex.php','_self')</script>";
        }else {
          echo"<script>alert('Login ou Password incorrect')</script>";
        }
    }
?>
