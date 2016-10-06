 <!-- START BREADCRUMB -->
<ul class="breadcrumb">
 <li><a href="#">Home</a></li>
 <li><a href="#">Detail Naskah Telaah</a></li>
</ul>
<?php
$review= mysql_query("SELECT * FROM review WHERE id_review='$_GET[id]'");
$revi=mysql_fetch_array($review);
$revisi= mysql_query("SELECT * FROM revisi WHERE id_rev='$_GET[id_rev]'");
$datarevi=mysql_fetch_array($revisi);
$review2= mysql_query("SELECT * FROM naskah WHERE id_naskah='$revi[id_naskah]'");
$revi2=mysql_fetch_array($review2);
$review3= mysql_query("SELECT * FROM hasil_telaah2 WHERE id_review='$revi[id_review]' AND ke='$revi[status]'");
$revi3=mysql_fetch_array($review3);
$review4= mysql_query("SELECT * FROM penilaian WHERE id_review='$revi[id_review]' AND ke='$revi[status]'");
$revi4=mysql_fetch_array($review4);

$review5 = mysql_query("SELECT * FROM users WHERE id_users = '$revi3[id_reviewer]'");
$revi5 = mysql_fetch_array($review5);

$user = mysql_query("SELECT * FROM users WHERE id_users = '$_SESSION[id_user]'");
$u = mysql_fetch_array($user);

