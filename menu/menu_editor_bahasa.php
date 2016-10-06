<?php
$user = $_SESSION['namauser'];
$tampil= mysql_query("SELECT * FROM users WHERE username='$user'");
$cc=mysql_fetch_array($tampil);
$jum= mysql_num_rows(mysql_query("SELECT * FROM pemberitahuan WHERE id_users ='$cc[id_users]' AND baca='N'"));
if ($jum=='0'){
$jum1="<div class='informer informer-danger'>0</div>";
}
else {
$jum1="<div class='informer informer-warning'>$jum</div>";
}

$jum3= mysql_num_rows(mysql_query("SELECT * FROM naskah WHERE status_kirim = 2"));
$jum6= mysql_num_rows(mysql_query("SELECT * FROM naskah WHERE status='sunting' AND status_kirim = 3 "));

$jumbaru= mysql_num_rows(mysql_query("SELECT * FROM naskah WHERE status='baru'"));
$jummasuk= mysql_num_rows(mysql_query("SELECT * FROM naskah WHERE status='masuk'"));
$jumproses= mysql_num_rows(mysql_query("SELECT * FROM naskah WHERE status='proses'"));
$jumlolos= mysql_num_rows(mysql_query("SELECT * FROM naskah WHERE status='diterima'"));
$jumditerima= mysql_num_rows(mysql_query("SELECT * FROM naskah WHERE status='sunting'"));
$jumlayak= mysql_num_rows(mysql_query("SELECT * FROM naskah WHERE status='layak'"));
$jumterbit= mysql_num_rows(mysql_query("SELECT * FROM naskah WHERE status='terbit'"));
$jumtolak= mysql_num_rows(mysql_query("SELECT * FROM naskah WHERE status='ditolak'"));

?>
<li class="active">
    <a href="media.php?hal=dashboard-<?php echo $level;?>"><span class="fa fa-desktop"></span> <span class="xn-text">Beranda</span></a>                        
</li>                 
<li>
    <a href="media.php?hal=profil"><span class="fa fa-user"></span> <span class="xn-text">Profil</span></a>                        
</li>  
<li class="xn-openable">
        <a href="#"><span class="fa fa-book"></span> <span class="xn-text">Naskah  <div class='informer informer-success'><?php echo $jum3; ?></div></span></a> 
    <ul>
        <!-- <li><a href="media.php?hal=dewan-naskah&id=masuk"><span class="fa fa-sign-in"></span> Masuk</a> <div class='informer informer-info'><?php //echo $jum6; ?></div></li> -->
        <li><a href="media.php?hal=editor_bahasa-naskah&id=baru"><span class="fa fa-pencil"></span> Baru </a><div class='informer informer-warning'><?php echo $jumbaru; ?></li>
        <li><a href="media.php?hal=editor_bahasa-naskah&id=masuk"><span class="fa fa-sign-in"></span> Lolos Verifikasi </a><div class='informer informer-warning'><?php echo $jummasuk; ?></li>
        <li><a href="media.php?hal=editor_bahasa-naskah&id=proses"><span class="fa fa-spinner"></span> Proses Telaah</a><div class='informer informer-warning'><?php echo $jumproses; ?></li>
        <li><a href="media.php?hal=editor_bahasa-naskah&id=diterima"><span class="fa fa-thumbs-o-up"></span> Lolos Penilaian</a><div class='informer informer-warning'><?php echo $jumlolos; ?></li>
        <li><a href="media.php?hal=editor_bahasa-naskah&id=sunting"><span class="fa fa-spinner"></span> Proses Penyuntingan</a><div class='informer informer-warning'><?php echo $jumditerima; ?></li>
        <li><a href="media.php?hal=editor_bahasa-naskah&id=layak"><span class="fa fa-thumbs-o-up"></span> Layak Cetak</a><div class='informer informer-warning'><?php echo $jumlayak; ?></li>
        <li><a href="media.php?hal=editor_bahasa-naskah&id=terbit"><span class="fa fa-thumbs-o-up"></span> Naskah Terbit</a><div class='informer informer-warning'><?php echo $jumterbit; ?></li>
        <li><a href="media.php?hal=editor_bahasa-naskah&id=ditolak"><span class="fa fa-thumbs-o-down"></span> Di Tolak</a><div class='informer informer-warning'><?php echo $jumtolak; ?></li>
        
    </ul>
</li>                             
 <li>
<a href="media.php?hal=informasi"><span class="fa fa-info"></span> <span class="xn-text">Informasi <?php echo $jum1; ?></span></a>                        
 </li> 
 <li>
<a href="media.php?hal=editor_bahasa-naskah&id=sunting"><span class="fa fa-pencil-square-o"></span> <span class="xn-text">Verifikasi Naskah</span></a><div class='informer informer-info'><?php echo $jum6; ?></div>               
 </li>                 
         
            
