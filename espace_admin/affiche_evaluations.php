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

  $ensei_session = $_SESSION['login'];
  $get_ensei = "SELECT *FROM enseignant WHERE matricule='$ensei_session'";
  $run_ensei = mysqli_query($con,$get_ensei);
  $row_ensei = mysqli_fetch_array($run_ensei);

  $ensei_id = $row_ensei['id_enseignant'];

  $get_cours = "SELECT *FROM t_cours WHERE id_enseignant='$ensei_id'";
  $run_cours = mysqli_query($con,$get_cours);
  while($row_cours = mysqli_fetch_assoc($run_cours))
  {

    $cours_id = $row_cours['id_cours'];
    
    $id_cours = $row_cours['id_cours'];
    $get_c = "SELECT *FROM t_cours WHERE id_cours ='$id_cours'"; 
    $run_c = mysqli_query($con,$get_c);
    $row_c = mysqli_fetch_array($run_c);

    $titre_c = $row_c['titre_cours'];
    $id_classe = $row_c['id_classe'];

    $get_classe = "SELECT *FROM classes WHERE id_classe='$id_classe'";
    $run_classe = mysqli_query($con,$get_classe);
    $row_classe = mysqli_fetch_array($run_classe);

    $classe_desc = $row_classe['description'];
    $section = $row_classe['section'];


?>
<div class="row" style="margin-top:5px;">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-tittle">
                    <i class="fa fa-book"></i> Evaluataion de <?php echo $titre_c ?> en <?php echo $classe_desc ?><sup>e</sup><?php echo $section ?>
                </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <form action="" method="post">
                    <table class="table table-striped table-bordered table-hover">
                        
                        <thead>
                            <tr>
                                <th>N<sup>o</sup></th>
                                <th>Question</th>
                                <th>Ponderation</th>
                                <th>Duree</th>
                                <th>Assertion 1</th>
                                <th>Assertion 2</th>
                                <th>Assertion 3</th>
                                <th>Assertion 4</th>
                                <th>Assertion 5</th>
                                <th>Reponse</th>
                                <th>Date</th>
                                <th>Suppimer</th>
                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>N<sup>o</sup></th>
                                <th>Question</th>
                                <th>Ponderation</th>
                                <th>Duree</th>
                                <th>Assertion 1</th>
                                <th>Assertion 2</th>
                                <th>Assertion 3</th>
                                <th>Assertion 4</th>
                                <th>Assertion 5</th>
                                <th>Reponse</th>
                                <th>Date</th>
                                <th>Suppimer</th>
                            </tr>
                        </tfoot>   
                        <?php 
                        
                        $get_evaluations = "SELECT *FROM evaluations WHERE cours_id='$cours_id'";
                        $run_eval = mysqli_query($con,$get_evaluations);
                        $i = 0;
                        if(mysqli_num_rows($run_eval) > 0)
                          {
                            while($row = mysqli_fetch_assoc($run_eval))
                          {
                              $i++;

                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $i ?></td>   
                                <td><?php echo $row['question'] ?></td>
                                <td><?php echo $row['ponderation'] ?></td>
                                <td><?php echo $row['duree'] ?></td>
                                <td><?php echo $row['assertion1'] ?></td>
                                <td><?php echo $row['assertion2'] ?></td>
                                <td><?php echo $row['assertion3'] ?></td>
                                <td><?php echo $row['assertion4'] ?></td>
                                <td><?php echo $row['assertion5'] ?></td>
                                <td><?php echo $row['reponse'] ?></td>
                                <td><?php echo $row['date'] ?></td>
                                
                                <td>
                                    <input type="checkbox" id="checkElement" name="supp_eval[]" value="<?php echo $row['evaluation_id'] ?>">
                                </td>
                               
                            </tr>
                        <?php }
                        
                          } else {
                            echo "<h4 style='color:white; padding: 10px; background:red'>Il y a aucune evaluation pour ce cours</h4>";
                          }
                        
                        ?>
                        </tbody>
                    </table>
                    <button type="submit" name="supp_eval_btn" class="btn btn-danger" value="" onclick="return confirm('Etes-vous sûr de vouloir supprimer ?')">Supprimer</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php

  function updateEvaluation()
  {
    global $con;

    if(isset($_POST['supp_eval_btn']))
    {
      $supp_id = $row['evaluation_id'];

      foreach($_POST['supp_eval'] as $supp_id )
      {
        $supprimer_eval = "DELETE FROM evaluations WHERE evaluation_id ='$supp_id '";
        $run_supp = mysqli_query($con,$supprimer_eval);

        if($run_supp)
        {
          echo "<script>alert('Evaluation(s) supprimer avec succes')</script>";
          echo "<script>window.open('affiche_evaluations.php','_self')</script>";
        }

      }
    }
  }
  echo @$update_evaluation = updateEvaluation();
?>

<?php
    include("footer.php");
?>

<?php } ?>
