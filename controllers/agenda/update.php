<?php 
$judul_agendaErr = "";
if(isset($_POST['save'])){
    if(!isset($_POST['judul_agenda'])){
        if($_POST['judul_agenda'] == ""){
        $judul_agendaErr = "judul tidak boleh kosong!";
        }
    }else{
        $id_agenda = $_GET['id_agenda'];
        $judul_agenda = $_POST['judul_agenda'];

        $query = "INSERT INTO agenda (judul_agenda) VALUES('$judul_agenda')";
        $query = "UPDATE agenda SET judul_agenda='$judul_agenda' WHERE id_agenda=$id_agenda";
        if (mysqli_query($connect, $query)) {
            echo "<div class=\"alert alert-success\" role=\"alert\">Berhasil diubah</div>";
        }else{
            echo "<div class=\"alert alert-danger\" role=\"alert\">Gagal diubah</div>";
        }
    }
}

//AMBIL ID PADA URL
$id_agenda = $_GET['id_agenda'];
$query = "SELECT * FROM agenda WHERE id_agenda = $id_agenda";

//KONEKSI DATABASE DAN EXECUTE QUERY
$result = mysqli_query($connect, $query);

//PENGAMBILAN DATA TERSIMPAN PADA VARIABEL $data
$data = mysqli_fetch_array($result);

 ?>

<a href="<?= $WEB_CONFIG['base_url'] ?>halaman/agenda.php" class="btn btn-warning mb-3">
    <svg style="width:20px;height:20px" viewBox="0 0 24 24">
        <path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
    </svg> Back To Data
</a>
<div class="container">
    <form action="" method="post">
        <div class="form-group">
            <label for="inputJudul_agenda">judul_agenda</label>
            <!-- MENGISIKAN FORM DENGAN VALUE UNTUK UPDATE DATA -->
            <input type="text" name="judul_agenda" class="form-control" id="inputJudul_agenda" value="<?= $data['judul_agenda'] ?>" maxlength="40" required autofocus>
            <small class="text-danger"><?= $judul_agendaErr == "" ? "":"* $judul_agendaErr " ?></small>
        </div>
        <input type="submit" class="btn btn-dark m-1" name="save" value="Update Now!">
    </form>
</div>