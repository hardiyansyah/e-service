<?php
$jumviewke= mysql_num_rows(mysql_query("SELECT * FROM review WHERE kirim='E' GROUP BY status"));
$jumvisike= mysql_num_rows(mysql_query("SELECT * FROM revisi WHERE kirim='E'"));
$jumvieko= mysql_num_rows(mysql_query("SELECT * FROM review WHERE kirim='O' GROUP BY status "));
$jumtotal1=($jumviewke+$jumvisike+$jumvieko);

$jumnaskah= mysql_num_rows(mysql_query("SELECT * FROM naskah"));
$jumbaru= mysql_num_rows(mysql_query("SELECT * FROM naskah WHERE status='baru'"));
$jummasuk= mysql_num_rows(mysql_query("SELECT * FROM naskah WHERE status='masuk'"));
$jumproses= mysql_num_rows(mysql_query("SELECT * FROM naskah WHERE status='proses'"));
$jumlolos= mysql_num_rows(mysql_query("SELECT * FROM naskah WHERE status='diterima'"));
$jumditerima= mysql_num_rows(mysql_query("SELECT * FROM naskah WHERE status='sunting'"));
$jumlayak= mysql_num_rows(mysql_query("SELECT * FROM naskah WHERE status='layak'"));
$jumterbit= mysql_num_rows(mysql_query("SELECT * FROM naskah WHERE status='terbit'"));
$jumtolak= mysql_num_rows(mysql_query("SELECT * FROM naskah WHERE status='ditolak'"));


$jumpenulis= mysql_num_rows(mysql_query("SELECT * FROM users WHERE level='penulis' AND blokir='N'"));
$jumreviewer= mysql_num_rows(mysql_query("SELECT * FROM users WHERE level='reviewer' AND blokir='N'"));
$jumdewan= mysql_num_rows(mysql_query("SELECT * FROM users WHERE level='dewan' AND blokir='N'"));
$jumeditor= mysql_num_rows(mysql_query("SELECT * FROM users WHERE level='editor' AND blokir='N'"));
$jumeditor_v= mysql_num_rows(mysql_query("SELECT * FROM users WHERE level='editor_visual' AND blokir='N'"));
$jumeditor_b= mysql_num_rows(mysql_query("SELECT * FROM users WHERE level='editor_bahasa' AND blokir='N'"));
$jum1total2=($jumpenulis+$jumreviewer+$jumdewan+$jumeditor+$jumeditor_v+$jumeditor_b);

$jumSatker= mysql_num_rows(mysql_query("SELECT * FROM kategori "));
$jumrek= mysql_num_rows(mysql_query("SELECT * FROM naskah WHERE status='masuk' AND status_kirim = 2 "));

if ($jumtotal1=='0'){
$jumtelaah="<div class='informer informer-danger'>0</div>";
}
else {
$jumtelaah="<div class='informer informer-warning'>$jumtotal1</div>";
}
 ?>
<li class="active">
    <a href="media.php?hal=dashboard-<?php echo $level;?>"><span class="fa fa-desktop"></span> <span class="xn-text">Beranda</span></a>
</li>
<li>
    <a href="media.php?hal=profil"><span class="fa fa-user"></span> <span class="xn-text">Profil</span></a>
</li>
<li class="xn-openable">
        <a href="#"><span class="fa fa-book"></span><span class="xn-text">Manajemen Naskah <div class='informer informer-success'><?php echo $jumnaskah; ?></div></span></a>
    <ul>
        <li><a href="media.php?hal=editor-naskah&id=baru"><span class="fa fa-pencil"></span> Baru </a><div class='informer informer-warning'><?php echo $jumbaru; ?></li>
        <li><a href="media.php?hal=editor-naskah&id=masuk"><span class="fa fa-sign-in"></span> Lolos Verifikasi </a><div class='informer informer-warning'><?php echo $jummasuk; ?></li>
        <li><a href="media.php?hal=editor-naskah&id=proses"><span class="fa fa-spinner"></span> Proses Telaah</a><div class='informer informer-warning'><?php echo $jumproses; ?></li>
        <li><a href="media.php?hal=editor-naskah&id=diterima"><span class="fa fa-thumbs-o-up"></span> Lolos Penilaian</a><div class='informer informer-warning'><?php echo $jumlolos; ?></li>
        <li><a href="media.php?hal=editor-naskah&id=sunting"><span class="fa fa-spinner"></span> Proses Penyuntingan</a><div class='informer informer-warning'><?php echo $jumditerima; ?></li>
        <li><a href="media.php?hal=editor-naskah&id=layak"><span class="fa fa-thumbs-o-up"></span> Layak Cetak</a><div class='informer informer-warning'><?php echo $jumlayak; ?></li>
        <li><a href="media.php?hal=editor-naskah&id=terbit"><span class="fa fa-thumbs-o-up"></span> Naskah Terbit</a><div class='informer informer-warning'><?php echo $jumterbit; ?></li>
        <li><a href="media.php?hal=editor-naskah&id=ditolak"><span class="fa fa-thumbs-o-down"></span> Di Tolak</a><div class='informer informer-warning'><?php echo $jumtolak; ?></li>
        
    </ul>
