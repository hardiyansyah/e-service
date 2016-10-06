<?php
if(!empty($_POST['id_naskah']) && !empty($_POST['namaEditor'])){

    $id = $_POST['id_naskah'];
    $emailEditor = $_POST['emailEditor'];
    $namaEditor = $_POST['namaEditor'];
    $idUser = $_POST['idUser'];
    $idPenulis = $_POST['idPenulis'];
    $duration = $_POST['duration'];
    $ket = 'Editor Kirim Ke editor visual';
    $start_date = $_POST['tgl'];
    $end_date = date('Y-m-d H:i:s');
    $datetime = date('Y-m-d H:i:s');

    include ('../../../config/koneksi.php');
    mysql_query("INSERT INTO countdown (id_naskah,id_user,duration,start_date,end_date,ket)VALUES('$id','$idUser','$duration','$start_date','$end_date','$ket')") or die(mysql_error());


    $update = "UPDATE naskah SET status_kirim ='3', status_tgl='$datetime', editor='$namaEditor', status='sunting' WHERE id_naskah ='$id'";
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

    $visual = "SELECT * FROM users WHERE level = 'visual'";
    $daftarvisual = mysql_query($visual) or die(mysql_error());
    if($daftarvisual){
        while($row = mysql_fetch_array($daftarvisual)){
            $emailvisual = $row['email'];

            $to = $emailvisual;
            $subject = "Proses Penyuntingan Editor Visual";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8\r\n";
            $headers .= "From: e-service <press@mail.lipi.go.id>\r\n";
            $headers .= "Reply-to: ".$emailEditor."\r\n";
            include('../../../email/4-editor-to-visual.php');

            if(mail($to,$subject,$txt,$headers)){
                // echo "Email Terkirim Ke Dewan";
                // echo $duration;
            }else{
                echo "Email not Sent";
            }
        }
    }
    header("location:../../../media.php?hal=editor-naskah&id=sunting");
}else{
    header('location:../../../pages-error-404-2.html');
}
?>