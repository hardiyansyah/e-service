<?php
session_start();
 if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses hal, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../config/koneksi.php";
include "../../config/library.php";
include "../../config/fungsi_thumb.php";
$tgl=date('y-m-d');
$kirim=D;
$query1="INSERT INTO hasil_telaah2(id_review,ke,jenis_terbitan,tujuan,gaya,sasaran,kesesuaian,kemutakhiran)
					                VALUES('$_POST[id]',
									'$_POST[ke]',
									'$_POST[jenis]',
									'$_POST[tujuan]',
									'$_POST[gaya]',
									'$_POST[sasaran]',
									'$_POST[kesesuaian]',
									'$_POST[kemutakhiran]')";
$query2="INSERT INTO penilaian (id_review,ke,nilai,komentar)
								VALUES('$_POST[id]','$_POST[ke]','$_POST[rekomendasi]','$_POST[catatan]')";
$query3="UPDATE review SET kirim= '$kirim'
							WHERE id_review = '$_POST[id]'";

mysql_query($query1) or die("Gagal menyimpan data"); 
mysql_query($query2) or die("Gagal menyimpan data"); 
mysql_query($query3) or die("Gagal menyimpan data"); 
header("location:../../media.php?hal=review");
}


?>
