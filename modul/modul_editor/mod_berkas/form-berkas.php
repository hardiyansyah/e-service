<?php
    $action = $_GET['action'];
    if($action == 'add'){
        $breadcrumb = '<li><a href="#">Tambah File</a></li>';
        $panelTitle = '<h3 class="panel-title"><strong>Tambah</strong> File</h3>';
    }elseif($action == 'edit'){
        $breadcrumb = '<li><a href="#">Edit File</a></li>';
        $panelTitle = '<h3 class="panel-title"><strong>Edit</strong> File</h3>';
        $berid      = $_POST['berid'];
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
                            $valueNama = '';
                            $valueFile  = '';
                            $valueberid = '';
                            $actionURL  = 'media.php?hal=editor-berkas-aksi&action=add';
                        }
                        if($action == 'edit'){                                 
                            $tampil= mysql_query("SELECT * FROM file_penting WHERE id_file ='$berid'");
                            $ber=mysql_fetch_array($tampil);
                                $valueNama = $ber['nama_file'];
                                $valueFile  = $ber['file'];
                                $valueberid = $ber['id_file'];
                                $actionURL  = 'media.php?hal=editor-berkas-aksi&action=edit';
                        }
                        ?>
                            
                        <form class="form-horizontal" method="POST" action="<?=$actionURL;?>">
                            <br><br><br><br><br>

                            <div class="form-group">                                        
                                <label class="col-md-3 col-xs-12 control-label">Nama File</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" name="nama_file" value="<?=$valueNama?>" class="form-control"/>
                                    </div>            
                                    <span class="help-block">Masukkan Nama File</span>
                                </div>
                            </div>
                            <div class="form-group">                                        
                                <label class="col-md-3 col-xs-12 control-label">File</label>
                                <div class="col-md-6 col-xs-12">
                                    <input type="file" multiple id="file-simple" name="fupload" value="<?=$valueFile?>" class="form-control"/>
                                         
                                    <span class="help-block">Masukan File</span>
                                </div>
                            </div>                         
                            <div class="panel-footer">
                                <input type="hidden" name="berid" value="<?=$valueberid?>" class="form-control"/>
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
