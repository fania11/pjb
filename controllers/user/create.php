<?php
// VARIABEL UNTUK MENYIMPAN PESAN (VALIDASI)
$nama_userErr = $teleponErr = $alamat_userErr = $usernameErr = $passwordErr = "";

// JIKA MENGIRIMKAN DATA DENGAN NAME "SAVE" (TOMBOL SAVE TELAH DI KLIK)
if (isset($_POST['save'])) {
    // JIKA DATA ADA YANG KOSONG
    if (
        empty($_POST['nama_user']) || 
        empty($_POST['telepon']) || 
        empty($_POST['alamat_user']) || 
        empty($_POST['username']) || 
        empty($_POST['password'])
    ) {
        if (empty($_POST['nama_user'])) {
            $nama_userErr = "Nama tidak boleh kosong!";
        }
        if (empty($_POST['telepon'])) {
            $teleponErr = "Telepon tidak boleh kosong!";
        }
        if (empty($_POST['alamat_user'])) {
            $alamat_userErr = "Alamat tidak boleh kosong!";
        }
        if (empty($_POST['username'])) {
            $usernameErr = "Username tidak boleh kosong!";
        }
        if (empty($_POST['password'])) {
            $passwordErr = "Password tidak boleh kosong!";
        }
    } else {
        // JIKA SEMUA FORM TERISI
        $nama_user = $_POST['nama_user'];
        $telepon = $_POST['telepon'];
        $alamat_user = $_POST['alamat_user'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        // KONEKSI DATABASE (PASTIKAN $connect SUDAH DIBUAT TERLEBIH DAHULU)
        $query = "INSERT INTO user (nama_user, telepon, alamat_user, username, password) 
                  VALUES ('$nama_user', '$telepon', '$alamat_user', '$username', '$password')";

        if (mysqli_query($connect, $query)) {
            echo "<div class=\"alert alert-success\" role=\"alert\">Berhasil disimpan</div>";
        } else {
            echo "<div class=\"alert alert-danger\" role=\"alert\">Gagal disimpan: " . mysqli_error($connect) . "</div>";
        }
    }
}
?>

<a href="<?= $WEB_CONFIG['base_url'] ?>halaman/user.php" class="btn btn-warning mb-3">
    <svg style="width:20px;height:20px" viewBox="0 0 24 24" class="mb-1">
        <path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
    </svg> Back To Data
</a>
<div class="container">
    <form action="" method="post">
        <div class="form-group">
            <label for="inputNama_user">Nama</label>
            <input type="text" name="nama_user" class="form-control" id="inputNama_user" maxlength="40" required autofocus>
            <small class="text-danger"><?= $nama_userErr == "" ? "" : "* $nama_userErr" ?></small>
        </div>
        <div class="form-group">
            <label for="inputTelepon">Telepon</label>
            <input type="text" name="telepon" class="form-control" id="inputTelepon" maxlength="30" required>
            <small class="text-danger"><?= $teleponErr == "" ? "" : "* $teleponErr" ?></small>
        </div>
        <div class="form-group">
            <label for="inputAlamat_user">Alamat</label>
            <input type="text" name="alamat_user" class="form-control" id="inputAlamat_user" maxlength="30" required>
            <small class="text-danger"><?= $alamat_userErr == "" ? "" : "* $alamat_userErr" ?></small>
        </div>
        <div class="form-group">
            <label for="inputUsername">Username</label>
            <input type="text" name="username" class="form-control" id="inputUsername" maxlength="30" required>
            <small class="text-danger"><?= $usernameErr == "" ? "" : "* $usernameErr" ?></small>
        </div>
        <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" name="password" class="form-control" id="inputPassword" maxlength="30" minlength="3" required>
            <small class="text-danger"><?= $passwordErr == "" ? "" : "* $passwordErr" ?></small>
        </div>
        <input type="submit" class="btn btn-dark m-1" name="save" value="Save Now!">
    </form>
</div>
