<?php 

//WEB CONFIG
$WEB_CONFIG = [
 'app_name' => 'CRUD PHP MYSQL', 
 'base_url' => 'http://localhost/pjb/'
];

//DATABASE CONFIG
$DB_CONFIG = [
 'host' => 'localhost',
 'user' => 'root',
 'passwd' => '',
 'db_name' => 'nusantara'
];  
//KONEK KE MYSQL
$connect = mysqli_connect($DB_CONFIG['host'], $DB_CONFIG['user'], $DB_CONFIG['passwd'], $DB_CONFIG['db_name']);

 ?>