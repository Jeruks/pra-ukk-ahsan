<?php include 'header.php' ?>

<main>
  <div class="container">
    <div class="py-5 text-center">
    </div>

    <?php
    $id_foto = $_GET['id_foto'];
    include 'koneksi.php';
    $query = mysqli_query($conn, "SELECT * FROM foto INNER JOIN user ON foto.id_user = user.id_user WHERE id_foto='$id_foto'");
    $d = mysqli_fetch_assoc($query);


    ?>

    <div class="row g-5">
      <div class="col-md-5 col-lg-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Post</span>
          <span class="badge bg-primary rounded-pill"><i class="fa fa-user"></i></span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Nama Pengunggah</h6>
              <small class="text-body-secondary"><?= $d['nama_lengkap'] ?></small>
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Deskripsi Foto</h6>
              <small class="text-body-secondary"><?= $d['deskripsi_foto'] ?></small>
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <?php
              $id_user = $_SESSION['id_user'];
              $sql = mysqli_query($conn, "SELECT * FROM like_foto WHERE id_foto='$id_foto' AND id_user='$id_user'");

              $sql2 = mysqli_query($conn, "SELECT * FROM like_foto WHERE id_foto='$id_foto'");
              if (mysqli_num_rows($sql) == 1) {
                echo '<a href="#" type="button" class="btn btn-sm btn-outline-secondary"><i class="bi bi-heart-fill" style="color:red;"></i><br>' . mysqli_num_rows($sql2) . '</a>';
              } else {
                echo '<a href="like.php?id_foto=' . $d['id_foto'] . '" type="button" class="btn btn-sm btn-outline-secondary"><i class="bi bi-heart-fill"></i><br>' . mysqli_num_rows($sql2) . '</a>';
              }
              ?>
            </div>
          </li>
        </ul>
        <header>Komentar</header>
        <!-- KOMENTAR -->
        <form class="card p-2" method="post">
          <div class="input-group">
            <input type="text" class="form-control" name="isi_komentar" placeholder="Isi komentar">
            <button type="submit" name="komen" class="btn btn-secondary">Kirim</button>
          </div>
        </form>
        <?php 
        include 'koneksi.php';

        if(isset($_POST['komen'])) {

        $id_foto = $_GET['id_foto'];
        $id_user = $_SESSION['id_user'];
        $isi_komentar = $_POST['isi_komentar'];
        $tgl_komentar = date("Y-m-d");

        mysqli_query($conn, "INSERT INTO komentar_foto VALUES ('','$id_foto','$id_user','$isi_komentar','$tgl_komentar')");

        echo '<script>window.location("detail.php")</script>';
        
        }
        
        ?>


        <!-- ISI KOMENTAR -->
        <ul class="list-group mb-3">
          <?php 
          include 'koneksi.php';
          $komen = mysqli_query($conn, "SELECT * FROM komentar_foto INNER JOIN user ON komentar_foto.id_user = user.id_user WHERE id_foto='$id_foto'");
          $r = mysqli_fetch_assoc($komen);
          if(mysqli_num_rows($komen) == 0){
            echo '<h6 class="my-0">Belum ada komentar...</h6>
            <small class="text-body-secondary">Jadilah yang pertama memberikan komentar!</small>';
          }else{
            while($r=mysqli_fetch_assoc($komen)){
              echo '<li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0 text-decoration-underline">'.$r['username'].'</h6>
              <small class="text-body-secondary">'.$r['isi_komentar'].'</small>
            </div>
            <span class="text-body-secondary">'.$r['tgl_komentar'].'</span>
          </li>';
            }
            
          }

          
          ?>
          
          </ul>

      </div>
      <div class="col-md-4 col-lg-8">
        <h4 class="mb-3"><b><?= $d['judul_foto'] ?></b></h4>
        <img src="direktori/<?= $d['lokasi_file'] ?>" width="60%" class="rounded float-start" alt="...">
      </div>
    </div>
</main>




<?php include 'footer.php' ?>