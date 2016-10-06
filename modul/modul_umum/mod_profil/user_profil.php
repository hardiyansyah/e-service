<?php

if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  include "pages-error-404.php";
}
else{
$user = $_SESSION['namauser'];
$tampil= mysql_query("SELECT * FROM users WHERE username ='$user'");
$r=mysql_fetch_array($tampil);
?>        <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Beranda</a></li>
                    <li><a href="#">Profil</a></li>
                    
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
                            
                            <form class="form-horizontal" method="POST" action="modul/modul_umum/mod_profil/aksi_profil.php" enctype="multipart/form-data">
                             <input type="hidden" name="id" value="<?php echo $r['id_users']?>" >
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Edit</strong> Profil</h3>
                                    
                                </div>
                                <div class="panel-body">                                                                        
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Nama Lengkap</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                        <input type="text" name="nama_lengkap" value="<?php echo $r['nama_lengkap']?>"class="form-control"/>
                                                    </div>                                            
                                                    <span class="help-block">Isikan Nama Lengkap Anda</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">NIP</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-sound-5-1"></span></span>
                                                        <input type="text" name="nip" value="<?php echo $r['nip']?>" class="form-control"/>
                                                    </div>                                            
                                                    <span class="help-block">Isikan No. Induk Pegawai</span>
                                                </div>
                                            </div>
                                              <div class="form-group">
                                                <label class="col-md-3 control-label">Username</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                        <input type="text" name="username" value="<?php echo $r['username']?>" class="form-control"/>
                                                    </div>                                            
                                                    <span class="help-block">Isikan Username Untuk Login</span>
                                                </div>
                                            </div>
                        
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Alamat</label>
                                                <div class="col-md-9 col-xs-12">                                            
                                                    <textarea name="alamat" class="form-control" rows="5"><?php echo $r['alamat']?></textarea>
                                                    <span class="help-block">Isikan Alamat lengkap Anda</span>
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="col-md-3 control-label">Riwayat Pendidikan</label>
                                                <div class="col-md-9 col-xs-12">                                            
                                                    <textarea name="rwy_pendidikan" class="form-control" rows="5"><?php echo $r['rwy_pendidikan']?></textarea>
                                                    <span class="help-block">Isikan Riwayat Pendidikan Anda</span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Foto</label>
                                                <div class="col-md-9">                                                                                                                                        
                                                    <input type="file" class="fileinput btn-primary" name="fupload" id="filename" title="Browse foto"/>
                                                    <img src='foto_profil/<?php echo $r['foto']?>'width='50px' heigh='1px'>
                                                    <span class="help-block">Pilih Foto Anda</span>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-6">
                                            
                                            <div class="form-group">                                        
                                                <label class="col-md-3 control-label">Tanggal Lahir</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                        <input type="text" name="tgl_lahir" class="form-control datepicker" value="<?php echo $r['tgl_lahir']?>">                                            
                                                    </div>
                                                    <span class="help-block">Pilih Tanggal Lahir Anda</span>
                                                </div>
                                            </div>
                                                                                
                                         <div class="form-group">
                                                <label class="col-md-3 control-label">Jabatan</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-briefcase"></span></span>
                                                        <input type="text" name="jabatan" value="<?php echo $r['jabatan']?>"class="form-control"/>
                                                    </div>                                            
                                                    <span class="help-block">Jabatan Anda Saat ini</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Email</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                                                        <input type="text" name="email" value="<?php echo $r['email']?>"class="form-control"/>
                                                    </div>                                            
                                                    <span class="help-block">Isikan Alamat Email Valid Anda </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">No. Telp/HP</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-phone-square"></span></span>
                                                        <input type="text" name="telp" value="<?php echo $r['telp']?>"class="form-control"/>
                                                    </div>                                            
                                                    <span class="help-block">Isikan No. Telepon Atau Handphone Anda </span>
                                                </div> 
                                            </div>
                                               <div class="form-group">
                                                <label class="col-md-3 control-label">Fax</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-phone-alt"></span></span>
                                                      <input type="text" name="fax" value="<?php echo $r['fax']?>"class="form-control"/>
                                                    </div>                                            
                                                    <span class="help-block">Isikan No. Fax Anda </span>
                                                </div>
                                                <div class="form-group">
                                                <label class="col-md-3 control-label">Karya Sebelumnya</label>
                                                <div class="col-md-9 col-xs-12">                                            
                                                    <textarea class="form-control" name="karya"rows="5"><?php echo $r['karya']?></textarea>
                                                    <span class="help-block">Isikan Karya-karya Anda</span>
                                                </div>
                                            </div>
                                            </div>
                                                <div class="form-group">
                                                <label class="col-md-3 control-label">Catatan</label>
                                                <div class="col-md-9 col-xs-12">                                            
                                                    <textarea class="form-control" name="catatan" rows="5"><?php echo $r['catatan']?></textarea>
                                                    <span class="help-block">Isikan Catatan Pribadi Anda</span>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>

                                </div>
                                <div class="panel-footer">                                 
                                    <button class="btn btn-primary pull-right"><span class="fa fa-floppy-o"></span>SIMPAN</button>
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
     <?php } ?>