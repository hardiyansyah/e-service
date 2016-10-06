<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses hal, Anda harus login <br>";
  echo "<a href=../../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";


$query1="UPDATE pemberitahuan SET baca= '$_POST[baca]'
						WHERE id_info = '$_POST[id]'";

  mysql_query($query1) or die("Gagal menyimpan data"); 
 
  header("location:../../../media.php$_POST[link]");

  }
?>
