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
?>

<?php 
   
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
<div class="row" style="margin-top:5px;">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-tittle">
                    <i class="fa fa-book"></i> Vos cours (<?php echo $nombre_cours ?>)
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
                                <th>Evaluation</th>
                                <th>Disponibilite</th>
                                <th>Cours disponibilite</th>
                                
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
                                <th>Evaluation</th>
                                <th>Disponibilite</th>
                                <th>Cours disponibilite</th>
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
                                                 <a href='fichiers_cours/$nom_fichier' target='_blanck' style='text-decoration: underline'>$nom_fichier</a>
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
                                    <form action="evaluations.php" method="get">
                                        <input type="hidden" name="eval_cours_id" value="<?php echo $row['id_cours'] ?>">
                                        <button type="submit" name="c_evaluation_btn" class="btn btn-primary">
                                            Ajouter une evaluation
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="afficher_cote.php" method="get">
                                        <input type="hidden" name="cours_id" value="<?php echo $row['id_cours'] ?>">
                                        <button type="submit" name="fiche_cotes_btn" class="btn btn-primary">
                                            Fiches de cotes
                                        </button>
                                    </form>
                                </td>
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