</li> 
<li class="xn-openable">
        <a href="#"><span class="fa fa-pencil-square-o"></span> <span class="xn-text">Manajemen Telaah <?php echo $jumtelaah; ?></span></a>
    <ul>
        <li><a href="media.php?hal=editor-review"><span class="fa fa-book"></span>Naskah Hasil Telaah</a><div class='informer informer-success'><?php echo $jumviewke; ?></li>
        <li><a href="media.php?hal=editor-revisi"><span class="fa fa-book"></span>Naskah Hasil Perbaikan</a><div class='informer informer-success'><?php echo $jumvisike; ?></li>
        <li><a href="media.php?hal=editor-review"><span class="fa fa-book"></span>Laporan Pengesahan</a><div class='informer informer-success'><?php echo $jumvieko; ?></li>
    </ul>
</li>
<li>
<a href="media.php?hal=editor-rekomendasi-reviewer"><span class="fa fa-pencil-square-o"></span> <span class="xn-text">Rekomendasi Penelaah </span></a><div class='informer informer-info'><?php echo $jumrek; ?></div>                        
</li>
<li>
<a href="media.php?hal=editor-laporan"><span class="fa fa-pencil-square-o"></span> <span class="xn-text">Laporan Progres </span></a><div class='informer informer-warning'><?php echo $jumnaskah; ?></li>
 </li>                     
 <li class="xn-openable">
        <a href="#"><span class="fa fa-users"></span> <span class="xn-text">Manajemen Users</span></a> <div class='informer informer-warning'><?php echo $jum1total2; ?></div>
    <ul>
        <li><a href="media.php?hal=editor-user&id=dewan"><span class="fa fa-user"></span>Dewan Editor</a><div class='informer informer-info'><?php echo $jumdewan; ?></div></li>
        <li><a href="media.php?hal=editor-user&id=editor"><span class="fa fa-user"></span>Managing Editor</a><div class='informer informer-info'><?php echo $jumeditor; ?></div></li>
        <li><a href="media.php?hal=editor-user&id=editor_visual"><span class="fa fa-user"></span>Editor Visual</a><div class='informer informer-info'><?php echo $jumeditor_v; ?></div></li>
        <li><a href="media.php?hal=editor-user&id=editor_bahasa"><span class="fa fa-user"></span>Editor Bahasa</a><div class='informer informer-info'><?php echo $jumeditor_b; ?></div></li>
        <li><a href="media.php?hal=editor-user&id=reviewer"><span class="fa fa-user"></span>Penelaah</a><div class='informer informer-info'><?php echo $jumreviewer; ?></div></li>
        <li><a href="media.php?hal=editor-user&id=penulis"><span class="fa fa-user"></span>Penulis</a><div class='informer informer-info'><?php echo $jumpenulis; ?></div></li>
    </ul>
</li>
<li>
<a href="media.php?hal=editor-satker"><span class="fa fa-pencil-square-o"></span> <span class="xn-text">Satuan Kerja <div class='informer informer-info'><?php echo $jumSatker; ?></div></span></a>                        
 </li>
 <li>
<a href="media.php?hal=editor-import"><span class="fa fa-users"></span> <span class="xn-text">Data Peneliti<div class='informer informer-info'></div></span></a>                        
 </li>