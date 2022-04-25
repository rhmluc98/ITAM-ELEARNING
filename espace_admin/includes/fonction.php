
<?php 

$con = mysqli_connect("localhost","root","","enseignement");

?>

<?php

    function chargerDonneeDansSelect($table, $colone, $colone_reference, $identifiant)
    {
        global $con;
        $output = '';
        $requete = "SELECT $colone FROM $table WHERE $colone_reference='$identifiant' ORDER BY $colone ASC";
        $run_requete = mysqli_query($con,$requete);
        
        while($row = mysqli_fetch_assoc($run_requete))
        {
            $output .= '<option value="'.$row[$colone].'">'.$row[$colone].'</option>';
        }
        return $output;
    }           

  
 function anneeScolaire()
 {
 
    global $con;
    $current_mounth = date('n');
    $current_year = date('Y');

    if($current_mounth >= 7)
    {
        $year1 = $current_year + 1;
        $year2 = $year1 - 1;
        $school_year = $year2.'-'.$year1;
        echo $school_year;
    }
    else
    {
        $year1 = $current_year - 1;
        $school_year = $year1.'-'.$current_year;
        echo $school_year;
    }  

 }



?>