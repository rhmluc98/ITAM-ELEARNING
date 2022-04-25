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
    include("includes/scripts.php");
    include("includes/fonction.php");
?>

<?php 

  if(isset($_GET['c_evaluation_btn']))
  {
      $cours_id = $_GET['eval_cours_id'];
      $get_cours = "SELECT *FROM t_cours WHERE id_cours='$cours_id'";
      $run_cours = mysqli_query($con,$get_cours);
      $row_cours = mysqli_fetch_array($run_cours);

      $nom_cours = $row_cours['titre_cours'];
      $id_classe = $row_cours['id_classe'];

      $get_classe = "SELECT *FROM classes WHERE id_classe='$id_classe'";
      $run_class = mysqli_query($con,$get_classe);
      $row_classe = mysqli_fetch_array($run_class);
      $nom_classe = $row_classe['description'];
      $nom_section = $row_classe['section'];
  }

?>

<!-- Debut publication cours -->
<div class="row" style="margin-top:5px;">
    <div class="col-lg-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-tittle">
                    <i class="fa fa-book"></i> Ajouter une evaluation pour <?php echo $nom_cours ?> en <?php echo $nom_classe ?><sup>e</sup> <?php echo $nom_section ?>
                </h3>
            </div>
    <div class="panel-body">
    

<!-- Debut insertion lecon ou chapitres du cours -->
<div class="panel-heading">
    <h4 class="panel-tittle text-center">
        Cliquez sur le bouton '+' pour l'enregistrement multiple
    </h4>
</div>

 <form action="code.php" method="POST" id="insert_evaluations">
	<div class="table-responsive">
        <span id="error"></span>
        <table class="table table-bordered" id="table_chap">
            <th>Question</th>
            <th>Ponderation</th>
            <th>Duree(en minute svp)</th>
            <th>Assertion 1:</th>
            <th>Assertion 2:</th>
            <th>Assertion 3:</th>
            <th>Assertion 4:</th>
            <th>Assertion 5:</th>
            <th>Reponse</th>
            
            <th>
                <button type="button" name="addchapbtn" class="btn btn-success btn-sm addevalbtn">+</button>
            </th>

            <tr>
               <td><textarea type="text" name="question[]" rows="2" class="form-control question" required></textarea></td>
               <td><input type="number" name="ponderation[]" class="form-control ponderation" required></td>
               <td><input type="number" name="duree[]" class="form-control duree" placeholder="En minute svp" required></td>
               <td><input type="text" name="assertion1[]" class="form-control assertion1" required></td>
               <td><input type="text" name="assertion2[]" class="form-control assertion2" required></td>
               <td><input type="text" name="assertion3[]" class="form-control assertion3" required></td>
               <td><input type="text" name="assertion4[]" class="form-control assertion4"></td>
               <td><input type="text" name="assertion5[]" class="form-control assertion5"></td>
               <td><select type="text" name="reponse[]" class="form-control reponse" required><option value="" disabled selected>Selectionnez la reponse</option><option value="assertion1">Assertion 1</option><option value="assertion2">Assertion 2</option><option value="assertion3">Assertion 3</option><option value="assertion4">Assertion 4</option><option value="assertion5">Assertion 5</option></select></td>
               
               <td><button type="button" name="remove" class="btn btn-danger btn-sm remove">X</button></td></tr>
            </tr>
            <td><input type="hidden" name="id_cours[]" value="<?php echo $cours_id ?>" class="form-control id_cours"/></td>
        </table>
		<input type="submit" name="insert_evaluation" class="btn btn-primary btn-block" value="Enregistrer evaluation(s)" style="font-size: 18px;">
    </div>
</form><br><br><br><br><br><br>
<script type="text/javascript">
    $(document).ready(function() {

            // Ajouter une ligne pour l'enregistrement multiple avec jquery 
            $(document).on('click','.addevalbtn', function() {
            	var html = '';
            	html += '<tr>';

                html +='<td><textarea type="text" name="question[]" rows="2" class="form-control question" required/></textarea></td>';

                html +='<td><input type="number" name="ponderation[]" class="form-control ponderation" required></td>';

                html +='<td><input type="number" name="duree[]" class="form-control duree" placeholder="En minute svp" required></td>';

                html +='<td><input type="text" name="assertion1[]" class="form-control assertion1" required></td>';

                html +='<td><input type="text" name="assertion2[]" class="form-control assertion2" required></td>';

                html +='<td><input type="text" name="assertion3[]" class="form-control assertion3" required></td>';

                html +='<td><input type="text" name="assertion4[]" class="form-control assertion4"></td>';

                html +='<td><input type="text" name="assertion5[]" class="form-control assertion5"></td>';

                html +='<td><select type="text" name="reponse[]" class="form-control reponse" required><option value="" disabled selected>Selectionnez la reponse</option><option value="assertion1">Assertion 1</option><option value="assertion2">Assertion 2</option><option value="assertion3">Assertion 3</option><option value="assertion4">Assertion 4</option><option value="assertion5">Assertion 5</option></select></td>';

                html +='<input type="hidden" name="id_cours[]" value="<?php echo $cours_id ?>" class="form-control id_classe"/>';
                
            	html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove">X</button></td></tr>';
                
                $('#table_chap').append(html);
            });

            $(document).on('click', '.remove', function() {
            	$(this).closest('tr').remove();
            });

        });
  </script>


<?php
    include("footer.php");
?>

<?php } ?>