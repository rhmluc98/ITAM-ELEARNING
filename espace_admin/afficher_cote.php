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
  $get_classe = "SELECT *FROM classe ORDER BY description ASC";
  $run_class = mysqli_query($con,$get_classe);
  
  while($row_class = mysqli_fetch_assoc($run_class))
  {
   
   $session_ensei = $_SESSION['login'];
   $get_ensei = "SELECT *FROM enseignant WHERE matricule='$session_ensei'";
   $run_ensei = mysqli_query($con,$get_ensei);
   $row_ensei = mysqli_fetch_array($run_ensei);

   $ensei_id = $row_ensei['id_enseignant'];

   $get_id_cours = "SELECT *FROM t_cours WHERE id_enseignant='$ensei_id'";
   $run_id_cours = mysqli_query($con,$get_id_cours);
   $row_id_cours = mysqli_fetch_array($run_id_cours);

 
?>

<?php

  $row_class  

?>
<div class="row" style="margin-top:5px;">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-tittle">
                    <i class="fa fa-users"></i> <?php ?>
                </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>N<sup>o</sup></th>
                                <th>Noms eleve</th>
                                <th>Class</th>
                                <th>Matricule</th>
                                <th>Cours</th>
                                <th>Point obtenu</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>N<sup>o</sup></th>
                                <th>Noms eleve</th>
                                <th>Class</th>
                                <th>Matricule</th>
                                <th>Cours</th>
                                <th>Point obtenu</th>
                                <th>Date</th>
                            </tr>
                        </tfoot>
                        <?php 
                          if(mysqli_num_rows($run_note) > 0)
                            {
                              while ($row = mysqli_fetch_array($run_note))
                               {
                                  $i++;
                        ?>    
                        <tbody>
                            
                            <tr>
                                <td><?php echo $i ?></td> 
                                
                                    <?php
                                    $eleve_id = $row['eleve_id'];

                                    $get_eleve = "SELECT *FROM eleves WHERE id_eleves='$eleve_id'";
                                    $run_eleve = mysqli_query($con,$get_eleve);
                                    $row_eleve = mysqli_fetch_array($run_eleve);

                                    $nom_eleve = $row_eleve['nom_eleves'];
                                    $postnom = $row_eleve['postnom_eleves'];
                                    $matricule = $row_eleve['matricule'];
                                    $classe_id = $row_eleve['classe'];
                                    $id_section = $row_eleve['section'];

                                    $get_class = "SELECT *FROM classe WHERE id_classe='$classe_id'";
                                    $run_classe = mysqli_query($con,$get_class);
                                    $row_classe = mysqli_fetch_array($run_classe);

                                    $get_section = "SELECT *FROM section WHERE id_section='$id_section'";
                                    $run_section = mysqli_query($con,$get_section);
                                    $row_section = mysqli_fetch_array($run_section);

                                    $classe = $row_classe['description'];
                                    $section = $row_section['description'];
                                    ?>
                                <td> <?php echo $nom_eleve ?> &nbsp <?php echo $postnom ?> </td> 
                                <td><?php echo $classe ?><sup>e</sup><?php echo $section ?></td>      
                                <td><?php echo $matricule ?></td>   
                                <td>
                                    <?php 
                                     
                                       $eval_id = $row['question_id'];

                                       $get_quest = "SELECT *FROM evaluations WHERE evaluation_id='$eval_id'";
                                       $run_quest = mysqli_query($con,$get_quest);
                                       $row_quest = mysqli_fetch_array($run_quest);

                                       $cours_id = $row_quest['cours_id'];
                                       $ponderation = $row_quest['ponderation'];
                                       $reponse_vrai = $row_quest['reponse'];

                                       $get_cours = "SELECT *FROM t_cours WHERE id_cours='$cours_id'";
                                       $run_cours = mysqli_query($con,$get_cours);
                                       $row_cours = mysqli_fetch_array($run_cours);
                                       
                                       $titre_cours = $row_cours['titre_cours'];

                                       echo $titre_cours;

                                    ?>
                                </td>   
                                <td>
                                    
                                    <?php 
                                    
                                       $reponse_optenu = $row['reponse'];
                                       if($reponse_optenu == $reponse_vrai)
                                       {
                                        $point_optenu = $ponderation;
                                        echo $point_optenu;
                                       }
                                       else
                                       {
                                        $point_optenu = 0;
                                        echo $point_optenu;
                                       }

                                
                                   ?>
                                </td> 
                                <td><?php echo $row['date'] ?></td>
                               
                            </tr>
                        <?php } 
                        
                           }else
                           {
                             echo "<script>alert('Cette fiche de cotes est vide')</script>";
                             echo "<script>window.open('session_enseignant.php','_self')</script>";
                           }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php
    include("footer.php");
?>

<?php } ?>