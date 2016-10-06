<?php
$user = $_SESSION['namauser'];
$tampil= mysql_query("SELECT * FROM users WHERE username='$user'");
$cc=mysql_fetch_array($tampil);
$jum= mysql_num_rows(mysql_query("SELECT * FROM pemberitahuan WHERE id_users='$cc[id_users]' AND baca='N'"));
$jum2= mysql_num_rows(mysql_query("SELECT * FROM naskah WHERE id_users='$cc[id_users]'"));
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
<!--  <li>
<a href="media.php?hal=penulis-anggota"><span class="fa fa-users"></span> <span class="xn-text">Anggota</span></a>                        
 </li>   -->
 <li>
<a href="media.php?hal=informasi"><span class="fa fa-info"></span> <span class="xn-text">Informasi <?php echo $jum1; ?></span></a>                        
 </li>               
<li>
<a href="media.php?hal=penulis-permohonan"><span class="fa fa-pencil-square-o"></span> <span class="xn-text">Permohonan Pernerbitan</span></a>                        
 </li>               
<li>
<a href="media.php?hal=penulis-naskah"><span class="fa fa-book"></span> <span class="xn-text">Manajeman Naskah <div class='informer informer-info'><?php echo $jum2; ?></div></span></a>                        
 </li>               
         
            
