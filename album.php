<?php include 'header.php' ?>

<main>

    <div class="album py-5 bg-body-tertiary">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php
                $id_user = $_SESSION['id_user'];
                include 'koneksi.php';
                $sql = "SELECT * FROM album WHERE id_user = '$id_user'";
                $query = mysqli_query($conn, $sql);
                if (mysqli_num_rows($query) == 0) {
                    echo '<i>Belum ada album di sini....</i>';
                } else {
                    while ($d = mysqli_fetch_assoc($query)) {
                        echo '<a href="detail_album.php?id_album='.$d['id_album'].'" style="text-decoration: none;"><div class="col">
                <div class="card shadow-sm">
                  <h1><i class="bi bi-folder"></i></h1>
                  <div class="card-body">
                    <p class="card-text">' . $d['nama_album'] . '</p>
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="edit_album.php?id_album='.$d['id_album'].'">Ubah</a></li>
                      <li><a class="dropdown-item" href="hapus.php?id_album='.$d['id_album'].'">Hapus</a></li>
                    </ul>
                  </div>
                      <small class="text-body-secondary">' . $d['tgl_dibuat'] . '</small>
                    </div>
                  </div>
                </div>
              </div>
              </a>';
                    }
                }

                ?>
            </div>
            <div align="center" class="pw-bold">
                <a href="tambah_album.php">
                    <i class="fa fa-plus fa-3x"></i>
                    <p align="center">Tambah</p>
                </a>
            </div>
        </div>
    </div>

</main>

<?php include 'footer.php' ?>