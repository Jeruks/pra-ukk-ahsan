<?php include 'header.php' ?>

<div class="container">
  <form method="post" enctype="multipart/form-data" style="margin-left:25%; margin-right:25%;">
    <h1 class="h3 mb-3 fw-normal">Unggah Foto</h1>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Judul</label>
      <input type="text" class="form-control" name="judul_foto">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Deskripsi</label>
      <input type="text" class="form-control" name="deskripsi_foto">
    </div>
    <div class="mb-3">
      <select class="form-select" name="id_album" aria-label="Default select example">
        <?php
        $id_user = $_SESSION['id_user'];
        include 'koneksi.php';
        $query = mysqli_query($conn, "SELECT * FROM album WHERE id_user='$id_user'");
        while ($d = mysqli_fetch_assoc($query)) {
          echo '<option value="'.$d['id_album'].'">'.$d['nama_album'].'</option>';
        }

        ?>
      </select>
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Foto</label>
      <input type="file" class="form-control" name="lokasi_file">
    </div>
    <input type="submit" name="unggah" class="btn btn-primary">
  </form>
</div>

<?php

if (isset($_POST['unggah'])) {
  include 'koneksi.php';

  $judul_foto = $_POST['judul_foto'];
  $deskripsi_foto = $_POST['deskripsi_foto'];
  $tgl_unggah = date("Y-m-d");
  $id_user = $_SESSION['id_user'];
  $id_album = $_POST['id_album'];

  $unggah = $_POST['unggah'];

  $direktori = "direktori/";
  $file_name = $_FILES['lokasi_file']['name'];
  move_uploaded_file($_FILES['lokasi_file']['tmp_name'], $direktori . $file_name);

  mysqli_query($conn, "INSERT INTO foto SET judul_foto='$judul_foto', deskripsi_foto='$deskripsi_foto', tgl_unggah='$tgl_unggah', lokasi_file='$file_name', id_user='$id_user', id_album='$id_album'");

  echo "<script>
        alert('Berhasil Upload!');window.location.href='home.php';
    </script>";
}




?>






<?php include 'footer.php' ?>