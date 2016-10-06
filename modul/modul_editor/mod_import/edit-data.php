      <ul class="breadcrumb push-down-0">
                    <li><a href="#">Editor</a></li>
                    <li class="active">Edit Data Peneliti</li>
                </ul>
 <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
            <div class="row">
                <div class="col-md-12">
                <?php
                $id = $_POST['userid'];
                    $tampil= mysql_query("SELECT * FROM peneliti WHERE id_peneliti ='$id'");
                            $pen=mysql_fetch_array($tampil);
                                $nama_lengkap       = $pen['nama_lengkap'];
                                $unit_kerja         = $pen['unit_kerja'];
                                $bidang_kepakaran   = $pen['bidang_kepakaran'];
                                $jabatan_peneliti   = $pen['jabatan_peneliti'];
                                $instansi           = $pen['instansi'];
                                $actionURL  = 'media.php?hal=editor-import-aksi&action=edit';
                                ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">Edit Data Peneliti</div>                            
                        <form class="form-horizontal" method="POST" action="<?=$actionURL;?>">
                        <input type="hidden" name="userid" value="<?=$id?>"/>
                            <br><br><br><br><br>

                            <div class="form-group">                                        
                                <label class="col-md-3 col-xs-12 control-label">Nama Lengkap</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" name="nama_lengkap" value="<?=$nama_lengkap ?>" class="form-control"/>
                                    </div>            
                                    <span class="help-block">Masukkan Nama Lengkap</span>
                                </div>
                            </div>
                            <div class="form-group">                                        
                                <label class="col-md-3 col-xs-12 control-label">Unit Kerja</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" name="unit_kerja" value="<?=$unit_kerja ?>" class="form-control"/>
                                    </div>            
                                    <span class="help-block">Masukan Unit Kerja</span>
                                </div>
                            </div>
                            <div class="form-group">                                        
                                <label class="col-md-3 col-xs-12 control-label">Bidang Kepakaran</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" name="bidang_kepakaran" value="<?=$bidang_kepakaran ?>" class="form-control"/>
                                    </div>            
                                    <span class="help-block">Masukan Bidang Kepakaran</span>
                                </div>
                            </div>
                            <div class="form-group">                                        
                                <label class="col-md-3 col-xs-12 control-label">Jabatan Peneliti</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" name="jabatan_peneliti" value="<?=$jabatan_peneliti ?>" class="form-control"/>
                                    </div>            
                                    <span class="help-block">Masukan Jabatan Peneliti</span>
                                </div>
                            </div>
                            <div class="form-group">                                        
                                <label class="col-md-3 col-xs-12 control-label">Instansi</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" name="instansi" value="<?=$instansi ?>" class="form-control"/>
                                    </div>            
                                    <span class="help-block">Masukan Instansi</span>
                                </div>
                            </div>                                 
                            <div class="panel-footer">
                                <button class="btn btn-primary pull-right">SIMPAN <span class="fa fa-floppy-o fa-right"></span></button>
                                </form>
                                <button class="btn btn-primary pull-left" onclick="history.go(-1);"><span class="fa fa-reply fa-right"></span> KEMBALI </button>
                            </div> 
                        <!-- </form> -->
                    </div>
                </div>
            </div>                    
        </div>
        <!-- END PAGE CONTENT WRAPPER -->                                                
    </div>            
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->