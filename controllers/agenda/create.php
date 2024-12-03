<?php
// VARIABEL UNTUK MENYIMPAN PESAN (VALIDASI)
$judul_agendaErr = "";

// JIKA MENGIRIMKAN DATA DENGAN NAME "SAVE" (TOMBOL SAVE TELAH DI KLIK)
if (isset($_POST['save'])) {
    // JIKA DATA ADA YANG KOSONG
    if (
        empty($_POST['judul_agenda'])
    ) {
        if (empty($_POST['judul_agenda'])) {
            $judul_agendaErr = "judul tidak boleh kosong!";
        }
    } else {
        // JIKA SEMUA FORM TERISI
        $judul_agenda = $_POST['judul_agenda'];


        // KONEKSI DATABASE (PASTIKAN $connect SUDAH DIBUAT TERLEBIH DAHULU)
        $query = "INSERT INTO agenda (judul_agenda) 
                  VALUES ('$judul_agenda')";

        if (mysqli_query($connect, $query)) {
            echo "<div class=\"alert alert-success\" role=\"alert\">Berhasil disimpan</div>";
        } else {
            echo "<div class=\"alert alert-danger\" role=\"alert\">Gagal disimpan: " . mysqli_error($connect) . "</div>";
        }
    }
}
?>

<a href="<?= $WEB_CONFIG['base_url'] ?>halaman/agenda.php" class="btn btn-warning mb-3">
    <svg style="width:20px;height:20px" viewBox="0 0 24 24" class="mb-1">
        <path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
    </svg> Back To Data
</a>
<div class="container">
    <form action="" method="post">
        <div class="form-group">
            <label for="inputJudul_agenda">judul_agenda</label>
            <input type="text" name="judul_agenda" class="form-control" id="inputJudul_agenda" maxlength="40" required autofocus>
            <small class="text-danger"><?= $judul_agendaErr == "" ? "" : "* $judul_agendaErr" ?></small>
        </div>
        <input type="submit" class="btn btn-dark m-1" name="save" value="Save Now!">
    </form>
</div>
