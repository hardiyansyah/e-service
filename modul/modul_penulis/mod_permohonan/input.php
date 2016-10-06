<?php
session_start();
  if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'><center>Untuk mengakses hal, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}else{
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";
include("../../../config/fungsi_mailer.php");

//file surat permohonan
  $namafolder="files/";
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $noAcak      = rand(0,9);
  $acak           = date('Y-m-d H:i:s').$noAcak;
  $nama_file_unik = $acak.$nama_file;
//file surat  pengajuan
  // $namafolder="files/";
  // $lokasi_file1 = $_FILES['fupload1']['tmp_name'];
  // $nama_file1   = $_FILES['fupload1']['name'];
  // $acak1           = rand(0000,9999);
  // $nama_file_unik1 = $acak1.$nama_file1;
//file naskah
  $namafolder="files/";
  $lokasi_file2 = $_FILES['fupload2']['tmp_name'];
  $nama_file2   = $_FILES['fupload2']['name'];
  $noAcak2      = rand(0,9);
  $acak2           = date('Y-m-d H:i:s').$noAcak2;
  $nama_file_unik2 = $acak2.$nama_file2;
  $gambar = $namafolder . basename($_FILES['fupload']['name']);

  // Untuk Query Select Di Bawah
  $idUser   = $_POST['idu'];
  $judul    = $_POST['judul'];
  // $idKategori = $_POST['kategori'];
  // $queryKategory = mysql_query("SELECT * FROM kategori WHERE id_kategori = '$idKategori' ")or die(mysql_error());
  // if($queryKategory){
  //   $kat = mysql_fetch_array($queryKategory);
  //   $satuanKerja  = $kat['nama'];
  // }
  $abstrak  = $_POST['abstrak'];
  $datetime = date('Y-m-d H:i:s');
  if($_POST['kepengarangan']=='Naskah Buku'){
    $status_penulisan = 'P';
  }else{
    $status_penulisan = 'K';
  }

  $sasaran = array_filter($_POST['sasaran']);
  $jumlahSasaran = count($sasaran);
  $iSas = 1;
  $sasarannya = '';
  foreach($sasaran as $keySas => $nSas ) {
    if($jumlahSasaran == $iSas){
      $tanda = "";
    }else{
      $tanda = ", ";
    }
    $sasarannya .= $nSas.$tanda;
    $iSas++;
  }
  //////////////////////////////
  
  $query1="INSERT INTO naskah (
    id_users,
    judul,
    status_penulisan,
  
    intansi,
    satker,
    permohonan,
    file,
    abstrak,
    halaman,
    jenis_terbitan,
    kepengarangan,
    uraian_buku,
    keistimewaan,
    sasaran_pembaca,
    ketertarikan,
    daftar_email_web,
    cara_memasarkan,
    perkiraan_cetak,
    tanggal) VALUES (
      '$_POST[idu]',
      '$_POST[judul]',
      '$status_penulisan',
     
      '$_POST[intansi]',
      '$_POST[satker]',
      '$nama_file_unik',
      '$nama_file_unik2', 
      '$_POST[abstrak]',
      '$_POST[halaman]',
      '$_POST[jenis_terbitan]',
      '$_POST[kepengarangan]',
      '$_POST[uraian_buku]',
      '$_POST[keistimewaan]',
      '$sasarannya',
      '$_POST[ketertarikan]',
      '$_POST[daftar_email_web]',
      '$_POST[cara_memasarkan]',
      '$_POST[perkiraan_cetak]',
      '$datetime'
      )";

// Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
  $file_extension = strtolower(substr(strrchr($nama_file,"."),1));
