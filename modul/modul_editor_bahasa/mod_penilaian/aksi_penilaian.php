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

$id_naskah 	= $_POST['id_naskah'];
$id_editor 	= $_POST['id_editor'];
$id_reviewer= $_POST['id_reviewer'];
$id_penulis = $_POST['id_users'];
$id_review	= $_POST['id'];
$id_dewan 	= $_POST['siapa'];
$ke =$_POST['ke'];
$ket = 'Dewan Editor Konfirmasi Hasil Pengesahan';
$start_date = $_POST['status_tgl'];
$end_date = date('Y-m-d H:i:s');
$tgl = date('Y-m-d H:i:s');

$query1="UPDATE review SET kirim = '$_POST[kirim]'
							WHERE id_review = '$id_review'";
$query2="UPDATE penilaian SET nilai= '$_POST[nilai]',
							komentar= '$_POST[catatan]'
							WHERE id_nilai = '$_POST[id_nilai]'";
$query3="INSERT INTO history (tgl,hal,siapa,hasil)
							VALUES('$tgl','$_POST[hal]','$id_dewan','$_POST[nilai]')";
$query4="INSERT INTO countdown (id_naskah,id_user,duration,start_date,end_date,ket)
							VALUES('$id_naskah','$id_dewan','$duration','$start_date','$end_date','$ket')";
              
$update = "UPDATE naskah SET status_tgl='$tgl' WHERE id_naskah ='$id_naskah'";
$run = mysql_query($update) or die(mysql_error());
// // Hapus penilaian
// if ($hal=='penilaian' AND $act=='delete'){
//   mysql_query("DELETE FROM penilaian WHERE id_penilaian='$_GET[id]'");
//    header("location:../../media.php?hal=penilaian&id=$_POST[idd]");
// }

// Input penilaian

mysql_query($query1) or die("Gagal menyimpan data"); 
mysql_query($query2) or die("Gagal menyimpan data"); 
mysql_query($query3) or die("Gagal menyimpan data");
mysql_query($query4) or die("Gagal menyimpan data"); 

//kirim email
	$select = mysql_query("SELECT * FROM naskah WHERE id_naskah = '$id_naskah'");
    $baris = mysql_fetch_array($select);
    $judul		=$baris['judul'];
    $sinopsis	=$baris['abstrak'];
    $instansi	=$baris['intansi'];
    $satker		=$baris['satker'];
    $hal		=$baris['halaman'];
    $id_penulis	=$baris['id_users'];

    $review= mysql_query("SELECT * FROM review WHERE id_naskah = '$id_naskah' AND id_reviewer ='$id_reviewer'");
    $rev = mysql_fetch_array($review);{
    $tgl1 =$rev['tanggal'];
    $file =$rev['file_rev'];
    $status =$rev['status'];
    $id_review =$rev['id_review'];
}
    $penilaian= mysql_query("SELECT * FROM penilaian WHERE id_review = '$id_review'");
    $nilai = mysql_fetch_array($penilaian);{
    $nilai =$nilai['nilai'];
    $komentar =$nilai['komentar'];
  }
  $selectPenulis= "SELECT * FROM users WHERE level = 'penulis' AND id_users ='$id_penulis'";
    $queryPenulis = mysql_query($selectPenulis) or die(mysql_error());
    while ($row = mysql_fetch_array($queryPenulis)) {
      $namaPenulis= $row['nama_lengkap'];
      $emailPenulis = $row['email'];
      $telpPenulis = $row['telp'];
}
  	$selectEditor= "SELECT * FROM users WHERE level = 'editor' AND id_users ='$id_editor'";
    $queryEditor = mysql_query($selectEditor) or die(mysql_error());
    while ($row = mysql_fetch_array($queryEditor)) {
      $namaEditor= $row['nama_lengkap'];
      $emailEditor = $row['email'];
	}
	// $selectReviewer= "SELECT * FROM users WHERE level = 'reviewer' AND id_users = '$id_reviewer'";
 //    $queryReviewer = mysql_query($selectReviewer) or die(mysql_error());
 //    while ($row = mysql_fetch_array($queryReviewer)) {
 //      $namaReviewer= $row['nama_lengkap'];
 //      $emailReviewer = $row['email'];
	//   $emailFrom    = $namaReviewer."<".$emailReviewer.">";

	$selectDewan= "SELECT * FROM users WHERE level = 'dewan' AND id_users = '$id_dewan'";
    $queryDewan = mysql_query($selectDewan) or die(mysql_error());
    while ($row = mysql_fetch_array($queryDewan)) {
      $namaDewan= $row['nama_lengkap'];
      $emailDewan = $row['email'];
	  $emailFrom    = $namaDewan."<".$emailDewan.">";

      $to = $emailEditor;
      $subject = "Hasil Pengesahan Dewan Editor";
      $headers = "From: e-service <press@mail.lipi.go.id>\r\n";
      $headers .= "Reply-To: ".$emailFrom."\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8\r\n";
      include('../../../email/17-konfirmasi-pengesahan-dewan-to-editor.php');
      $mail_sent = @mail($to,$subject,$txt,$headers);
    }

header("location:../../../media.php?hal=dewan-penilaian");


}
?>