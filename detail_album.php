<?php include 'header.php' ?>

<?php 
$id_user = $_SESSION['id_user'];
$id_album = $_GET['id_album'];
include 'koneksi.php';
$sql = mysqli_query($conn, "SELECT * FROM album WHERE id_user='$id_user'");
$r = mysqli_fetch_assoc($sql);
?>

<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light" style="font-family: cursive;"><?= $r['nama_album'] ?></h1>
      </div>
      <p>Deskripsi Album :</p><p><?php echo $r['deskripsi'] ?></p>
    </div>
  </section>

  <div class="album py-5 bg-body-tertiary">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php
        include 'koneksi.php';
        $query = mysqli_query($conn, "SELECT * FROM foto WHERE id_album='$id_album'");

        while ($d = mysqli_fetch_assoc($query)) {

          echo '<div class="col">
          <div class="card shadow-sm"><title>Placeholder</title>
          <img src="direktori/' . $d['lokasi_file'] . '" width="100%" height="100%" fill="#55595c"/>
            <div class="card-body">
              <p class="card-text">' . $d['judul_foto'] . '</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">';
          $id_user = $_SESSION['id_user'];
          $id_foto = $d['id_foto'];
          $sql = mysqli_query($conn, "SELECT * FROM like_foto WHERE id_foto='$id_foto' AND id_user='$id_user'");
          $sql2 = mysqli_query($conn, "SELECT * FROM like_foto WHERE id_foto='$id_foto'");
          if (mysqli_num_rows($sql) == 1) {
            echo '<a href="#" type="button" class="btn btn-sm btn-outline-secondary"><i class="bi bi-heart-fill" style="color:red;"></i><br>' . mysqli_num_rows($sql2) . '</a>';
          } else {
            echo '<a href="like.php?id_foto=' . $d['id_foto'] . '" type="button" class="btn btn-sm btn-outline-secondary"><i class="bi bi-heart-fill"></i><br>' . mysqli_num_rows($sql2) . '</a>';
          }
          $sql3 = mysqli_query($conn, "SELECT * FROM komentar_foto WHERE id_foto='$id_foto'");
          echo        '<a type="button" href="detail.php?id_foto=' . $d['id_foto'] . '" class="btn btn-sm btn-outline-secondary"><i class="bi bi-chat-right-text-fill"></i><br>' . mysqli_num_rows($sql3) . '</a>
          <a type="button" href="download.php?id_foto=' . $d['id_foto'] . '" class="btn btn-sm btn-outline-secondary"><i class="bi bi-download"></i></a>
                </div>
                <small class="text-body-secondary">' . $d['tgl_unggah'] . '</small>
              </div>
            </div>
          </div>
        </div>';
        }




        ?>
      </div>
    </div>
  </div>

</main>

<?php include 'footer.php' ?>