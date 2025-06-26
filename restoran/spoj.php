<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restoran_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Povezivanje na bazu nije uspjelo: " . $conn->connect_error);
}
?>
