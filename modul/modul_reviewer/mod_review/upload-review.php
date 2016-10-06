<!-- START BREADCRUMB -->
                <ul class="breadcrumb push-down-0">
                    <li><a href="#">Home</a></li>
                    <li class="active">Telaah Naskah</li>
                </ul>
                <!-- END BREADCRUMB -->                                                
                                
                <!-- START CONTENT FRAME -->
                <div class="content-frame">     
                    <!-- START CONTENT FRAME TOP -->
                    <div class="content-frame-top">                        
                        <div class="page-title">                    
                            <h2><span class="fa fa-edit"></span> Telaah Naskah</h2>
                        </div>                                                
                        <div class="pull-right">
                            <button class="btn btn-default content-frame-left-toggle"><span class="fa fa-bars"></span></button>
                        </div>                                                       
                    </div>   
                    <?php
                    $tampilnaskah= mysql_query("SELECT * FROM naskah WHERE id_naskah ='$_GET[id]'");
                    $tn=mysql_fetch_array($tampilnaskah);
                    $tampiluser= mysql_query("SELECT * FROM users WHERE id_users='$tn[id_users]'");
                    $tu=mysql_fetch_array($tampiluser); 

                    ?>                
                    <div class="content-frame-left">
                        <div class="form-group">
                         <h4>Judul Naskah</h4>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="fa fa-book"></span></div>
                                <input type="text" class="form-control" value="<?php echo $tn['judul'] ?>" />
                            </div>
                            <h4>Instansi</h4>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="fa fa-book"></span></div>
                                <input type="text" class="form-control" value="<?php echo $tn['intansi'] ?>" />
                            </div>
                            <h4>Satuan Kerja</h4>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="fa fa-book"></span></div>
                                <input type="text" class="form-control" value="<?php echo $tn['satker'] ?>" />
                            </div>
                           <!--  <?php
                            $kategori=mysql_query("SELECT * FROM kategori WHERE id_kategori='$tn[kategori]' ");
                            $kat=mysql_fetch_array($kategori);
                            ?>
                            <h4>Kategori</h4>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="fa fa-pencil"></span></div>
                                <input type="text" class="form-control" value="<?php echo $kat['nama']?>" />
                            </div> -->
                            <h4>Uraian Singkat Naskah</h4>
                            <textarea class="form-control push-down-10" id="new_task" rows="4"><?php echo $tn['abstrak']?></textarea>                            
                            <a href="files/<?php echo $tn['file']?>" target="_blank"><button class="btn btn-primary" ><span class="fa fa-download"></span> Download Naskah</button></a>
                        </div>                       
                    </div>       
                    <!-- END CONTENT FRAME TOP -->
                    
                    <!-- START CONTENT FRAME BODY -->
                    <div class="content-frame-body">
                                                
                        <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">

                                <div class="panel-heading">
                                    <h3 class="panel-title">Upload Telaah Naskah</h3>
                                      <?php
                            $tampilnaskah= mysql_query("SELECT * FROM naskah WHERE id_naskah ='$_GET[id]'");
                            $tn=mysql_fetch_array($tampilnaskah);
                            $tampiluser= mysql_query("SELECT * FROM users WHERE id_users='$tn[id_users]'");
                            $tu=mysql_fetch_array($tampiluser);
                            $jmlrev=mysql_num_rows(mysql_query("SELECT * FROM revisi WHERE id_naskah='$tn[id_naskah]' AND id_reviewer ='$_SESSION[id_user]'"))
                            ?>
                    <form method="POST" action="modul/modul_reviewer/mod_review/aksi_review.php" enctype="multipart/form-data">        
                    <input type="hidden" name="id" value="<?php echo $tn['id_naskah']?>">
                    <input type="hidden" name="id_penulis" value="<?=$tu['id_users']?>">
                    <input type="hidden" name="id_reviewer" value="<?=$_SESSION['id_user']?>">
                    <input type="hidden" name="isi" value="Silahkan Klik pesan ini untuk melihat hasil Telaah naskah dengan judul <?php echo $tn['judul']?>">                              
                    <input type="hidden" name="id2" value="<?php echo $jmlrev;?>">
                   <div class="col-md-12">
                    <input type="file" name="fupload" multiple class="file" data-preview-file-type="any"/>
                    </div>
                   </form>
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

      