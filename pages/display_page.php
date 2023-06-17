<?php 
    include "db-con.php";

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
    <title>Display Page</title>
    <style>
        table, th, td{
            text-align: center;
            border: 1px solid black;
            border-collapse: collapse;
            padding:5px;
            
        }

        
    </style>
</head>
<body>
    <center>
    <table class="center">
        <thead>
        <tr>
            <th>Activity ID</th>
            <th>Activity Name</th>
            <th>Date</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Activity Duration</th>
            <th>Activity Status</th>
            <th>Staff ID</th>
            <th>Kid ID</th>
            <th style="width: 30%">Update/ Delete</th>
        </tr>


        
        </thead>
        
        <tbody id="Table1">

        <?php 
            $sql = 'SELECT * FROM activity ORDER BY ActivityId ASC';
            $result = mysqli_query($conn, $sql);
            $count=1;
        

            while($row = mysqli_fetch_assoc($result)){
                $ActivityId = $row['ActivityId'];
                $ActivityName = $row['ActivityName'];
                $ActivityDate = $row['ActivityDate'];
                $StartTime = $row['StartTime'];
                $EndTime = $row['EndTime'];
                $ActivityDuration = $row['ActivityDuration'];
                $ActivityStatus = $row['ActivityStatus'];
                $StaffId = $row['StaffId'];
                $ChildId = $row['ChildId'];

                echo '
                <tr>
                <th> '.$count.' </th>
                <td>'.$ActivityName.'</td>
                <td>'.$ActivityDate.'</td>
                <td>'.$StartTime.'</td>
                <td>'.$EndTime.'</td>
                <td>'.$ActivityDuration.'</td>
                <td>'.$ActivityStatus.'</td>
                <td>' .$StaffId. '</td>
                <td>'.$ChildId.'</td>
                <td><a href ="update.php?updateid='.$ActivityId.'" class="btn btn-success btn-sm">Update</a>
                <a href ="delete.php?deleteid='.$ActivityId.'" class="btn btn-danger btn-sm">Delete</a>
                </td>
                </tr>';
                $count++;
                
            }
            
        
        ?>
        <br>

    </table>
    <br>
    
    </center>
    
</body>
<?php 

    include 'footer.php';
?>
<script>
    function naviHead() {
       
        //Header name
        document.getElementById("head-nav").style.display = "none";
        document.getElementById("page-head").innerHTML = "Display Activity";
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