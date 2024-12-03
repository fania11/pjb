<?php
// VARIABEL UNTUK MENYIMPAN PESAN (VALIDASI)
$judul_beritaErr = $content_beritaErr = $tanggalErr = $gambarErr = "";

// JIKA MENGIRIMKAN DATA DENGAN NAME "SAVE" (TOMBOL SAVE TELAH DI KLIK)
if (isset($_POST['save'])) {
    // JIKA DATA ADA YANG KOSONG
    if (
        empty($_POST['judul_berita']) || 
        empty($_POST['content_berita']) || 
        empty($_POST['tanggal']) ||
        empty($_POST['gambar'])
    ) {
        if (empty($_POST['judul_berita'])) {
            $judul_beritaErr = "judul tidak boleh kosong!";
        }
        if (empty($_POST['content_berita'])) {
            $content_beritaErr = "content_berita tidak boleh kosong!";
        }
        if (empty($_POST['tanggal'])) {
            $tanggalErr = "tanggal tidak boleh kosong!";
        }
        if (empty($_POST['gambar'])) {
            $gambarErr = "gambar tidak boleh kosong!";
        }
    } else {
        // JIKA SEMUA FORM TERISI
        $judul_berita = $_POST['judul_berita'];
        $content_berita = $_POST['content_berita'];
        $tanggal = $_POST['tanggal'];
        $gambar = $_POST['gambar'];


        // KONEKSI DATABASE (PASTIKAN $connect SUDAH DIBUAT TERLEBIH DAHULU)
        $query = "INSERT INTO berita (judul_berita, content_berita, tanggal, gambar) 
                  VALUES ('$judul_berita', '$content_berita', '$tanggal', '$gambar')";

        if (mysqli_query($connect, $query)) {
            echo "<div class=\"alert alert-success\" role=\"alert\">Berhasil disimpan</div>";
        } else {
            echo "<div class=\"alert alert-danger\" role=\"alert\">Gagal disimpan: " . mysqli_error($connect) . "</div>";
        }
    }
}
?>

<a href="<?= $WEB_CONFIG['base_url'] ?>halaman/berita.php" class="btn btn-warning mb-3">
    <svg style="width:20px;height:20px" viewBox="0 0 24 24" class="mb-1">
        <path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
    </svg> Back To Data
</a>
<div class="container">
    <form action="" method="post">
        <div class="form-group">
            <label for="inputJudul_berita">judul_berita</label>
            <input type="text" name="judul_berita" class="form-control" id="inputJudul_berita" maxlength="40" required autofocus>
            <small class="text-danger"><?= $judul_beritaErr == "" ? "" : "* $judul_beritaErr" ?></small>
        </div>
        <div class="form-group">
            <label for="inputContent_berita">content_berita</label>
            <input type="text" name="content_berita" class="form-control" id="inputContent_berita" maxlength="30" required>
            <small class="text-danger"><?= $content_beritaErr == "" ? "" : "* $content_beritaErr" ?></small>
        </div>
        <div class="form-group">
            <label for="inputTanggal">tanggal</label>
            <input type="date" name="tanggal" class="form-control" id="inputTanggal" maxlength="30" required>
            <small class="text-danger"><?= $tanggalErr == "" ? "" : "* $tanggal" ?></small>
        </div>
        <div class="form-group">
            <label for="inputGambar">gambar</label>
            <input type="text" name="gambar" class="form-control" id="inputGambar" maxlength="30" required>
            <small class="text-danger"><?= $gambarErr == "" ? "" : "* $gambarErr" ?></small>
        </div>
        <input type="submit" class="btn btn-dark m-1" name="save" value="Save Now!">
    </form>
</div>
