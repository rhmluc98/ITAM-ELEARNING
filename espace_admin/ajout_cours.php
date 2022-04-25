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

  if(isset($_GET['ajouter_cours_btn']))
  {
      $classe_id = $_GET['classe_id'];
      $get_classe = "SELECT *FROM classes WHERE id_classe='$classe_id'";
      $run_get = mysqli_query($con,$get_classe);
      $row_classe = mysqli_fetch_array($run_get);

      $id_classe = $row_classe['id_classe'];
      $nom_classe = $row_classe['description'];
      $nom_section = $row_classe['section'];

      $ensei_matricule = $_SESSION['login'];
      $get_ensei = "SELECT *FROM enseignant WHERE matricule='$ensei_matricule'";
      $run_ensei = mysqli_query($con,$get_ensei);
      $row_ensei = mysqli_fetch_array($run_ensei);

      $ensei_id = $row_ensei['id_enseignant'];
  }

?>

<!-- Debut publication cours -->
<div class="row" style="margin-top:5px;">
    <div class="col-lg-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-tittle">
                    <i class="fa fa-book"></i> Ajouter un nouveau cours et horaire en <?php echo $nom_classe ?><sup>e</sup> <?php echo $nom_section ?>
                </h3>
            </div>
    <div class="panel-body">
    <form action="code.php" method="post" class="form-horizontal" enctype="multipart/form-data">
        <input type="hidden" name="id_classe" value="<?php echo $id_classe ?>" id="" class="form-control" required>
        <input type="hidden" name="id_ensei" value="<?php echo $ensei_id ?>" id="" class="form-control" required>
        <input type="hidden" name="diponibilite_cours" value="1" id="" class="form-control" required>
        <div class="form-group">
            <label for="" class="col-md-3 control-label">Titer du cours</label>
            <div class="col-md-6">
                <input type="text" name="titre_cours" id="" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-md-3 control-label">Nombre d'heure par semaine</label>
            <div class="col-md-6">
                <input type="number" name="nombre_heure" id="" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-md-3 control-label">Introduction generale</label>
            <div class="col-md-6">
                <textarea type="text" name="intro_gene" id="" class="form-control" rows="6" placeholder="Introduction generale... 1200 caracteres max, plus les espaces" required></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-md-3 control-label">Synthese generale</label>
            <div class="col-md-6">
                <textarea type="text" name="synth_gene" id="" class="form-control" rows="6" placeholder="Synthese generale... 600 caracteres max, plus les espaces" required></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-md-3 control-label">Fichier</label>
            <div class="col-md-6">
                <input type="file" name="fichier_cours" id="" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-md-3 control-label"></label>
            <div class="col-md-6">
                <input type="submit" name="publier_cours" value="Publier le cours" class="btn btn-primary text-right">
            </div>
    </div>
</form><br> 