switch($file_extension){
    case "docx": $ctype="application/msword"; break;
    case "doc": $ctype="application/msword"; break;
     case "pdf": $ctype="application/pdf"; break;
    default: $ctype="application/proses";
  }
  if ($file_extension=='php'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.PHP');
        window.location=('../../../media.php?hal=penulis-permohonan')</script>";
  }
  else if ($file_extension=='exe'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.EXE');
        window.location=('../../../media.php?hal=penulis-permohonan')</script>";
  }
   else if ($file_extension=='zip'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.ZIP');
        window.location=('../../../media.php?hal=penulis-permohonan')</script>";
  }
   else if ($file_extension=='rar'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.RAR');
        window.location=('../../../media.php?hal=penulis-permohonan')</script>";
  }
   else if ($file_extension=='png'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.PNG');
        window.location=('../../../media.php?hal=penulis-permohonan')</script>";
  }
  else if ($file_extension=='jpg'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.JPG');
        window.location=('../../../media.php?hal=penulis-permohonan')</script>";
  }
   else if ($file_extension=='jpeg'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.JPEG');
        window.location=('../../../media.php?hal=penulis-permohonan')</script>";
  }
   else if ($file_extension=='gif'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.GIF');
        window.location=('../../../media.php?hal=penulis-permohonan')</script>";
  }
   else if ($file_extension=='xls'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.XLS');
        window.location=('../../../media.php?hal=penulis-permohonan')</script>";
  }
   else if ($file_extension=='ppt'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.PPT');
        window.location=('../../../media.php?hal=penulis-permohonan')</script>";
  }
  else if ($file_extension=='pptx'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.PPTX');
        window.location=('../../../media.php?hal=penulis-permohonan')</script>";
  }
  else if ($file_extension=='xlsx'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.XLSX');
        window.location=('../../../media.php?hal=penulis-permohonan')</script>";
  }
  
  else{
    UploadFile($nama_file_unik);
    // UploadFile1($nama_file_unik1);
    UploadFile2($nama_file_unik2);
    mysql_query($query1) or die(mysql_error());
    $select = mysql_query("SELECT * FROM naskah WHERE id_users = '$idUser' AND judul = '$judul'");
    $baris = mysql_fetch_array($select);
    $idNaskah = $baris['id_naskah'];
    $idUser = $baris['id_users'];

// Apabila status kepengarangan adalah naskah buku
    if($_POST['kepengarangan']=='Naskah Buku'){
      $karangan = 'Naskah Buku';
    }else{
      $karangan = 'Bunga Rampai';
    }
      $id_naskah = $idNaskah;
      $user_naskah = 'Editor';
      $user_naskah_author = 'Author';
      $user_naskah_co = 'Co-Author';

// Rekomendasi Ahli / Spesialist
    $namaAhli = array_filter($_POST['namaAhli']);
    $emailAhli = array_filter($_POST['emailAhli']);
    $telpAhli = array_filter($_POST['telpAhli']);
    $jabatanAhli = array_filter($_POST['jabatanAhli']);
    $insertAhli = "INSERT INTO rekomendasi (id_naskah,nama,telp,email,jabatan)values";
    $iAhli = 1;
    $jumlahAhli = count($namaAhli);
    foreach($namaAhli as $keyAhli => $nAhli ) {
      if(!empty($nAhli)){
        $insertAhli .= "('$id_naskah','$nAhli','$telpAhli[$keyAhli]','$emailAhli[$keyAhli]','$jabatanAhli[$keyAhli]')";
        if($iAhli != $jumlahAhli){
          $insertAhli .= ","; 
        }
      $iAhli++;
      }
    }
    $queryAhli = mysql_query($insertAhli) or die(mysql_error());
//###############################################################################################################        
        $namaEditor = array_filter($_POST['namaEditor']);
        $emailEditor = array_filter($_POST['emailEditor']);
        $telpEditor = array_filter($_POST['telpEditor']);
        $insertnya = "INSERT INTO kepengarangan (id_naskah,user_naskah,nama,email,telp,karangan)values";
        $i = 1;
        $jumlah = count($namaEditor);
        foreach($namaEditor as $key => $n ) {
          if(!empty($n)){
          $insertnya .= "('$id_naskah','$user_naskah','$n','$emailEditor[$key]','$telpEditor[$key]','$karangan')";
          if($i != $jumlah){
            $insertnya .= ","; 
          }
          $i++;
          }
        }
      $queryPengarang = mysql_query($insertnya) or die(mysql_error());
//###############################################################################################################
        $namaAuthor = array_filter($_POST['namaAuthor']);
        $emailAuthor = array_filter($_POST['emailAuthor']);
        $telpAuthor = array_filter($_POST['telpAuthor']);
        $insertAuthor = "INSERT INTO kepengarangan (id_naskah,user_naskah,nama,email,telp,karangan)values";
        $iA = 1;
        $jumlahAuthor = count($namaAuthor);
        foreach($namaAuthor as $keyAuthor => $na ) {
          if(!empty($na)){
            $insertAuthor .= "('$id_naskah','$user_naskah_author','$na','$emailAuthor[$keyAuthor]','$telpAuthor[$keyAuthor]',
              '$karangan')";
            if($iA != $jumlahAuthor){
              $insertAuthor .= ","; 
            }
            $iA++;
          }
        }
      $queryAuthor = mysql_query($insertAuthor) or die(mysql_error());
