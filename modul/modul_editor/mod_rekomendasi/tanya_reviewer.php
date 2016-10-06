<?php session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
	echo "<link href='style.css' rel='stylesheet' type='text/css'>
	<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}else{
	include "../../../config/koneksi.php";
	include "../../../config/fungsi_seo.php";

	$id_naskah = $_POST['id_naskah'];
	$id_editor = $_POST['id_editor'];
	$id_reviewer = $_POST['id_reviewer'];
	$isi = $_POST['isi'];
	$tgl=date('Y-m-d H:i:s');
	$link = $_POST['link'].$id_naskah;
	$ket = 'Editor - Konfirmasi Kesanggupan Penelaah';
	// $start_date = $_POST['start_date'];
	$start_date =$_POST['status_tgl'];
	$end_date = date('Y-m-d H:i:s');
	$dateTime = date('Y-m-d H:i:s');

	$update = "UPDATE voting SET status = '3' WHERE id_reviewer = '$id_reviewer' AND id_naskah = '$id_naskah'";
	$query ="INSERT INTO pemberitahuan (id_naskah,id_users,isi,tanggal,link) VALUES('$id_naskah', '$id_reviewer', '$isi', '$tgl','$link')";
	$count ="INSERT INTO countdown (id_naskah,id_user,duration,start_date,end_date,ket)VALUES('$id_naskah','$id_reviewer','$duration','$start_date','$end_date','$ket')";
	
	$updateStatusTgl = "UPDATE naskah SET status_tgl='$dateTime' WHERE id_naskah ='$id_naskah'";
	
	mysql_query($update) or die("Gagal menyimpan data");
	mysql_query($query) or die("Gagal menyimpan data");
	mysql_query($count) or die("Gagal menyimpan data");
	mysql_query($updateStatusTgl) or die(mysql_error());

	$select = mysql_query("SELECT * FROM naskah WHERE id_naskah = '$id_naskah'");
    $baris = mysql_fetch_array($select);
    $judul		=$baris['judul'];
    $sinopsis	=$baris['abstrak'];
    $instansi	=$baris['intansi'];
    $satker		=$baris['satker'];
    $hal		=$baris['halaman'];

	$selectReviewer = "SELECT * FROM users WHERE level = 'reviewer' AND id_users = '$id_reviewer'";
    $queryReviewer = mysql_query($selectReviewer) or die(mysql_error());
    if(mysql_num_rows($queryReviewer) == 1){
      $baris = mysql_fetch_assoc($queryReviewer);
      $namaReviewer  = $baris['nama_lengkap'];
      $emailReviewer = $baris['email'];
    }
	$selectEditor = "SELECT * FROM users WHERE level = 'editor' AND id_users = '$id_editor'";
    $queryEditor = mysql_query($selectEditor) or die(mysql_error());
    while ($row = mysql_fetch_array($queryEditor)) {
      $namaEditor = $row['nama_lengkap'];
      $emailEditor = $row['email'];
	  $emailFrom    = $namaEditor."<".$emailEditor.">";

      $to = $emailReviewer;
      $subject = "Kesanggupan Untuk Menelaah";
      $headers = "From: e-service <press@mail.lipi.go.id>\r\n";
      $headers .= "Reply-To: ".$emailFrom."\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8\r\n";
      include('../../../email/7-editor-to-reviewer.php');
      $mail_sent = @mail($to,$subject,$txt,$headers);
    }

  	header("location:../../../media.php?hal=editor-detail-rekomendasi&id=".$id_naskah);
} ?>
