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

$tgl=date('Y-m-d H:i:s');
$start_date=$_POST['status_tgl'];
$end_date=date('Y-m-d H:i:s');
$kirim=E;
    $kirim2=A;
$id_naskah = $_POST['id_naskah'];
$id_reviewer =$_POST['id_reviewer'];
$ket ="Penelah- Proses Telaah";

$query1="INSERT INTO hasil_telaah2(id_review,id_reviewer,ke,jenis_terbitan,tujuan,gaya,sasaran,kesesuaian,kemutakhiran)
					                VALUES('$_POST[id_review]',
					                	'$id_reviewer',
									'$_POST[ke]',
									'$_POST[jenis]',
									'$_POST[tujuan]',
									'$_POST[gaya]',
									'$_POST[sasaran]',
									'$_POST[kesesuaian]',
									'$_POST[kemutakhiran]')";
$query2="INSERT INTO penilaian (id_review,ke,nilai,komentar)
								VALUES('$_POST[id_review]','$_POST[ke]','$_POST[rekomendasi]','$_POST[catatan]')";
$query3="UPDATE review SET kirim= '$kirim'
							WHERE id_review = '$_POST[id_review]'";

$query4="INSERT INTO countdown (id_naskah,id_user,duration,start_date,end_date,ket)VALUES('$id_naskah','$id_reviewer','$duration','$start_date','$end_date','$ket')";						

$query5="UPDATE naskah SET status_tgl= '$tgl' WHERE id_naskah = '$id_naskah'";

    $query6="UPDATE revisi SET kirim= '$kirim2'
							WHERE id_rev = '$_POST[id_rev]'";

mysql_query($query1) or die("Gagal menyimpan data"); 
mysql_query($query2) or die("Gagal menyimpan data"); 
mysql_query($query3) or die("Gagal menyimpan data"); 
mysql_query($query4) or die("Gagal menyimpan data");
mysql_query($query5) or die("Gagal menyimpan data");
    mysql_query($query6) or die("Gagal menyimpan data");

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
    $rev = mysql_fetch_array($review);
    $tgl1 =$rev['tanggal'];
    $file =$rev['file_rev'];
    $status =$rev['status'];
    $id_review =$rev['id_review'];

    $penilaian= mysql_query("SELECT * FROM penilaian WHERE id_review = '$id_review'");
    $nilai = mysql_fetch_array($penilaian);
    $nilai =$nilai['nilai'];
    $komentar =$nilai['komentar'];
  
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
      $subject = "Hasil Telaah ke ".$status."";
      $headers = "From: e-service <press@mail.lipi.go.id>\r\n";
      $headers .= "Reply-To: ".$emailFrom."\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8\r\n";
      include('../../../email/13-proses-review-reviewer.php');
      $mail_sent = @mail($to,$subject,$txt,$headers);
    }
}

header("location:../../../media.php?hal=reviewer-review");
}
?>
