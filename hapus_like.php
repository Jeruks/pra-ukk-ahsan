<?php
session_start();
include 'koneksi.php';
$id_foto = $_GET['id_foto'];
$id_user = $_SESSION['id_user'];
mysqli_query($conn, "DELETE FROM like_foto WHERE id_foto='$id_foto' AND id_user='$id_user");
header("Location: home.php");
