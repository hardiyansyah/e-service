                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Laporan</a></li>
                    <li><a href="#">hasil telaah 2</a></li>
                </ul>
                <!-- END BREADCRUMB -->
                <?php
                $review= mysql_query("SELECT * FROM review WHERE id_review='$_GET[id]'");
                $revi=mysql_fetch_array($review);
                $review2= mysql_query("SELECT * FROM naskah WHERE id_naskah='$revi[id_naskah]'");
                $revi2=mysql_fetch_array($review2);
                $review3= mysql_query("SELECT * FROM hasil_telaah2 WHERE id_review='$revi[id_review]' AND ke='$revi[status]'");
                $revi3=mysql_fetch_array($review3);
                $review4= mysql_query("SELECT * FROM penilaian WHERE id_review='$revi[id_review]' AND ke='$revi[status]'");
                $revi4=mysql_fetch_array($review4);
                if ($revi4['nilai']=='diterima_syarat'){
                $re="Diterima Dengan Syarat";
                }
                else if ($revi4['nilai']=='diterima'){
                $re="Diterima";
                }
                else if ($revi4['nilai']=='ditolak'){
                $re="Ditolak";
                }
                else {
                $re="--";
                }
                $user = $_SESSION['namauser'];
                $tampil= mysql_query("SELECT * FROM users WHERE username ='$user'");
                $cc=mysql_fetch_array($tampil);
                $tgl=date('20y-m-d');
                $tgl2=tgl_indo($tgl);
                ?>
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
                            
                            <form method="POST" action="modul/modul_dewan/mod_penilaian/aksi_penilaian.php" enctype="multipart/form-data" class="form-horizontal" >
                            <input type="hidden" name="id_nilai" value="<?php echo $revi4 ['id_nilai']?>">
                            <input type="hidden" name="id_naskah" value="<?php echo $revi['id_naskah']?>">
                            <input type="hidden" name="id_editor" value="<?php echo $revi['id_editor']?>">
                            <input type="hidden" name="id_reviewer" value="<?php echo $revi['id_reviewer']?>">
                            <input type="hidden" name="id" value="<?php echo $revi['id_review']?>">
                            <input type="hidden" name="siapa" value="<?php echo $cc['id_users']?>">
                            <input type="hidden" name="status_tgl" value="<?php echo $revi2['status_tgl']?>">
                            <input type="hidden" name="hal" value="Dewan Editor dengan nama <?php echo $cc['nama_lengkap']?>, Pada Tanggal <?php echo $tgl2; ?>, Telah Mengesahkan Penilaian Naskah dari Penelaah Dengan Judul Naskah <?php echo $revi2['judul']?> (Hasil Telaah Ke- <?php echo $revi['status']?>)">
                            <input type="hidden" name="kirim" value="O">  

                                <div class="panel panel-default tabs">                            
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Hasil Telaah Naskah</a></li>
                                        <li><a href="#tab-second" role="tab" data-toggle="tab">Hasil Penilaian Penelaah Ahli</a></li>
                                        <li><a href="#tab-third" role="tab" data-toggle="tab">Rekomendasi Hasil Telaah Dari Penelaah Ahli</a></li>
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
                                        <!--     <div class="form-group">
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
                                                    <select name="ke" class="form-control select">
                                                        <option selected="selected"value="<?php echo $revi['status']?>">Telaah Ke-<?php echo $revi['status']?></option>
                                                        <!-- <option value=<?php echo $revi['status']?>>Telaah Ke-1</option>
                                                        <option value=<?php echo $revi['status']?>>Telaah Ke-2</option>
                                                        <option value=<?php echo $revi['status']?>>Telaah Ke-3</option> -->
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab-second">
                                            <div class="form-group">                                        
                                                <label class="col-md-3 col-xs-12 control-label">Jenis Terbitan</label>
                                                <div class="col-md-2">
                                                    <select name="jenis" class="form-control select">
                                                        <option value="<?php echo $revi3['jenis_terbitan']?>"selected="selected"><?php echo $revi3['jenis_terbitan']?></option>
                                                       <!--  <option value="<?php echo $revi3['jenis_terbitan']?>">Buku Ilmiah</option>
                                                        <option value="<?php echo $revi3['jenis_terbitan']?>">Buku Umum (Ilmiah Populer)</option>
                                                        <option value="<?php echo $revi3['jenis_terbitan']?>">Monografi</option>
                                                        <option value="<?php echo $revi3['jenis_terbitan']?>">Buku Bunga Rampai</option>
                                                        <option value="<?php echo $revi3['jenis_terbitan']?>">Prosiding</option>      -->                                                   
                                                    </select>
                                                </div>                                            
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Tujuan dan Lingkup Buku ini</label>
                                                <div class="col-md-6 col-xs-12">
                                                <textarea class="form-control" rows="5"><?php echo $revi3['tujuan']?></textarea>
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Gaya struktur dan sistematika penulisan</label>
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
                                                <div class="col-md-2">
                                                    <select name="nilai" class="form-control select">
                                                        <option selected="selected"value="<?php echo $revi4['nilai']?>"><?php echo $revi4['nilai']?></option>
                                                        <option value= diterima>Diterima</option>
                                                        <option value= diterima_syarat>Diterima Dengan Syarat</option>
                                                        <option value= ditolak>Di Tolak</option>
                                                    </select>
                                                </div>                                            
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Catatan</label>
                                                <div class="col-md-6 col-xs-12">
                                                <textarea name="catatan" class="form-control" rows="5"><?php echo $revi4['komentar']?></textarea>
                                                </div>
                                            </div>                                            
                                            
                                             <div class="panel-footer">                                                                        
                                        <button class="btn btn-primary pull-right">Pengesahan <span class="fa fa-floppy-o fa-right"></span></button>
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
        <!-- END PAGE CONTAINER -->