<?php
session_start();
  if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'><center>Untuk mengakses hal, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}else{

include "../../../config/koneksi.php";
	$id = $_POST['id'];
	$id_penulis = $_POST['id_penulis'];
	$id_editor = $_POST['id_editor'];
    $namaEditor = $_POST['namaEditor'];
    $hasil = $_POST['hasil'];
	$end_date = date('Y-m-d H:i:s');
	$start_date = $_POST['tgl'];
	$tgl = date('Y-m-d H:i:s');
    $ket = 'Editor Verifikasi Kelengkapan Naskah';

	
	$hal_judul = array_filter($_POST['hal_judul']);
 	$jumlahhal_judul = count($hal_judul);
 	$ihal_judul = 1;
  	$hal_judulnya = '';
  	foreach($hal_judul as $keyhal_judul => $nhal_judul ) {
    if($jumlahhal_judul == $ihal_judul){
      $tanda = "";
    }else{
      $tanda = ", ";
    }
    $hal_judulnya .= $nhal_judul.$tanda;
    $ihal_judul++;
  	}

  	$hal_persembahan = array_filter($_POST['hal_persembahan']);
 	$jumlahhal_persembahan = count($hal_persembahan);
 	$ihal_persembahan = 1;
  	$hal_persembahannya = '';
  	foreach($hal_persembahan as $keyhal_persembahan => $nhal_persembahan ) {
    if($jumlahhal_persembahan == $ihal_persembahan){
      $tanda = "";
    }else{
      $tanda = ", ";
    }
    $hal_persembahannya .= $nhal_persembahan.$tanda;
    $ihal_persembahan++;
  	}

  	$kata_pengantar = array_filter($_POST['kata_pengantar']);
 	$jumlahkata_pengantar = count($kata_pengantar);
 	$ikata_pengantar = 1;
  	$kata_pengantarnya = '';
  	foreach($kata_pengantar as $keykata_pengantar => $nkata_pengantar ) {
    if($jumlahkata_pengantar == $ikata_pengantar){
      $tanda = "";
    }else{
      $tanda = ", ";
    }
    $kata_pengantarnya .= $nkata_pengantar.$tanda;
    $ikata_pengantar++;
  	}
	
	$prakata = array_filter($_POST['prakata']);
 	$jumlahprakata = count($prakata);
 	$iprakata = 1;
  	$prakatanya = '';
  	foreach($prakata as $keyprakata => $nprakata ) {
    if($jumlahprakata == $iprakata){
      $tanda = "";
    }else{
      $tanda = ", ";
    }
    $prakatanya .= $nprakata.$tanda;
    $iprakata++;
  	}

  	$daftar_isi = array_filter($_POST['daftar_isi']);
 	$jumlahdaftar_isi = count($daftar_isi);
 	$idaftar_isi = 1;
  	$daftar_isinya = '';
  	foreach($daftar_isi as $keydaftar_isi => $ndaftar_isi ) {
    if($jumlahdaftar_isi== $idaftar_isi){
      $tanda = "";
    }else{
      $tanda = ", ";
    }
    $daftar_isinya .= $ndaftar_isi.$tanda;
    $idaftar_isi++;
  	}

  	$daftar_gambar = array_filter($_POST['daftar_gambar']);
 	$jumlahdaftar_gambar= count($daftar_gambar);
 	$idaftar_gambar= 1;
  	$daftar_gambarnya = '';
  	foreach($daftar_gambar as $keydaftar_gambar => $ndaftar_gambar) {
    if($jumlahdaftar_gambar== $idaftar_gambar){
      $tanda = "";
    }else{
      $tanda = ", ";
    }
    $daftar_gambarnya .= $ndaftar_gambar.$tanda;
    $idaftar_gambar++;
  	}

  	$daftar_tabel = array_filter($_POST['daftar_tabel']);
 	$jumlahdaftar_tabel= count($daftar_tabel);
 	$idaftar_tabel= 1;
  	$daftar_tabelnya = '';
  	foreach($daftar_tabel as $keydaftar_tabel => $ndaftar_tabel) {
    if($jumlahdaftar_tabel== $idaftar_tabel){
      $tanda = "";
    }else{
      $tanda = ", ";
    }
    $daftar_tabelnya .= $ndaftar_tabel.$tanda;
    $idaftar_tabel++;
  	}

  $daftar_lampiran= array_filter($_POST['daftar_lampiran']);
 	$jumlahdaftar_lampiran= count($daftar_lampiran);
 	$idaftar_lampiran= 1;
  	$daftar_lampirannya = '';
  	foreach($daftar_lampiran as $keydaftar_lampiran => $ndaftar_lampiran) {
    if($jumlahdaftar_lampiran== $idaftar_lampiran){
      $tanda = "";
    }else{
      $tanda = ", ";
    }
    $daftar_lampirannya .= $ndaftar_lampiran.$tanda;
    $idaftar_lampiran++;
  	}

  $pendahuluan= array_filter($_POST['pendahuluan']);
  $jumlahpendahuluan= count($pendahuluan);
  $ipendahuluan= 1;
    $pendahuluannya = '';
    foreach($pendahuluan as $keypendahuluan => $npendahuluan) {
    if($jumlahpendahuluan== $ipendahuluan){
      $tanda = "";
    }else{
      $tanda = ", ";
    }
    $pendahuluannya .= $npendahuluan.$tanda;
    $ipendahuluan++;
    }

  $bagian= array_filter($_POST['bagian']);
  $jumlahbagian= count($bagian);
  $ibagian= 1;
    $bagiannya = '';
    foreach($bagian as $keybagian => $nbagian) {
    if($jumlahbagian == $ibagian){
      $tanda = "";
    }else{
      $tanda = ", ";
    }
    $bagiannya .= $nbagian.$tanda;
    $ibagian++;
    }

  $bab= array_filter($_POST['bab']);
  $jumlahbab= count($bab);
  $ibab= 1;
    $babnya = '';
    foreach($bab as $keybab => $nbab) {
    if($jumlahbab == $ibab){
      $tanda = "";
    }else{
      $tanda = ", ";
    }
    $babnya .= $nbab.$tanda;
    $ibab++;
    }

  $subbab= array_filter($_POST['subbab']);
  $jumlahsubbab= count($subbab);
  $isubbab= 1;
    $subbabnya = '';
    foreach($subbab as $keysubbab => $nsubbab) {
    if($jumlahsubbab == $isubbab){
      $tanda = "";
    }else{
      $tanda = ", ";
    }
    $subbabnya .= $nsubbab.$tanda;
    $isubbab++;
    }

  $gambar= array_filter($_POST['gambar']);
  $jumlahgambar= count($gambar);
  $igambar= 1;
    $gambarnya = '';
    foreach($gambar as $keygambar => $ngambar) {
    if($jumlahgambar == $igambar){
      $tanda = "";
    }else{
      $tanda = ", ";
    }
    $gambarnya .= $ngambar.$tanda;
    $igambar++;
    }

  $tabel= array_filter($_POST['tabel']);
  $jumlahtabel= count($tabel);
  $itabel= 1;
    $tabelnya = '';
    foreach($tabel as $keytabel => $ntabel) {
    if($jumlahtabel == $itabel){
      $tanda = "";
    }else{
      $tanda = ", ";
    }
    $tabelnya .= $ntabel.$tanda;
    $itabel++;
    }

  $epilog= array_filter($_POST['epilog']);
  $jumlahepilog= count($epilog);
  $iepilog= 1;
    $epilognya = '';
    foreach($epilog as $keyepilog => $nepilog) {
    if($jumlahepilog == $iepilog){
      $tanda = "";
    }else{
      $tanda = ", ";
    }
    $epilognya .= $nepilog.$tanda;
    $iepilog++;
    }

  $daftar_pustaka= array_filter($_POST['daftar_pustaka']);
  $jumlahdaftar_pustaka= count($daftar_pustaka);
  $idaftar_pustaka= 1;
    $daftar_pustakanya = '';
    foreach($daftar_pustaka as $keydaftar_pustaka => $ndaftar_pustaka) {
    if($jumlahdaftar_pustaka == $idaftar_pustaka){
      $tanda = "";
    }else{
      $tanda = ", ";
    }
    $daftar_pustakanya .= $ndaftar_pustaka.$tanda;
    $idaftar_pustaka++;
    }

  $biodata= array_filter($_POST['biodata']);
  $jumlahbiodata= count($biodata);
  $ibiodata= 1;
    $biodatanya = '';
    foreach($biodata as $keybiodata => $nbiodata) {
    if($jumlahbiodata == $ibiodata){
      $tanda = "";
    }else{
      $tanda = ", ";
    }
    $biodatanya .= $nbiodata.$tanda;
    $ibiodata++;
    }

  $daftar_istilah= array_filter($_POST['daftar_istilah']);
  $jumlahdaftar_istilah= count($daftar_istilah);
  $idaftar_istilah= 1;
    $daftar_istilahnya = '';
    foreach($daftar_istilah as $keydaftar_istilah => $ndaftar_istilah) {
    if($jumlahdaftar_istilah == $idaftar_istilah){
      $tanda = "";
    }else{
      $tanda = ", ";
    }
    $daftar_istilahnya .= $ndaftar_istilah.$tanda;
    $idaftar_istilah++;
    }

  $daftar_singkatan= array_filter($_POST['daftar_singkatan']);
  $jumlahdaftar_singkatan= count($daftar_singkatan);
  $idaftar_singkatan= 1;
    $daftar_singkatannya = '';
    foreach($daftar_singkatan as $keydaftar_singkatan => $ndaftar_singkatan) {
    if($jumlahdaftar_singkatan == $idaftar_singkatan){
      $tanda = "";
    }else{
      $tanda = ", ";
    }
    $daftar_singkatannya .= $ndaftar_singkatan.$tanda;
    $idaftar_singkatan++;
    }

  $lampiran= array_filter($_POST['lampiran']);
  $jumlahlampiran= count($lampiran);
  $ilampiran= 1;
    $lampirannya = '';
    foreach($lampiran as $keylampiran => $nlampiran) {
    if($jumlahlampiran == $ilampiran){
      $tanda = "";
    }else{
      $tanda = ", ";
    }
    $lampirannya .= $nlampiran.$tanda;
    $ilampiran++;
    }

  $dex= array_filter($_POST['dex']);
  $jumlahdex= count($dex);
  $idex= 1;
    $dexnya = '';
    foreach($dex as $keydex => $ndex) {
    if($jumlahdex == $idex){
      $tanda = "";
    }else{
      $tanda = ", ";
    }
    $dexnya .= $ndex.$tanda;
    $idex++;
    }

