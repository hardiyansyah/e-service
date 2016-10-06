<?php session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
	echo "<link href='style.css' rel='stylesheet' type='text/css'>
	<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}else{
	include "../../../config/koneksi.php";
	include "../../../config/fungsi_seo.php";

	if($_POST['pilihan'] == 'TERIMA'){
		$pilihan = '2';
	}else{
		$pilihan = '1';
	}
	$ket = 'Kofirmasi Jawaban Penelaah';
	$start_date = $_POST['status_tgl'];
	$end_date = date('Y-m-d H:i:s');
	$dateTime = date('Y-m-d H:i:s');
	$id_reviewer = $_POST['id_reviewer'];
	$id_naskah = $_POST['id_naskah'];
	
	$update = "UPDATE voting SET status = '$pilihan' WHERE id_reviewer = '$id_reviewer' AND id_naskah = '$id_naskah'";
	$count ="INSERT INTO countdown (id_naskah,id_user,duration,start_date,end_date,ket)VALUES('$id_naskah','$id_reviewer','$duration','$start_date','$end_date','$ket')";
	mysql_query($update) or die("Gagal menyimpan data");
	mysql_query($count) or die("Gagal menyimpan data");

  $update = "UPDATE naskah SET status_tgl='$dateTime' WHERE id_naskah ='$id_naskah'";
  $run = mysql_query($update) or die(mysql_error());
  
  $voting = mysql_query("SELECT * FROM voting WHERE id_reviewer = '$id_reviewer' AND id_naskah = '$id_naskah' ") or die(mysql_error());
    $vot = mysql_fetch_array($voting);
    $status = $vot['status'];
    if($status == 1){
        $jawaban = 'Tidak Menyanggupi';
    }
    if($status == 2){
        $jawaban = 'Menyanggupi';
    }

	$select = mysql_query("SELECT * FROM naskah WHERE id_naskah = '$id_naskah'");
    $baris = mysql_fetch_array($select);
    $judul		=$baris['judul'];
    $sinopsis	=$baris['abstrak'];
    $instansi	=$baris['intansi'];
    $satker		=$baris['satker'];
    $hal		  =$baris['halaman'];

    $selectEditor = "SELECT * FROM users WHERE level = 'editor'";
    $queryEditor = mysql_query($selectEditor) or die(mysql_error());
    while ($row = mysql_fetch_array($queryEditor)) {
      $namaEditor = $row['nama_lengkap'];
      $emailEditor = $row['email'];
    
	$selectReviewer = "SELECT * FROM users WHERE level = 'reviewer' AND id_users = '$id_reviewer'";
    $queryReviewer = mysql_query($selectReviewer) or die(mysql_error());
    if(mysql_num_rows($queryReviewer) == 1){
      $baris = mysql_fetch_assoc($queryReviewer);
      $namaReviewer  = $baris['nama_lengkap'];
      $emailReviewer = $baris['email'];
      $jabatanReviewer = $baris['jabatan'];
      $nipReviewer = $baris['nip'];
      $telpReviewer = $baris['telp'];
      $emailFrom    = $namaReviewer."<".$emailReviewer.">";
    }
	 
      $to = $emailEditor;
      $subject = "Hasil Jawaban Kesanggupan atau Ketidaksangguapan Penelaah";
      $headers = "From: e-service <press@mail.lipi.go.id>\r\n";
      $headers .= "Reply-To: ".$emailFrom."\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8\r\n";
      include('../../../email/10-konfirmasi-sanggup-reviewer.php');
      $mail_sent = @mail($to,$subject,$txt,$headers);
    }

      $to = $emailReviewer;
      $subject = "Terimakasih Telah Memberikan Jawaban";
      $headers = "From: e-service <press@mail.lipi.go.id>\r\n";
      $headers .= "Reply-To: No Replay\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8\r\n";
      include('../../../email/8-reviewer-konfirmasi.php');
      $mail_sent = @mail($to,$subject,$txt,$headers);
    

  	header("location:../../../media.php?hal=informasi");
} ?>
