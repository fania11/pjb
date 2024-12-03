<?php 
$judul_beritaErr = $content_beritaErr = $tanggalErr= $gambarErr= "";
if(isset($_POST['save'])){
    if(!isset($_POST['judul_berita']) || !isset($_POST['content_berita']) || !isset($_POST['tanggal']) || !isset($_POST['gambar'])){
        if($_POST['judul_berita'] == ""){
        $judul_beritaErr = "judul tidak boleh kosong!";
        }
        if($_POST['content_berita'] == ""){
            $content_beritaErr = "content_berita tidak boleh kosong!";
        }
        if($_POST['tanggal'] == ""){
            $tanggalErr = "tanggal tidak boleh kosong!";
        }
        if($_POST['gambar'] == ""){
            $gambarErr = "gambar tidak boleh kosong!";
        }
    }else{
        $id_berita = $_GET['id_berita'];
        $judul_berita = $_POST['judul_berita'];
        $content_berita = $_POST['content_berita'];
        $tanggal = $_POST['tanggal'];
        $gambar = $_POST['gambar'];

        $query = "INSERT INTO berita (judul_berita,content_berita,tanggal,gambar) VALUES('$judul_berita', '$content_berita', '$tanggal', '$gambar )";
        $query = "UPDATE berita SET judul_berita='$judul_berita', content_berita='$content_berita', tanggal='$tanggal', gambar='$gambar' WHERE id_berita=$id_berita";
        if (mysqli_query($connect, $query)) {
            echo "<div class=\"alert alert-success\" role=\"alert\">Berhasil diubah</div>";
        }else{
            echo "<div class=\"alert alert-danger\" role=\"alert\">Gagal diubah</div>";
        }
    }
}

//AMBIL ID PADA URL
$id_berita = $_GET['id_berita'];
$query = "SELECT * FROM berita WHERE id_berita = $id_berita";

//KONEKSI DATABASE DAN EXECUTE QUERY
$result = mysqli_query($connect, $query);

//PENGAMBILAN DATA TERSIMPAN PADA VARIABEL $data
$data = mysqli_fetch_array($result);

 ?>

<a href="<?= $WEB_CONFIG['base_url'] ?>halaman/berita.php" class="btn btn-warning mb-3">
    <svg style="width:20px;height:20px" viewBox="0 0 24 24">
        <path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
    </svg> Back To Data
</a>
<div class="container">
    <form action="" method="post">
        <div class="form-group">
            <label for="inputJudul_berita">judul_berita</label>
            <!-- MENGISIKAN FORM DENGAN VALUE UNTUK UPDATE DATA -->
            <input type="text" name="judul_berita" class="form-control" id="inputJudul_berita" value="<?= $data['judul_berita'] ?>" maxlength="40" required autofocus>
            <small class="text-danger"><?= $judul_beritaErr == "" ? "":"* $judul_beritaErr " ?></small>
        </div>
        <div class="form-group">
            <label for="inputContent_berita">content_berita</label>
            <input type="content_berita" name="content_berita" class="form-control" id="inputContent_berita" value="<?= $data['content_berita'] ?>" maxlength="30" required>
            <small class="text-danger"><?= $content_beritaErr == "" ? "":"* $content_beritaErr" ?></small>
        </div>
        <div class="form-group">
            <label for="inputTanggal">tanggal</label>
            <input type="tanggal" name="tanggal" class="form-control" id="inputTanggal" value="<?= $data['tanggal'] ?>" maxlength="30" required>
            <small class="text-danger"><?= $tanggalErr == "" ? "":"* $tanggalErr" ?></small>
        </div>
        <div class="form-group">
            <label for="inputGambar">gambar</label>
            <input type="gambar" name="gambar" class="form-control" id="inputGambar" value="<?= $data['gambar'] ?>" maxlength="30" required>
            <small class="text-danger"><?= $content_beritaErr == "" ? "":"* $content_beritaErr" ?></small>
        </div>
        <input type="submit" class="btn btn-dark m-1" name="save" value="Update Now!">
    </form>
</div>