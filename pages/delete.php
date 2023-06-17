<?php 
    include 'db-con.php';

    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];

        $sql = "DELETE FROM activity WHERE ActivityId = $id";
        $result = mysqli_query($conn, $sql);

        if($result){
            echo '<script>alert("Activity deleted successfully");
            window.location.href = "display_page.php"; </script>';
        }
        else{
            die(mysqli_connect_error($conn));
        }
    }

?>
<script type="text/javascript">
    window.location="display_page.php";
</script>