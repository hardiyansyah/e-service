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

  mysql_query("INSERT INTO matriks(id_naskah,id_reviewer,revisi_ke,no,bab,sub_bab,halaman,catatan,hasil_revisi
                                  )
					                VALUES('$_POST[id]',
					                	'$_POST[id_reviewer]',
									'$_POST[ke]',
									'$_POST[id]',
									'$_POST[bab]',
									'$_POST[subbab]',
									'$_POST[hal]',
									'$_POST[catatan]',
									'$_POST[hasil]')");
  header("location:../../../media.php?hal=penulis-telaah-matriks&id=$_POST[id]&ke=$_POST[ke]&ref=$_POST[id_reviewer]");
}
?>
