<?php include('../../../config/koneksi.php');
if($_GET['action'] == 'delete'){
    $katID      = $_GET['katid'];
    $delete     = 'DELETE FROM kategori WHERE id_kategori ='.$katID;
    $result 	= mysql_query($delete) or die(mysql_error());
    if($result){
        header('Location: media.php?hal=editor-satker');
    }else{
        header('Location: media.php?hal=editor-satker');
    }
}elseif($_GET['action'] == 'edit'){
	$katID 		= $_POST['katid'];
	$kelas 		= $_POST['kelas'];
	$nama 		= $_POST['nama'];
	$alamat 	= $_POST['alamat'];
	$edit 		= 'UPDATE kategori SET kelas = "'.$kelas.'", alamat = "'.$alamat.'", nama = "'.$nama.'" WHERE id_kategori = '.$katID;
	$result 	= mysql_query($edit) or die(mysql_error());
	if($result){
		header('Location: media.php?hal=editor-satker');
	}else{
		header('Location: media.php?hal=editor-satker');
	}
}elseif($_GET['action'] == 'add'){
	$katID 		= $_POST['katid'];
	$kelas 		= $_POST['kelas'];
	$nama 		= $_POST['nama'];
	$alamat 	= $_POST['alamat'];
	$insert		= 'INSERT INTO kategori (kelas,nama,alamat)VALUES("'.$kelas.'","'.$nama.'","'.$alamat.'")';
	$result 	= mysql_query($insert) or die(mysql_error());
	if($result){
		header('Location: media.php?hal=editor-satker');
	}else{
		header('Location: media.php?hal=editor-satker');
	}
}else{
	header('Location: media.php?hal=editor-satker');
}
?>