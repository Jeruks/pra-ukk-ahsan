<?php 

session_start();
include 'koneksi.php';
$id_user = $_SESSION['id_user'];
$id_foto = $_GET['id_foto'];
$tgl_like = date("Y-m-d");

mysqli_query($conn, "INSERT INTO like_foto VALUES ('', '$id_foto', '$id_user', '$tgl_like')");
header("Location: home.php");


?>