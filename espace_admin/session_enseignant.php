
<?php
    session_start();
    include("includes/db.php");

    if(!isset($_SESSION['login']))
    {
        header("location:login.php");
    }

    else
    {
?>

<?php
    include("includes/header.php");
    include("includes/enseignant_sidebar.php");
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
   
   $ensei_matricule = $_SESSION['login'];
   $get_ensei = "SELECT *FROM enseignant WHERE matricule='$ensei_matricule'";
   $run_ensei = mysqli_query($con,$get_ensei);
   $row_ensei = mysqli_fetch_array($run_ensei);

   $ensei_id = $row_ensei['id_enseignant'];

   $i = 0;
   $get_cours = "SELECT *FROM t_cours WHERE id_enseignant='$ensei_id' ORDER BY date DESC";
   $run_cours = mysqli_query($con,$get_cours);

   $nombre_cours = mysqli_num_rows($run_cours);

?>

<div class="row" style="margin-top:-40px;">
    <div class="col-lg-12">
        <h1 class="page-header">ESPACE ENSEIGNANT</h1>
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i></li><a href="#">ESPACE ENSEIGNANT</a>
            </ol>
    </div>
</div>

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
        <a href="ensei_voir_classe.php">
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

<div class="col-lg-3 col-md-6"> <!-- debut panel periodes-->
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-book fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge"><?php echo $nombre_cours ?></div>
                    <div>COURS</div>
                </div>
            </div>
        </div>
        <a href="ensei_voir_cours.php">
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
</div> <!-- fin panel periodes-->
<div class="col-lg-3 col-md-6"> <!-- debut panel Proclamations-->
    <div class="panel panel-green">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-edit fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge">65</div>
                    <div>EVALUATION</div>
                </div>
            </div>
        </div>
        <a href="#">
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
</div> <!-- fin panel cotes-->
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

</div>

<div class="row" style="margin-top:5px;">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-tittle">
                    <i class="fa fa-book"></i> Mes cours (<?php echo $nombre_cours ?>)
                </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>N<sup>o</sup></th>
                                <th>Titre du cours</th>
                                <th>Fichier</th>
                                <th>Classe</th>
                                <th>Nombre d'heure/semaine</th>
                                <th>Date de publication</th>
                                <th>Disponibilite</th>
                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>N<sup>o</sup></th>
                                <th>Titre du cours</th>
                                <th>Fichier</th>
                                <th>Classe</th>
                                <th>Nombre d'heure/semaine</th>
                                <th>Date de publication</th>
                                <th>Disponibilite</th>
                            </tr>
                        </tfoot>
                        <?php 
                          if(mysqli_num_rows($run_cours) > 0)
                            {
                              while ($row = mysqli_fetch_array($run_cours))
                               {
                                  $i++;
                        ?>    
                        <tbody>
                            <?php
                                $id_prof = $row['id_enseignant'];
                                $get_prof = "SELECT *FROM enseignant WHERE id_enseignant='$id_prof'";
                                $run_prof = mysqli_query($con,$get_prof);
                                $row_prof = mysqli_fetch_array($run_prof);

                                $id_classe = $row['id_classe'];
                                $get_classe = "SELECT *FROM classes WHERE id_classe='$id_classe'";
                                $run_classe = mysqli_query($con,$get_classe);
                                $row_classe = mysqli_fetch_array($run_classe);

                                $nom_classe = $row_classe['description'];
                                $nom_section = $row_classe['section'];
                         
                            ?>
                            <tr>
                                <td><?php echo $i ?></td>   
                                <td><?php echo $row['titre_cours'] ?></td>
                                <td>
                                    <?php
                                    
                                        $nom_fichier = $row['fichier_pdf'];
                                        echo "  
                                                 <a href='fichiers_cours/$nom_fichier' target='_blanck' style='text-decoration: underline'></i>$nom_fichier</a>
                                            ";
                                    ?>
                                </td>
                                <td><?php echo $nom_classe ?><sup>e</sup><?php echo $nom_section ?></td>
                                <td><?php echo $row['nombre_heures'] ?></td>
                                <?php
                                
                                  $date = $row['date'];
                                  $timestamp = strtotime($date);
                                  $newdate = date('d-m-Y',$timestamp);
                                
                                ?>
                                <td><?php echo $newdate ?></td>
                               
                                <td> 
                                    <?php if($row['cours_disponibilite'] != 1)
                                    {
                                     ?>
                                     <form action="cours_disponibilite.php" method="get">
                                        <input type="hidden" name="c_disponibilite_id" value="<?php echo $row['id_cours'] ?>">
                                        <button type="submit" name="c_disponibilite_btn" class="btn btn-success" onclick="return confirm('Voulez-vous vraiment remettre ce cours \'<?php echo $row['titre_cours'] ?>\' ?')">
                                            Remettre ce cours en ligne
                                        </button>
                                    </form>    
                                    <?php 
                                    
                                      }
                                      else
                                      {
                                        
                                    ?> 
                                    <form action="cours_disponibilite.php" method="get">
                                     <input type="hidden" name="c_disponibilite_id" value="<?php echo $row['id_cours'] ?>">
                                     <button type="submit" name="c_disponibilite_btn" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment retirer ce cours \'<?php echo $row['titre_cours'] ?>\' ?')">
                                         Retirer ce cours en ligne
                                     </button>
                                    </form>
                                     <?php } ?>
                                </td>
                               
                            </tr>
                        <?php } 
                        
                           }else
                           {
                            echo "<h4 style='color:white; padding: 10px; background:red'>Vous n'avez pas encore publier un cours pour le moment</h4>";
                           }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include("footer.php");
?>

<?php } ?>