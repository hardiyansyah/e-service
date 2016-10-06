<?php
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../media.php><b>LOGIN</b></a></center>";
}
else{
	include "../../../config/koneksi.php";
	// $server = "localhost";
	// $username = "root";
	// $password = "";
	// $database = "e-services";

	// Koneksi dan memilih database di server
	mysql_connect($server,$username,$password) or die("Koneksi gagal");
	mysql_select_db($database) or die("Database tidak bisa dibuka");

	$idUser = $_POST['idUser'];
	$level = $_POST['level'];
	$query = "DELETE FROM users WHERE id_users = '$idUser'";
	$hapus = mysql_query($query) or die(mysql_error());
	if($hapus){ ?>

		<script type='text/javascript'>
			alert('Succesfully Delete Account');
			window.location.href='media.php?hal=editor-user&id=<?php echo $level ?>';
		</script>
<?php
	}else{
		echo "<script type='text/javascript'>
			alert('Succesfully Delete Account');
			window.location.href='media.php?hal=editor-user&id=<?php echo $level ?>';
		</script>";
	}
}
?>