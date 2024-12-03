<?php 

//MENGAMBIL ID DARI URL (METHOD GET)
$delete_id = $_GET['id_agenda'];
$query = "DELETE FROM agenda WHERE id_agenda='$delete_id'";

if(mysqli_query($connect, $query)){
    $_SESSION['flash'] = "<div class=\"alert alert-success\" role=\"alert\">Data telah terhapus</div>";
}else{
    $_SESSION['flash'] = "<div class=\"alert alert-danger\" role=\"alert\">Data gagal terhapus</div>";
}

//REDIRECT KE base_url = /
echo "<script>window.location='".$WEB_CONFIG["base_url"]."';</script>";