//  $blu= array_filter($_POST['blu']);
//  $jumlahblu= count($blu);
//  $iblu= 1;
//    $blunya = '';
//    foreach($blu as $keyblu => $nblu) {
//    if($jumlahblu == $iblu){
//      $tanda = "";
//    }else{
//      $tanda = ", ";
//    }
//    $blunya .= $nblu.$tanda;
//    $iblu++;
//    }

  $prolog= array_filter($_POST['prolog']);
  $jumlahprolog= count($prolog);
  $iprolog= 1;
    $prolognya = '';
    foreach($prolog as $keyprolog => $nprolog) {
    if($jumlahprolog == $iprolog){
      $tanda = "";
    }else{
      $tanda = ", ";
    }
    $prolognya .= $nprolog.$tanda;
    $iprolog++;
    }

	mysql_query("INSERT INTO countdown (id_naskah,id_user,duration,start_date,end_date,ket)VALUES('$id','$id_editor','$duration','$start_date','$end_date','$ket')") or die(mysql_error());

	mysql_query("INSERT INTO verifikasi (id_naskah,
										id_penulis,
										id_editor,
										tgl,
										catatan,
										hal_judul,
										hal_persembahan,
										kata_pengantar,
										prakata,
										daftar_isi,
										daftar_gambar,
										daftar_tabel,
										daftar_lampiran,
					                    pendahuluan,
					                    bagian,
					                    bab,
					                    subbab,
					                    gambar,
					                    tabel,
					                    epilog,
					                    daftar_pustaka,
					                    biodata,
					                    daftar_istilah,
					                    daftar_singkatan,
					                    lampiran,
					                    dex,
					                    blu,
					                    prolog,
					                    hasil
										)
										VALUES
										('$id',
										'$id_penulis',
										'$id_editor',
										'$tgl',
										'$_POST[catatan]',
										'$hal_judulnya',
										'$hal_persembahannya',
										'$kata_pengantarnya',
										'$prakatanya',
										'$daftar_isinya',
										'$daftar_gambarnya',
										'$daftar_tabelnya',
										'$daftar_lampirannya',
					                    '$pendahuluannya',
					                    '$bagiannya',
					                    '$babnya',
					                    '$subbabnya',
					                    '$gambarnya',
					                    '$tabelnya',
					                    '$epilognya',
					                    '$daftar_pustakanya',
					                    '$biodatanya',
					                    '$daftar_istilahnya',
					                    '$daftar_singkatannya',
					                    '$lampirannya',
					                    '$dexnya',
					                    '$blunya',
					                    '$prolognya',
					                    '$hasil'
										)") 
										or die(mysql_error());

