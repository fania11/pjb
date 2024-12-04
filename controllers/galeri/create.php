<?php
require_once(__DIR__ . '/../../database/koneksi.php');
$uploadDir = '../file/galery/'; // TEMPAT SIMPAN FILE YANG DIUPLOAD
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}
// VARIABEL UNTUK MENYIMPAN PESAN (VALIDASI)
$judul_galeriErr = $gambarErr = $tanggalErr = "";

// JIKA MENGIRIMKAN DATA DENGAN NAME "SAVE" (TOMBOL SAVE TELAH DI KLIK)
if (isset($_POST['save'])) {
    $judul_galeri = $_POST['judul_galeri'];
    $tanggal = $_POST['tanggal'];
    
    $imgName = $_FILES['gambar']['name'];
        $imgTmp = $_FILES['gambar']['tmp_name'];
        $imgSize = $_FILES['gambar']['size'];
    
    
    if (empty($judul_galeri)) {
            $judul_galeriErr = "judul tidak boleh kosong!";
    }elseif (empty($tanggal)) {
            $tanggalErr = "tanggal tidak boleh kosong!";
    }else {
            $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

			$allowExt  = array('jpeg', 'jpg', 'png', 'gif');

			$Pic = time().'_'.rand(1000,9999).'.'.$imgExt;

			if(in_array($imgExt, $allowExt)){

				if($imgSize < 50000000){
					move_uploaded_file($imgTmp ,$uploadDir.$Pic);
				}else{
					$gambarErr = 'Image too large';
				}
			}else{
				$gambarErr = "gambar tidak boleh kosong!";
			}
            
        }
     
        
        // KONEKSI DATABASE (PASTIKAN $connect SUDAH DIBUAT TERLEBIH DAHULU)
        // Update with the correct path to your database connection file
        if(empty($gambarErr) && empty($judul_galeriErr) && empty($tanggalErr)){
            $query = "INSERT INTO galeri (judul_galeri, gambar, tanggal) VALUES ('$judul_galeri', '$Pic', '$tanggal')";
            
         
        if (mysqli_query($connect, $query)) {
            echo "<div class=\"alert alert-success\" role=\"alert\">Berhasil disimpan</div>";
        } else {
            echo "<div class=\"alert alert-danger\" role=\"alert\">Gagal disimpan: " . mysqli_error($connect) . "</div>";
        }
    }
    
}
?>

<a href="<?= $WEB_CONFIG['base_url'] ?>halaman/galeri.php" class="btn btn-warning mb-3">
    <svg style="width:20px;height:20px" viewBox="0 0 24 24" class="mb-1">
        <path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
    </svg> Back To Data
</a>
    <form action="" method="post" enctype="multipart/form-data">
    <form action="" method="post">
        <div class="form-group">
            <label for="inputJudul_galeri">judul_galeri</label>
            <input type="text" name="judul_galeri" class="form-control" id="inputJudul_galeri" maxlength="40" required autofocus>
            <small class="text-danger"><?= $judul_galeriErr == "" ? "" : "* $judul_galeriErr" ?></small>
        </div>
        <div class="form-group">
            <label for="inputGambar">gambar</label>
            <input type="file" name="gambar" class="form-control" id="gambar" required>
            <small class="text-danger"><?= $gambarErr == "" ? "" : "* $gambarErr" ?></small>
        </div>
        <div class="form-group">
            <label for="inputTanggal">tanggal</label>
            <input type="date" name="tanggal" class="form-control" id="inputTanggal" maxlength="30" required>
            <small class="text-danger"><?= $tanggalErr == "" ? "" : "* $tanggal" ?></small>
        </div>
        <input type="submit" class="btn btn-dark m-1" name="save" value="Save Now!">
    </form>
</div>
