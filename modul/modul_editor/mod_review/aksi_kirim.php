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

$id_naskah = $_POST['id_naskah'];
$id_editor = $_POST['id_editor'];
$id_reviewer = $_POST['id_reviewer'];
$id_review =$_POST['id'];
$ket = 'Managing Editor Kirim Ke Penulis';

$tgl=date('Y-m-d H:i:s');
$start_date=$_POST['status_tgl'];
$end_date=date('Y-m-d H:i:s');
$baca=N;

$query1="UPDATE review SET kirim= '$_POST[kirim]'
						WHERE id_review = '$id_review'";
$query2="INSERT INTO pemberitahuan (id_naskah,id_users,isi,tanggal,baca,link)
								VALUES('$_POST[id_naskah]',
								'$_POST[id_users]',
								'$_POST[isi]',
								'$tgl',
								'$baca',
								'$_POST[link]')";
$query3 ="INSERT INTO countdown (id_naskah,id_user,duration,start_date,end_date,ket)VALUES('$id_naskah','$id_editor','$duration','$start_date','$end_date','$ket')";
$query4="UPDATE naskah SET status_tgl= '$tgl' WHERE id_naskah = '$id_naskah'";

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
    $komentar =$nilai['komentar'];

	$selectPenulis = "SELECT * FROM users WHERE level = 'penulis' AND id_users = '$id_users'";
    $queryPenulis = mysql_query($selectPenulis) or die(mysql_error());
    if(mysql_num_rows($queryPenulis) == 1){
      $baris = mysql_fetch_assoc($queryPenulis);
      $namaPenulis  = $baris['nama_lengkap'];
      $emailPenulis = $baris['email'];
    }
	$selectEditor = "SELECT * FROM users WHERE level = 'editor' AND id_users = '$id_editor'";
    $queryEditor = mysql_query($selectEditor) or die(mysql_error());
    while ($row = mysql_fetch_array($queryEditor)) {
      $namaEditor = $row['nama_lengkap'];
      $emailEditor = $row['email'];
	  $emailFrom    = $namaEditor."<".$emailEditor.">";

      $to = $emailPenulis;
      $subject = "Hasil Telaah ke ".$status."";
      $headers = "From: e-service <press@mail.lipi.go.id>\r\n";
      $headers .= "Reply-To: ".$emailFrom."\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8\r\n";
      include('../../../email/12-review-to-penulis.php');
      $mail_sent = @mail($to,$subject,$txt,$headers);
    }

  header('location:../../../media.php?hal=editor-review');
}
?>