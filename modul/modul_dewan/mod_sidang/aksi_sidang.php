<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses hal, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../config/koneksi.php";
include "koneksi.php";
include "../../config/library.php";
include "../../config/fungsi_thumb.php";

$hal=$_GET['hal'];
$act=$_GET['act'];
$tgl=date('y-m-d');



// Hapus review
if ($hal=='review' AND $act=='delete'){
  mysql_query("DELETE FROM review WHERE id_review='$_GET[id]'");
   header("location:../../media.php?hal=review&id=$_POST[idd]");
}

// Input review
elseif ($hal=='review' AND $act=='uploadrev'){
$status=(($_POST[id2])+1);
$namafolder="files/";

  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  
  $gambar = $namafolder . basename($_FILES['fupload']['name']);
  $kirim=N;
  $id=0;
  $query1="INSERT INTO review(id_naskah,id_reviewer,file_rev,komentar,tanggal,status,kirim,id_editor
                                  )
					                VALUES('$_POST[id]',
									'$_POST[id1]',
									'$nama_file',
									'$_POST[komentar]',
									'$tgl',
									'$status',
									'$kirim',
									'$id')";
  
 
  // Apabila ada gambar yang diupload
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
        window.location=('media.php?hal=review')</script>";
  }

  else{
    UploadFilerev($nama_file);
	
	mysql_query($query1) or die("Gagal menyimpan data"); 
  header("location:../../media.php?hal=telaah&id=$_POST[id]");
  }
  }
  else{
     mysql_query($query1) or die("Gagal menyimpan data"); 
  header("location:../../media.php?hal=telaah&id=$_POST[id]");
  }
}

// Update review
elseif ($hal=='review' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $lokasi_file2 = $_FILES['fupload1']['tmp_name'];
  $nama_file2   = $_FILES['fupload1']['name'];
$newDate = date("Y-m-d", strtotime($_POST['tanggal']));
$newDate2 = date("Y-m-d", strtotime($_POST['tanggal2']));
  // Apabila file tidak diganti
  if (empty($lokasi_file) AND (empty($lokasi_file2))){
   mysql_query("UPDATE review SET 
								   no_review     = '$_POST[no_review]',
                                   nama_review   = '$_POST[nama_review]',
                                   lokasi	    = '$_POST[lokasi]',                                           
                                   tanggal      = '$newDate',  
                                   tanggal2      = '$newDate2',  
                                   biaya        = '$_POST[biaya]'                               
                                                  
                                               
								   WHERE id_review = '$_POST[id]'");
   
   header("location:../../media2.php?hal=review&id=$_POST[ids]");
  }
  else{
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
        window.location=('../../media.php?hal=review&id=$_POST[ids]')</script>";
  }
  
   elseif (!empty($lokasi_file) AND empty($lokasi_file2)){
   UploadFile($nama_file);
    mysql_query("UPDATE review SET 
								   no_review     = '$_POST[no_review]',
                                   nama_review   = '$_POST[nama_review]',
                                   lokasi	    = '$_POST[lokasi]',                                           
                                   tanggal      = '$newDate',  
                                   tanggal2      = '$newDate2',  
                                   biaya        = '$_POST[biaya]',
								   hasil		= '$nama_file'
								   WHERE id_review = '$_POST[id]'");
								   header("location:../../media2.php?hal=review&id=$_POST[ids]");
}
   elseif (empty($lokasi_file) AND !empty($lokasi_file2)){
   UploadFile2($nama_file2);
    mysql_query("UPDATE review SET 
								   no_review     = '$_POST[no_review]',
                                   nama_review   = '$_POST[nama_review]',
                                   lokasi	    = '$_POST[lokasi]',                                           
                                   tanggal      = '$newDate',  
                                   tanggal2      = '$newDate2',  
                                   biaya        = '$_POST[biaya]',
								   absen		= '$nama_file2'
								   WHERE id_review = '$_POST[id]'");
}
else{
    UploadFile($nama_file);
    UploadFile2($nama_file2);
    mysql_query("UPDATE review SET 
								    no_review     = '$_POST[no_review]',
                                   nama_review   = '$_POST[nama_review]',
                                   lokasi	    = '$_POST[lokasi]',                                           
                                   tanggal      = '$newDate',  
                                   tanggal2      = '$newDate2',  
                                   biaya        = '$_POST[biaya]',                             
                                   hasil        = '$nama_file',
                                   absen        = '$nama_file2'
								  
								   WHERE id_review = '$_POST[id]'");
   
   
   }
   
   header("location:../../media2.php?hal=review&id=$_POST[ids]");
  }
  }

}
?>
