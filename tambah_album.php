<?php include 'header.php' ?>

<main>
<form method="post" style="margin-left:25%; margin-right:25%;">
<h1 class="h3 mb-3 fw-normal">Buat Album Foto</h1>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nama Album</label>
    <input type="text" class="form-control" name="nama_album">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Deskripsi</label>
    <input type="text" class="form-control" name="deskripsi">
  </div>
  <input type="submit" name="simpan" class="btn btn-primary">
</form>
</main>

<?php 

if(isset($_POST['simpan'])) {
    $nama_album = $_POST['nama_album'];
    $deskripsi = $_POST['deskripsi'];
    $tgl_dibuat = date("Y-m-d");
    $id_user = $_SESSION['id_user'];

    include 'koneksi.php';
    mysqli_query($conn, "INSERT INTO album (nama_album, deskripsi, tgl_dibuat, id_user) VALUES ('$nama_album','$deskripsi','$tgl_dibuat','$id_user')");

    echo "<script>alert('Berhasil membuat album');window.location.href='album.php';</script>";
}


?>







<?php include 'footer.php' ?>