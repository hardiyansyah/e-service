<?php
    $action = $_GET['action'];
    if($action == 'add'){
        $breadcrumb = '<li><a href="#">Tambah Satuan Kerja</a></li>';
        $panelTitle = '<h3 class="panel-title"><strong>Tambah</strong> Satuan Kerja</h3>';
    }elseif($action == 'edit'){
        $breadcrumb = '<li><a href="#">Edit Satuan Kerja</a></li>';
        $panelTitle = '<h3 class="panel-title"><strong>Edit</strong> Satuan Kerja</h3>';
        $katid      = $_POST['katid'];
    }else{
        $breadcrumb = '';
        $panelTitle = '';
    }
?>        
 <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
            <div class="row">
                <div class="col-md-12">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading"><?=$panelTitle;?></div>
                        <?php
                        if($action == 'add'){
                            $valueKelas = '';
                            $valueNama  = '';
                            $valueAlamat = '';
                            $valueKatid = '';
                            $actionURL  = 'media.php?hal=editor-satker-aksi&action=add';
                        }
                        if($action == 'edit'){                                 
                            $tampil= mysql_query("SELECT * FROM kategori WHERE id_kategori ='$katid'");
                            $kat=mysql_fetch_array($tampil);
                                $valueKelas = $kat['kelas'];
                                $valueNama  = $kat['nama'];
                                $valueAlamat = $kat['alamat'];
                                $valueKatid = $kat['id_kategori'];
                                $actionURL  = 'media.php?hal=editor-satker-aksi&action=edit';
                        }
                        ?>
                            
                        <form class="form-horizontal" method="POST" action="<?=$actionURL;?>">
                            <br><br><br><br><br>

                            <div class="form-group">                                        
                                <label class="col-md-3 col-xs-12 control-label">Instansi</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" name="kelas" value="<?=$valueKelas?>" class="form-control"/>
                                    </div>            
                                    <span class="help-block">Masukkan Instansi</span>
                                </div>
                            </div>
                            <div class="form-group">                                        
                                <label class="col-md-3 col-xs-12 control-label">Satuan Kerja</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" name="nama" value="<?=$valueNama?>" class="form-control"/>
                                    </div>            
                                    <span class="help-block">Masukan Satuan Kerja</span>
                                </div>
                            </div>
                            <div class="form-group">                                        
                                <label class="col-md-3 col-xs-12 control-label">Alamat</label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <textarea class="form-control" name="alamat" rows="5"><?=$valueAlamat?></textarea>
                                    <span class="help-block">Masukkan Alamat</span>
                                </div>
                            </div>                                 
                            <div class="panel-footer">
                                <input type="hidden" name="katid" value="<?=$valueKatid?>" class="form-control"/>
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