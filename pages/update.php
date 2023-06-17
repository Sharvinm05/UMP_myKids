<?php 
    include 'db-con.php';
    
    $id = $_GET['updateid'];
    $sql = "SELECT * FROM activity WHERE ActivityId = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $ActivityName = $row['ActivityName'];
    $ActivityDate = $row['ActivityDate'];
    $StartTime = $row['StartTime'];
    $EndTime = $row['EndTime'];
    $ActivityDuration = $row['ActivityDuration'];
    $ActivityStatus = $row['ActivityStatus'];
    $StaffId = $row['StaffId'];
    $ChildId = $row['ChildId'];

    if(isset($_POST['update'])){
        $ActivityName = $_POST['ActivityName'];
        $ActivityDate = $_POST['ActivityDate'];
        $StartTime = $_POST['StartTime'];
        $EndTime = $_POST['EndTime'];
        $ActivityDuration = $_POST['ActivityDuration'];
        $ActivityStatus = $_POST['ActivityStatus'];
        $StaffId = $_POST['StaffId'];
        $ChildId = $_POST['ChildId'];
        $query = "SELECT staff.StaffId, staff.StaffName, child.ChildId, child.ChildName, activity.StaffId, activity.ChildId FROM staff LEFT JOIN activity ON staff.StaffId = activity.StaffId LEFT JOIN child ON child.ChildId = activity.ChildId";

        $sql = "UPDATE activity SET ActivityName = '$ActivityName', ActivityDate = '$ActivityDate', StartTime = '$StartTime', EndTime ='$EndTime',ActivityDuration = '$ActivityDuration', ActivityStatus='$ActivityStatus', StaffId = '$StaffId', ChildId = '$ChildId' WHERE ActivityID = '$id' ";
        $result = mysqli_query($conn, $sql);

        if($result){
            echo'<script>alert("Activity updated successfully");
            window.location.href = "display_page.php"; </script>';
        }
        else{
            die(mysqli_connect_error($conn));
        }
        
    }
    


?>
<?php 

include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
<center>
    <form method="post">
        <div>
        <label class="form-label">Activity Name: </label>
        <input type="text" name="ActivityName" value="<?php echo $ActivityName; ?>">
        </div>
        <br>
        <div>
        <label class="form-label">Date: </label>
        <input type="date" name="ActivityDate" value="<?php echo $ActivityDate; ?>">
        </div>
        <br>
        <div>
            <label class="form-label">Time Start: </label>
            <input type="time" name="StartTime" value="<?php echo $StartTime; ?>" >
        </div>
        <br>
        <div>
            <label class="form-label">Time End: </label>
            <input type="time" name="EndTime" value="<?php echo $EndTime; ?>">
        </div>
        <br>
        <div>
            <label class="form-label">Activity Duration: </label>
            <input type="number" name="ActivityDuration" value="<?php echo $ActiveDuration; ?>">
        </div>


        <div>
            <label class="form-label" value="<?php echo $ActivityStatus; ?>">Activity Status </label>
            <input type="radio" name="ActivityStatus" value="Active"> Active
            <input type="radio" name="ActivityStatus" value="Complete"> Complete
        </div>
        <br>

        <div>
            <?php 
                $dropdown_staff = '';
                $query1 = "SELECT * From staff WHERE StaffType = 'Teacher'";
                $result1 = mysqli_query($conn,$query1);
                if(mysqli_num_rows($result1) > 0){
                    $dropdown_staff = '<select  name="StaffId" required><option value="" selected>-</option>';
                    while($row = mysqli_fetch_array($result1)){
                        $dropdown_staff .= '<option value="'.$row['StaffId'].'">'.$row['StaffName'].'</option>';
                    }
                    $dropdown_staff .='</select>'; 
                
                }
            
            ?>
        <label for="StaffId" >Staff Name: </label>
        <?php echo $dropdown_staff ?>
        </div>
        <div>
            <?php 
                $dropdown_child = '';
                $query2 = "SELECT DISTINCT child.ChildId, child.ChildName From child LEFT JOIN activity ON child.ChildId = activity.ChildId";
                $result2 = mysqli_query($conn,$query2);
                if(mysqli_num_rows($result2) > 0){
                    $dropdown_child = '<select  name="ChildId" required><option value="" selected>-</option>';
                    while($row = mysqli_fetch_array($result2)){
                        $dropdown_child .= '<option value="'.$row['ChildId'].'">'.$row['ChildName'].'</option>';
                    }
                    $dropdown_child .='</select>'; 
                
                }
            
            ?>
        <label for="StaffId" >Child Name: </label>
        <?php echo $dropdown_child ?>
        </div>
        <br>
        <button type="submit" class ="btn btn-success btn_lg my-3" name="update" >Update</button> 
        
    </form>
    </center>
</body>
</html>
<?php 

    include 'footer.php';
?>
<script>
    function naviHead() {
       
        //Header name
        document.getElementById("head-nav").style.display = "none";
        document.getElementById("page-head").innerHTML = "Main Menu";
        document.getElementById("mod1").href = "./staffmain.php";
        //Side Navigation Bar
        document.getElementById("mod1").className = "nav-link  ";
        //document.getElementById("mod1").className += "active";   

        document.getElementById("name-2").innerHTML = "????"; 
        document.getElementById("mod2").href = "";

        //document.getElementById("mod1").className = "nav-link  ";
        document.getElementById("mod3").className += "active";

        document.getElementById("name-2").innerHTML = "Add Activity";  
        document.getElementById("mod2").href = "./add.php";

        document.getElementById("name-3").innerHTML = "Display Activity"; 
        document.getElementById("mod3").href = "./display_page.php";

        
        document.getElementById("name-4").innerHTML = "Chart";  
        document.getElementById("mod4").href = "./chart.php";

        document.getElementById("name-5").innerHTML = "View Salary Details";  
        document.getElementById("mod5").href = "./teacherview.php";

         
        document.getElementById("nav-item6").style.display = "None"; 
        
        //document.getElementById("user").innerHTML = "Nur Aina binti Amirudin"; 
    }
  window.onload = naviHead;

</script>
