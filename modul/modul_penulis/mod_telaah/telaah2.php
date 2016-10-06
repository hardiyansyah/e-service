                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Telaah 2</a></li>
                </ul>
                <!-- END BREADCRUMB -->
                <?php
                $user = $_SESSION['namauser'];
                $tampil= mysql_query("SELECT * FROM users WHERE username ='$user'");
                $r=mysql_fetch_array($tampil);
                $review= mysql_query("SELECT * FROM review WHERE id_review='$_GET[id]'");
                $revi=mysql_fetch_array($review);
                $naskah= mysql_query("SELECT * FROM naskah WHERE id_naskah='$revi[id_naskah]'");
                $nas=mysql_fetch_array($naskah);$review= mysql_query("SELECT * FROM review WHERE id_review='$_GET[id]'");
                $revi=mysql_fetch_array($review);
                $naskah= mysql_query("SELECT * FROM naskah WHERE id_naskah='$revi[id_naskah]'");
                $nas=mysql_fetch_array($naskah);
                ?>
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Form</strong> Telaah  2</h3>
                                    
                                </div>
                            <form method="POST" action="modul/mod_telaah/aksi_telaah2.php" enctype="multipart/form-data" class="form-horizontal" >
                            <input type="hidden" name="ids" value=<?php echo $r['id_users']?>>
		   					<input type="hidden" name="id" value=<?php echo $revi['id_review']?>>  

                                <div class="panel panel-default tabs">                            
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Formulir 2 Hasil Telaah </a></li>
                                        <li><a href="#tab-second" role="tab" data-toggle="tab">Penilaian</a></li>
                                        <li><a href="#tab-third" role="tab" data-toggle="tab">Rekomendasi Hasil Telaah </a></li>
                                    </ul>
                                    <div class="panel-body tab-content">
                                        <div class="tab-pane active" id="tab-first">
                                                <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Judul Naskah</label>
                                                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                    <input type="text" class="form-control" value=<?php echo $nas['judul']?>>                                                    
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Kategori</label>
                                                <div class="col-md-6 col-xs-12">          
                                                <?php
                                                    $kategori=mysql_query("SELECT * FROM kategori WHERE id_kategori='$nas[kategori]' ");
                                                     $kat=mysql_fetch_array($kategori);
                                                ?>                                  
                                                    <input type="text" class="form-control" value=<?php echo $kat['nama']?>>
                                                </div>
                                            </div>
                                            <div class="form-group">                                        
                                                <label class="col-md-3 col-xs-12 control-label">Kode Naskah</label>
                                            <?php 
                                            $jmlrev=mysql_num_rows(mysql_query("SELECT * FROM review WHERE id_naskah='$nas[id_naskah]'"))
                                            ?>
                                                <div class="col-md-2">
                                                    <select name="ke" class="form-control select">
                                                        <option selected="selected" value=<?php echo $jmlrev?>>Telaah Ke <?php echo $jmlrev?></option>
                                                        <option value= 1>Telaah Ke 1</option>
                                                        <option value= 2>Telaah Ke 2</option>
                                                        <option value= 3>Telaah Ke 3</option>
                                                    </select>
                                                </div>                                            
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab-second">
                                            
                                           <div class="form-group">                                        
                                                <label class="col-md-3 col-xs-12 control-label">Jenis Terbitan</label>
                                                 <div class="col-md-2">
                                                    <select name="jenis" class="form-control select">
                                                        <option selected="selected" value=>-Pilih Jenis Terbitan-</option>
                                                        <option value= Ilmiah>Buku Ilmiah</option>
                                                        <option value= Umum>Buku Umum (Ilmiah Populer)</option>
                                                        <option value= Monografi>Monografi</option>
                                                        <option value= Bunga-Rampai>Bunga Rampai</option>
                                                        <option value= Prosiding>Prosiding</option>
                                                    </select>
                                                </div>                                            
                                            </div>  
                                             <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Tujuan dan Lingkup Buku Ini</label>
                                                <div class="col-md-6 col-xs-12">
                                                <textarea name"tujuan" class="form-control" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label  class="col-md-3 col-xs-12 control-label">Gaya Struktur dan Sistematika Penulisan</label>
                                                <div class="col-md-6 col-xs-12">
                                                <textarea name"tujuan" class="form-control" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Pembaca Sasaran Buku ini</label>
                                                <div class="col-md-6 col-xs-12">
                                                <textarea name"sasaran" class="form-control" rows="5"></textarea>
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Kesesuaian Kandungan</label>
                                                <div class="col-md-6 col-xs-12">
                                                <textarea name"kesesuaian" class="form-control" rows="5"></textarea>
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Kemutakhiran dan Ketelitian</label>
                                                <div class="col-md-6 col-xs-12">
                                                <textarea name"kemutakhiran" class="form-control" rows="5"></textarea>
                                                </div>
                                            </div>
                                        </div>                                        
                                        <div class="tab-pane" id="tab-third">
                                                                            
                                         <div class="form-group">                                        
                                                <label class="col-md-3 col-xs-12 control-label">Hasil</label>
                                                <div class="col-md-2">
                                                    <select name="rekomendasi" class="form-control select">
                                                        <option selected="selected" value="0">- Pilih -</option>
                                                        <option value= diterima>Diterima</option>
                                                        <option value= diterima_syarat>Diterima Dengan Syarat</option>
                                                        <option value= ditolak>Di Tolak</option>
                                                    </select>
                                                </div>  
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Catatan</label>
                                                <div class="col-md-6 col-xs-12">
                                                <textarea name"catatan" class="form-control" rows="5"></textarea>
                                                </div>                                          
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">                                                                        
                                        <button class="btn btn-primary pull-right">Next <span class="fa fa-floppy-o fa-right"></span></button>
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