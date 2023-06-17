<?php

// $username = "root"; // your username
// $password = ""; // your password
// $dbname = "mykidsdb"; // your database name i.e. db_username
// // Create connection
// $conn = mysqli_connect("localhost", $username, $password, $dbname);

// // Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }

define("DATABASE_HOST", "localhost");
define("DATABASE_USER", "root");

$conn = mysqli_connect(DATABASE_HOST, DATABASE_USER);

if (mysqli_connect_error()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_select_db($conn, "mykidsdb") or die("Could not open product database");