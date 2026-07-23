<?php
$servername = "localhost";
$username = "root";
$password = "root"; // MAMP default password
$database = "e_comm"; // correct database name

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
