<?php include 'header.php' ?>
<?php 
  include 'db-con.php';

?>
<?php 

  $query = "SELECT SUM(ActivityDuration) AS TotalDuration FROM activity ";
  $result = mysqli_query($conn, $query);
  while($row=mysqli_fetch_assoc($result)){
    $output = ""."".$row['TotalDuration'];
  }

  $query = "SELECT Count(ActivityName) AS TotalActivity FROM activity";
  $result = mysqli_query($conn,$query);
  while($row=mysqli_fetch_assoc($result)){
    $output1 = ""."".$row['TotalActivity'];
  }
  $query = "SELECT COUNT(ActivityName) AS ActiveActivity FROM activity WHERE ActivityStatus = 'active'";
  $result = mysqli_query($conn,$query);
  while($row=mysqli_fetch_assoc($result)){
    $output2 = ""."".$row['ActiveActivity'];
  }
  $query = "SELECT COUNT(ActivityName) AS InactiveActivity FROM activity WHERE activityStatus = 'Inactive'";
  $result = mysqli_query($conn,$query);
  while($row=mysqli_fetch_assoc($result)){
    $output3 = ""."".$row['InactiveActivity'];
  }

  $query = "SELECT * FROM activity";
  $result = mysqli_query($conn,$query);



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chart</title>
  <style>
        table, th, td{
            text-align: center;
            border: 1px solid black;
            border-collapse: collapse;
            padding:5px;
            
        }
  </style>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['ActivityName', 'ActivityDuration'],
          <?php 
          
            while($chart = mysqli_fetch_assoc($result)){
              echo "['".$chart['ActivityName']."',".$chart['ActivityDuration']."],";
            }
          
          ?>
        ]);

        var options = {
          title: 'Activity With Duration'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
</head>
<body>
<div style="width:50%; margin: auto;" style="background-color:#e4e4e4;">

<h2 style="text-align: center;">Activity Report</h2>

  <div id="piechart" style="width: 900px; height: 500px;" ></div>
</div>
<center>  
<table>
    <thead>
      <tr>
        <th>Total Activity</th>
        <th>Total Duration</th>
        <th>Active</th>
        <th>Inactive</th>
      </tr>
      <tr>
        <td><?php echo $output1 ?></td>
        <td><?php echo $output ?></td>
        <td><?php echo $output2 ?></td>
        <td><?php echo $output3 ?></td>
      </tr>
    </thead>
  </table>
  <br>
  <div id="button"><a href ="display_page.php" class="btn btn-danger btn-sm">Display Page</a></div>
  
</center>



</body>
<?php include 'footer.php' ?>

<script>
    function naviHead() {
       
        //Header name
        document.getElementById("head-nav").style.display = "none";
        document.getElementById("page-head").innerHTML = "Chart";
        document.getElementById("mod1").href = "./staffmain.php";
        //Side Navigation Bar
        document.getElementById("mod1").className = "nav-link  ";
        //document.getElementById("mod1").className += "active";   

        document.getElementById("name-2").innerHTML = "????"; 
        document.getElementById("mod2").href = "";

        //document.getElementById("mod1").className = "nav-link  ";
        document.getElementById("mod4").className += "active";

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