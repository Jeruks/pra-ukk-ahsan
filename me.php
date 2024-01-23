<?php include 'header.php' ?>

<main>
<div class="container">
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
      <h2>Profil</h2>
    </div>

    <?php 
    $id_user = $_SESSION['id_user'];
    include 'koneksi.php';
    $query = mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id_user'");
    $d = mysqli_fetch_assoc($query);
    
    
    ?>

    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Profil Tersimpan</span>
          <span class="badge bg-primary rounded-pill"><i class="fa fa-user"></i></span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Nama Lengkap</h6>
              <small class="text-body-secondary"><?= $d['nama_lengkap'] ?></small>
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Username</h6>
              <small class="text-body-secondary"><?= $d['username'] ?></small>
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Email</h6>
              <small class="text-body-secondary"><?= $d['email'] ?></small>
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between bg-body-tertiary">
            <div>
              <h6 class="my-0">Alamat</h6>
              <small><?= $d['alamat'] ?></small>
            </div>
          </li>
        </ul>
        <a href="logout.php" onclick="return Confirm('Yakin ingin keluar?');" class="btn btn-secondary">Sign Out</a>

      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Edit Profil</h4>
        <form class="needs-validation" method="post">
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" id="firstName" name="nama_lengkap" value="<?= $d['nama_lengkap'] ?>" required>
              <div class="invalid-feedback">
                Nama Lengkap harus Valid
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Username</label>
              <input type="text" class="form-control" id="lastName" name="username" value="<?= $d['username'] ?>" required>
              <div class="invalid-feedback">
                Username harus valid.
              </div>
            </div>

            <div class="col-12">
              <label for="username" class="form-label">Email</label>
              <div class="input-group has-validation">
                <span class="input-group-text">@</span>
                <input type="email" class="form-control" name="email" id="username" value="<?= $d['email'] ?>" required>
              <div class="invalid-feedback">
                  Email Harus Diisi!
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Alamat <span class="text-body-secondary">(Optional)</span></label>
              <input type="text" class="form-control" name="alamat" value="<?= $d['alamat'] ?>" id="email">
              <div class="invalid-feedback">
                Alamat boleh diisi boleh tidak.
              </div>
            </div>

          <hr class="my-4">

          <input class="w-100 btn btn-primary btn-lg" name="simpan" type="submit" value="Simpan">
        </form>
      </div>
    </div>
</main>

<?php 

if(isset($_POST['simpan'])) {
    include 'koneksi.php';

    $username = $_POST['username'];
    $email = $_POST['email'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $alamat = $_POST['alamat'];
    $id_user = $_SESSION['id_user'];

    $simpan = $_POST['simpan'];

    mysqli_query($conn, "UPDATE user SET username='$username', email='$email', nama_lengkap='$nama_lengkap', alamat='$alamat' WHERE id_user='$id_user'");

    echo "<script>alert('Berhasil menyimpan!');window.location.href='me.php';</script>";
}



?>





<?php include 'footer.php' ?>