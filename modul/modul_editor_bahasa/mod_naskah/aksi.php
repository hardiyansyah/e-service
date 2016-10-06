<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
	echo "<link href='style.css' rel='stylesheet' type='text/css'>
	<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../config/koneksi.php";
	include "../../../config/fungsi_seo.php";

	$id_naskah 	= $_POST['id_naskah'];
	$id_dewan 	= $_POST['id_dewan'];
	$id_reviewer= $_POST['id_reviewer'];
	$id_penulis = $_POST['id_penulis'];
	$tgl=date('Y-m-d H:i:s');

	$cek 	= mysql_query("SELECT * FROM voting WHERE id_naskah = '$id_naskah' AND id_dewan = '$id_dewan'");
	$hasil = mysql_num_rows($cek);
	if($hasil == 0){
		$query 	="INSERT INTO voting(
		id_naskah,
		id_dewan,
		id_reviewer,
		tgl_dipilih
		) VALUES (
		'$id_naskah',
		'$id_dewan',
		'$id_reviewer',
		'$tgl'
		)";
		mysql_query($query) or die("Gagal menyimpan data");
	}else{
		$row = mysql_fetch_array($cek);
		$id_voting = $row['id'];
		$query1 ="UPDATE voting SET id_reviewer = '$id_reviewer' WHERE id = '$id_voting'";
		mysql_query($query1) or die("Gagal menyimpan data");
	}

	$ket = 'Dewan Editor Melakukan Voting';
	// $start_date = $_POST['start_date'];
	$start_date = $_POST['status_tgl'];
	$end_date = date('Y-m-d H:i:s');
	$dateTime = date('Y-m-d H:i:s');
	mysql_query("INSERT INTO countdown (id_naskah,id_user,duration,start_date,end_date,ket)VALUES('$id_naskah','$id_dewan','$duration','$start_date','$end_date','$ket')") or die(mysql_error());

	$update = "UPDATE naskah SET status_tgl='$dateTime' WHERE id_naskah ='$id_naskah'";
	$run = mysql_query($update) or die(mysql_error());

	$select = mysql_query("SELECT * FROM naskah WHERE id_naskah = '$id_naskah'");
    $baris = mysql_fetch_array($select);
    $judul	=$baris['judul'];

	$selectDewan = "SELECT * FROM users WHERE level = 'dewan' AND id_users = '$id_dewan'";
    $queryDewan = mysql_query($selectDewan) or die(mysql_error());
    if(mysql_num_rows($queryDewan) == 1){
      $baris = mysql_fetch_assoc($queryDewan);
      $namaDewan  = $baris['nama_lengkap'];
      $emailDewan = $baris['email'];
      $emailFrom    = $namaDewan."<".$emailDewan.">";
    }
    $selectReviewer = "SELECT * FROM users WHERE level = 'reviewer' AND id_users = '$id_reviewer'";
    $queryReviewer = mysql_query($selectReviewer) or die(mysql_error());
    if(mysql_num_rows($queryReviewer) == 1){
      $baris = mysql_fetch_assoc($queryReviewer);
      $namaReviewer  = $baris['nama_lengkap'];
      $nipReviewer   = $baris['nip'];
      $jabatanReviewer   = ucfirst($baris['jabatan']);
      $telpReviewer  = $baris['telp'];
      $emailReviewer = $baris['email'];
    }


    $selectEditor = "SELECT * FROM users WHERE level = 'editor'";
    $queryEditor = mysql_query($selectEditor) or die(mysql_error());
    while ($row = mysql_fetch_array($queryEditor)) {
      $namaEditor = $row['nama_lengkap'];
      $nipEditor = $row['nip'];
      $emailEditor = $row['email'];

      $to = $emailEditor;
      $subject = "Pemilihan Penelaah";
      $headers = "From: e-service <press@mail.lipi.go.id>\r\n";
      $headers .= "Reply-To: ".$emailFrom."\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8\r\n";
      include('../../../email/18-dewan-to-editor-pemilihan-reviewer.php');
      $mail_sent = @mail($to,$subject,$txt,$headers);
    }
	header("location:../../../media.php?hal=dewan-naskah&id=masuk");
}
?>
