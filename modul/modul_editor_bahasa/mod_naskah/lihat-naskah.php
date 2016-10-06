<?php
    $detail     = mysql_query("SELECT * FROM naskah WHERE id_naskah='$_GET[id]'");
    $r2         = mysql_fetch_array($detail);
    $nama_user  = mysql_query("SELECT * FROM users WHERE id_users='$r2[id_users]'");
    $r3         = mysql_fetch_array($nama_user);
?>       
<!-- START BREADCRUMB -->
                <ul class="breadcrumb push-down-0">
                    <li><a href="#">Home</a></li>
                    <li class="active">Detail Naskah</li>
                    <li class="active"><?php echo $r2['judul']?></li>
                </ul>
                <!-- END BREADCRUMB -->                                                
                                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
                        <?php
                            $detail= mysql_query("SELECT * FROM naskah WHERE id_naskah='$_GET[id]'");
                            $r2   = mysql_fetch_array($detail);
                            $nama_user= mysql_query("SELECT * FROM users WHERE id_users='$r2[id_users]'");
                            $r3   = mysql_fetch_array($nama_user);
                                                ?>
                            <div class="form-horizontal">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="col-md-5">
                                        <h3 class="panel-title"><strong>Detail  Naskah  </strong><?php echo $r2['judul']?></h3>
                                    </div>
                                 </div>
                                <div class="panel panel-default tabs">                            
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Formulir Input Naskah</a></li>
                                    <li><a href="#tab-second" role="tab" data-toggle="tab">Riwayat Penulis</a></li>
                                    <li><a href="#tab-third" role="tab" data-toggle="tab">Riwayat Naskah</a></li>
                                </ul>
                                <div class="panel-body tab-content">
                                <div class="tab-pane active" id="tab-first">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Judul Naskah</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="judul" class="form-control" value="<?=$r2['judul']?>" />
                                            </div>                                            
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Instansi</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="intansi" class="form-control" value="<?=$r2['intansi']?>" />
                                            </div>                                            
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Satuan Kerja</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="satker" class="form-control" value="<?=$r2['satker']?>" />
                                            </div>                                            
                                        </div>
                                    </div>
                                <!--    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Satuan Kerja</label>
                                        <div class="col-md-6 col-xs-12"> 
                                            <select class="form-control select" name="kategori">
                                            <?php $tampil=mysql_query("SELECT * FROM kategori WHERE id_kategori = '$r2[kategori]'");
                                                $row=mysql_fetch_array($tampil);
                                                echo "<option value=".$row['id_kategori'].">".$row['nama']."</option>";
                                            ?> 
                                            </select>
                                        </div>
                                    </div> -->
                                       <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Uraian Singkat</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="abstrak"><?=$r2['abstrak']?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Jumlah Halaman</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-clipboard"></span></span>
                                                <input type="text" name="halaman" class="form-control" value="<?=$r2['halaman']?>" />
                                            </div>                                            
                                        </div>
                                    </div>
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Tanggal Upload</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                <input type="text" class="form-control" value="<?php echo $r2['tanggal']?>">                                            
                                            </div>
                                        </div>
                                    </div>
                                         <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">File Surat Permohonan</label>
                                        <div class="col-md-6 col-xs-12">                                                                                                                                        
                                        <a href="files/<?php echo $r2['permohonan']?>" target="_blank"><button class="btn btn-primary" ><span class="fa fa-download"></span> Download</button></a>
                                        </div>
                                    </div>
                                   <!--  <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">File Surat Pengajuan</label>
                                        <div class="col-md-6 col-xs-12">                                                                                                                                        
                                        <a href="files/<?php echo $r2['pengajuan']?>" target="_blank"><button class="btn btn-primary" ><span class="fa fa-download"></span> Download</button></a>
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">File Naskah</label>
                                        <div class="col-md-6 col-xs-12">                                                                                                                                        
                                        <a href="files/<?php echo $r2['file']?>" target="_blank"><button class="btn btn-primary" ><span class="fa fa-download"></span> Download</button></a>
                                        </div>
                                    </div>
                                   <!--  <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Status Naskah</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-info"></span></span>
                                                <input type="text" value="<?php echo $r2['status']?>"class="form-control"/>
                                             </div>                    
                                            </div>
                                    </div> -->
                                    </div>
                                    <!-- Tab Riwayat Penulis Start -->
                                        <div class="tab-pane" id="tab-second">
                                            <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Nama</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                <input type="text" value="<?php echo $r3['nama_lengkap']?>"class="form-control"/>
                                            </div>                                            
                                        </div>
                                    </div>
                                      <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Alamat</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" ><?php echo $r3['alamat']?></textarea>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Email</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                                                <input type="text" value="<?php echo $r3['email']?>" class="form-control"/>
                                            </div>                                            
                                            </div>
                                    </div>
                                        <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Riwayat Pendidikan</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name=""><?=$r3['rwy_pendidikan']?></textarea>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Karya Buku</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name=""><?=$r3['karya']?></textarea>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Catatan</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name=""><?=$r3['catatan']?></textarea>
                                        </div>
                                        </div>
                                       </div>  
                                    <!-- Tab Riwayat Naskah Start -->                                      
                                        <div class="tab-pane" id="tab-third">                      
                                        <div class="form-group">                                        
                                            <label class="col-md-3 col-xs-12 control-label">Jenis Terbitan</label>
                                            <div class="col-md-3">
                                                <select name="jenis_terbitan" class="form-control select">
                                                    <option value="<?=$r2['jenis_terbitan']?>"><?=$r2['jenis_terbitan']?></option>
                                                </select>
                                            </div>                                            
                                        </div>
                                        <div class="form-group">                                        
                                            <label class="col-md-3 col-xs-12 control-label">Kepengarangan</label>
                                            <div class="col-md-3">
                                                <select name="kepengarangan" id="kepengarangan" class="form-control select">
                                                    <option value="<?=$r2['kepengarangan']?>"><?=$r2['kepengarangan']?></option>
                                                </select>
                                            </div>                                            
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Uraian Buku</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="uraian_buku"><?=$r2['uraian_buku']?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Keistimewaan</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="keistimewaan"><?=$r2['keistimewaan']?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Sasaran Pembaca</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="keistimewaan"><?=$r2['sasaran_pembaca']?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Ketertarikan buku</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="ketertarikan"><?=$r2['ketertarikan']?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Daftar E-mail / Website</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="daftar_email_web"><?=$r2['daftar_email_web']?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Cara Memasarkan Buku</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="cara_memasarkan"><?=$r2['cara_memasarkan']?></textarea>
                                            </div>
                                        </div>
                                          <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Perkiraan Cetakan</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="perkiraan_cetak"><?=$r2['perkiraan_cetak']?></textarea>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="panel-footer">                               
                                <div class="form-group">                                        
                                    <div class="col-md-3">
                                        <button class="btn btn-success btn-block" onclick="self.history.back()">Kembali</button>
                                    </div>   
                                     <div class="col-md-2">
                                               <a href="print.php?&id=<?php echo $r2['id_naskah']?>" target="_blank"><button type="submit" class="btn btn-success btn-block">Print</button></a>
                                            </div>   
                                    <div class="col-md-3">
                                    <script type="text/javascript">
                                        function pilihReviewer() {
                                            window.location= 'media.php?hal=dewan-pilih-reviewer&id=<?=$_GET["id"]?>';
                                        }
                                    </script>
                                    <?php 
                                        $cek    = mysql_query("SELECT * FROM voting WHERE id_naskah = '$_GET[id]' AND id_dewan = '$_SESSION[id_user]'");
                                        $hasil = mysql_num_rows($cek);
                                        if($hasil == 0){
                                            $kata = '<button class="btn btn-success btn-block" onclick="pilihReviewer()">';
                                            $kata .= "Pilih Penelaah</button>";
                                        }else{
                                            $kata = '<button class="btn btn-warning btn-block" onclick="pilihReviewer()">';
                                            $kata .= "Update Penelaah</button>";
                                        }

                                    ?>
                                        <?=$kata?>
                                    </div>               
                                </div>      
                            </div>  
                            
                        </div>
                    </div>

                    <!-- END RESPONSIVE TABLES -->
                    
                <!-- END PAGE CONTENT WRAPPER -->                                    
                </div>         
            </div>            
            <!-- END PAGE CONTENT -->

        </div>
        <!-- END PAGE CONTAINER -->    

      