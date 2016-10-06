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
$id_penulis = $_POST['id_users'];
$id_revisi =$_POST['id'];
$ke =$_POST['ke'];
$ket = 'Managing Editor Kirim Ke Penelaah Hasil Perbaikan Penulis';

$start_date = $_POST['status_tgl'];
$end_date = date('Y-m-d H:i:s');
$tgl = date('Y-m-d H:i:s');

$query1="UPDATE revisi SET kirim= '$_POST[kirim]'
            WHERE id_rev = '$_POST[id]'";
$query2="INSERT INTO pemberitahuan (id_naskah,id_users,isi,tanggal,baca,link)
                VALUES('$_POST[id_naskah]',
                '$_POST[id_reviewer]',
                '$_POST[isi]',
                '$tgl',
                '$_POST[baca]',
                '$_POST[link]')";
$query3 ="INSERT INTO countdown (id_naskah,id_user,duration,start_date,end_date,ket)VALUES('$id_naskah','$id_editor','$duration','$start_date','$end_date','$ket')";
$update = "UPDATE naskah SET status_tgl='$tgl' WHERE id_naskah ='$id_naskah'";
$run = mysql_query($update) or die(mysql_error());

  mysql_query($query1) or die("Gagal menyimpan data"); 
  mysql_query($query2) or die("Gagal menyimpan data"); 
  mysql_query($query3) or die("Gagal menyimpan data");  

$select = mysql_query("SELECT * FROM naskah WHERE id_naskah = '$id_naskah'");
    $baris = mysql_fetch_array($select);
    $judul    =$baris['judul'];
    $sinopsis =$baris['abstrak'];
    $instansi =$baris['intansi'];
    $satker   =$baris['satker'];
    $hal    =$baris['halaman'];

    $revisi= mysql_query("SELECT * FROM revisi WHERE id_naskah = '$id_naskah' AND id_reviewer ='$id_reviewer' AND status ='$ke'");
    $rev = mysql_fetch_array($revisi);
    $tgl1 =$rev['tanggal'];
    $file =$rev['file_rev'];
    $status =$rev['status'];
    $jabatan =$rev['jabatan'];

  $selectPenulis = "SELECT * FROM users WHERE level = 'penulis' AND id_users = '$id_users'";
    $queryPenulis = mysql_query($selectPenulis) or die(mysql_error());
    if(mysql_num_rows($queryPenulis) == 1){
      $baris = mysql_fetch_assoc($queryPenulis);
      $namaPenulis  = $baris['nama_lengkap'];
      $emailPenulis = $baris['email'];
    }

    $selectReviewer = "SELECT * FROM users WHERE level = 'reviewer' AND id_users = '$id_reviewer'";
    $queryReviewer = mysql_query($selectReviewer) or die(mysql_error());
    if(mysql_num_rows($queryReviewer) == 1){
      $baris = mysql_fetch_assoc($queryReviewer);
      $namaReviewer = $baris['nama_lengkap'];
      $emailReviewer= $baris['email'];
    }
  $selectEditor = "SELECT * FROM users WHERE level = 'editor' AND id_users = '$id_editor'";
    $queryEditor = mysql_query($selectEditor) or die(mysql_error());
    while ($row = mysql_fetch_array($queryEditor)) {
      $namaEditor = $row['nama_lengkap'];
      $emailEditor = $row['email'];
    $emailFrom    = $namaEditor."<".$emailEditor.">";

      $to = $emailReviewer;
      $subject = "Hasil Perbaikan ke ".$status."";
      $headers = "From: e-service <press@mail.lipi.go.id>\r\n";
      $headers .= "Reply-To: ".$emailFrom."\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8\r\n";
      include('../../../email/23-revisi-to-reviewer.php');
      $mail_sent = @mail($to,$subject,$txt,$headers);
    }

  header('location:../../../media.php?hal=editor-revisi');

}

?>
