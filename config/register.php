<?php
// error_reporting(1);
if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['nama']) && !empty($_POST['email'])){

	include "koneksi.php";
	function antiinjection($data){
	  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
	  return $filter_sql;
	}

	$id_users 		= '';
	$username 		= antiinjection($_POST['username']);
	$password 		= antiinjection(md5($_POST['password']));
	$nama_lengkap 	= antiinjection($_POST['nama']);
	$nip 			= 0;
	$alamat 		= 'Tidak Ada';
	$email 			= antiinjection($_POST['email']);
	$jabatan 		= 'penulis';
	$tgl_lahir 		= '1990-01-01';
	$telp 			= 0;
	$fax 			= 0;
	$rwy_pendidikan = 'Tidak Ada';
	$karya 			= 'Tidak Ada';
	$catatan 		= 'Tidak Ada';
	$level 			= 'penulis';
	$blokir 		= 'N';
	$foto 			= 'no-foto.jpg';

	$q = "SELECT * FROM users WHERE username = '$username'";
	$cek_exist = mysql_query($q);
	$result	= mysql_num_rows($cek_exist);

	// Apabila username atau email ditemukan
	if ($result > 0){
		echo "<link href='css/screen.css' rel='stylesheet' type='text/css'><link href='css/reset.css' rel='stylesheet' type='text/css'>";
	  	echo "<center><br><br><br><br><br><br><b>REGISTER GAGAL! </b><br> 
	        Username Anda sudah terdaftar.<br>
	        Atau account Anda sedang diblokir.<br><br>";
	        // local
		// echo "<div> <a href='index.php'><img src='http://localhost/e-services/img/blueimp/error.png' <br><br><br><br></a></div>";
		// web
		echo "<div> <a href='index.php'><img src='http://e-service.lipipress.lipi.go.id/img/blueimp/error.png' <br><br><br><br></a></div>";
	  	echo "<input type=button class='tombol' value='LOGIN DISINI' onclick=location.href='./'></a></center>";
	}else{
		// Insert data baru kedalam database
		$query = "INSERT INTO users (id_users,username,password,nama_lengkap,nip,alamat,email,jabatan,tgl_lahir,telp,fax,rwy_pendidikan,karya,catatan,level,blokir,foto)VALUES('$id_users','$username','$password','$nama_lengkap','$nip','$alamat','$email','$jabatan','$tgl_lahir','$telp','$fax','$rwy_pendidikan','$karya','$catatan','$level','$blokir','$foto')";
		
		$insert = mysql_query($query);
		if($insert){
			$query = mysql_query("SELECT * FROM users WHERE username = '$username' && password = '$password'");
			$row = mysql_fetch_array($query);
			// Apabila data berhasil masuk
			if(mysql_num_rows($query) > 0){
				session_start();
				$_SESSION[namauser]     = $row[username];
				$_SESSION[namalengkap]  = $row[nama_lengkap];
				$_SESSION[passuser]     = $row[password];
				$_SESSION[leveluser]    = $row[level];
				$_SESSION[iduser]       = $row[id_editor];
				header('location:./media.php?hal=profil');
			}else{
				header('location:./');
			}
		}
	}
}else{
	header('location: http://e-service.lipipress.lipi.go.id/register');
}

?>
