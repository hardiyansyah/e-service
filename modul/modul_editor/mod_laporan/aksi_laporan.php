<?php session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
  <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}else{
  include "../../../config/koneksi.php";
  include "../../../config/fungsi_seo.php";

  $id_users =$_POST['id_users'];
  $id_naskah =$_POST['id_naskah'];
  $isi  =$_POST['pesan'];
  $id_editor =$_POST['id_editor'];
  $link  ="?hal=informasi";
  $tgl=date('Y-m-d H:i:s');

  $query = "INSERT INTO pemberitahuan (id_naskah,id_users,isi,tanggal,link)VALUES('$id_naskah', '$id_users', '$isi', '$tgl','$link')";
  mysql_query($query) or die(mysql_error());
      // echo $query;
    }

  $select = mysql_query("SELECT * FROM naskah WHERE id_naskah = '$id_naskah'");
    $baris = mysql_fetch_array($select);
    $judul    =$baris['judul'];
    $sinopsis =$baris['abstrak'];
    $instansi =$baris['intansi'];
    $satker   =$baris['satker'];
    $hal    =$baris['halaman'];
    $id_penulis =$baris['id_users'];

   $selectEditor = "SELECT * FROM users WHERE level = 'editor' AND id_users = '$id_editor'";
    $queryEditor = mysql_query($selectEditor) or die(mysql_error());
    while ($row = mysql_fetch_array($queryEditor)) {
      $namaEditor = $row['nama_lengkap'];
      $emailEditor = $row['email'];
    $emailFrom    = $namaEditor."<".$emailEditor.">";

    $selectUsers = "SELECT * FROM users WHERE id_users = '$id_users'";
    $queryUsers = mysql_query($selectUsers) or die(mysql_error());
    while ($row = mysql_fetch_array($queryUsers)) {
      $namaUsers = $row['nama_lengkap'];
      $emailUsers= $row['email'];

      $to = $emailUsers;
      $subject = "Peringatan Proses Telaah/Perbaikan";
      $headers = "From: e-service <press@mail.lipi.go.id>\r\n";
      $headers .= "Reply-To: ".$emailFrom."\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8\r\n";
      include('../../../email/24-notifikasi-peringatan.php');
      $mail_sent = @mail($to,$subject,$txt,$headers);
    }
    
    header("location:../../../media.php?hal=editor-laporan-progres&id=".$id_naskah);
}
  
?>