 <!-- START BREADCRUMB -->
<ul class="breadcrumb">
 <li><a href="#">Home</a></li>
 <li><a href="#">Detail Naskah Perbaikan</a></li>
</ul>
<?php
$revisi= mysql_query("SELECT * FROM revisi WHERE id_rev='$_GET[id]'");
$revi=mysql_fetch_array($revisi);
$revisi2= mysql_query("SELECT * FROM naskah WHERE id_naskah='$revi[id_naskah]'");
$revi2=mysql_fetch_array($revisi2);
$revisi3= mysql_query("SELECT * FROM users WHERE id_users='$revi2[id_users]'");
$revi3=mysql_fetch_array($revisi3);
$revisi4= mysql_query("SELECT * FROM users WHERE id_users='$revi[id_reviewer]'");
$revi4=mysql_fetch_array($revisi4);

$tgl=tgl_indo($revi['tanggal']);

?>
<!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
                        <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Hasil </strong> Perbaikan Naskah</h3>
                                    
                                </div>
                            
                            <form method="POST" action="modul/modul_editor/mod_revisi/aksi_revisi.php" enctype="multipart/form-data" class="form-horizontal" >
                            <input type="hidden" name="id_naskah" value="<?php echo $revi['id_naskah']?>">
                            <input type="hidden" name="id_users" value="<?php echo $revi2['id_users']?>">
                            <input type="hidden" name="id_editor" value="<?php echo $_SESSION['id_user']?>">
                            <input type="hidden" name="id_reviewer" value="<?php echo $revi['id_reviewer']?>">
                            <input type="hidden" name="ke" value="<?php echo $revi['status']?>">
                            <input type="hidden" name="status_tgl" value="<?php echo $revi2['status_tgl']?>">

                            <input type="hidden" name="isi" value="Naskah dengan judul <?php echo $revi2['judul'] ?> telah selesai di Perbaiki, silahkan klik pesan ini untuk Telaah lanjutan">
                             <input type="hidden" name="link" value="?hal=reviewer-monitoring&id=<?php echo $revi['id_naskah']?>&ref=<?php echo $revi['id_reviewer']?>">
                             <input type="hidden" name="id" value="<?php echo $revi['id_rev']?>">
                             <input type="hidden" name="kirim" value="R"> 
                             <input type="hidden" name="baca" value="N"> 


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
                                                <div class="col-md-6 col-xs-12">
                                                    <input type="text" class="form-control" value="Hasil Review Ke <?php echo $revi['status'] ?>">
                                                </div>
                                                                               
                                            </div>
                                            <div class="form-group">                                        
                                                <label class="col-md-3 col-xs-12 control-label">Penelaah</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <input type="text" class="form-control" value="<?php echo $revi4['nama_lengkap'] ?>">
                                                </div>
                                                                               
                                            </div>
                                            <div class="form-group">                                        
                                                <label class="col-md-3 col-xs-12 control-label">Tanggal Perbaikan</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <input type="text" class="form-control" value="<?php echo $tgl; ?>">
                                                </div>
                                                                               
                                            </div>
                                            
                                            <div class="form-group">                                        
                                                <label class="col-md-3 col-xs-12 control-label">Kirim</label>
                                                <div class="col-md-2">
                                                   <input type="submit" class="btn" value="Kirim Ke Penelaah">
                                                </div>
                                                                               
                                            </div>
                                            </form>
                                             <div class="form-group">   
                                              <label class="col-md-3 col-xs-12 control-label">Download</label>
                                                <div class="col-md-2">
                                                    <a href="files/<?php echo $revi['file_revisi']?>" target="_blank"><span class="fa fa-download"></span> Download Naskah</a>
                                                </div>
                                                </div>
                                                <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Print</label>
                                                <div class="col-md-2">
                                                <a href="revisi.php?&id=<?php echo $revi['id_naskah']?>&ke=<?php echo $revi['status']?>&ref=<?php echo $revi['id_reviewer']?>" target="_blank"><span class="fa fa-print"></span> Cetak Matriks Perbaikan</a>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    </div>
                                    
                                </div>                                
                            
                            
                                                              
                           </div>
                                           
                        </div>
                    </div>                    
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
  