//###############################################################################################################
        $namaCo = array_filter($_POST['namaCo']);
        $emailCo = array_filter($_POST['emailCo']);
        $telpCo = array_filter($_POST['telpCo']);
        $insertCo = "INSERT INTO kepengarangan (id_naskah,user_naskah,nama,email,telp,karangan)values";
        $iCo = 1;
        $jumlahCo = count($namaCo);
        foreach($namaCo as $keyCo => $nCo ) {
          if(!empty($nCo)){
          $insertCo .= "('$id_naskah','$user_naskah_co','$nCo','$emailCo[$keyCo]','$telpCo[$keyCo]','$karangan')";
          if($iCo != $jumlahCo){
            $insertCo .= ","; 
          }
          $iCo++;
          }
        }
      $queryCo = mysql_query($insertCo) or die(mysql_error());
    // }
//###############################################################################################################
// Kirim Email ke editor
    // $selectPenulis = "SELECT * FROM users WHERE jabatan = 'penulis' AND id_users = '$idUser'";
    // $queryPenulis = mysql_query($selectPenulis) or die(mysql_error());
    // if(mysql_num_rows($queryPenulis) == 1){
    //   $baris = mysql_fetch_assoc($queryPenulis);
    //   $namaPenulis  = $baris['nama_lengkap'];
    //   $nipPenulis   = $baris['nip'];
    //   $jabatanPenulis   = $baris['jabatan'];
    //   $telpPenulis  = $baris['telp'];
    //   $emailPenulis = $baris['email'];
    // }

    // $selectEditor = "SELECT * FROM users WHERE jabatan = 'Editor'";
    // $queryEditor = mysql_query($selectEditor) or die(mysql_error());
    // while ($row = mysql_fetch_array($queryEditor)) {
    //   $namaEditor = $row['nama_lengkap'];
    //   $nipEditor = $row['nip'];
    //   $emailEditor = $row['email'];

    //   $to = $emailEditor;
    //   $subject = "Permohonan Naskah Baru";
    //   $headers = "MIME-Version: 1.0" . "\r\n";
    //   $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    //   $headers .= "From: webmaster@wisasi.com\r\n";
    //   $headers .= "Reply-To: icang88@gmail.com\r\n";
    //   // $headers .= "CC: beni.sopian89@gmail.com\r\n";
    //   include('../../../email/1-penulis-to-editor.php');
    //   mail($to,$subject,$txt,$headers);
    // }
    $selectPenulis = "SELECT * FROM users WHERE level = 'penulis' AND id_users = '$idUser'";
    $queryPenulis = mysql_query($selectPenulis) or die(mysql_error());
    if(mysql_num_rows($queryPenulis) == 1){
      $baris = mysql_fetch_assoc($queryPenulis);
      $namaPenulis  = $baris['nama_lengkap'];
      $nipPenulis   = $baris['nip'];
      $jabatanPenulis   = ucfirst($baris['jabatan']);
      $telpPenulis  = $baris['telp'];
      $emailPenulis = $baris['email'];
      $emailFrom = $namaPenulis."<".$emailPenulis.">";
    }

    $selectEditor = "SELECT * FROM users WHERE level = 'editor'";
    $queryEditor = mysql_query($selectEditor) or die(mysql_error());
    while ($row = mysql_fetch_array($queryEditor)) {
      $namaEditor = $row['nama_lengkap'];
      $nipEditor = $row['nip'];
      $emailEditor = $row['email'];

      $to = $emailEditor;
      $subject = "Permohonan Naskah Baru";
      $headers = "From: e-service <press@mail.lipi.go.id>\r\n";
      $headers .= "Reply-To: ".$emailFrom."\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8\r\n";
      include('../../../email/1-penulis-to-editor.php');
      $mail_sent = @mail($to,$subject,$txt,$headers);
    }
    header("location:../../../media.php?hal=penulis-naskah&action=true");
    }
