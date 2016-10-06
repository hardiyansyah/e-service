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
	font: 12px/17px Arial;
	font size: 16px;
	width: 800px;
	margin:0 auto;
	}

th {
	border: 1px solid black;
	padding: 0 0.5em;
	text-align: center;
	background-color:#1994c3
	}
td {
	border: 1px solid black;
	padding: 0 0.5em;
	background-color:#d6eef7;
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
$tampilnaskah= mysql_query("SELECT * FROM naskah WHERE id_naskah ='$_GET[id]'");
$tn=mysql_fetch_array($tampilnaskah);
$tampiluser= mysql_query("SELECT * FROM users WHERE id_users='$tn[id_users]'");
$tu=mysql_fetch_array($tampiluser);

?>
<?php
echo"
<table>
<tr>
 <th colspan='3' style='border: 1px solid white;background-color:white;'>MATRIKS PERBAIKAN NASKAH HASIL REVISI
					 </th>
					 </tr>
<tr>
 <td style='border: 1px solid white;background-color:white;'>Judul Buku</td>
 <td style='border: 1px solid white; background-color:white;'>:</td>
 <td style='border: 1px solid white; background-color:white;'>$tn[judul]</td>
 </tr>
 <tr>
 <td style='border: 1px solid white;background-color:white;'>Instansi</td>
 <td style='border: 1px solid white; background-color:white;'>:</td>
 <td style='border: 1px solid white; background-color:white;'>$tn[intansi]</td>
 </tr>
 <tr>
 <td style='border: 1px solid white;background-color:white;'>Satuan Kerja</td>
 <td style='border: 1px solid white; background-color:white;'>:</td>
 <td style='border: 1px solid white; background-color:white;'>$tn[satker]</td>
 </tr>
 <!--<tr>
 <td style='border: 1px solid white;background-color:white;'>Penulis</td>
 <td style='border: 1px solid white;background-color:white;'>:</td>
 <td style='border: 1px solid white;background-color:white;'>$tu[nama_lengkap]</td>
 </tr>-->
 <tr>
 <td style='border: 1px solid white;background-color:white;' colspan='3'>
 <table width='800px' style='border-collapse: collapse;'>
<tr>
<th width='20px'>No.</th>
<th width='30px'>Bab</th>
<th width='100px'>Sub Bab</th>
<th width='20px'>Halaman</th>
<th width='315px'>Catatan Koreksi</th>
<th width='315px'>Hasil Revisi</th>
 </tr>";
 $mt=mysql_query("SELECT * FROM matriks WHERE id_naskah='$_GET[id]' AND revisi_ke='$_GET[ke]' AND id_reviewer='$_GET[ref]'");
 $no = $posisi+1;
while($rnn=mysql_fetch_array($mt)){
echo"<tr>
									<td style='font: 8px/12px Arial;text-align:center;'>$no</td>
									<td style='font: 8px/12px Arial;text-align:center;'>$rnn[bab]</td>
									<td style='font: 8px/12px Arial;text-align:center;'>$rnn[sub_bab]</td>
									<td style='font: 8px/12px Arial;text-align:center;'>$rnn[halaman]</td>
									<td style='font: 8px/12px Arial;'>$rnn[catatan]</td>
									<td style='font: 8px/12px Arial;'>$rnn[hasil_revisi]</td>
 </tr>";
$no++;
}


 echo"
					 </table> 
 </td>
 </tr>
 
					 </table> 
					 ";
					 ?>
</body>
</html>