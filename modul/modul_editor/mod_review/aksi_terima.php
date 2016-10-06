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

$id_naskah = $_POST['id2'];
$id_rev = $_POST['id_rev'];
$id_editor = $_POST['id_editor'];
$id_reviewer = $_POST['siapa'];
$id_review =$_POST['id'];
$id_users =$_POST['id_users'];
$ket = 'Managing Editor Naskah Diterima';

$tgl=date('Y-m-d H:i:s');
$start_date=$_POST['status_tgl'];
$end_date=date('Y-m-d H:i:s');

$baca='N';

  $revisi= mysql_query("SELECT * FROM revisi WHERE id_naskah = '$id_naskah' AND id_reviewer='$id_reviewer' AND id_rev ='$id_rev'");
  $revi = mysql_fetch_array($revisi);
  $file = $revi['file_revisi'];

$query1="UPDATE review SET kirim= '$_POST[kirim]'
						WHERE id_review = '$_POST[id]'";
$query2="INSERT INTO pemberitahuan (id_naskah,id_users,isi,tanggal,baca,link)
								VALUES('$_POST[id_naskah]',
								'$_POST[id_users]',
								'$_POST[isi]',
								'$tgl',
								'$baca',
								'$_POST[link]')";
$query3="UPDATE naskah SET status= '$_POST[st]',status_tgl='$tgl', file='$file'
						WHERE id_naskah = '$_POST[id2]'";
$query4 ="INSERT INTO countdown (id_naskah,id_user,start_date,end_date,ket)
					VALUES('$id_naskah','$id_editor','$start_date','$end_date','$ket')";
					

  mysql_query($query1) or die("Gagal menyimpan data");
  mysql_query($query2) or die("Gagal menyimpan data");
  mysql_query($query3) or die("Gagal menyimpan data");
  mysql_query($query4) or die("Gagal menyimpan data");  

	$select = mysql_query("SELECT * FROM naskah WHERE id_naskah = '$id_naskah'");
    $baris = mysql_fetch_array($select);
    $judul		=$baris['judul'];
    $sinopsis	=$baris['abstrak'];
    $instansi	=$baris['intansi'];
    $satker		=$baris['satker'];
    $hal		=$baris['halaman'];

    $review= mysql_query("SELECT * FROM review WHERE id_naskah = '$id_naskah' AND id_reviewer ='$id_reviewer'");
    $rev = mysql_fetch_array($review);
    $tgl1 =$rev['tanggal'];
    $file =$rev['file_rev'];
    $status =$rev['status'];
    $jabatan =$rev['jabatan'];

    $penilaian= mysql_query("SELECT * FROM penilaian WHERE id_review = '$id_review'");
    $nilai = mysql_fetch_array($penilaian);
    $nilai =$nilai['nilai'];
    // $komentar =$nilai['komentar'];

	$selectPenulis = "SELECT * FROM users WHERE level = 'penulis' AND id_users = '$id_users'";
    $queryPenulis = mysql_query($selectPenulis) or die(mysql_error());
    if(mysql_num_rows($queryPenulis) == 1){
      $baris = mysql_fetch_assoc($queryPenulis);
      $namaPenulis  = $baris['nama_lengkap'];
      $emailPenulis = $baris['email'];
    }
 $selectReviewer= mysql_query("SELECT * FROM users WHERE id_users = '$id_reviewer'");
 $reviewer = mysql_fetch_array($selectReviewer);
 $namaReviewer =$reviewer['nama_lengkap'];
 $email =$reviewer['email'];
   

  $selectDewan = "SELECT * FROM users WHERE level = 'dewan'";
    $queryDewan = mysql_query($selectDewan) or die(mysql_error());
    while ($row = mysql_fetch_array($queryDewan)) {
      $namaDewan = $row['nama_lengkap'];
      $emailDewan = $row['email'];
	 
	$selectEditor = "SELECT * FROM users WHERE level = 'editor' AND id_users = '$id_editor'";
    $queryEditor = mysql_query($selectEditor) or die(mysql_error());
    while ($row = mysql_fetch_array($queryEditor)) {
      $namaEditor = $row['nama_lengkap'];
      $emailEditor = $row['email'];
	  $emailFrom    = $namaEditor."<".$emailEditor.">";

      $to = $emailPenulis;
      $subject = "Selamat Naskah Anda Diterima (Proses Penyuntingan)";
      $headers = "From: e-service <press@mail.lipi.go.id>\r\n";
      $headers .= "Reply-To: ".$emailFrom."\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8\r\n";
      include('../../../email/15-naskah-diterima.php');
      $mail_sent = @mail($to,$subject,$txt,$headers);
    }
      $to = $emailDewan;
      $subject = "Naskah Diterima (Proses Penyuntingan)";
      $headers = "From: e-service <press@mail.lipi.go.id>\r\n";
      $headers .= "Reply-To: ".$emailFrom."\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8\r\n";
      include('../../../email/22-naskah-diterima-to-dewan.php');
      $mail_sent = @mail($to,$subject,$txt,$headers);
}
  header("location:../../../media.php?hal=editor-review");

}
?>