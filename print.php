<?php
error_reporting (0);
include "config/koneksi.php";
include "config/fungsi_indotgl.php";
?>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="styles.css" rel="stylesheet" type="text/css">

</style>
<script type="text/javascript">
function cetak()
{
window.print();
window.close();
}
</script> 
<style type="text/css">
table {
	font: 15px/30px Arial;
	font size: 16px;
	width: 800px;
	margin:0 auto;
	}

th {
	padding: 0 0.5em;
	text-align: center;
	background-color:white
	}
td {
	padding: 0 0.5em;
	background-color:white;
	}
h1 {
	color:white;
	font:22px "Trebuchet MS";
	text-align:center;
}
</style>
 
</head>
<body>
<body onLoad="window.print()">
   <?php

$naskah= mysql_query("SELECT * FROM naskah WHERE id_naskah='$_GET[id]'");
$nas=mysql_fetch_array($naskah);
$users= mysql_query("SELECT * FROM users WHERE id_users='$nas[id_users]'");
$user=mysql_fetch_array($users);
$kepengarangan= mysql_query("SELECT * FROM kepengarangan WHERE id_naskah='$nas[id_users]'");
$kep=mysql_fetch_array($kepengarangan);
$rekomendasi= mysql_query("SELECT * FROM rekomendasi WHERE id_naskah='$nas[id_users]'");
$rek=mysql_fetch_array($rekomendasi);
?>
<?php
echo"
<table class='list'>
		
<tr><th colspan='3'>DATA PENULIS</th> </tr>
	<tr><td  width='300px'>Nama</td>     <td colspan='2'  width='500px'> : $user[nama_lengkap] </td></tr>
	<tr><td>NIP</td>     <td colspan='2'> : $user[nip]</td></tr>
	<tr><td>Alamat</td>     <td colspan='2'> : $user[alamat]</td></tr>
	<tr><td>Email</td>     <td colspan='2'> : $user[email]</td></tr>
	<tr><td>Riwayat Pendidikan</td>     <td colspan='2'>: $user[rwy_pendidikan]</td></tr>
	<tr><td colspan='3'>$nbsp</td></tr>

<tr><th colspan='3'>DATA NASKAH TERBITAN</th> </tr>
	<tr><td>Judul Naskah</td><td colspan='2'> : $nas[judul]</td></tr>
	<tr><td>Instansi</td><td colspan='2'>: $nas[intansi]</td></tr>
	<tr><td>Satuan Kerja</td>     <td colspan='2'> : $nas[satker]</td></tr>
	<tr><td>Sinopsis</td><td colspan='2'>: $nas[abstrak]</td></tr>
	<tr><td>Jumlah Halaman</td><td colspan='2'>: $nas[halaman]</td></tr>
	<tr><td>Tanggal Upload</td><td colspan='2'>: $nas[tanggal]</td></tr> 
	<tr><td>Jenis Terbitan</td><td colspan='2'>: $nas[jenis_terbitan]</td></tr> 
	<tr><td>Kepengarangan</td><td colspan='2'>: $nas[kepengarangan]</td></tr>
	<tr><td>Uraian Buku</td><td colspan='2'>: $nas[uraian_buku]</td></tr>   
    <tr><td>Keistimewaan</td><td colspan='2'>: $nas[keistimewaan]</td></tr>
    <tr><td>Sasaran Pembaca</td><td colspan='2'>: $nas[sasaran_pembaca]</td></tr>
    <tr><td>Ketertarikan Buku</td><td colspan='2'>: $nas[ketertarikan]</td></tr>  
    <tr><td>Daftar Email / Website</td><td colspan='2'>: $nas[daftar_email_web]</td></tr>
    <tr><td>Cara Memasarkan Buku</td><td colspan='2'>: $nas[cara_memasarkan]</td></tr>
    <tr><td>Perkiraan Cetakan</td><td colspan='2'>: $nas[perkiraan_cetak]</td></tr>      
          </th></tr>
          </table>
					 ";
					 ?>
</body>
</html>