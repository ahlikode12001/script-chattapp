<?php
  error_reporting(0);
  
  date_default_timezone_set('Asia/Jakarta');

  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "chattapp";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){
    echo 'Koneksi Kedatabase gagal!'.mysqli_connect_error();
  }
?>
 