

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
   
   $i = 0;
   $get_compte = "SELECT *FROM comptes ORDER BY utilisateur_type DESC";
   $run_compte = mysqli_query($con,$get_compte);

   $nombre_comptes = mysqli_num_rows($run_compte);

?>
<div class="row" style="margin-top:5px;">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-tittle">
                    <i class="fa fa-users"></i> Liste des comptes (<?php echo $nombre_comptes ?>)
                </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>N<sup>o</sup></th>
                                <th>Noms utilisateur</th>
                                <th>Type</th>
                                <th>Matricule</th>
                                <th>Statut</th>
                                <th>Acces</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>N<sup>o</sup></th>
                                <th>Noms utilisateur</th>
                                <th>Type</th>
                                <th>Matricule</th>
                                <th>Statut</th>
                                <th>Acces</th>
                                <th>Supprimer</th>
                            </tr>
                        </tfoot>
                        <?php 
                          if(mysqli_num_rows($run_compte) > 0)
                            {
                              while ($row = mysqli_fetch_array($run_compte))
                               {
                                  $i++;
                        ?>    
                        <tbody>
                            
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $row['nom_utilisateur'] ?></td>
                                <td><?php echo $row['utilisateur_type'] ?></td>
                                <td><?php echo $row['login'] ?></td>
                                <td>
                                    <?php 

                                        if($row['statut'] == 'connecter')
                                        {
                                            echo "<div class='online_status'><i class='fa fa-circle'></i> En ligne</div>";
                                        }
                                        else
                                        {
                                            echo "<div class='offline_status'><i class='fa fa-circle'></i> Deconneter</div>";
                                        }
                                    ?>
                                </td>
                                <td> 
                                    <?php if($row['acces'] != 'Permis')
                                    {
                                     ?>
                                     <form action="utilisateur_permission.php" method="get">
                                        <input type="hidden" name="permission_id" value="<?php echo $row['id_compte'] ?>">
                                        <button type="submit" name="permission_btn" class="btn btn-success" onclick="return confirm('Voulez-vous vraiment permettre l\'acces a <?php echo $row['nom_utilisateur'] ?> ?')">
                                            Permettre l'acces
                                        </button>
                                    </form>    
                                    <?php 
                                    
                                      }
                                      else
                                      {
                                        
                                    ?> 
                                    <form action="utilisateur_permission.php" method="get">
                                     <input type="hidden" name="permission_id" value="<?php echo $row['id_compte'] ?>">
                                     <button type="submit" name="permission_btn" class="btn btn-warning" onclick="return confirm('Voulez-vous vraiment interdir l\'acces a <?php echo $row['nom_utilisateur'] ?> ?')">
                                         Interdir l'acces
                                     </button>
                                    </form>
                                     <?php } ?>
                                </td>
                                <td>    
                                    <div class="button-group">
                                        <form action="code.php" method="post">
                                           <input type="hidden" name="supp_compte_id" value="<?php echo $row['id_compte'] ?>">
                                           <button type="submit" name="supprimer_compte_btn" class="btn btn-danger" onclick="return confirm('Etes-vous sûr de vouloir supprimer ?')">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php } 
                        
                           } 
                           else
                           {
                             echo "<h4 style='color:white; padding: 10px; background:red'>Pas de compte enregistrer pour le moment</h4>";
                           }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
    include("footer.php");
?>

<?php } ?>