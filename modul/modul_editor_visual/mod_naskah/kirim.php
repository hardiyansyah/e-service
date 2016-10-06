<?php 
if(!empty($_POST['id']) && !empty($_POST['emailEditor'])){

	$id = $_POST['id'];
	$emailEditor = $_POST['emailEditor'];
	$namaEditor = $_POST['namaEditor'];
	$idUser = $_POST['idUser'];
	$idPenulis = $_POST['idPenulis'];
	$idNaskah = $_POST['idNaskah'];
	$duration = $_POST['duration'];
	$ket = 'Editor Kirim Ke Dewan Untuk Melakukan Voting';
	$start_date = $_POST['tgl'];
	$end_date = date('Y-m-d H:i:s');
	$datetime = date('Y-m-d H:i:s');

	include ('../../../config/koneksi.php');
	mysql_query("INSERT INTO countdown (id_naskah,id_user,duration,start_date,end_date,ket)VALUES('$id','$idUser','$duration','$start_date','$end_date','$ket')") or die(mysql_error());

	$up = "UPDATE naskah SET editor = '$namaEditor' WHERE id_naskah = '$id'";
	$jalan = mysql_query($up)or die(mysql_error());
	
		$update = "UPDATE naskah SET status_kirim ='2', status_tgl='$datetime' WHERE id_naskah ='$id'";
		$run = mysql_query($update) or die(mysql_error());

 	
 	$selectPenulis = "SELECT * FROM users WHERE level = 'penulis' AND id_users = '$idPenulis'";
    $queryPenulis = mysql_query($selectPenulis) or die(mysql_error());
    if(mysql_num_rows($queryPenulis) == 1){
      $baris = mysql_fetch_assoc($queryPenulis);
      $namaPenulis  = $baris['nama_lengkap'];
      $nipPenulis   = $baris['nip'];
      $jabatanPenulis   = ucfirst($baris['jabatan']);
      $telpPenulis  = $baris['telp'];
      $emailPenulis = $baris['email'];
      $emailFrom = $namaPenulis."<".$emailPenulis.">";
    }
 	$select = mysql_query("SELECT * FROM naskah WHERE id_users = '$idPenulis' AND id_naskah= '$idNaskah'");
    $baris = mysql_fetch_array($select);
    $idNaskah = $baris['id_naskah'];
    $idUser = $baris['id_users'];
    $intansi = $baris['intansi'];
    $satker = $baris['satker'];
    $sinopsis = $baris['abstrak'];
    $status = $baris['status'];
    $judul = $baris['judul'];
    $linknaskah = "".$site."print.php?&id=".$idNaskah."";

	$dewan = "SELECT * FROM users WHERE level = 'dewan'";
	$daftarDewan = mysql_query($dewan) or die(mysql_error());
	if($daftarDewan){
		while($row = mysql_fetch_array($daftarDewan)){
			$emailDewan = $row['email'];

			$to = $emailDewan;
			$subject = "Permohonan Nama Penelaah";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8\r\n";
			$headers .= "From: e-service <press@mail.lipi.go.id>\r\n";
			$headers .= "Reply-to: ".$emailEditor."\r\n";
			include('../../../email/4-editor-to-dewan.php');

			if(mail($to,$subject,$txt,$headers)){
				// echo "Email Terkirim Ke Dewan";
				// echo $duration;
			}else{
				echo "Email not Sent";
			}
		}
	}
}else{
	header('location:../../../pages-error-404-2.html');
}
?>