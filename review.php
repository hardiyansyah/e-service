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
$review= mysql_query("SELECT * FROM review WHERE id_review='$_GET[id]'");
$revi=mysql_fetch_array($review);
$review2= mysql_query("SELECT * FROM naskah WHERE id_naskah='$revi[id_naskah]'");
$revi2=mysql_fetch_array($review2);
$review3= mysql_query("SELECT * FROM hasil_telaah2 WHERE id_review='$revi[id_review]' AND ke='$revi[status]'");
$revi3=mysql_fetch_array($review3);
$review4= mysql_query("SELECT * FROM penilaian WHERE id_review='$revi[id_review]' AND ke='$revi[status]'");
$revi4=mysql_fetch_array($review4);
if ($revi4[nilai]=='diterima_syarat'){
$re="Diterima Dengan Syarat";
}
else if ($revi4[nilai]=='diterima'){
$re="Ditrima";
}
else if ($revi4[nilai]=='ditolak'){
$re="Ditolak";
}
?>
<?php
echo"
<table class='list'>
		
		  <tr><th colspan='3'>HASIL TELAAH NASKAH</th> </tr>
		  
		  <tr><td  width='300px'>JUDUL KARYA</td>     <td colspan='2'  width='500px'> : $revi2[judul] </td></tr>
		 
		   <tr><td>INSTANSI</td>     <td colspan='2'> : $revi2[intansi]</td></tr>
		   <tr><td>SATUAN KERJA</td>     <td colspan='2'> : $revi2[satker]</td></tr>
		    <tr><td>KODE NASKAH</td>     <td colspan='2'>: Hasil Telaah Ke-$revi[status]</td></tr>
			<tr><td colspan='3'>$nbsp</td></tr>

	<tr><th colspan='3'>HASIL PENILAIAN PENELAAH AHLI</th> </tr>
			<tr><td>Jenis terbitan</td><td colspan='2'> : $revi3[jenis_terbitan]</td></tr>
			<tr><td>Tujuan dan lingkup buku ini</td><td colspan='2'>: $revi3[tujuan]</td></tr>
			<tr><td>Gaya struktur dan sistematika penulisan</td>     <td colspan='2'> : $revi3[gaya]</td></tr>
			<tr><td>Pembaca sasaran buku ini</td><td colspan='2'>: $revi3[sasaran]</td></tr>
			<tr><td>Kesesuaian kandungan isi dengan pembaca sasaran</td><td colspan='2'>: $revi3[kesesuaian]</td></tr>
			<tr><td>Kemutakhiran dan ketelitian data yang digunakan</td><td colspan='2'>: $revi3[kemutakhiran]</td></tr>
<tr><th colspan='3'>CATATAN PENILAIAN REVIEWER AHLI</th> </tr>
		  
		  <tr><td>Hasil</td><td>: $re</td><td></td></tr>
		  
		   <tr><td>Catatan</td>     <td colspan='2'> : $revi4[komentar]</td></tr>

          <tr><td colspan='2'></td><th>
          </th></tr>
		  <tr><th colspan='2'></th><th>
		    
          </th></tr>
          </table>
					 ";
					 ?>
</body>
</html>