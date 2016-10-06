<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses hal, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";


$tgl=date('y-m-d');

$status=(($_POST['id2'])+1);
$namafolder="files/";

  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $noAcak      = rand(0,9);
  $acak           = date('Y-m-d H:i:s').$noAcak;
  $nama_file_unik = $acak.$nama_file;
  $gambar = $namafolder . basename($_FILES['fupload']['name']);
  $kirim='E';
  $id='0';
  $komen=$_POST['isi'];
  $query1="INSERT INTO revisi(file_revisi,komentar,tanggal,status,id_users,id_naskah,kirim,id_reviewer
                                  )
					                VALUES('$nama_file_unik',
									'$komen',
									'$tgl',
									'$status',
									'$_POST[idusers]',
									'$_POST[id]',
									'$kirim',
									'$_POST[id1]')";
  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
  $file_extension = strtolower(substr(strrchr($nama_file,"."),1));
  switch($file_extension){
    case "docx": $ctype="application/msword"; break;
    case "doc": $ctype="application/msword"; break;
    default: $ctype="application/proses";
  }
  if ($file_extension=='php'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.PHP');
        window.location=('../../../media.php?hal=penulis-revisi&id=$_POST[id]')</script>";
  }
  else if ($file_extension=='pdf'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.PDF');
        window.location=('../../../media.php?hal=penulis-revisi&id=$_POST[id]')</script>";
  }
   else if ($file_extension=='exe'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.EXE');
        window.location=('../../../media.php?hal=penulis-revisi&id=$_POST[id]')</script>";
  }
   else if ($file_extension=='zip'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.ZIP');
        window.location=('../../../media.php?hal=penulis-revisi&id=$_POST[id]')</script>";
  }
   else if ($file_extension=='rar'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.RAR');
        window.location=('../../../media.php?hal=penulis-revisi&id=$_POST[id]')</script>";
  }
   else if ($file_extension=='png'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.PNG');
        window.location=('../../../media.php?hal=penulis-revisi&id=$_POST[id]')</script>";
  }
  else if ($file_extension=='jpg'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.JPG');
        window.location=('../../../media.php?hal=penulis-revisi&id=$_POST[id]')</script>";
  }
   else if ($file_extension=='jpeg'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.JPEG');
        window.location=('../../../media.php?hal=penulis-revisi&id=$_POST[id]')</script>";
  }
   else if ($file_extension=='gif'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.GIF');
        window.location=('../../../media.php?hal=penulis-revisi&id=$_POST[id]')</script>";
  }
   else if ($file_extension=='xls'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.XLS');
        window.location=('../../../media.php?hal=penulis-revisi&id=$_POST[id]')</script>";
  }
   else if ($file_extension=='ppt'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.PPT');
        window.location=('../../../media.php?hal=penulis-revisi&id=$_POST[id]')</script>";
  }
  else if ($file_extension=='pptx'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.PPTX');
        window.location=('../../../media.php?hal=penulis-revisi&id=$_POST[id]')</script>";
  }
  else if ($file_extension=='xlsx'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.XLSX');
        window.location=('../../../media.php?hal=penulis-revisi&id=$_POST[id]')</script>";
  }
  
  else{
    UploadFilerev($nama_file_unik);
	mysql_query($query1) or die("Gagal menyimpan data"); 
  header("location:../../../media.php?hal=penulis-telaah-matriks&id=$_POST[id]&ke=$status&ref=$_POST[id1]");
  }
  }
  else{
     mysql_query($query1) or die("Gagal menyimpan data"); 
  header("location:../../../media.php?hal=penulis-telaah-matriks&id=$_POST[id]&ke=$status&ref=$_POST[id1]");
  }
}

?>