// JIKA TIDAK ADA UPLOAD GAMBAR (LANGSUNG EKSEKUSI)
  }else{
    mysql_query($query1) or die("Gagal menyimpan data");
    $select = mysql_query("SELECT * FROM naskah WHERE id_users = '$idUser' AND judul = '$judul'");
    $baris = mysql_fetch_array($select);
    $idNaskah = $baris['id_naskah'];
    $idUser = $baris['id_users'];
    $intansi = $baris['intansi'];
    $satker = $baris['satker'];
// Apabila status kepengarangan adalah naskah buku
    if($_POST['kepengarangan']=='Naskah Buku'){
      $karangan = 'Naskah Buku';
    }else{
      $karangan = 'Bunga Rampai';
    }
      $id_naskah = $idNaskah;
      $user_naskah = 'Editor';
      $user_naskah_author = 'Author';
      $user_naskah_co = 'Co-Author';

// Rekomendasi Ahli / Spesialist
    $namaAhli = array_filter($_POST['namaAhli']);
    $emailAhli = array_filter($_POST['emailAhli']);
    $telpAhli = array_filter($_POST['telpAhli']);
    $jabatanAhli = array_filter($_POST['jabatanAhli']);
    $insertAhli = "INSERT INTO rekomendasi (id_naskah,nama,telp,email,jabatan)values";
    $iAhli = 1;
    $jumlahAhli = count($namaAhli);
    foreach($namaAhli as $keyAhli => $nAhli ) {
      if(!empty($nAhli)){
        $insertAhli .= "('$id_naskah','$nAhli','$telpAhli[$keyAhli]','$emailAhli[$keyAhli]','$jabatanAhli[$keyAhli]')";
        if($iAhli != $jumlahAhli){
          $insertAhli .= ","; 
        }
      $iAhli++;
      }
    }
    $queryAhli = mysql_query($insertAhli) or die(mysql_error());

// INSERT KOLOM NAMA EDITOR #####################################################################################        
        $namaEditor = array_filter($_POST['namaEditor']);
        $emailEditor = array_filter($_POST['emailEditor']);
        $telpEditor = array_filter($_POST['telpEditor']);
        $insertnya = "INSERT INTO kepengarangan (id_naskah,user_naskah,nama,email,telp,karangan)values";
        $i = 1;
        $jumlah = count($namaEditor);
        foreach($namaEditor as $key => $n ) {
          if(!empty($n)){
          $insertnya .= "('$id_naskah','$user_naskah','$n','$emailEditor[$key]','$telpEditor[$key]','$karangan')";
          if($i != $jumlah){
            $insertnya .= ","; 
          }
          $i++;
          }
        }
      $queryPengarang = mysql_query($insertnya) or die(mysql_error());
// INSERT KOLOM NAMA AUTHOR #####################################################################################
        $namaAuthor = array_filter($_POST['namaAuthor']);
        $emailAuthor = array_filter($_POST['emailAuthor']);
        $telpAuthor = array_filter($_POST['telpAuthor']);
        $insertAuthor = "INSERT INTO kepengarangan (id_naskah,user_naskah,nama,email,telp,karangan)values";
        $iA = 1;
        $jumlahAuthor = count($namaAuthor);
        foreach($namaAuthor as $keyAuthor => $na ) {
          if(!empty($na)){
            $insertAuthor .= "('$id_naskah','$user_naskah_author','$na','$emailAuthor[$keyAuthor]','$telpAuthor[$keyAuthor]',
              '$karangan')";
            if($iA != $jumlahAuthor){
              $insertAuthor .= ","; 
            }
            $iA++;
          }
        }
      $queryAuthor = mysql_query($insertAuthor) or die(mysql_error());
