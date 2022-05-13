<?php 

$server = "localhost";
$user = "root";
$pass = "dh1nch@k";
$database = "joomdev";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>