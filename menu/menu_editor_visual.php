<?php
$jumviewke= mysql_num_rows(mysql_query("SELECT * FROM review WHERE kirim='E' GROUP BY status"));
$jumvisike= mysql_num_rows(mysql_query("SELECT * FROM revisi WHERE kirim='E'"));
$jumvieko= mysql_num_rows(mysql_query("SELECT * FROM review WHERE kirim='O' GROUP BY status "));
$jumtotal1=($jumviewke+$jumvisike+$jumvieko);

$jumditerima= mysql_num_rows(mysql_query("SELECT * FROM naskah WHERE status='sunting'"));
$jumlayak= mysql_num_rows(mysql_query("SELECT * FROM naskah WHERE status='layak'"));
$jumnaskah= $jumditerima+$jumlayak;

if ($jumtotal1=='0'){
 $jumtelaah="<div class='informer informer-danger'>0</div>";
}
else {
 $jumtelaah="<div class='informer informer-warning'>$jumtotal1</div>";
}
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
  <li><a href="media.php?hal=editor_visual-naskah&id=sunting"><span class="fa fa-spinner"></span> Proses Penyuntingan</a><div class='informer informer-warning'><?php echo $jumditerima; ?></li>
  <li><a href="media.php?hal=editor-naskah&id=layak"><span class="fa fa-thumbs-o-up"></span> Layak Cetak</a><div class='informer informer-warning'><?php echo $jumlayak; ?></li>
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
 <a href="media.php?hal=informasi"><span class="fa fa-info"></span> <span class="xn-text">Informasi <?php echo $jum1; ?></span></a>
</li>