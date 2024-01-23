<?php include 'header.php' ?>
<?php 

include 'koneksi.php';
$id_album = $_GET['id_album'];
$query = mysqli_query($conn, "SELECT * FROM album WHERE id_album='$id_album'");
$d = mysqli_fetch_assoc($query);


?>

<main>
<form method="post" style="margin-left:25%; margin-right:25%;">
<h1 class="h3 mb-3 fw-normal">Buat Album Foto</h1>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nama Album</label>
    <input type="text" class="form-control" name="nama_album" value="<?= $d['nama_album'] ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Deskripsi</label>
    <input type="text" class="form-control" name="deskripsi" value="<?= $d['deskripsi'] ?>">
  </div>
  <input type="submit" name="ubah" class="btn btn-primary">
</form>
</main>

<?php 

if(isset($_POST['ubah'])) {
    $nama_album = $_POST['nama_album'];
    $deskripsi = $_POST['deskripsi'];

    include 'koneksi.php';
    mysqli_query($conn, "UPDATE album SET nama_album='$nama_album', deskripsi='$deskripsi' WHERE id_album='$id_album'");

    echo "<script>alert('Berhasil mengubah album');window.location.href='album.php';</script>";
}


?>







<?php include 'footer.php' ?>