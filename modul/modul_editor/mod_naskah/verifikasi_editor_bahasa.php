<?php
include ('../../../config/koneksi.php');
if(!empty($_POST['id_naskah']) && !empty($_POST['namaEditor'])){

    $id = $_POST['id_naskah'];
    $namaEditor = $_POST['namaEditor'];
    $idUser = $_POST['idUser'];
    $idPenulis = $_POST['idPenulis'];
    $ket = 'Verifikasi Ke Editor Bahasa';
    $start_date = $_POST['tgl'];
    $end_date = date('Y-m-d H:i:s');
    $datetime = date('Y-m-d H:i:s');
    $link="link";
    $isi = $_POST['isi'];
    
    $bahasa = "SELECT * FROM users WHERE level = 'editor_bahasa'";
    $daftarBahasa = mysql_query($bahasa) or die(mysql_error());
    if($daftarBahasa){
        while($row = mysql_fetch_array($daftarBahasa)){
            $userBahasa = $row['id_users'];
            mysql_query("INSERT INTO pemberitahuan (id_naskah,id_users,isi,tanggal,link)VALUES('$id', '$userBahasa', '$isi', '$datetime','$link')") or die(mysql_error());
        }
    }

    mysql_query("INSERT INTO countdown (id_naskah,id_user,start_date,end_date,ket)VALUES('$id','$idUser','$start_date','$end_date','$ket')") or die(mysql_error());
    
    $update = "UPDATE naskah SET status_kirim ='3', status_tgl='$datetime', editor='$namaEditor', status='diterima' WHERE id_naskah ='$id'";
    $run = mysql_query($update) or die(mysql_error());


    $selectPenulis = "SELECT * FROM users WHERE level = 'penulis' AND id_users = '$idPenulis'";
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
    $select = mysql_query("SELECT * FROM naskah WHERE id_users = '$idPenulis' AND id_naskah= '$id'");
    $baris = mysql_fetch_array($select);
    $idNaskah = $baris['id_naskah'];
    $idUser = $baris['id_users'];
    $intansi = $baris['intansi'];
    $satker = $baris['satker'];
    $sinopsis = $baris['abstrak'];
    $status = $baris['status'];
    $judul = $baris['judul'];
    $linknaskah = "".$site."print.php?&id=".$idNaskah."";

    $visual = "SELECT * FROM users WHERE level = 'editor_bahasa'";
    $daftarvisual = mysql_query($visual) or die(mysql_error());
    if($daftarvisual){
        while($row = mysql_fetch_array($daftarvisual)){
            $emailvisual = $row['email'];

            $to = $emailvisual;
            $subject = "Verifikasi Editor Bahasa";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8\r\n";
            $headers .= "From: e-service <press@mail.lipi.go.id>\r\n";
            $headers .= "Reply-to: ".$emailEditor."\r\n";
            include('../../../email/25-editor-to-bahasa.php');

            if(mail($to,$subject,$txt,$headers)){
                // echo "Email Terkirim Ke Dewan";
                // echo $duration;
            }else{
                echo "Email not Sent";
            }
        }
    }
    header("location:../../../media.php?hal=editor-naskah&id=diterima");
}else{
    header('location:../../../pages-error-404-2.html');
}
?>