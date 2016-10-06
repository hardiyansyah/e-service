<?php session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
	echo "<link href='style.css' rel='stylesheet' type='text/css'>
	<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}else{
	include "../../../config/koneksi.php";
	include "../../../config/fungsi_seo.php";

	$id_editor =$_POST['id_editor'];
	$id_penulis =$_POST['id_penulis'];
	$ket ="EDITOR Mulai Proses Review";

	$id_naskah = $_POST['idNaskah'];
	$naskah = mysql_query("SELECT * FROM naskah WHERE id_naskah = '$id_naskah' ") or die(mysql_error());
	$r_naskah = mysql_fetch_array($naskah);
	$judul_naskah = $r_naskah['judul'];
	$isi = "Anda ditugaskan untuk mulai menelaah naskah dengan judul ".$judul_naskah;
	$tgl=date('Y-m-d H:i:s');
	$start_date=$r_naskah['status_tgl'];
  $end_date=date('Y-m-d H:i:s');

	$select_reviwer = "SELECT * FROM voting WHERE status ='2' GROUP BY id_reviewer";
	$query_select = mysql_query($select_reviwer) or die(mysql_error());
	$query_select2 = mysql_query($select_reviwer) or die(mysql_error());
	if(mysql_num_rows($query_select) >= 1){
		$reviewer = "";
		while($r_reviewer = mysql_fetch_array($query_select)){
			$id_reviewer = $r_reviewer['id_reviewer'];
			$reviewer .= $id_reviewer.",";
		}

		$data = explode(",", $reviewer);
		$reviewer1 = $data[0]; $reviewer2 = $data[1];
		$update_naskah = "UPDATE naskah SET status = 'proses', reviewer1 = '$reviewer1', reviewer2 = '$reviewer2' WHERE id_naskah = '$id_naskah'";
		mysql_query($update_naskah)or die(mysql_error());
		// echo $update_naskah;
		while($row_reviewer = mysql_fetch_array($query_select2)){
			$id_reviewer = $row_reviewer['id_reviewer'];
			$link="?hal=reviewer-monitoring&id=".$id_naskah."&ref=".$id_reviewer;
			$query = "INSERT INTO pemberitahuan (id_naskah,id_users,isi,tanggal,link)VALUES('$id_naskah', '$id_reviewer', '$isi', '$tgl','$link')";
			mysql_query($query) or die(mysql_error());
			// echo $query;
		}
		mysql_query("INSERT INTO countdown (id_naskah,id_user,duration,start_date,end_date,ket)VALUES('$id_naskah','$id_editor','$duration','$start_date','$end_date','$ket')") or die(mysql_error());
	 $update = "UPDATE naskah SET status_tgl='$tgl' WHERE id_naskah ='$id_naskah'";
   $run = mysql_query($update) or die(mysql_error());
  }

	$select = mysql_query("SELECT * FROM naskah WHERE id_naskah = '$id_naskah'");
    $baris = mysql_fetch_array($select);
    $judul		=$baris['judul'];
    $sinopsis	=$baris['abstrak'];
    $instansi	=$baris['intansi'];
    $satker		=$baris['satker'];
    $hal		=$baris['halaman'];
    $id_penulis	=$baris['id_users'];

	$selectReviewer = "SELECT * FROM users WHERE level = 'reviewer' AND id_users = '$id_reviewer'";
    $queryReviewer = mysql_query($selectReviewer) or die(mysql_error());
    while ($row = mysql_fetch_array($queryReviewer)) {
      $namaReviewer = $row['nama_lengkap'];
      $emailReviewer= $row['email'];
    }
	$selectEditor = "SELECT * FROM users WHERE level = 'editor' AND id_users = '$id_editor'";
    $queryEditor = mysql_query($selectEditor) or die(mysql_error());
    while ($row = mysql_fetch_array($queryEditor)) {
      $namaEditor = $row['nama_lengkap'];
      $emailEditor = $row['email'];
	  $emailFrom    = $namaEditor."<".$emailEditor.">";

      $to = $emailReviewer;
      $subject = "Proses Telaah Sudah dimulai";
      $headers = "From: e-service <press@mail.lipi.go.id>\r\n";
      $headers .= "Reply-To: ".$emailFrom."\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8\r\n";
      include('../../../email/20-start-review-to-reviewer.php');
      $mail_sent = @mail($to,$subject,$txt,$headers);
    }
    $selectPenulis = "SELECT * FROM users WHERE level = 'penulis' AND id_users = '$id_penulis'";
    $queryPenulis = mysql_query($selectPenulis) or die(mysql_error());
    while ($row = mysql_fetch_array($queryPenulis)) {
      $namaPenulis = $row['nama_lengkap'];
      $emailPenulis = $row['email'];
	  
      $to = $emailPenulis;
      $subject = "Proses Telaah Sudah dimulai";
      $headers = "From: e-service <press@mail.lipi.go.id>\r\n";
      $headers .= "Reply-To: ".$emailFrom."\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8\r\n";
      include('../../../email/19-start-review-to-penulis.php');
      $mail_sent = @mail($to,$subject,$txt,$headers);
    }
    $selectDewan = "SELECT * FROM users WHERE level = 'dewan'";
    $queryDewan = mysql_query($selectDewan) or die(mysql_error());
    while ($row = mysql_fetch_array($queryDewan)) {
      $namaDewan = $row['nama_lengkap'];
      $emailDewan = $row['email'];
	  
      $to = $emailDewan;
      $subject = "Proses Telaah Sudah dimulai";
      $headers = "From: e-service <press@mail.lipi.go.id>\r\n";
      $headers .= "Reply-To: ".$emailFrom."\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8\r\n";
      include('../../../email/21-start-review-to-dewan.php');
      $mail_sent = @mail($to,$subject,$txt,$headers);
    }

  	header("location:../../../media.php?hal=editor-detail-rekomendasi&id=".$id_naskah);
}
	
?>