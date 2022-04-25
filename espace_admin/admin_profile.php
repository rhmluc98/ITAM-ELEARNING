

<style>

.online_status
{
color: #137d25;
font-weight: bolder;
}

.offline_status
{
color: gray;
font-weight: bolder;
}

</style>

<?php
    session_start();
    include("includes/db.php");

    if(!isset($_SESSION['admin_email']))
    {
        header("location:login.php");
    }

    else
    {
?>

<?php
    include("includes/header.php");
    include("includes/sidebar.php");
    include("includes/fonction.php");
?>


<?php 

   $get_eleves = "SELECT *FROM eleves";
   $run_eleves = mysqli_query($con,$get_eleves);
   $nombre_eleves = mysqli_num_rows($run_eleves);

   $get_ensei = "SELECT *FROM enseignant";
   $run_ensei = mysqli_query($con,$get_ensei);
   $nombre_enseignants = mysqli_num_rows($run_ensei);

   $get_classes = "SELECT *FROM classes";
   $run_classes = mysqli_query($con,$get_classes);
   $nombre_classes = mysqli_num_rows($run_classes);

?>

<div class="row" style="margin-top:-40px;">
    <div class="col-lg-12">
        <h1 class="page-header">ESPACE ADMINISTRATEUR</h1>
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i></li><a href="#">ESPACE ADMINISTRATEUR</a>
            </ol>
    </div>
</div>
<div class="">
    <div class="col-lg-3 col-md-6"> <!-- debut panel eleve-->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"> <?php echo $nombre_eleves ?> </div>
                        <div>Elèves</div>
                    </div>
                </div>
            </div>
            <a href="eleves.php">
                <div class="panel-footer">
                    <span class="pull-left">
                        Voir les détails
                    </span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div> <!-- fin panel eleve-->

    <div class="col-lg-3 col-md-6"> <!-- debut panel enseignants-->
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $nombre_enseignants ?></div>
                        <div>Enseignant</div>
                    </div>
                </div>
            </div>
            <a href="enseignants.php">
                <div class="panel-footer">
                    <span class="pull-left">
                        Voir les détails
                    </span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div> <!-- fin panel enseignants-->

    <div class="col-lg-3 col-md-6"> <!-- debut panel classes-->
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-home fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $nombre_classes ?></div>
                        <div>Classe</div>
                    </div>
                </div>
            </div>
            <a href="classes.php">
                <div class="panel-footer">
                    <span class="pull-left">
                        Voir les détails
                    </span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div> <!-- fin panel classes-->

    <div class="col-lg-3 col-md-6"> <!-- debut panel sections-->
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-calendar fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php anneeScolaire() ?></div>
                        <div>ANNEE SCOLAIRE</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">
                        
                    </span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div> <!-- fin panel sections-->

    <?php 
   
   if(isset($_GET['code']))
   {
      $admin_id = $_GET['code'];

      $get_compte = "SELECT *FROM admins WHERE id_admin='$admin_id'";
      $run_compte = mysqli_query($con,$get_compte);
      $row = mysqli_fetch_array($run_compte);
    ?>
<div class="row" style="margin-top:5px;">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-tittle">
                    <i class="fa fa-user"></i> Aperçu sur votre compte                
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <th>
                                <div container-fluid>
                                   <div class="col-md-2">
                                      <p><img src="img/admin_photos/<?php echo $row['img_admin'] ?>" alt="" width="200" class="img img-responsive img-rounded"></p>
                                   </div>
                                   <div class="col-md-6">
                                        <h4 style="font-weight: bold">
                                            <p>Nom admin: <?php echo $row['nom_admin'] ?></p>
                                            <p>Post-nom admin: <?php echo $row['postnom_admin'] ?></p>
                                            <p>Telephone admin: <?php echo $row['admin_numero'] ?></p>
                                            <p>Email admin: <?php echo $row['admin_email'] ?></p>
                                        </h4>
                                        <p>
                                            <form action="modifier_admin.php" method="post">
                                              <button type="submit" name="modif_admin_btn" value="<?php echo $row['id_admin'] ?>" class="btn btn-primary">Modifier le mot de passe</button>
                                            </form>
                                        </p>
                                   </div>
                                </div>
                                
                            </th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php } ?>

</div>
<?php
    include("footer.php");
?>

<?php } ?>