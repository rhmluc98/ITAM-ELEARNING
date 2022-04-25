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
   
   if(isset($_GET['ensei_voir_horaire_btn']))
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
                                
                            </tr>
                        <?php } 
                        
                           }else
                           {
                             echo "<h4 style='color:white; padding: 10px; background:red'>Horaire non disponible</h4>";
                           }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="form-group">
                        <div style="float:right">
                            <a href="ensei_voir_classe.php" class="btn btn-warning">Fermer</a>
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