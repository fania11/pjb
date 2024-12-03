<?php
// VARIABEL UNTUK MENYIMPAN PESAN (VALIDASI)
$judul_galeriErr = $gambarErr = $tanggalErr = "";

// JIKA MENGIRIMKAN DATA DENGAN NAME "SAVE" (TOMBOL SAVE TELAH DI KLIK)
if (isset($_POST['save'])) {
    // JIKA DATA ADA YANG KOSONG
    if (
        empty($_POST['judul_galeri']) || 
        empty($_POST['gambar']) || 
        empty($_POST['tanggal'])
    ) {
        if (empty($_POST['judul_galeri'])) {
            $judul_galeriErr = "judul tidak boleh kosong!";
        }
        if (empty($_POST['gambar'])) {
            $gambarErr = "gambar tidak boleh kosong!";
        }
        if (empty($_POST['tanggal'])) {
            $tanggalErr = "tanggal tidak boleh kosong!";
        }
    } else {
        // JIKA SEMUA FORM TERISI
        $judul_galeri = $_POST['judul_galeri'];
        $gambar = $_POST['gambar'];
        $tanggal = $_POST['tanggal'];

        // KONEKSI DATABASE (PASTIKAN $connect SUDAH DIBUAT TERLEBIH DAHULU)
        $query = "INSERT INTO galeri (judul_galeri, gambar, tanggal) 
                  VALUES ('$judul_galeri', '$gambar', '$tanggal')";

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
<div class="container">
    <form action="" method="post">
        <div class="form-group">
            <label for="inputJudul_galeri">judul_galeri</label>
            <input type="text" name="judul_galeri" class="form-control" id="inputJudul_galeri" maxlength="40" required autofocus>
            <small class="text-danger"><?= $judul_galeriErr == "" ? "" : "* $judul_galeriErr" ?></small>
        </div>
        <div class="form-group">
            <label for="inputGambar">gambar</label>
            <input type="text" name="gambar" class="form-control" id="inputGambar" maxlength="30" required>
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
