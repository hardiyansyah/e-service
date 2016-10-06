<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/fungsi_seo.php";

$tgl=date('Y-m-d H:i:s');
$stats='proses';
// Hapus 

$query1="UPDATE naskah SET 
     reviewer1= '$_POST[rev]',
      reviewer2= '$_POST[rev2]',
   status= '$stats'
  WHERE id_naskah = '$_POST[id]'";
  
$query2="INSERT INTO pemberitahuan(id_naskah,id_users,isi,tanggal,baca,link)
						VALUES('$_POST[id]',
						'$_POST[rev]',
						'$_POST[isi]',
						'$tgl',
						'$_POST[baca]',
						'$_POST[link]'
								   )";

 mysql_query($query1) or die("Gagal menyimpan data");
 mysql_query($query2) or die("Gagal menyimpan data");
  header("location:../../../media.php?hal=dewan-naskah&id=$stats");

}
?>
