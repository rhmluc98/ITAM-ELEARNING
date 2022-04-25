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
   
   if(isset($_GET['voir_horaire_btn']))
   {
       $id_classe = $_GET['classe_id'];

       $get_classe = "SELECT *FROM classes WHERE id_classe='$id_classe'";
       $run_get = mysqli_query($con,$get_classe);
       $row_classe = mysqli_fetch_array($run_get);

       $nom_classe = $row_classe['description'];
       $nom_section = $row_classe['section'];
       
       
   $get_hor = "SELECT *FROM horaire_classe WHERE classe_id='$id_classe' ORDER BY 1 ASC";
   $run_hor = mysqli_query($con,$get_hor);

   $nombre_hor = mysqli_num_rows($run_hor);

?>
<div class="row" style="margin-top:5px;">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-tittle">
                    <i class="fa fa-calendar"></i> Horaire de cours en <?php echo $nom_classe ?><sup>e</sup> <?php echo $nom_section
                     ?>
                </h3>
                <div class="text-right" style="margin-top:-35px;">
                    <a href="ajout_horaire.php" class="btn btn-success"><i class="fa fa-plus"></i> Ajouter</a>
                </div>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><i class="fa fa-calendar"></i></th>
                                <th>1ère heure</th>
                                <th>2ème heure</th>
                                <th>3ème heure</th>
                                <th>4ème heure</th>
                                <th>5ème heure</th>
                                <th>6ème heure</th>
                                <th>7ème heure</th>
                                <th>8ème heure</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th><i class="fa fa-calendar"></i></th>
                                <th>1ère heure</th>
                                <th>2ème heure</th>
                                <th>3ème heure</th>
                                <th>4ème heure</th>
                                <th>5ème heure</th>
                                <th>6ème heure</th>
                                <th>7ème heure</th>
                                <th>8ème heure</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                        </tfoot>
                        <?php 
                          if(mysqli_num_rows($run_hor) > 0)
                            {
                              while ($row = mysqli_fetch_array($run_hor))
                               {
                        ?>    
                        <tbody>
                            
                            <tr>
                                <td style="font-weight:bolder"><?php echo $row['jour'] ?></td>
                                <td><?php echo $row['premiere_h'] ?></td>   
                                <td><?php echo $row['deuxieme_h'] ?></td>   
                                <td><?php echo $row['troisieme_h'] ?></td>   
                                <td><?php echo $row['quatrieme_h'] ?></td>   
                                <td><?php echo $row['cinquieme_h'] ?></td>   
                                <td><?php echo $row['sixieme_h'] ?></td>   
                                <td><?php echo $row['septieme_h'] ?></td>   
                                <td><?php echo $row['huitieme_h'] ?></td>                                  
                                
                                <td>
                                    <div class="button-group">
                                        <form action="modifier_horaire.php" method="get">
                                           <input type="hidden" name="modif_hor_id" value="<?php echo $row['horaire_id'] ?>">
                                           <button type="submit" name="modifier_horaire_btn" class="btn btn-primary">Modifier</button>
                                        </form>
                                    </div>
                                </td>
                                <td>    
                                    <div class="button-group">
                                        <form action="code.php" method="post">
                                           <input type="hidden" name="supp_hor_id" value="<?php echo $row['horaire_id'] ?>">
                                           <button type="submit" name="supprimer_horaire_btn" class="btn btn-danger" onclick="return confirm('Etes-vous sûr de vouloir supprimer ?')">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php } 
                        
                           }else
                           {
                             echo "<script>alert('Horaire non disponible')</script>";
                             echo "<script>window.open('ajout_horaire.php','_self')</script>";
                           }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="form-group">
                        <div style="float:right">
                            <a href="classes.php" class="btn btn-warning">Fermer</a>
                        </div>
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