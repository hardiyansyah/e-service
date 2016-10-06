                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Users</a></li>
                    
                </ul>
                <!-- END BREADCRUMB -->                                                
                
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-users"></span> Users </h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="panel panel-default">
                               
                            </div>
                            
                        </div>
                    </div>
                    <?php 
                    $user = $_SESSION['namauser'];
                    $tampil= mysql_query("SELECT * FROM users WHERE username ='$user'");
                    $cc=mysql_fetch_array($tampil);

                    $tp=mysql_query("SELECT * FROM users WHERE level='$_GET[id]' AND blokir='N' ");
                    $no = 1;
                     while($r=mysql_fetch_array($tp)){
                        ?>
                    <div class="row">
                        <div class="col-md-3">
                            <!-- CONTACT ITEM -->
                            <div class="panel panel-default">
                                <div class="panel-body profile">
                                    <div class="profile-image">
                                        <img src="foto_profil/<?php echo $r['foto']?>" alt="Lipi Press"/>
                                    </div>
                                    <div class="profile-data">
                                        <div class="profile-data-name"><?php echo $r['nama_lengkap']?></div>
                                        <div class="profile-data-title"><?php echo $r['jabatan']?></div>
                                    </div>
                                   
                                </div>                                
                                <div class="panel-body">                                    
                                    <div class="contact-info">
                                        <p><small>NIP</small> : <?php echo $r['nip']?></p><hr>
                                        <p><small>Username</small> : <?php echo $r['username']?></p><hr>
                                        <p><small>Alamat</small> : <?php echo $r['alamat']?></p>  <hr>  
                                        <p><small>Jabatan</small> : <?php echo $r['jabatan']?></p><hr>
                                        <p><small>Email</small> : <?php echo $r['email']?></p><hr>
                                        <p><small>No. Telp/HP</small> : <?php echo $r['telp']?></p> <hr>
                                         <p><small>Fax</small> : <?php echo $r['fax']?></p><hr>
                                        <p><small>Riwayat Pendidikan</small> : <?php echo $r['rwy_pendidikan']?></p><hr>
                                        <p><small>Karya Sebelumnya</small> : <?php echo $r['karya']?></p> <hr>   
                                        <p><small>Catatan</small> : <?php echo $r['catatan']?></p><hr>
                                        <p><small>Login Sebagai</small> : <?php echo $r['level']?></p><hr>
                                       
                                    </div>
                                </div>                                
                            </div>
                            <!-- END CONTACT ITEM -->
                        </div>
                        <?php } ?>
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                                 
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
