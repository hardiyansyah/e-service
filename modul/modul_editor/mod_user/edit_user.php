<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";
include "../../../config/fungsi_seo.php";
    $level = $_POST['level'];
   $lokasi_file = $_FILES['fupload']['tmp_name'];
   $nama_file   = $_FILES['fupload']['name'];
   if (empty($lokasi_file)){
   mysql_query("UPDATE users SET 
							nama_lengkap='$_POST[nama_lengkap]',
							nip='$_POST[nip]',
							alamat='$_POST[alamat]',
							email='$_POST[email]',
							jabatan='$_POST[jabatan]',
							telp='$_POST[telp]',
              tgl_lahir='$_POST[tgl_lahir]',
							fax='$_POST[fax]',
							rwy_pendidikan='$_POST[rwy_pendidikan]',
							karya='$_POST[karya]',
							catatan='$_POST[catatan]'
						    WHERE id_users = '$_POST[id]'");
  // header('location:../../../media.php?hal=profil');
   header("location:../../../media.php?hal=editor-user&id=".$level);
}
  else{
  $file_extension = strtolower(substr(strrchr($nama_file,"."),1));

  switch($file_extension){
    case "gif": $ctype="image/gif"; break;
    case "png": $ctype="image/png"; break;
    case "jpeg":
    case "jpg": $ctype="image/jpg"; break;
    default: $ctype="application/proses";
  }

  if ($file_extension=='php'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.PHP');
        window.location=('../../../media.php?hal=editor-user&id=".$level."')</script>";
  }
  
   elseif (!empty($lokasi_file)){
   UploadPP($nama_file);
     mysql_query("UPDATE users SET 
							nama_lengkap='$_POST[nama_lengkap]',
							nip='$_POST[nip]',
							alamat='$_POST[alamat]',
							email='$_POST[email]',
							jabatan='$_POST[jabatan]',
							telp='$_POST[telp]',
              tgl_lahir='$_POST[tgl_lahir]',
							fax='$_POST[fax]',
							rwy_pendidikan='$_POST[rwy_pendidikan]',
							karya='$_POST[karya]',
							catatan='$_POST[catatan]',
							foto		= '$nama_file'
						    WHERE id_users = '$_POST[id]'");
  header("location:../../../media.php?hal=editor-user&id=".$level);
}
}}
?>
