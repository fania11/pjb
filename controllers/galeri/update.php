<?php 
$judul_galeriErr = $gambarErr = $tanggalErr= "";
if(isset($_POST['save'])){
    if(!isset($_POST['judul_galeri']) || !isset($_POST['gambar']) || !isset($_POST['tanggal'])){
        if($_POST['judul_galeri'] == ""){
        $judul_galeriErr = "judul tidak boleh kosong!";
        }
        if($_POST['gambar'] == ""){
            $gambarErr = "gambar tidak boleh kosong!";
        }
        if($_POST['tanggal'] == ""){
            $tanggalErr = "tanggal tidak boleh kosong!";
        }
    }else{
        $id_galeri = $_GET['id_galeri'];
        $judul_galeri = $_POST['judul_galeri'];
        $gambar = $_POST['gambar'];
        $tanggal = $_POST['tanggal'];

        $query = "INSERT INTO galeri (judul_galeri,gambar,tanggal) VALUES('$judul_galeri', '$gambar', '$tanggal' )";
        $query = "UPDATE galeri SET judul_galeri='$judul_galeri', gambar='$gambar', tanggal='$tanggal' WHERE id_galeri=$id_galeri";
        if (mysqli_query($connect, $query)) {
            echo "<div class=\"alert alert-success\" role=\"alert\">Berhasil diubah</div>";
        }else{
            echo "<div class=\"alert alert-danger\" role=\"alert\">Gagal diubah</div>";
        }
    }
}

//AMBIL ID PADA URL
$id_galeri = $_GET['id_galeri'];
$query = "SELECT * FROM galeri WHERE id_galeri = $id_galeri";

//KONEKSI DATABASE DAN EXECUTE QUERY
$result = mysqli_query($connect, $query);

//PENGAMBILAN DATA TERSIMPAN PADA VARIABEL $data
$data = mysqli_fetch_array($result);

 ?>

<a href="<?= $WEB_CONFIG['base_url'] ?>halaman/galeri.php" class="btn btn-warning mb-3">
    <svg style="width:20px;height:20px" viewBox="0 0 24 24">
        <path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
    </svg> Back To Data
</a>
<div class="container">
    <form action="" method="post">
        <div class="form-group">
            <label for="inputJudul_galeri">Judul_galeri</label>
            <!-- MENGISIKAN FORM DENGAN VALUE UNTUK UPDATE DATA -->
            <input type="text" name="judul_galeri" class="form-control" id="inputJudul_galeri" value="<?= $data['judul_galeri'] ?>" maxlength="40" required autofocus>
            <small class="text-danger"><?= $judul_galeriErr == "" ? "":"* $judul_galeriErr " ?></small>
        </div>
        <div class="form-group">
            <label for="inputGambar">gambar</label>
            <input type="gambar" name="gambar" class="form-control" id="inputGambar" value="<?= $data['gambar'] ?>" maxlength="30" required>
            <small class="text-danger"><?= $gambarErr == "" ? "":"* $gambarErr" ?></small>
        </div>
        <div class="form-group">
            <label for="inputTanggal">tanggal</label>
            <input type="tanggal" name="tanggal" class="form-control" id="inputTanggal" value="<?= $data['tanggal'] ?>" maxlength="30" required>
            <small class="text-danger"><?= $tanggalErr == "" ? "":"* $tanggalErr" ?></small>
        </div>
        <input type="submit" class="btn btn-dark m-1" name="save" value="Update Now!">
    </form>
</div>