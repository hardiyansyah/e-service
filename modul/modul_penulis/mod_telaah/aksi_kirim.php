<?php
session_start();
 if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses hal, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";

$start_date = $_POST['status_tgl'];
$end_date = date('Y-m-d H:i:s');
$tgl = date('Y-m-d H:i:s');

$id_naskah = $_POST['id_naskah'];
$id_reviewer =$_POST['id_reviewer'];
$id_penulis =$_POST['id_penulis'];
$ke =$_POST['revisi_ke'];
$ket ="PENULIS - Proses Perbaikan";

$query="INSERT INTO countdown (id_naskah,id_user,duration,start_date,end_date,ket)VALUES('$id_naskah','$id_penulis','$duration','$start_date','$end_date','$ket')";						
mysql_query($query) or die("Gagal menyimpan data"); 
$update = "UPDATE naskah SET status_tgl='$tgl' WHERE id_naskah ='$id_naskah'";
$run = mysql_query($update) or die(mysql_error());
//kirim email
	$select = mysql_query("SELECT * FROM naskah WHERE id_naskah = '$id_naskah'");
    $baris = mysql_fetch_array($select);
    $judul		=$baris['judul'];
    $sinopsis	=$baris['abstrak'];
    $instansi	=$baris['intansi'];
    $satker		=$baris['satker'];
    $hal		=$baris['halaman'];
    $id_penulis	=$baris['id_users'];

    $revisi= mysql_query("SELECT * FROM revisi WHERE id_naskah = '$id_naskah' AND id_reviewer ='$id_reviewer' AND status ='$ke'");
    $rev = mysql_fetch_array($revisi);
    $tgl1 =$rev['tanggal'];
    $file =$rev['file_rev'];
    $status =$rev['status'];
  
  	$selectPenulis= "SELECT * FROM users WHERE level = 'penulis' AND id_users ='$id_penulis'";
    $queryPenulis = mysql_query($selectPenulis) or die(mysql_error());
    while ($row = mysql_fetch_array($queryPenulis)) {
      $namaPenulis= $row['nama_lengkap'];
      $telpPenulis = $row['telp'];
      $jabatan = $row['jabatan'];
      $nip = $row['nip'];
      $emailPenulis = $row['email'];

  	$selectEditor= "SELECT * FROM users WHERE level = 'editor'";
    $queryEditor = mysql_query($selectEditor) or die(mysql_error());
    while ($row = mysql_fetch_array($queryEditor)) {
      $namaEditor= $row['nama_lengkap'];
      $emailEditor = $row['email'];
	
	$selectReviewer= "SELECT * FROM users WHERE level = 'reviewer' AND id_users = '$id_reviewer'";
    $queryReviewer = mysql_query($selectReviewer) or die(mysql_error());
    while ($row = mysql_fetch_array($queryReviewer)) {
      $namaReviewer= $row['nama_lengkap'];
      $emailReviewer = $row['email'];
	  $emailFrom    = $namaReviewer."<".$emailReviewer.">";

      $to = $emailEditor;
      $subject = "Hasil Perbaikan ke ".$status."";
      $headers = "From: e-service <press@mail.lipi.go.id>\r\n";
      $headers .= "Reply-To: ".$emailFrom."\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8\r\n";
      include('../../../email/13-proses-revisi.php');
      $mail_sent = @mail($to,$subject,$txt,$headers);
    }
}

header("location:../../../media.php?hal=penulis-monitoring&id=$id_naskah");
}
}
?>