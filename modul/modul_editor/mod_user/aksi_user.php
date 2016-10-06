<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../media.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";
include "../../../config/fungsi_seo.php";
// input dewan editor

 $lokasi_file = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file   = $_FILES['fupload']['name'];
  $acak           = rand(0000,9999);
  $nama_file_unik = $acak.$nama_file;
  $pass=md5($_POST['password']);
  $blokir="N";
$query1="INSERT INTO users(username,
									password,
									nama_lengkap,
									nip,
									alamat,
									email,
									jabatan,
									tgl_lahir,
									telp,
									fax,
									rwy_pendidikan,
									karya,
									catatan,
									level,
									blokir,
									foto)
						VALUES('$_POST[username]',
								   '$pass',
								   '$_POST[nama_lengkap]',
								   '$_POST[nip]',
								   '$_POST[alamat]',
								   '$_POST[email]',
								   '$_POST[jabatan]',
								   '$_POST[tgl_lahir]',
								   '$_POST[telp]',
								   '$_POST[fax]',
								   '$_POST[rwy_pendidikan]',
								   '$_POST[karya]',
								   '$_POST[catatan]',
								   '$_POST[level]',
								   '$blokir',
								   '$nama_file')";
$query2="INSERT INTO users(username,
									password,
									nama_lengkap,
									nip,
									alamat,
									email,
									jabatan,
									tgl_lahir,
									telp,
									fax,
									rwy_pendidikan,
									karya,
									catatan,
									level,
									blokir)
						VALUES('$_POST[username]',
								   '$pass',
								   '$_POST[nama_lengkap]',
								   '$_POST[nip]',
								   '$_POST[alamat]',
								   '$_POST[email]',
								   '$_POST[jabatan]',
								   '$_POST[tgl_lahir]',
								   '$_POST[telp]',
								   '$_POST[fax]',
								   '$_POST[rwy_pendidikan]',
								   '$_POST[karya]',
								   '$_POST[catatan]',
								   '$_POST[level]',
								   '$blokir')"; 
 if (!empty($lokasi_file)) {
UploadPP($nama_file);
mysql_query($query1) or die("Gagal menyimpan data"); 
  header("location:../../../media.php?hal=editor-user&id=$_POST[level]");
}
  else{
mysql_query($query2) or die("Gagal menyimpan data"); 
  header("location:../../../media.php?hal=editor-user&id=$_POST[level]");
}

}
?>