if ($hasil=='Lolos Verifikasi') {
	$up = "UPDATE naskah SET status = 'masuk' ,editor='$namaEditor', status_tgl='$tgl' WHERE id_naskah = '$id'";
	$jalan = mysql_query($up)or die(mysql_error());

	$verifikasi = mysql_query("SELECT * FROM verifikasi WHERE id_naskah = '$id' ORDER BY id_verifikasi DESC");
    $ver = mysql_fetch_array($verifikasi);
    $catatan =$ver['catatan'];
    $hal_judul=$ver['hal_judul'];
    $hal_persembahan = $ver['hal_persembahan'];
    $kata_pengantar = $ver['kata_pengantar'];
    $prakata=$ver['prakata'];
    $daftar_isi = $ver['daftar_isi'];
    $daftar_gambar =$ver['daftar_gambar'];
    $daftar_tabel =$ver['daftar_tabel'];
    $daftar_lampiran =$ver['daftar_lampiran'];
    $pendahuluan =$ver['pendahuluan'];
    $bagian =$ver['bagian'];
    $bab =$ver['bab'];
    $subbab=$ver['subbab'];
    $gambar=$ver['gambar'];
    $tabel =$ver['tabel'];
    $epilog=$ver['epilog'];
    $daftar_pustaka=$ver['daftar_pustaka'];
    $biodata=$ver['biodata'];
    $daftar_istilah=$ver['daftar_istilah'];
    $daftar_singkatan=$ver['daftar_singkatan'];
    $lampiran=$ver['lampiran'];
    $dex=$ver['dex'];
    $blu=$ver['blu'];
    $prolog=$ver['prolog'];
    $hasil=$ver['hasil'];

  $select = mysql_query("SELECT * FROM naskah WHERE id_naskah = '$id'");
    $baris = mysql_fetch_array($select);
    $judul    =$baris['judul'];
    $sinopsis =$baris['abstrak'];
    $instansi =$baris['intansi'];
    $satker   =$baris['satker'];
    $hal    =$baris['halaman'];

  $selectPenulis = "SELECT * FROM users WHERE level = 'penulis' AND id_users = '$id_penulis'";
    $queryPenulis = mysql_query($selectPenulis) or die(mysql_error());
    if(mysql_num_rows($queryPenulis) == 1){
      $baris = mysql_fetch_assoc($queryPenulis);
      $namaPenulis  = $baris['nama_lengkap'];
      $emailPenulis = $baris['email'];
    }
    $isi = ' Selamat ! Naskah Anda dengan judul ' .$judul.', '.$hasil.'';
    $baca = 'N';
    $link ='?hal=penulis-naskah';
    $query2="INSERT INTO pemberitahuan (id_naskah,id_users,isi,tanggal,baca,link)
                VALUES('$id',
                '$id_penulis',
                '$isi',
                '$tgl',
                '$baca',
                '$link')";
    $jalan2 = mysql_query($query2)or die(mysql_error());
    $selectEditor = "SELECT * FROM users WHERE level = 'editor' AND id_users = '$id_editor'";
    $queryEditor = mysql_query($selectEditor) or die(mysql_error());
    while ($row = mysql_fetch_array($queryEditor)) {
      $namaEditor = $row['nama_lengkap'];
      $emailEditor = $row['email'];
      $emailFrom    = $namaEditor."<".$emailEditor.">";

      $to = $emailPenulis;
      $subject = "Verifikasi Kelengkapan Naskah";
      $headers = "From: e-service <press@mail.lipi.go.id>\r\n";
      $headers .= "Reply-To: ".$emailFrom."\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8\r\n";
      include('../../../email/19-verifikasi-kelengkapan-naskah-lolos.php');
      $mail_sent = @mail($to,$subject,$txt,$headers);
    }
 header("location:../../../media.php?hal=editor-naskah&id=masuk");
}else{
	$up = "UPDATE naskah SET status = 'ditolak', editor='$namaEditor', status_tgl='$tgl' WHERE id_naskah = '$id'";
	$jalan = mysql_query($up)or die(mysql_error());
    $verifikasi = mysql_query("SELECT * FROM verifikasi WHERE id_naskah = '$id' ORDER BY id_verifikasi DESC");
    $ver = mysql_fetch_array($verifikasi);
    $catatan =$ver['catatan'];
    $hal_judul=$ver['hal_judul'];
    $hal_persembahan = $ver['hal_persembahan'];
    $kata_pengantar = $ver['kata_pengantar'];
    $prakata=$ver['prakata'];
    $daftar_isi = $ver['daftar_isi'];
    $daftar_gambar =$ver['daftar_gambar'];
    $daftar_tabel =$ver['daftar_tabel'];
    $daftar_lampiran =$ver['daftar_lampiran'];
    $pendahuluan =$ver['pendahuluan'];
    $bagian =$ver['bagian'];
    $bab =$ver['bab'];
    $subbab=$ver['subbab'];
    $gambar=$ver['gambar'];
    $tabel =$ver['tabel'];
    $epilog=$ver['epilog'];
    $daftar_pustaka=$ver['daftar_pustaka'];
    $biodata=$ver['biodata'];
    $daftar_istilah=$ver['daftar_istilah'];
    $daftar_singkatan=$ver['daftar_singkatan'];
    $lampiran=$ver['lampiran'];
    $dex=$ver['dex'];
    $blu=$ver['blu'];
    $prolog=$ver['prolog'];
    $hasil=$ver['hasil'];

  $select = mysql_query("SELECT * FROM naskah WHERE id_naskah = '$id'");
    $baris = mysql_fetch_array($select);
    $judul    =$baris['judul'];
    $sinopsis =$baris['abstrak'];
    $instansi =$baris['intansi'];
    $satker   =$baris['satker'];
    $hal    =$baris['halaman'];

  $selectPenulis = "SELECT * FROM users WHERE level = 'penulis' AND id_users = '$id_penulis'";
    $queryPenulis = mysql_query($selectPenulis) or die(mysql_error());
    if(mysql_num_rows($queryPenulis) == 1){
      $baris = mysql_fetch_assoc($queryPenulis);
      $namaPenulis  = $baris['nama_lengkap'];
      $emailPenulis = $baris['email'];
    }
  $isi = ' Naskah Anda dengan judul ' .$judul.', '.$hasil.' lengkapi kembali persyaratan naskah Anda';
  $baca = 'N';
  $link ='?hal=penulis-permohonan';
  $query3="INSERT INTO pemberitahuan (id_naskah,id_users,isi,tanggal,baca,link)
                VALUES('$id',
                '$id_penulis',
                '$isi',
                '$tgl',
                '$baca',
                '$link')";
  $jalan3 = mysql_query($query3)or die(mysql_error());
    $selectEditor = "SELECT * FROM users WHERE level = 'editor' AND id_users = '$id_editor'";
    $queryEditor = mysql_query($selectEditor) or die(mysql_error());
    while ($row = mysql_fetch_array($queryEditor)) {
      $namaEditor = $row['nama_lengkap'];
      $emailEditor = $row['email'];
      $emailFrom    = $namaEditor."<".$emailEditor.">";

      $to = $emailPenulis;
      $subject = "Verifikasi Kelengkapan Naskah";
      $headers = "From: e-service <press@mail.lipi.go.id>\r\n";
      $headers .= "Reply-To: ".$emailFrom."\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8\r\n";
      include('../../../email/19-verifikasi-kelengkapan-naskah-no-lolos.php');
      $mail_sent = @mail($to,$subject,$txt,$headers);
    }
 header("location:../../../media.php?hal=editor-naskah&id=masuk"); 	
 	}
}
?>