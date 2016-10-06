<?php
session_start();
 if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses hal, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";
$tgl=date('Y-m-d H:i:s');
// Input telaah
  mysql_query("INSERT INTO hasil_telaah(id_review,ke,id_reviewer,tanggal,usulan_nilai) VALUES
										('$_POST[id_review]','$_POST[kode_naskah]','$_POST[id_reviewer]','$tgl','$_POST[usulan]')");
  header("location:../../../media.php?hal=reviewer-telaah2&id=$_POST[id_naskah]&review=$_POST[id_review]&revisi=$_POST[id_rev]");

}
?>
