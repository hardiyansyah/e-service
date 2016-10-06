<?php
	include "../../../config/koneksi.php";

	$id_naskah = $_POST['id_naskah'];
	$id = $_POST['id'];

	$query = "DELETE FROM naskah WHERE id_naskah='$id_naskah'";
	$query1 = "DELETE FROM countdown WHERE id_naskah='$id_naskah'";
	$query2 = "DELETE FROM kepengarangan WHERE id_naskah='$id_naskah'";
	$query3 = "DELETE FROM matriks WHERE id_naskah='$id_naskah'";
	$query4 = "DELETE FROM pemberitahuan WHERE id_naskah='$id_naskah'";
	$query5 = "DELETE FROM rekomendasi WHERE id_naskah='$id_naskah'";
	$query6 = "DELETE FROM review WHERE id_naskah='$id_naskah'";
	$query7 = "DELETE FROM revisi WHERE id_naskah='$id_naskah'";
	$query8 = "DELETE FROM verifikasi WHERE id_naskah='$id_naskah'";
	$query9 = "DELETE FROM voting WHERE id_naskah='$id_naskah'";
  	mysql_query($query);
  	mysql_query($query1);
  	mysql_query($query2);
  	mysql_query($query3);
  	mysql_query($query4);
  	mysql_query($query5);
  	mysql_query($query6);
  	mysql_query($query7);
  	mysql_query($query8);
  	mysql_query($query9);
	
	if($query && $query1 && $query2 && $query3 && $query4 && $query5 && $query7 && $query8 && $query9){
		echo "
		<script type='text/javascript'>
			alert('Berhasil Hapus Naskah');
			window.location.href='../../../media.php?hal=editor-naskah&id=$id';
		</script>";

	}else{
		echo "<script type='text/javascript'>
			alert('Gagal Hapus Naskah');
			window.location.href='media.php?hal=editor-naskah&id=$id';
		</script>";
	}
?>