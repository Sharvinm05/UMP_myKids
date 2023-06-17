<?php 
include("db-con.php");


    $id = $_GET['id'];
    $query = " SELECT Salarypdf FROM salary WHERE SalaryId = '$id'";
    $result = mysqli_query($conn,$query);

    $row=mysqli_fetch_array($result);
    $salarypdf = $row['Salarypdf'];
        header("Content-type: application/pdf");
        echo $row['Salarypdf'];
        // ob_clean();
        // flush();
        // @readfile($salarypdf);

    

?>