<!-- Debut insertion lecon ou chapitres du cours -->
<div class="panel-heading">
    <h4 class="panel-tittle text-center">
        Ajouter les chapitres/lessons du cours(Cliquez sur le bouton '+' pour l'enregistrement multiple)
    </h4>
</div>

 <form action="code.php" method="POST" id="insert_chapitres">
	<div class="table-responsive">
        <span id="error"></span>
        <table class="table table-bordered" id="table_chap">
            <th>Cours</th>
            <th>Titre</th>
            <th>Contenu</th>
            <th>
                <button type="button" name="addchapbtn" class="btn btn-success btn-sm addchapbtn">+</button>
            </th>
            <tr>
                <td> <select name="cours2[]" class="form-control cours2"><option disabled selected>Selectionnez cours</option><?php echo chargerDonneeDansSelect('t_cours','titre_cours','id_enseignant',$ensei_id) ?></select> </td>
                <td><textarea type="text" name="titre[]" rows="1" class="form-control titre"></textarea></td>
                <td><textarea type="text" name="contenu[]" rows="6" placeholder="800 caracteres max..." class="form-control contenu"></textarea></td>
                
                <td><button type="button" name="remove" class="btn btn-danger btn-sm remove">X</button></td>
            </tr>
            <td><input type="hidden" name="id_classe[]" value="<?php echo $id_classe ?>" class="form-control id_classe"/></td>
        </table>
		<input type="submit" name="insert_chapitre" class="btn btn-primary btn-block" value="Enregistrer chapitre/lecon(s)" style="font-size: 18px;">
    </div>
</form><br><br><br><br><br><br>
<script type="text/javascript">
    $(document).ready(function() {

            // Ajouter une ligne pour l'enregistrement multiple avec jquery 
            $(document).on('click','.addchapbtn', function() {
            	var html = '';
            	html += '<tr>';

                html +='<td> <select name="cours2[]" class="form-control cours2"><option disabled selected>Selectionnez cours</option><?php echo chargerDonneeDansSelect('t_cours','titre_cours','id_enseignant',$ensei_id) ?></select> </td>';

            	// html +='<td><input type="text" name="chapitre[]" class="form-control chapitre"></td>';
                html +='<td><textarea type="text" name="titre[]" rows="1" class="form-control titre"/></textarea></td>';

                html +='<td><textarea type="text" name="contenu[]" rows="6" placeholder="800 caracteres max..." class="form-control contenu"></textarea></td>';

                html +='<input type="hidden" name="id_classe[]" value="<?php echo $id_classe ?>" class="form-control id_classe"/>';
                
            	html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove">X</button></td></tr>';
                
                $('#table_chap').append(html);
            });

            $(document).on('click', '.remove', function() {
            	$(this).closest('tr').remove();
            });

        });
  </script>


<!-- Debut publication horaire du cours -->
<div class="panel-heading">
    <h4 class="panel-tittle text-center">
         Horaire hebdomadaire du cours(Cliquez sur le bouton '+' pour l'enregistrement multiple)
    </h4>
</div>

 <form action="code.php" method="POST" id="insert_horaire">
	<div class="table-responsive">
        <span id="error"></span>
        <table class="table table-bordered" id="item_table">
            <th>Cours</th>
            <th>Jour</th>
            <th>Endroit virtuel/physique</th>
            <th>Heure debut</th>
            <th>Heure fin</th>
            <th>
                <button type="button" name="add" class="btn btn-success btn-sm add">+</button>
            </th>
            <tr>
                <td> <select name="cours[]" class="form-control cours" required><option disabled selected>Selectionnez cours</option"><?php echo chargerDonneeDansSelect('t_cours','titre_cours','id_enseignant',$ensei_id) ?></select> </td>
                <td> <select name="jour[]" class="form-control jour" required><option value="" disabled selected>Selectionnez jour</option><option value="Lundi">Lundi</option><option value="Mardi">Mardi</option><option value="Mercredi">Mercredi</option><option value="Jeudi">Jeudi</option><option value="Vendredi">Vendredi</option><option value="Samedi">Samedi</option></select></td>
                <td> <select name="endroit[]" class="form-control endroit" required><option value="" disabled selected>Selectionnez endroit</option><option value="En classe">En classe</option><option value="En ligne">En ligne</option></select> </td>
                <td><input type="time" name="heure_debut[]" class="form-control heure_debut" required/></td>
                <td><input type="time" name="heure_fin[]" class="form-control heure_fin" required/></td>
                
                <td><button type="button" name="remove" class="btn btn-danger btn-sm remove">X</button></td></tr>
            </tr>
            <td><input type="hidden" name="id_classe[]" value="<?php echo $id_classe ?>" class="form-control id_classe"/></td>
        </table>
		<input type="submit" name="insert_hor_cours" class="btn btn-primary btn-block" value="Enregistrer horaire(s)" style="font-size: 18px;">
    </div>
</form>
<script type="text/javascript">
    $(document).ready(function() {

            // Ajouter une ligne pour l'enregistrement multiple avec jquery 
            $(document).on('click','.add', function() {
            	var html = '';
            	html += '<tr>';

                html +='<td> <select name="cours[]" class="form-control cours" required><option disabled selected>Selectionnez cours</option"><?php echo chargerDonneeDansSelect('t_cours','titre_cours','id_enseignant',$ensei_id) ?></select> </td>';

            	html +='<td> <select name="jour[]" class="form-control jour" required><option value="" disabled selected>Selectionnez jour</option><option value="Lundi">Lundi</option><option value="Mardi">Mardi</option><option value="Mercredi">Mercredi</option><option value="Jeudi">Jeudi</option><option value="Vendredi">Vendredi</option><option value="Samedi">Samedi</option></select></td>';

                html +='<td> <select name="endroit[]" class="form-control endroit" required><option value="" disabled selected>Selectionnez endroit</option><option value="En classe">En classe</option><option value="En ligne">En ligne</option></select> </td>';

            	html +='<td><input type="time" name="heure_debut[]" class="form-control heure_debut" required/></td>';

                html +='<td><input type="time" name="heure_fin[]" class="form-control heure_fin" required/></td>';

                html +='<input type="hidden" name="id_classe[]" value="<?php echo $id_classe ?>" class="form-control id_classe"/>';

            	html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove">X</button></td></tr>';
                
                $('#item_table').append(html);
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