<?php include('../../../config/koneksi.php');

if($_GET['action'] == 'delete'){
    $userID      = $_GET['userid'];
    $delete     = 'DELETE FROM peneliti WHERE id_peneliti ='.$userID;
    $result 	= mysql_query($delete) or die(mysql_error());
    if($result){
        header('Location: media.php?hal=editor-import');
    }else{
        header('Location: media.php?hal=editor-import');
    }
}elseif($_GET['action'] == 'edit'){
	echo($_POST);
	$userID 			= $_POST['userid'];
	$nama_lengkap 		= $_POST['nama_lengkap'];
	$unit_kerja 		= $_POST['unit_kerja'];
	$bidang_kepakaran 	= $_POST['bidang_kepakaran'];
	$jabatan_peneliti 	= $_POST['jabatan_peneliti'];
	$instansi 			= $_POST['instansi'];
	$edit 		= 'UPDATE peneliti SET nama_lengkap = "'.$nama_lengkap.'", unit_kerja = "'.$unit_kerja.'", bidang_kepakaran = "'.$bidang_kepakaran.'", jabatan_peneliti = "'.$jabatan_peneliti.'", instansi = "'.$instansi.'" WHERE id_peneliti = '.$userID;
	$result 	= mysql_query($edit) or die(mysql_error());
	if($result){
		header('Location: media.php?hal=editor-import');
	}else{
		header('Location: media.php?hal=editor-import');
	}
}else{
	header('Location: media.php?hal=editor-import');
}
?>