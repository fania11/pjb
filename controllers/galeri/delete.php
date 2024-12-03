<?php 

//MENGAMBIL ID DARI URL (METHOD GET)
$delete_id = $_GET['id_galeri'];
$query = "DELETE FROM galeri WHERE id_galeri='$delete_id'";

if(mysqli_query($connect, $query)){
    $_SESSION['flash'] = "<div class=\"alert alert-success\" role=\"alert\">Data telah terhapus</div>";
}else{
    $_SESSION['flash'] = "<div class=\"alert alert-danger\" role=\"alert\">Data gagal terhapus</div>";
}

//REDIRECT KE base_url = http://localhost/cr/
echo "<script>window.location='".$WEB_CONFIG["base_url"]."';</script>";