// INSERT KOLOM NAMA CO-AUTHOR ##################################################################################
        $namaCo = array_filter($_POST['namaCo']);
        $emailCo = array_filter($_POST['emailCo']);
        $telpCo = array_filter($_POST['telpCo']);
        $insertCo = "INSERT INTO kepengarangan (id_naskah,user_naskah,nama,email,telp,karangan)values";
        $iCo = 1;
        $jumlahCo = count($namaCo);
        foreach($namaCo as $keyCo => $nCo ) {
          if(!empty($nCo)){
          $insertCo .= "('$id_naskah','$user_naskah_co','$nCo','$emailCo[$keyCo]','$telpCo[$keyCo]','$karangan')";
          if($iCo != $jumlahCo){
            $insertCo .= ","; 
          }
          $iCo++;
          }
        }
        // echo '<br>'.$insertCo;
      $queryCo = mysql_query($insertCo) or die(mysql_error());
    // }
// BATAS AKHIR JIKA KEPENGARANGAN == NASKAH BUKU #############################################################
// Kirim Email ke editor
    // $selectPenulis = "SELECT * FROM users WHERE jabatan = 'penulis' AND id_users = '$idUser'";
    // $queryPenulis = mysql_query($selectPenulis) or die(mysql_error());
    // if(mysql_num_rows($queryPenulis) == 1){
    //   $baris = mysql_fetch_assoc($queryPenulis);
    //   $namaPenulis  = $baris['nama_lengkap'];
    //   $nipPenulis   = $baris['nip'];
    //   $jabatanPenulis   = $baris['jabatan'];
    //   $telpPenulis  = $baris['telp'];
    //   $emailPenulis = $baris['email'];
    // }

    // $selectEditor = "SELECT * FROM users WHERE jabatan = 'Editor'";
    // $queryEditor = mysql_query($selectEditor) or die(mysql_error());
    // while ($row = mysql_fetch_array($queryEditor)) {
    //   $namaEditor = $row['nama_lengkap'];
    //   $nipEditor = $row['nip'];
    //   $emailEditor = $row['email'];

    //   $to = $emailEditor;
    //   $subject = "Permohonan Naskah Baru";
    //   $headers = "MIME-Version: 1.0" . "\r\n";
    //   $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    //   $headers .= "From: icang@wisasi.com\r\n";
    //   $headers .= "Reply-to: icang88@gmail.com\r\n";
    //   $headers .= "CC: beni.sopian89@gmail.com\r\n";
    //   include('../../../email/1-penulis-to-editor.php');
    //   mail($to,$subject,$txt,$headers);
    // }
    $selectPenulis = "SELECT * FROM users WHERE level = 'penulis' AND id_users = '$idUser'";
    $queryPenulis = mysql_query($selectPenulis) or die(mysql_error());
    if(mysql_num_rows($queryPenulis) == 1){
      $baris = mysql_fetch_assoc($queryPenulis);
      $namaPenulis  = $baris['nama_lengkap'];
      $nipPenulis   = $baris['nip'];
      $jabatanPenulis   = ucfirst($baris['level']);
      $telpPenulis  = $baris['telp'];
      $emailPenulis = $baris['email'];
      $emailFrom    = $namaPenulis."<".$emailPenulis.">";
    }

    $selectEditor = "SELECT * FROM users WHERE level = 'editor'";
    $queryEditor = mysql_query($selectEditor) or die(mysql_error());
    while ($row = mysql_fetch_array($queryEditor)) {
      $namaEditor = $row['nama_lengkap'];
      $nipEditor = $row['nip'];
      $emailEditor = $row['email'];

      $to = $emailEditor;
      $subject = "Permohonan Naskah Baru";
      $fromName = "e-service";
      include('../../../email/1-penulis-to-editor.php');
        $mail->From = $emailFrom;
        $mail->FromName= $fromName;
        $mail->isHTML(true);
        $mail->Subject = $subject;
        include('../../../email/1-penulis-to-editor.php');
        $mail->Body = $txt;
        $mail->addAddress($to);
        if(!$mail->send()){
            echo "Mailer Error: " . $mail->ErrorInfo;
        }else{
            echo "E-Mail has been sent";
        }
    }
    header("location:../../../media.php?hal=penulis-naskah&action=true");
  }
}
?>