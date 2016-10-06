<?php
include "koneksi.php";
function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}

$username = antiinjection($_POST['username']);
$pass     = antiinjection(md5($_POST['password']));

$login=mysql_query("SELECT * FROM admins WHERE username='$username' AND password='$pass' AND blokir='N'");
$r=mysql_fetch_array($login);

//apabila bukan admin yang login
if(!$r){
	$login2=mysql_query("SELECT * FROM users WHERE username='$username' AND password='$pass'");
	$r2=mysql_fetch_array($login2);
	
	if($r2){
		//done login
		session_regenerate_id();
		include "timeout.php";
		$_SESSION['id_user'] 		= $r2['id_users'];
		$_SESSION['namauser']     = $r2['username'];
		$_SESSION['namalengkap'] 	= $r2['nama_lengkap'];
		$_SESSION['passuser']     = $r2['password'];
		$_SESSION['leveluser']    = $r2['level'];
		$_SESSION['email']		= $r2['email'];
		$_SESSION['jabatan']		= $r2['jabatan'];
		session_write_close();
		
		header('location:media.php?hal=dashboard-'.$_SESSION['leveluser']);
		// echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
		$failed = 'no';
	}else{
		//failed login
		$failed = 'yes';
	}
}
// Apabila username dan password ditemukan
if ($r > '0'){
  unset($_SESSION['id_user']);
  unset($_SESSION['namauser']);
  unset($_SESSION['namalengkap']);
  unset($_SESSION['passuser']);
  unset($_SESSION['leveluser']);
  unset($_SESSION['iduser']);
  unset($_SESSION['email']);
  unset($_SESSION['jabatan']);
  session_destroy();
  header('location:../media.php?hal=dashboard-'.$_SESSION['leveluser']);
}else{
	if($failed == 'yes'){
	echo "<link href='css/screen.css' rel='stylesheet' type='text/css'><link href='css/reset.css' rel='stylesheet' type='text/css'>";
	echo "<center><br><br><br><br><br><br><b>LOGIN GAGAL! </b><br> 
		Username atau Password Anda tidak benar.<br>
		Atau account Anda sedang diblokir.<br><br>";
	echo "<div> <a href='index.php'><img src='../img/blueimp/error.png' <br><br><br><br></a>
	     </div>";
	echo "<input type=button class='tombol' value='ULANGI LAGI' onclick=location.href='../index.php'></a></center>";
	}else{
		//noop
	}
}
?>
