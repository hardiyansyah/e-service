<?php
if(!empty($_POST['username'])){

	include "koneksi.php";
	function antiinjection($data){
	  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
	  return $filter_sql;
	}

	$username = antiinjection($_POST['username']);
	$email = antiinjection($_POST['email']);
	$password = substr(md5(uniqid(rand(),1)),3,10);
	$newPass = md5($password);
	
	$query = "SELECT * FROM users WHERE username ='$username' AND email ='$email'";
	$cekUser = mysql_query($query);
	$baris = mysql_fetch_array($cekUser);
	$jumlahRow = mysql_num_rows($cekUser);

	if($jumlahRow > 0){
		mysql_query("UPDATE users SET password = '$newPass' WHERE username = '$username';");
		echo "<link href='css/screen.css' rel='stylesheet' type='text/css'><link href='css/reset.css' rel='stylesheet' type='text/css'>";
		echo "<center><br><br><br><br><br><br><b>RESET BERHASIL! <br>PASSWORD BARU ANDA ".$password."</b><br> 
	        Silahkan anda cek Email Anda<br>
	        Kami telah mengirimkan perubahan email untuk akun Anda<br><br>";
		echo "<div> <a href='index.php'><img src='http://e-service.lipipress.lipi.go.id/img/blueimp/ok.png' <br><br><br><br></a>
			</div>";
		echo "<input type=button class='tombol' value='LOG IN' onclick=location.href='./'></a></center>";
	  $emailFrom ='noreply@lipipress.lipi.go.id';
	  $to = $baris['email'];
	  $namaUsers = $baris['nama_lengkap'];
      $subject = "RESET Password";
      $headers = "From: e-service <press@lipipress.lipi.go.id>\r\n";
      $headers .= "noreply: ".$emailFrom."\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8\r\n";
      include('../email/forgot-password.php');
      $sentmail = mail($to, $subject, $txt, $headers);
	}else{
		echo "<link href='css/screen.css' rel='stylesheet' type='text/css'><link href='css/reset.css' rel='stylesheet' type='text/css'>";
		echo "<center><br><br><br><br><br><br><b>RESET GAGAL! </b><br> 
	        Username atau email yang anda masukkan tidak sesuai<br>
	        atau tidak terdaftar pada database kami<br><br>";
		echo "<div> <a href='index.php'><img src='http://e-service.lipipress.lipi.go.id/img/blueimp/error.png' <br><br><br><br></a>
			</div>";
		echo "<input type=button class='tombol' value='DAFTARKAN' onclick=location.href='./register'></a></center>";
	}
	
}else{
	echo "<link href='css/screen.css' rel='stylesheet' type='text/css'><link href='css/reset.css' rel='stylesheet' type='text/css'>";
	echo "<center><br><br><br><br><br><br><b>RESET GAGAL! </b><br> 
        Anda Tidak memasukkan Email dengan benar<br>
        Atau account Anda sedang diblokir.<br><br>";
	echo "<div> <a href='index.php'><img src='http://e-service.lipipress.lipi.go.id/img/blueimp/error.png' <br><br><br><br></a>
		</div>";
	echo "<input type=button class='tombol' value='ULANGI LAGI' onclick=location.href='./forgot'></a></center>";
}

?>
