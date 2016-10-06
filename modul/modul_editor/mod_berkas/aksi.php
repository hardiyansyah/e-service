<?php 
session_start();
  if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'><center>Untuk mengakses hal, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}else{
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";

if($_GET['action'] == 'delete'){
    $berid      = $_GET['berid'];
    $delete     = 'DELETE FROM file_penting WHERE id_file ='.$berid;
    $result 	= mysql_query($delete) or die(mysql_error());
    if($result){
        header('Location: media.php?hal=editor-berkas');
    }else{
        header('Location: media.php?hal=editor-berkas');
    }
}elseif($_GET['action'] == 'edit'){
	$berid 		= $_POST['berid'];
	$nama 		= $_POST['nama_file'];
	$file 		= $_POST['file'];
	$edit 		= 'UPDATE file_penting SET nama_file = "'.$nama.'", file = "'.$file.'" WHERE id_file = '.$berid;
	$result 	= mysql_query($edit) or die(mysql_error());
	if($result){
		header('Location: media.php?hal=editor-berkas');
	}else{
		header('Location: media.php?hal=editor-berkas');
	}
}elseif($_GET['action'] == 'add'){
  $namafolder="file_penting/";
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $acak           = rand(0000,9999);
  $nama_file_unik = $acak.$nama_file;

if (!empty($lokasi_file)){
  $file_extension = strtolower(substr(strrchr($nama_file,"."),1));
  switch($file_extension){
    case "pdf": $ctype="application/pdf"; break;
    case "exe": $ctype="application/octet-stream"; break;
    case "zip": $ctype="application/zip"; break;
    case "rar": $ctype="application/rar"; break;
    case "doc": $ctype="application/msword"; break;
    case "xls": $ctype="application/vnd.ms-excel"; break;
    case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
    case "gif": $ctype="image/gif"; break;
    case "png": $ctype="image/png"; break;
    case "jpeg":$ctype="image/jpeg"; break;
    case "jpg": $ctype="image/jpg"; break;
    default: $ctype="application/proses";
  }
  if ($file_extension=='php'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.PHP');
        window.location=('../../../media.php?hal=penulis-naskah')</script>";
  }else{
    UploadFilepenting($nama_file_unik);
	}
}  $namafolder="file_penting/";
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $acak           = rand(0000,9999);
  $nama_file_unik = $acak.$nama_file;

if (!empty($lokasi_file)){
  $file_extension = strtolower(substr(strrchr($nama_file,"."),1));
  switch($file_extension){
    case "pdf": $ctype="application/pdf"; break;
    case "exe": $ctype="application/octet-stream"; break;
    case "zip": $ctype="application/zip"; break;
    case "rar": $ctype="application/rar"; break;
    case "doc": $ctype="application/msword"; break;
    case "xls": $ctype="application/vnd.ms-excel"; break;
    case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
    case "gif": $ctype="image/gif"; break;
    case "png": $ctype="image/png"; break;
    case "jpeg":
    case "jpg": $ctype="image/jpg"; break;
    default: $ctype="application/proses";
  }
  if ($file_extension=='php'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.PHP');
        window.location=('../../../media.php?hal=penulis-naskah')</script>";
  }else{
    UploadFilepenting($nama_file_unik);
	}
}

	$berid 		= $_POST['berid'];
	$nama 		= $_POST['nama_file'];
	$file 		= $nama_file_unik;
	$insert		= 'INSERT INTO file_penting (nama,file)VALUES("'.$nama.'","'.$file.'")';
	$result 	= mysql_query($insert) or die(mysql_error());
	if($result){
		header('Location: media.php?hal=editor-berkas');
	}else{
		header('Location: media.php?hal=editor-berkas');
	}
}else{
	header('Location: media.php?hal=editor-berkas');
}
}
?>