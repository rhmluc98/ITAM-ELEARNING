
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
?>

<?php 
   
   $i = 0;
   $get_section = "SELECT *FROM section ORDER BY id_section";
   $run_section = mysqli_query($con,$get_section);

   $nombre_section = mysqli_num_rows($run_section);

?>
<div class="row" style="margin-top:5px;">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-tittle">
                    <i class="fa fa-users"></i> Toutes les sections organisées à l'école (<?php echo $nombre_section ?>)
                </h3>
                <div class="text-right" style="margin-top:-35px;">
                    <a href="ajout_sections.php" class="btn btn-success"><i class="fa fa-plus"></i> Ajouter</a>
                </div>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>N<sup>o</sup></th>
                                <th>Nom section</th>
                                <th>Introduite en:</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>N<sup>o</sup></th>
                                <th>Nom section</th>
                                <th>Introduite en:</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                        </tfoot>
                        <?php 
                          if(mysqli_num_rows($run_section) > 0)
                            {
                              while ($row = mysqli_fetch_array($run_section))
                               {
                                  $i++;
                        ?>    
                        <tbody>
                            
                            <tr>
                                <td><?php echo $i ?></td>                                
                                <td><?php echo $row['description'] ?></td>
                                <td><?php echo $row['annee'] ?></td>
                                
                                <td>
                                    <div class="button-group">
                                        <form action="modifier_section.php" method="get">
                                           <input type="hidden" name="modif_id" value="<?php echo $row['id_section'] ?>">
                                           <button type="submit" name="modifier_btn" class="btn btn-primary">Modifier</button>
                                        </form>
                                    </div>
                                </td>
                                <td>    
                                    <div class="button-group">
                                        <form action="code.php" method="post">
                                           <input type="hidden" name="supp_section_id" value="<?php echo $row['id_section'] ?>">
                                           <button type="submit" name="supprimer_section" class="btn btn-danger" onclick="return confirm('Etes-vous sûr de vouloir supprimer ?')">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php } 
                        
                           }else
                           {
                             echo "<script>alert('Pas de section enregistrer pour le moment')</script>";
                             echo "<script>window.open('ajout_sections.php','_self')</script>";
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