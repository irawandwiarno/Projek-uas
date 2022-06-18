<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "elearning";

//variable untuk menghubungkan dengan database
$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    die("koneksi gagal: " . mysqli_connect_error ());
}


?>
