 <?php
$user = $_SESSION['namauser'];
$tampil= mysql_query("SELECT * FROM users WHERE username ='$user'");
$cc=mysql_fetch_array($tampil);
$tp=mysql_query("SELECT * FROM users WHERE level='$_GET[id]' AND blokir='N' ");
$no = 1;
$jum= mysql_num_rows(mysql_query("SELECT * FROM users WHERE level='$_GET[id]' AND blokir='N'"));
                    ?>
<!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Users</a></li>
                </ul>
                <!-- END BREADCRUMB -->                                                
                
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-users"></span> Jumlah <?php echo $jum; ?><small> USERS</small></h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <script type="text/javascript"></script>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form class="form-horizontal" method="POST" action="media.php?hal=editor-tambah-user">
                                        <div class="form-group">
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <span class="fa fa-search"></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Who are you looking for?"/>
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-primary">Search</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="hidden" name="levelUser" value="<?php echo $_GET['id'] ?>">
                                                <button type="submit" class="btn btn-success"><i class="fa fa-plus-square-o"></i> Tambah </button>
                                            </div>
                                        </div>
                                    </form>                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                   <?php
                     while($r=mysql_fetch_array($tp)){
                        ?>
                    <div class="row">
                        <div class="col-md-3">
                            <!-- CONTACT ITEM -->
                            <div class="panel panel-default">
                                <div class="panel-body profile">
                                    <div class="profile-image">
                                         <img src="foto_profil/<?php echo $r['foto']?>"/>
                                    </div>
                                    <div class="profile-data">
                                        <div class="profile-data-name"><?php echo $r['nama_lengkap']?></div>
                                        <div class="profile-data-title"><?php echo $r['jabatan']?></div>
                                    </div>
                                    <div class="profile-controls">
                                        <a href="media.php?hal=editor-lihat-user&id=<?php echo $r['id_users']?>" class="profile-control-left"><span class="fa fa-info"></span></a>
                                        <!-- <a href="" class="profile-control-right"><span class="fa fa-times-circle"></span></a> -->
                                        <a href="#" class="mb-control profile-control-right" data-box="#mb-signout-<?php echo $r['id_users'];?>"><span class="fa fa-times-circle"></a>
                                    </div>
                                </div>                                
                                <div class="panel-body">                                    
                                    <div class="contact-info">
                                        <p><small>Telephone</small><br/><?php echo $r['telp']?></p>
                                        <p><small>Email</small><br/><?php echo $r['email']?></p>
                                        <p><small>Alamat</small><br/><?php echo $r['alamat']?></p>                                   
                                    </div>
                                </div>                                
                            </div>
                            <!-- END CONTACT ITEM -->
                        </div>
                        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout-<?php echo $r['id_users'];?>">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-times-circle"></span> Delete <strong>Account</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want delete this account?</p>                    
                        <p>Press No if you cancel this action, Press Yes to delete this user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                        <form action="media.php?hal=editor-hapus-user" method="POST">
                        <input type="hidden" name="idUser" value="<?php echo $r['id_users']?>">
                        <input type="hidden" name="level" value="<?php echo $_GET['id']?>">
                            <button type="submit" class="btn btn-danger btn-lg">Yes</button>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                        <?php } ?>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="pagination pagination-sm pull-right push-down-10 push-up-10">
                                <li class="disabled"><a href="#">«</a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>                                    
                                <li><a href="#">»</a></li>
                            </ul>                            
                        </div>
                    </div>

                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                                 
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
        <!-- MESSAGE BOX-->
        
        <!-- END MESSAGE BOX-->
