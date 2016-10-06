<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses hal, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";


$tgl=date('Y-m-d H:i:s');

$status=(($_POST['id2'])+1);
$namafolder="files/";

  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $noAcak      = rand(0,9);
  $acak           = date('Y-m-d H:i:s').$noAcak;
  $nama_file_unik = $acak.$nama_file;
  
  $gambar = $namafolder . basename($_FILES['fupload']['name']);
  $kirim='N';
  $id='0';

  // Variable Terpakai
  $id_naskah  = $_POST['id'];
  $id_reviewer= $_POST['id_reviewer']; 

  $cekID = mysql_query("SELECT * FROM naskah WHERE id_naskah = '$id_naskah'") or die(mysql_error());
  $dataNaskah = mysql_fetch_array($cekID);
  $id_reviewer1 = $dataNaskah['reviewer1'];
  $id_reviewer2 = $dataNaskah['reviewer2'];

  if($id_reviewer == $id_reviewer1){
    $jabatan = '1';
  }else{
    $jabatan = '2';
  }
  $query1="INSERT INTO review(id_naskah,id_reviewer,file_rev,tanggal,status,kirim,jabatan,id_editor)
                  VALUES('$_POST[id]','$_POST[id_reviewer]','$nama_file_unik','$tgl','$status','$kirim','$jabatan','$id')";
 
  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
  
  $file_extension = strtolower(substr(strrchr($nama_file,"."),1));

  switch($file_extension){
    case "docx": $ctype="application/msword"; break;
    case "doc": $ctype="application/msword"; break;
        default: $ctype="application/proses";
  }
  if ($file_extension=='php'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.PHP');
        window.location=('../../../media.php?hal=reviewer-upload-review&id=$_POST[id]')</script>";
  }
  else if ($file_extension=='pdf'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.PDF');
        window.location=('../../../media.php?hal=reviewer-upload-review&id=$_POST[id]')</script>";
  }
    else if ($file_extension=='exe'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.EXE');
        window.location=('../../../media.php?hal=reviewer-upload-review&id=$_POST[id]')</script>";
  }
   else if ($file_extension=='zip'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.ZIP');
        window.location=('../../../media.php?hal=reviewer-upload-review&id=$_POST[id]')</script>";
  }
   else if ($file_extension=='rar'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.RAR');
        window.location=('../../../media.php?hal=reviewer-upload-review&id=$_POST[id]')</script>";
  }
   else if ($file_extension=='png'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.PNG');
        window.location=('../../../media.php?hal=reviewer-upload-review&id=$_POST[id]')</script>";
  }
  else if ($file_extension=='jpg'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.JPG');
        window.location=('../../../media.php?hal=reviewer-upload-review&id=$_POST[id]')</script>";
  }
   else if ($file_extension=='jpeg'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.JPEG');
        window.location=('../../../media.php?hal=reviewer-upload-review&id=$_POST[id]')</script>";
  }
   else if ($file_extension=='gif'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.GIF');
        window.location=('../../../media.php?hal=reviewer-upload-review&id=$_POST[id]')</script>";
  }
   else if ($file_extension=='xls'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.XLS');
        window.location=('../../../media.php?hal=reviewer-upload-review&id=$_POST[id]')</script>";
  }
   else if ($file_extension=='ppt'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.PPT');
        window.location=('../../../media.php?hal=reviewer-upload-review&id=$_POST[id]')</script>";
  }
  else if ($file_extension=='pptx'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.PPTX');
        window.location=('../../../media.php?hal=reviewer-upload-review&id=$_POST[id]')</script>";
  }
  else if ($file_extension=='xlsx'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.XLSX');
        window.location=('../../../media.php?hal=reviewer-upload-review&id=$_POST[id]')</script>";
  }

  else{
    UploadFilerev($nama_file_unik);
  
  mysql_query($query1) or die("Gagal menyimpan data"); 
  $query2 = mysql_query("SELECT * FROM review WHERE id_naskah = '$_POST[id]' AND id_reviewer = '$_POST[id_reviewer]' ORDER BY id_review DESC") or die(mysql_error());
  $data = mysql_fetch_array($query2);

      $query3 = mysql_query("SELECT * FROM revisi WHERE id_naskah = '$_POST[id]' AND id_reviewer = '$_POST[id_reviewer]' ORDER BY id_rev DESC") or die(mysql_error());
      $data3 = mysql_fetch_array($query3);

  $id_review =  $data['id_review'];
      $id_rev =  $data3['id_rev'];
  header("location:../../../media.php?hal=reviewer-telaah&id=$_POST[id]&review=$id_review&revisi=$id_rev");
  }
  }
  else{
      mysql_query($query1) or die("Gagal menyimpan data"); 
      $query2 = mysql_query("SELECT * FROM review WHERE id_naskah = '$_POST[id]' AND id_reviewer = '$_POST[id_reviewer]' ORDER BY id_review DESC") or die(mysql_error());
      $data = mysql_fetch_array($query2);
      $query3 = mysql_query("SELECT * FROM revisi WHERE id_naskah = '$_POST[id]' AND id_reviewer = '$_POST[id_reviewer]' ORDER BY id_rev DESC") or die(mysql_error());
      $data3 = mysql_fetch_array($query3);

      $id_review =  $data['id_review'];
      $id_rev =  $data3['id_rev'];
      header("location:../../../media.php?hal=reviewer-telaah&id=$_POST[id]&review=$id_review&revisi=$id_rev");  }
}
?>
