<?php
error_reporting(0);
/************************ YOUR DATABASE CONNECTION START HERE   ****************************/
include "../koneksi.php";

$databasetable = "peneliti";

/************************ YOUR DATABASE CONNECTION END HERE  ****************************/


set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
include 'PHPExcel/IOFactory.php';

// This is the file path to be uploaded.
$inputFileName = '../../data_upload/datates.xlsx'; 

try {
	$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
} catch(Exception $e) {
	die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
}


$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
$arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet


for($i=2;$i<=$arrayCount;$i++){
$nama_lengkap= trim($allDataInSheet[$i]["A"]);
$unit_kerja = trim($allDataInSheet[$i]["B"]);
$kepakaran = trim($allDataInSheet[$i]["C"]);
$jabatan = trim($allDataInSheet[$i]["D"]);
$instansi = trim($allDataInSheet[$i]["E"]);


$query = "SELECT nama_lengkap FROM peneliti WHERE nama_lengkap = '".$nama_lengkap."'";
$sql = mysql_query($query);
$recResult = mysql_fetch_array($sql);
$existName = $recResult["nama_lengkap"];
if($existName=="") {
$insertTable= mysql_query("insert into peneliti
	(nama_lengkap,
	unit_kerja, 
	bidang_kepakaran, 
	jabatan_peneliti, 
	instansi,
	level,
	import) 
	values
	(   '".$nama_lengkap."', 
		'".$unit_kerja."', 
		'".$kepakaran."', 
		'".$jabatan."', 
		'".$instansi."',
		'peneliti',
		'Y');");

$msg ="<link href='css/screen.css' rel='stylesheet' type='text/css'><link href='css/reset.css' rel='stylesheet' type='text/css'>
	<center><br><br><br><br><br><br><b>SUKSES IMPORT DATA PENELITI </b><br>
	<div> <a href='index.php'><img src='$site/img/blueimp/ok.png' <br><br><br><br></a>
	     </div>
	<input type=button class='tombol' value='Cek Data Peneliti' onclick=location.href='$site"."media.php?hal=editor-import'></a></center>";


} else {
	$msg ="<link href='css/screen.css' rel='stylesheet' type='text/css'><link href='css/reset.css' rel='stylesheet' type='text/css'>
	<center><br><br><br><br><br><br><b>GAGAL IMPORT DATA PENELITI! </b><br> 
			Data Sudah Tersedia
	<div> <a href='index.php'><img src='$site/img/blueimp/error.png' <br><br><br><br></a>
	     </div>
	<input type=button class='tombol' value='ULANGI LAGI' onclick=location.href='$site"."media.php?hal=editor-import-form'></a></center>";

}
}
echo $msg;
?>