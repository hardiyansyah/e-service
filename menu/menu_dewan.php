<?php

$jum= mysql_num_rows(mysql_query("SELECT * FROM review WHERE kirim='D'"));
$jum2= mysql_num_rows(mysql_query("SELECT * FROM users WHERE level='penulis' AND blokir='N'"));
$jum4= mysql_num_rows(mysql_query("SELECT * FROM users WHERE level='reviewer' AND blokir='N'"));
$jum5=($jum2+$jum4);
$jum3= mysql_num_rows(mysql_query("SELECT * FROM naskah WHERE status_kirim = 2"));

$jum6= mysql_num_rows(mysql_query("SELECT * FROM naskah WHERE status='masuk' AND status_kirim = 2 "));

$jumbaru= mysql_num_rows(mysql_query("SELECT * FROM naskah WHERE status='baru'AND status_kirim = 2"));
$jummasuk= mysql_num_rows(mysql_query("SELECT * FROM naskah WHERE status='masuk'AND status_kirim = 2"));
$jumproses= mysql_num_rows(mysql_query("SELECT * FROM naskah WHERE status='proses'AND status_kirim = 2"));
$jumlolos= mysql_num_rows(mysql_query("SELECT * FROM naskah WHERE status='diterima'AND status_kirim = 2"));
$jumditerima= mysql_num_rows(mysql_query("SELECT * FROM naskah WHERE status='sunting'AND status_kirim = 2"));
$jumlayak= mysql_num_rows(mysql_query("SELECT * FROM naskah WHERE status='layak'AND status_kirim = 2"));
$jumterbit= mysql_num_rows(mysql_query("SELECT * FROM naskah WHERE status='terbit'AND status_kirim = 2"));
$jumtolak= mysql_num_rows(mysql_query("SELECT * FROM naskah WHERE status='ditolak'AND status_kirim = 2"));


if ($jum=='0'){
$jum1="<div class='informer informer-danger'>0</div>";
}
else {
$jum1="<div class='informer informer-warning'>$jum</div>";
}
 ?>
<li class="active">
    <a href="media.php?hal=dashboard-<?php echo $level;?>"><span class="fa fa-desktop"></span> <span class="xn-text">Beranda</span></a>                        
</li>                 
<li>
    <a href="media.php?hal=profil"><span class="fa fa-user"></span> <span class="xn-text">Profil</span></a>                        
</li>  
<li class="xn-openable">
        <a href="media.php?hal=informasi"><span class="fa fa-users"></span> <span class="xn-text">Users <div class='informer informer-info'><?php echo $jum5; ?></div></span></a> 
    <ul>
        <li><a href="media.php?hal=dewan-user&id=penulis"><span class="fa fa-user"></span> Penulis  <div class='informer informer-warning'><?php echo $jum2; ?></div></a></li>
        <li><a href="media.php?hal=dewan-user&id=reviewer"><span class="fa fa-user"></span> Reviewer  <div class='informer informer-warning'><?php echo $jum4; ?></div></a></li>
        
    </ul>
</li> 
<li class="xn-openable">
        <a href="#"><span class="fa fa-book"></span> <span class="xn-text">Naskah  <div class='informer informer-success'><?php echo $jum3; ?></div></span></a> 
    <ul>
        <!-- <li><a href="media.php?hal=dewan-naskah&id=masuk"><span class="fa fa-sign-in"></span> Masuk</a> <div class='informer informer-info'><?php //echo $jum6; ?></div></li> -->
        <li><a href="media.php?hal=dewan-naskah&id=baru"><span class="fa fa-pencil"></span> Baru </a><div class='informer informer-warning'><?php echo $jumbaru; ?></li>
        <li><a href="media.php?hal=dewan-naskah&id=masuk"><span class="fa fa-sign-in"></span> Lolos Verifikasi </a><div class='informer informer-warning'><?php echo $jummasuk; ?></li>
        <li><a href="media.php?hal=dewan-naskah&id=proses"><span class="fa fa-spinner"></span> Proses Telaah</a><div class='informer informer-warning'><?php echo $jumproses; ?></li>
        <li><a href="media.php?hal=dewan-naskah&id=diterima"><span class="fa fa-thumbs-o-up"></span> Lolos Penilaian</a><div class='informer informer-warning'><?php echo $jumlolos; ?></li>
        <li><a href="media.php?hal=dewan-naskah&id=sunting"><span class="fa fa-spinner"></span> Proses Penyuntingan</a><div class='informer informer-warning'><?php echo $jumditerima; ?></li>
        <li><a href="media.php?hal=dewan-naskah&id=layak"><span class="fa fa-thumbs-o-up"></span> Layak Cetak</a><div class='informer informer-warning'><?php echo $jumlayak; ?></li>
        <li><a href="media.php?hal=dewan-naskah&id=terbit"><span class="fa fa-thumbs-o-up"></span> Naskah Terbit</a><div class='informer informer-warning'><?php echo $jumterbit; ?></li>
        <li><a href="media.php?hal=dewan-naskah&id=ditolak"><span class="fa fa-thumbs-o-down"></span> Di Tolak</a><div class='informer informer-warning'><?php echo $jumtolak; ?></li>
        
    </ul>
</li>                             
<li>
<a href="media.php?hal=dewan-penilaian"><span class="fa fa-pencil-square-o"></span> <span class="xn-text">Laporan <?php echo $jum1; ?></span></a>                        
 </li>
 <li>
<a href="media.php?hal=dewan-detail-naskah"><span class="fa fa-pencil-square-o"></span> <span class="xn-text">Hasil Voting </span></a><div class='informer informer-info'><?php echo $jum6; ?></div>               
 </li>                 
         
            
