<?php
include "../../../config/koneksi.php";
	$user  	= $_POST['user'];
	$baru 	= $_POST['baru'];
	$new 	= md5($baru);
	$lama 	= md5($_POST['lama']);
	$level 	= $_POST['level'];
	
	$query = mysql_query("SELECT * from users WHERE username = '$user' AND password = '$lama'");
	if(mysql_num_rows($query) == 1){
		$ganti = mysql_query("UPDATE users SET password='$new' WHERE username='$user' ") or die(mysql_error());
		if($ganti){
			echo "<center>Password Berhasil dirubah menjadi '<strong><em>".$baru."</em></strong>' <br><a href='../../../media.php?hal=dashboard-".$level."'>back</a></center>";
		}else{
			echo "<center>Gagal Merubah Password<br><a href='../../../media.php?hal=dashboard-".$level."'>back</a></center>";
		}
	}else{
		//lempar ke ganti pass
		echo "<center>GAGAL !!! Mohon Maaf Password Lama Anda Salah<br><a href='../../../media.php?hal=dashboard-".$level."'>back</a></center>";
	}	
?>