if ($revi4['nilai']=='diterima_syarat'){
$formUp     = "<form method='POST' action='modul/modul_editor/mod_review/aksi_kirim.php' enctype='multipart/form-data' class='form-horizontal'>";
$re         ="Diterima Dengan Syarat";
$link       ="
<input type='hidden' name='id_naskah' value='$revi[id_naskah]'>
<input type='hidden' name='status_tgl' value='$revi2[status_tgl]'>
<input type='hidden' name='id_users' value='$revi2[id_users]'>
<input type='hidden' name='isi' value='Silahkan klik pesan ini untuk melihat hasil Telaah naskah Anda dengan judul $revi2[judul]'>
<input type='hidden' name='link' value='?hal=penulis-monitoring&id=$revi[id_naskah]'>
<input type='hidden' name='id' value='$revi[id_review]'>
<input type='hidden' name='id_editor' value='$u[id_users]'>
<input type='hidden' name='id_reviewer' value='".$revi3['id_reviewer']."'>
<input type='hidden' name='kirim' value='P'>
<input type='submit' class='btn' value='Kirim Ke Penulis'>";

} else if ($revi4['nilai']=='diterima' && $revi['kirim'] == 'E'){
$formUp     = "<form method='POST' action='modul/modul_editor/mod_review/aksi_tanya_dewan.php' enctype='multipart/form-data' class='form-horizontal'>";
$re         ="Naskah Diterima";
$link       ="
<input type='hidden' name='id_nilai' value='".$revi4 ['id_nilai']."'>
<input type='hidden' name='nilai' value='diterima'>
<input type='hidden' name='id' value='".$revi['id_review']."'>
<input type='hidden' name='siapa' value='".$revi3['id_reviewer']."'>
<input type='hidden' name='hal' value='Penelaah dengan nama ".$revi5['nama_lengkap']." telah menyelesaikan tugas Telaah untuk naskah judul ".$revi2['judul']." dengan hasil DITERIMA'>
<input type='hidden' name='kirim' value='D'>
<input type='hidden' name='id_editor' value='$u[id_users]'>
<input type='hidden' name='id_naskah' value='$revi[id_naskah]'>
<input type='hidden' name='status_tgl' value='$revi2[status_tgl]'>
<input type='submit' class='btn' value='Kirim Ke Dewan Editor'></form>";

$form="";

}else if ($revi4['nilai']=='diterima' && $revi['kirim'] == 'O'){
$formUp     = "<form method='POST' action='modul/modul_editor/mod_review/aksi_terima.php' enctype='multipart/form-data' class='form-horizontal'>";
$re         ="Naskah Diterima";
$link       ="
<input type='hidden' name='id2' value='$revi[id_naskah]'>
<input type='hidden'name='st' value='diterima'>
<input type='hidden' name='id' value='$revi[id_review]'>
<input type='hidden' name='kirim' value='S'>
<input type='hidden' name='id_naskah' value='$revi[id_naskah]'>
<input type='hidden' name='status_tgl' value='$revi2[status_tgl]'>
<input type='hidden' name='id_users' value='$revi2[id_users]'>
<input type='hidden' name='id_editor' value='$u[id_users]'>
<input type='hidden' name='id_rev' value='$datarevi[id_rev]'>
<input type='hidden' name='siapa' value='".$revi3['id_reviewer']."'>
<input type='hidden' name='isi' value='Naskah Anda dengan judul $revi2[judul] telah selesai di Telaah dengan hasil DITERIMA dan masuk ke proses penyuntingan, silahkan klik pesan ini untuk melihat naskah anda'>
<input type='hidden' name='link' value='?hal=penulis-monitoring&id=$revi[id_naskah]'>
<input type='submit' class='btn' value='Simpan Ke Folder Diterima'></form>";
$form="";

} else if ($revi4['nilai']=='ditolak'){
$formUp     = "<form method='POST' action='modul/modul_editor/mod_review/aksi_tolak.php' enctype='multipart/form-data' class='form-horizontal'>";
$re="Naskah Ditolak";
$link="
<input type=hidden name=id2 value='$revi[id_naskah]'>
<input type=hidden name=st value='ditolak'>
<input type=hidden name=id value='$revi[id_review]'>
<input type=hidden name=kirim value='S'>
<input type=hidden name=id_naskah value='$revi[id_naskah]'>
<input type='hidden' name='status_tgl' value='$revi2[status_tgl]'>
<input type=hidden name=id_penulis value='$revi2[id_users]'>
<input type='hidden' name='id_editor' value='$u[id_users]'>
<input type='hidden' name='id_reviewer' value='".$revi3['id_reviewer']."'>
<input type=hidden name=isi value='naskah anda dengan judul $revi2[judul] telah selesai di Telaah dengan hasil DITOLAK karena belum memenuhi syarat, silahkan klik pesan ini untuk melihat naskah anda'>
<input type=hidden name=link value='?hal=penulis-monitoring&id=$revi[id_naskah]'>
<input type='submit' class='btn' value='Simpan di Folder Penolakan'></form>";
$form="";
}
?>
<!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Form</strong> Telaah 1</h3>
                                </div>
                                <?=$formUp?> 
                                <div class="panel panel-default tabs">                            
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Hasil Telaah Naskah</a></li>
                                        <li><a href="#tab-second" role="tab" data-toggle="tab">Hasil Penilaian Penelaah Ahli</a></li>
                                        <li><a href="#tab-third" role="tab" data-toggle="tab">Catatan Penilaian Penelaah Ahli</a></li>
                                    </ul>
                                    <div class="panel-body tab-content">
                                        <div class="tab-pane active" id="tab-first">
                                                <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Judul Naskah</label>
                                                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                    <input type="text" class="form-control" value="<?php echo $revi2['judul']?>">                                                    
                                                </div>
                                            </div>
                                                <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Instansi</label>
                                                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                    <input type="text" class="form-control" value="<?php echo $revi2['intansi']?>">                                                    
                                                </div>
                                            </div>
                                                <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Satuan Kerja</label>
                                                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                    <input type="text" class="form-control" value="<?php echo $revi2['satker']?>">                                                    
                                                </div>
                                            </div>
                                            <!-- <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Kategori</label>
                                                <div class="col-md-6 col-xs-12">          
                                                <?php
                                                    $kategori=mysql_query("SELECT * FROM kategori WHERE id_kategori='$revi2[kategori]' ");
                                                     $kat=mysql_fetch_array($kategori);
                                                ?>                                  
                                                    <input type="text" class="form-control" value="<?php echo $kat['nama']?>">
                                                </div>
                                            </div> -->
                                            <div class="form-group">                                        
                                                <label class="col-md-3 col-xs-12 control-label">Kode Naskah</label>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control" value="Hasil Review Ke <?php echo $revi['status'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab-second">
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Jenis Terbitan</label>
                                                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                    <input type="text" class="form-control" value="<?php echo $revi3['jenis_terbitan']?>">                                                    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Tujuan</label>
                                                <div class="col-md-6 col-xs-12">
                                                <textarea class="form-control" rows="5"><?php echo $revi3['tujuan']?></textarea>
                                                </div>
                                            </div>
                                              <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Gaya Struktur & Sistematika Penulisan</label>
                                                <div class="col-md-6 col-xs-12">
                                                <textarea class="form-control" rows="5"><?php echo $revi3['gaya']?></textarea>
                                                </div>
                                            </div>
                                              <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Pembaca sasaran buku ini</label>
                                                <div class="col-md-6 col-xs-12">
                                                <textarea class="form-control" rows="5"><?php echo $revi3['sasaran']?></textarea>
                                                </div>
                                            </div>
                                              <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Kesesuaian kandungan isi dengan pembaca sasaran</label>
                                                <div class="col-md-6 col-xs-12">
                                                <textarea class="form-control" rows="5"><?php echo $revi3['kesesuaian']?></textarea>
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Kemutakhiran dan ketelitian data yang digunakan</label>
                                                <div class="col-md-6 col-xs-12">
                                                <textarea class="form-control" rows="5"><?php echo $revi3['kemutakhiran']?></textarea>
                                                </div>
                                            </div>
                                             
                                        </div>                                        
                                        <div class="tab-pane" id="tab-third">
                                        <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Hasil</label>
                                                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                    <input type="text" class="form-control" value="<?php echo $re;?>">                                                    
                                                </div>
                                            </div>                                    
                                         <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Catatan</label>
                                                <div class="col-md-6 col-xs-12">
                                                <textarea class="form-control" rows="5"><?php echo $revi4['komentar']?></textarea>
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Cetak Hasil Telaah</label>
                                                <div class="col-md-6 col-xs-12">
                                               <a href="review.php?&id=<?php echo $revi['id_review']?>" target="_blank">CETAK </a>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Kirim</label>
                                                <div class="col-md-6 col-xs-12">
                                               <?php echo $link;?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                            </form>

                        </div>
                    </div>                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
  