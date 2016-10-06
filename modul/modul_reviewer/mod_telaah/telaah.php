                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Telaah 1</a></li>
                </ul>
                <!-- END BREADCRUMB -->
                <?php
                $user = $_SESSION['namauser'];
				$tampil= mysql_query("SELECT * FROM users WHERE username ='$user'");
				$r=mysql_fetch_array($tampil);
				$tampiln= mysql_query("SELECT * FROM naskah WHERE id_naskah='$_GET[id]'");
				$rn=mysql_fetch_array($tampiln);
				$jmlrev=mysql_num_rows(mysql_query("SELECT * FROM review WHERE id_naskah='$rn[id_naskah]' AND id_reviewer ='$_SESSION[id_user]'"));
				$id_rev= mysql_query("SELECT * FROM review WHERE id_naskah='$_GET[id]'AND id_reviewer = '$_SESSION[id_user]'");
				$idr=mysql_fetch_array($id_rev);
                ?>
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
                        <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Form</strong> Telaah 1</h3>
                                </div>
                            
                            <form method="POST" action="modul/modul_reviewer/mod_telaah/aksi_telaah.php" enctype="multipart/form-data" class="form-horizontal" >
                            <input type="hidden" name="id_reviewer" value="<?php echo $r['id_users']?>">
		   					<input type="hidden" name="id_review" value="<?php echo $_GET['review']?>">
                                <input type="hidden" name="id_rev" value="<?php echo $_GET['revisi']?>">
                                <input type="hidden" name="id_naskah" value="<?php echo $_GET['id']?>">

                                <div class="panel panel-default tabs">                            
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Formulir Hasil Telaah</a></li>
                                        <li><a href="#tab-second" role="tab" data-toggle="tab">Penelaah Ahli</a></li>
                                        <li><a href="#tab-third" role="tab" data-toggle="tab">Usulan Penilaian</a></li>
                                    </ul>
                                    <div class="panel-body tab-content">
                                        <div class="tab-pane active" id="tab-first">
                                                <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Judul Naskah</label>
                                                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                    <input type="text" class="form-control" value="<?php echo $rn['judul']?>">                                                    
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Instansi</label>
                                                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                    <input type="text" class="form-control" value="<?php echo $rn['intansi']?>">                                                    
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Satuan Kerja</label>
                                                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                    <input type="text" class="form-control" value="<?php echo $rn['satker']?>">                                                    
                                                </div>
                                            </div>

                                            <!-- <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Kategori</label>
                                                <div class="col-md-6 col-xs-12">          
                                                <?php
                                                    $kategori=mysql_query("SELECT * FROM kategori WHERE id_kategori='$rn[kategori]' ");
                                                     $kat=mysql_fetch_array($kategori);
                                                ?>                                  
                                                    <input type="text" class="form-control" value="<?php echo $kat['nama']?>">
                                                </div>
                                            </div> -->

                                            <div class="form-group">                                        
                                                <label class="col-md-3 col-xs-12 control-label">Kode Naskah</label>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control" name="kode_naskah" value="<?php echo $jmlrev; ?>">
                                                </div>
                                                                               
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab-second">
                                            
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Nama</label>
                                                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                    <input type="text" class="form-control" value="<?php echo $r['nama_lengkap']?>">                                                    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Jabatan</label>
                                                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                    <input type="text" class="form-control" value="<?php echo $r['jabatan']?>">                                                    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Alamat</label>
                                                <div class="col-md-6 col-xs-12">
                                                <textarea class="form-control" rows="5"><?php echo $r['alamat']?></textarea>
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">No. HP/Telp.</label>
                                                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                    <input type="text" class="form-control" value="<?php echo $r['telp']?>">                                                    
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">No. Fax</label>
                                                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                    <input type="text" class="form-control" value="<?php echo $r['fax']?>">                                                    
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Email</label>
                                                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                    <input type="text" class="form-control" value="<?php echo $r['email']?>">                                                    
                                                </div>
                                            </div>
                                             
                                        </div>                                        
                                        <div class="tab-pane" id="tab-third">
                                        <!-- <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Tanggal</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                <input type="text" class="form-control datepicker" name="tgl_mulai">                                            
                                            </div>
                                            <span class="help-block">Selesai Tanggal Sekarang</span>
                                        </div>
                                    </div>     -->                                      
                                         <div class="form-group">                                        
                                                <label class="col-md-3 col-xs-12 control-label">Usulan Penilaian</label>
                                                <div class="col-md-2">
                                                    <select name="usulan" class="form-control select">
                                                        <option selected="selected"value="0">- Usulan -</option>
                                                        <option value= diterima>Diterima</option>
                                                        <option value= diterima_syarat>Diterima Dengan Syarat</option>
                                                        <option value= ditolak>Di Tolak</option>
                                                    </select>
                                                </div>                                            
                                            </div>
                                            <div class="panel-footer">                                                                        
                                        <button class="btn btn-primary pull-right">Simpan <span class="fa fa-floppy-o fa-right"></span></button>
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