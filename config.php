<?php

$servername = "sql305.epizy.com ";
$username = "epiz_31420025";
$password = "b23FsMs9vf";
$dbname = "epiz_31420025_comment_php";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
?>