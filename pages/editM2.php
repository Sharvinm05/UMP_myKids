
<?php
include("db-con.php");
  $id=$_GET['id'];

  //First, connect to the MySQL server.


  //Then, insert query.
  $sql = "SELECT * FROM child WHERE ChildId='$id'";

  $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit User Record</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <center>
    <p><b>User input is listed below:</b></p>
    <?php
        while($row = mysqli_fetch_array($result)) {
    ?>
    <form action="updateM2.php?id=<?php echo $row['ChildId'];?>" method="post">
      <table>
        <tr>
          <td>Child Name*</td>
          <td><input type="text" name="ChildName" value="<?php echo $row['ChildName'];?>"></td>
        </tr>
        <tr>
          <td>Child Age*</td>
          <td><input type="text" name="ChildAge" value="<?php echo $row['ChildAge'];?>"></td>
        </tr>
        <tr>
          <td>Child Status*</td>
          <td><input type="text" name="ChildStatus" value="<?php echo $row['ChildStatus'];?>"></td>
        <tr>
          <td>Gender</td>
          <td>
            <input type="radio" id="Male" name="gender" value="m" <?php if( $row['gender']=='m'){echo 'checked';}?>>
            <label for="Male">Male</label>
            <input type="radio" id="Female" name="gender" value="f" <?php if( $row['gender']=='f'){echo 'checked';}?>>
            <label for="Female">Female</label>
          </td>
        </tr>
        <tr>
          <td>Child Medical*</td>
          <td><input type="text" name="ChildMedical" value="<?php echo $row['ChildMedical'];?>"></td>
        </tr>
      </table>
  
      <input type="submit" value="Update Record">
    </form>
    <?php
        }
    ?>
  <center>
</body>
</html>

