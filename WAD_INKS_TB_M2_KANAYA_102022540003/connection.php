<?php
$host = "127.0.0.1"; 
$user = "root";      
$pass = "";          
// $db = "db_desahub";  

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?> 