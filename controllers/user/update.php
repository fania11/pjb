<?php 
$nama_userErr = $teleponErr = $alamat_userErr = $usernameErr = $passwordErr = "";
if(isset($_POST['save'])){
    if(!isset($_POST['nama_user']) || !isset($_POST['telepon']) || !isset($_POST['alamat_user']) || !isset($_POST['username']) || !isset($_POST['password'])){
        if($_POST['nama_user'] == ""){
        $nama_userErr = "Nama tidak boleh kosong!";
        }
        if($_POST['telepon'] == ""){
            $teleponErr = "Username tidak boleh kosong!";
        }
        if($_POST['alamat_user'] == ""){
            $alamat_userErr = "alamat tidak boleh kosong!";
        }
        if($_POST['username'] == ""){
            $usernameErr = "username tidak boleh kosong!";
        }
        if($_POST['password'] == ""){
            $passwordErr = "password tidak boleh kosong!";
        }
    }else{
        $id_user = $_GET['id_user'];
        $nama_user = $_POST['nama_user'];
        $telepon = $_POST['telepon'];
        $alamat_user = $_POST['alamat_user'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "INSERT INTO user (nama_user,telepon,alamat_user,username,password) VALUES('$nama_user', '$telepon', '$alamat_user', '$username', '$password' )";
        $query = "UPDATE user SET nama_user='$nama_user', telepon='$telepon', alamat_user='$alamat_user', username='$username', password='$password' WHERE id_user=$id_user";
        if (mysqli_query($connect, $query)) {
            echo "<div class=\"alert alert-success\" role=\"alert\">Berhasil diubah</div>";
        }else{
            echo "<div class=\"alert alert-danger\" role=\"alert\">Gagal diubah</div>";
        }
    }
}

//AMBIL ID PADA URL
$id_user = $_GET['id_user'];
$query = "SELECT * FROM user WHERE id_user = $id_user";

//KONEKSI DATABASE DAN EXECUTE QUERY
$result = mysqli_query($connect, $query);

//PENGAMBILAN DATA TERSIMPAN PADA VARIABEL $data
$data = mysqli_fetch_array($result);

 ?>

<a href="<?= $WEB_CONFIG['base_url'] ?>halaman/user.php" class="btn btn-warning mb-3">
    <svg style="width:20px;height:20px" viewBox="0 0 24 24">
        <path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
    </svg> Back To Data
</a>
<div class="container">
    <form action="" method="post">
        <div class="form-group">
            <label for="inputNama_user">Nama</label>
            <!-- MENGISIKAN FORM DENGAN VALUE UNTUK UPDATE DATA -->
            <input type="text" name="nama_user" class="form-control" id="inputNama_user" value="<?= $data['nama_user'] ?>" maxlength="40" required autofocus>
            <small class="text-danger"><?= $nama_userErr == "" ? "":"* $nama_userErr " ?></small>
        </div>
        <div class="form-group">
            <label for="inputTelepon">Telepon</label>
            <input type="telepon" name="telepon" class="form-control" id="inputTelepon" value="<?= $data['telepon'] ?>" maxlength="30" required>
            <small class="text-danger"><?= $teleponErr == "" ? "":"* $teleponErr" ?></small>
        </div>
        <div class="form-group">
            <label for="inputAlamat_user">Alamat_user</label>
            <input type="alamat_user" name="alamat_user" class="form-control" id="inputAlamat_user" value="<?= $data['alamat_user'] ?>" maxlength="30" required>
            <small class="text-danger"><?= $alamat_userErr == "" ? "":"* $alamat_userErr" ?></small>
        </div>
        <div class="form-group">
            <label for="inputUsername">Username</label>
            <input type="username" name="username" class="form-control" id="inputUsername" value="<?= $data['username'] ?>" maxlength="30" required>
            <small class="text-danger"><?= $usernameErr == "" ? "":"* $usernameErr" ?></small>
        </div>
        <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" name="password" class="form-control" id="inputPassword" value="<?= $data['password'] ?>" maxlength="30" minlength="3" required>
            <small class="text-danger"><?= $passwordErr == "" ? "":"* $passwordErr" ?></small>
        </div>
        <input type="submit" class="btn btn-dark m-1" name="save" value="Update Now!">
    </form>
</div>