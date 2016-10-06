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
// Input telaah

  mysql_query("INSERT INTO hasil_telaah(id_review,ke,reviewer1,tgl_mulai,tgl_selesai,usulan_nilai
                                  )
					                VALUES('$_POST[id]',
									'$_POST[kode_naskah]',
									'$_POST[id_reviewer]',
									'$_POST[tgl_mulai]',
									'$tgl',
									'$_POST[usulan]')");
  header("location:../../media.php?hal=telaah2&id=$_POST[id]");

}
?>
