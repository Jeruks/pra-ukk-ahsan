<?php 
include 'koneksi.php';
$id_album = $_GET['id_album'];
mysqli_query($conn, "DELETE FROM album WHERE id_album='$id_album'");
echo "<script>alert('Berhasil hapus album!');window.location.href='album.php'</script>";
?>

<?php 
include 'koneksi.php';
$id_like = $_GET['id_like'];
mysqli_query($conn, "DELETE FROM like_foto WHERE id_like='$id_like'");
echo "<script>alert('Batal menyukai foto!');window.location.href='home.php'</script>";
?>