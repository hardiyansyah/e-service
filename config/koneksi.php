<?php
// $server = "localhost";
// $username = "k7389950_lipi";
// $password = "wisasi008";
// $database = "k7389950_lipi";
// $site="http://lipi.wisasi.com/";

$server = "localhost";
$username = "root";
$password = "";
$database = "me_e-service";
$site="http://localhost/me/e-service/";

// $server = "localhost";
// $username = "lipipress";
// $password = "wsT895EIh0G9Wz7V";
// $database = "e_service_";
// $site="http://e-service.lipipress.lipi.go.id/";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
?>
