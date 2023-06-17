<?php 
include("db-con.php");
include('phpqrcode/qrlib.php');

$tempDir = '../qrimg';

//$_SESSION['fypStudentID'] = '87';
$sid = $_GET['id'];
$strSQL = "SELECT * FROM salary WHERE SalaryId = '$sid'";

//Execute the query (the recordset $rs contains the result)
$rs = mysqli_query($conn, $strSQL);
$r = mysqli_fetch_assoc($rs);
$path = '../qrimg';
$file = $path.uniqid().".png";
  
//other parameters
$ecc = 'L';
$pixel_size = 10;
$frame_size = 10;
//header("Content-type: application/pdf");
$sql = "INSERT INTO qrcode (qrimg,Salaryid) VALUES ('{$file}', '$sid')";
$result = mysqli_query($conn, $sql);

QRcode::png("http://192.168.0.117/ump_mykids2/pages/download.php?id=$sid",$file, $ecc, $pixel_size, $frame_size);
//echo "<div><img src='".$file."'></div>";



// if(isset($_POST['submit']) ) {
//     $tempDir = 'temp/'; 
//     $email = $_POST['mail'];
//     $subject =  $_POST['subject'];
//     $filename = ;
//     $body =  $_POST['msg'];
//     $codeContents = 'mailto:'.$email.'?subject='.urlencode($subject).'&body='.urlencode($body); 
//     QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
//    }

?>