<?php if(empty($_GET['id'])){
    header('location:media.php?hal=dashboard-reviewer');
}else{ ?>

<script type="text/javascript">
    $(function(){
        $('.terima').click(function() {
        window.location = "www.example.com/index.php?id=" + this.id;
        });
        $('.tolak').click(function() {
        window.location = "www.example.com/index.php?id=" + this.id;
        });
    });
</script>
 <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Beranda</a></li>
                    <li class="active">Detail Naskah Masuk</li>
                </ul>
                <!-- END BREADCRUMB -->
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">     
                        <?php
                            $id_naskah = $_GET['id'];
							$tampil= mysql_query("SELECT * FROM naskah WHERE id_naskah = '$id_naskah' ");
							$naskah=mysql_fetch_array($tampil);
						?>
                            <div class="form-horizontal">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                    <div class="col-md-6">
                                        <h3 class="panel-title"><strong>Detail</strong> Naskah</h3>
                                    </div>
                                    <div class="col-md-1">&nbsp;</div>
                                    <div class="row">
                                    <?php 
                                        $voting = mysql_query("SELECT * FROM voting WHERE id_reviewer = '$_SESSION[id_user]' AND id_naskah = '$id_naskah' ") or die(mysql_error());
                                        $vot = mysql_fetch_array($voting);
                                        $status = $vot['status'];
                                        if($status == 1){
                                            $pilihannya = '<span class="label label-danger label-form">Tidak Menyanggupi</span>';
                                        }
                                        if($status == 2){
                                            $pilihannya = '<span class="label label-info label-form">Menyanggupi</span>';
                                        }

                                        if($status != 3 && $status != 0){
                                            $notifikasi = 'Anda  '.$pilihannya.'  Untuk Menelaah Naskah ini.';
                                        }
                                    ?>  
                                        <?php if($status == 3 || $status == 0){ ?>
                                        <div class="col-md-2">
                                            <form method="POST" action="modul/modul_reviewer/mod_review/pilihan-reviewer.php" class="form-horizontal">
                                                <input type="hidden" type="text" name="id_reviewer" value="<?=$_SESSION['id_user']?>">
                                                <input type="hidden" type="text" name="id_naskah" value="<?=$_GET['id']?>">
                                                <input type="hidden" type="text" name="status_tgl" value="<?=$naskah['status_tgl']?>">
                                                <input type="hidden" type="text" name="pilihan" value="TERIMA">
                                                <button class="btn btn-info terima"><span class="fa fa-check"></span> Sanggup</button>
                                            </form>
                                        </div>
                                        <div class="col-md-2">
                                            <form method="POST" action="modul/modul_reviewer/mod_review/pilihan-reviewer.php">
                                                <input type="hidden" type="text" name="id_reviewer" value="<?=$_SESSION['id_user']?>">
                                                <input type="hidden" type="text" name="id_naskah" value="<?=$_GET['id']?>">
                                                <input type="hidden" type="text" name="status_tgl" value="<?=$naskah['status_tgl']?>">
                                                <input type="hidden" type="text" name="pilihan" value="TOLAK">
                                                <button class="btn btn-danger tolak"><span class="fa fa-times"></span> Tidak Sanggup</button>
                                            </form>
                                        </div>
                                        <?php }else{ echo $notifikasi; } ?>


                                    </div>
                                    </div>
                                </div>
                            <div class="panel panel-default tabs">                            
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Formulir Input Naskah</a></li>
                                    <!-- <li><a href="#tab-second" role="tab" data-toggle="tab">Riwayat Penulis</a></li> -->
                                    <li><a href="#tab-third" role="tab" data-toggle="tab">Riwayat Naskah</a></li>
                                </ul>
                                <div class="panel-body tab-content">
                                <div class="tab-pane active" id="tab-first">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Judul Naskah</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="judul" class="form-control" value="<?=$naskah['judul']?>" />
                                            </div>                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Instansi</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="judul" class="form-control" value="<?=$naskah['intansi']?>" />
                                            </div>                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Satuan Kerja</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="judul" class="form-control" value="<?=$naskah['satker']?>" />
                                            </div>                                            
                                        </div>
                                    </div>
                                  <!--  <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Satuan Kerja</label>
                                        <div class="col-md-6 col-xs-12"> 
                                            <select class="form-control select" name="kategori">
                                            <?php $tampil=mysql_query("SELECT * FROM kategori WHERE id_kategori = '$naskah[kategori]'");
                                                $row=mysql_fetch_array($tampil);
                                                echo "<option value=".$row['id_kategori'].">".$row['nama']."</option>";
                                            ?> 
                                            </select>
                                        </div>
                                    </div> -->
                                       <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Uraian Singkat</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="abstrak"><?=$naskah['abstrak']?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Jumlah Halaman</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-clipboard"></span></span>
                                                <input type="text" name="halaman" class="form-control" value="<?=$naskah['halaman']?>" />
                                            </div>                                            
                                        </div>
                                    </div>
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Tanggal Upload</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                <input type="text" class="form-control" value="<?php echo $naskah['tanggal']?>">                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">File Naskah</label>
                                        <div class="col-md-6 col-xs-12">                                                                                                                                        
                                        <a href="files/<?php echo $naskah['file']?>" target="_blank"><button class="btn btn-primary" ><span class="fa fa-download"></span> Download</button></a>
                                        </div>
                                    </div>
                                </div>
                                    <!-- Tab Riwayat Penulis Start -->
                                        <div class="tab-pane" id="tab-second">
                                        <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Riwayat Pendidikan</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name=""><?=$r['rwy_pendidikan']?></textarea>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Karya Buku</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name=""><?=$r['karya']?></textarea>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Catatan</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name=""><?=$r['catatan']?></textarea>
                                        </div>
                                        </div>
                                       </div>  
                                    <!-- Tab Riwayat Naskah Start -->                                      
                                        <div class="tab-pane" id="tab-third">                      
                                        <div class="form-group">                                        
                                            <label class="col-md-3 col-xs-12 control-label">Jenis Terbitan</label>
                                            <div class="col-md-3">
                                                <select name="jenis_terbitan" class="form-control select">
                                                    <option value="<?=$naskah['jenis_terbitan']?>"><?=$naskah['jenis_terbitan']?></option>
                                                </select>
                                            </div>                                            
                                        </div>
                                        <div class="form-group">                                        
                                            <label class="col-md-3 col-xs-12 control-label">Kepengarangan</label>
                                            <div class="col-md-3">
                                                <select name="kepengarangan" id="kepengarangan" class="form-control select">
                                                    <option value="<?=$naskah['kepengarangan']?>"><?=$naskah['kepengarangan']?></option>
                                                </select>
                                            </div>                                            
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Uraian Buku</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="uraian_buku"><?=$naskah['uraian_buku']?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Keistimewaan</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="keistimewaan"><?=$naskah['keistimewaan']?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Sasaran Pembaca</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="keistimewaan"><?=$naskah['sasaran_pembaca']?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Ketertarikan buku</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="ketertarikan"><?=$naskah['ketertarikan']?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Daftar E-mail / Website</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="daftar_email_web"><?=$naskah['daftar_email_web']?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Cara Memasarkan Buku</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="cara_memasarkan"><?=$naskah['cara_memasarkan']?></textarea>
                                            </div>
                                        </div>
                                          <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Perkiraan Cetakan</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="perkiraan_cetak"><?=$naskah['perkiraan_cetak']?></textarea>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <button class="btn btn-default" onclick="window.history.back()">Kembali</button>                                    
                                    <!-- <button class="btn btn-primary pull-right">Submit</button> -->
                                </div>
                            </div>
                            </div><!-- END FORM HORIZONTAL -->
                        </div><!-- END COL 12 -->
                    </div><!-- END OF ROW -->                    
                </div><!-- END PAGE CONTENT WRAPPER -->                                                
            </div><!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
<?php } ?>
        