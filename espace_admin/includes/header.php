
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  
  <title>ITAM E-LEARNING</title>

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
  <script src="lib/jquery/jquery-3.6.0.min.js"></script>
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">

    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="#" class="logo"><b>INSTITUT<span>ANTONINO</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->

        <?php 
           
            if(isset($_SESSION['admin_email']))
            {

        ?>
        <ul class="nav top-menu">
          <!-- settings start -->
          <li class="dropdown">
            <?php 
            
               $get_messages = "SELECT *FROM messages_recu order by date desc";
               $run_messages = mysqli_query($con,$get_messages);
             
            ?>
            <a class="dropdown-toggle" href="affiche_mssg.php">
              <i class="fa fa-envelope"></i>
              <span class="badge bg-theme"><?php echo mysqli_num_rows($run_messages); ?></span>
              </a>
              <ul class="dropdown-menu extended tasks-bar">
              <div class="notify-arrow notify-arrow-green"></div>
              
            </ul>
          <?php } ?>
          </li>
          <!-- settings end -->
        </ul>
        <!--  notification end -->
      </div>
        <a href="#" class="logo"><center><b><marquee>INSTITUT PERE ANTONINO MANZOTI<span> E-LEARNING APP</span></marquee></b></center></a>
        <div class="top-menu">
        
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><form action="logout.php" method="post"><button class="btn btn-primary" name="logout_btn" type="submit" style="margin-top: 10px">Logout</button></form></li>
        </ul>
      </div>
    </header>
    <!--header end-->
 