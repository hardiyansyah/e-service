 <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Pilih Penelaah</li>
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

                            $info="Penugasan Telaah Naskah baru telah diterima, silahkan klik pesan ini untuk melihat";
                            $link="?hal=reviewer-monitoring&id=$r2[id_naskah]";
                            ?>
                            <form method="POST" action="modul/modul_editor/mod_naskah/update-reviewer.php" enctype="multipart/form-data" class="form-horizontal">
                            <input type="hidden" name="id" value="<?php echo $r2['id_naskah']?>">
                            <input type="hidden" name="st" value="<?php echo $r2['status']?>">
                            <input type="hidden" name="isi" value="<?php echo $info; ?>">
                            <input type="hidden" name="baca" value="N">
                            <input type="hidden" name="link" value="<?php echo $link; ?>">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Detail</strong> Naskah</h3>
                                </div>
                                <div class="panel-body">                                                                        
                                    
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
                                        <label class="col-md-3 col-xs-12 control-label">Email</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                                                <input type="text" value="<?php echo $r3['email']?>" class="form-control"/>
                                            </div>                                            
                                            </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Judul Naskah</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-book"></span></span>
                                                <input type="text" value="<?php echo $r2['judul']?>"class="form-control"/>
                                             </div>                                            
                                            </div>
                                    </div>
                                    <?php
                                    $kategori=mysql_query("SELECT * FROM kategori WHERE id_kategori='$r2[kategori]' ");
                                     $kat=mysql_fetch_array($kategori);
                                     ?>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Kategori</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" value="<?php echo $kat['nama']?>"class="form-control"/>
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
                                        <label class="col-md-3 col-xs-12 control-label">Pilih Penelaah</label>
                                        <div class="col-md-6 col-xs-12"> 
                                     <select class="form-control select" name="rev">
                                     <?php
                                     $nama_user= mysql_query("SELECT * FROM users WHERE id_users='$r2[reviewer1]'");
                                     $r4   = mysql_fetch_array($nama_user);
                                       echo"  <option value=$r4[id_users] selected>- $r4[nama_lengkap] -</option>";
                                        $tampil=mysql_query("SELECT * FROM users WHERE level='reviewer' ORDER BY id_users");
                                        while($r=mysql_fetch_array($tampil)){
                                          echo "<option value=$r[id_users]>$r[nama_lengkap] ($r[nip])</option>";
                                        } ?>                                                                 
                                            </select>
                                            <span class="help-block">Pilih Penelaah 1 </span>
                                       
                                        </div>
                                    </div>  
                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Pilih Penelaah</label>
                                        <div class="col-md-6 col-xs-12"> 
                                     <select class="form-control select" name="rev2">
                                     <?php
                                     $nama_user= mysql_query("SELECT * FROM users WHERE id_users='$r2[reviewer2]'");
                                     $r4   = mysql_fetch_array($nama_user);
                                       echo"  <option value=$r4[id_users] selected>- $r4[nama_lengkap] -</option>";
                                        $tampil=mysql_query("SELECT * FROM users WHERE level='reviewer' ORDER BY id_users");
                                        while($r=mysql_fetch_array($tampil)){
                                          echo "<option value=$r[id_users]>$r[nama_lengkap] ($r[nip])</option>";
                                        } ?>                                                                 
                                            </select>
                                            <span class="help-block">Pilih Penelaah 2 </span>
                                       
                                        </div>
                                    </div>                                                                                      
                                        </div>  
                                <div class="panel-footer">                               
                                     <button class="btn btn-primary pull-right">Simpan</button>
                                     <button class="btn btn-primary pull-left" onclick="self.history.back()">Kembali</button>
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
     