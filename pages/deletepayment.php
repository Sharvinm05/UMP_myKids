<?php include('db-con.php');?>
<?php 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql2 = "DELETE  FROM salary where SalaryId  ='$id'";
    $sql3 = "DELETE  FROM qrcode where SalaryId  ='$id'";
    $result3 = mysqli_query($conn, $sql2);
    if ($result3) {
        echo '<script>
        alert("Deleted successfully");
        window.location.href = "viewstaff.php";
       </script>';
    } else {
        echo '<script>alert("Something went wrong!")</script>';
    }
}
?>