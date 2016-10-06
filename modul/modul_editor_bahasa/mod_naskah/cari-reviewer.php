 <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Pilih Penelaah</li>
                </ul>
                <!-- END BREADCRUMB -->
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <?php
                        $detail= mysql_query("SELECT * FROM naskah WHERE id_naskah='$_GET[id]'");
                        $r2   = mysql_fetch_array($detail);
                        $nama_user= mysql_query("SELECT * FROM users WHERE id_users='$r2[id_users]'");
                        $r3   = mysql_fetch_array($nama_user);

                        $info="Penugasan Telaah Naskah baru telah diterima, silahkan klik pesan ini untuk melihat";
                        $link="?hal=reviewer-monitoring&id=$r2[id_naskah]";
                    ?>
                    
                    <div class="panel panel-default">
                                <div class="panel-body">
                                  <form class="form-horizontal" method="POST" action="media.php?hal=cari-reviewer&id=<?=$_GET['id']?>">
                                        <div class="form-group">
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <span class="fa fa-search"></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="cari" placeholder="Who are you looking for?"/>
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-primary">Search</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>                                    
                                </div>
                            </div>
                    <form method="POST" action="modul/modul_dewan/mod_naskah/aksi.php" enctype="multipart/form-data" class="form-horizontal">
                    <input type="hidden" name="id_naskah" value="<?=$r2['id_naskah']?>">
                    <input type="hidden" name="id_dewan" value="<?=$_SESSION['id_user']?>">
                    <input type="hidden" name="id_penulis" value="<?=$r2['id_users']?>">  
                    <input type="hidden" name="status_tgl" value="<?=$r2['status_tgl']?>">     
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Daftar</strong> Penelaah</h3>
                                </div>
                                <div class="panel-body"> 
                            <?php 
                                $cari =$_POST['cari'];
                                // echo "$cari";
                                $tp=mysql_query("SELECT * FROM users WHERE nama_lengkap like '%$cari%' AND level='reviewer' AND blokir='N' order by nama_lengkap ASC; ");
                                $no = 1;
                                while($r=mysql_fetch_array($tp)){
                                    if($no = 1){ $posisi = 'checked'; }else{ $posisi = ''; }
                            ?>
                    <div class="col-md-3">
                        <!-- DAFTAR REVIEWER -->
                        <div class="panel panel-default">
                            <div class="panel-body profile">
                                <div class="profile-image">
                                    <img src="foto_profil/<?php echo $r['foto']?>" alt="Lipipress"/>
                                </div>
                                <div class="profile-data">
                                    <div class="profile-data-name"><?php echo $r['nama_lengkap']?></div>
                                    <div class="profile-data-title"><?php echo $r['jabatan']?></div>
                                </div>
                            </div>   

                            <div class="panel-body">                                    
                                <div class="contact-info">
                                    <p><small>NIP</small> : <?php echo $r['nip']?></p><hr style="margin-top: 5px; margin-bottom: 5px;">
                                    <p><small>Username</small> : <?php echo $r['username']?></p><hr style="margin-top: 5px; margin-bottom: 5px;">
                                    <p><small>Alamat</small> : <?php echo $r['alamat']?></p><hr style="margin-top: 5px; margin-bottom: 5px;">  
                                    <p><small>Jabatan</small> : <?php echo $r['jabatan']?></p><hr style="margin-top: 5px; margin-bottom: 5px;">
                                    <p><small>Email</small> : <?php echo $r['email']?></p><hr style="margin-top: 5px; margin-bottom: 5px;">
                                    <p><small>No. Telp/HP</small> : <?php echo $r['telp']?></p><hr style="margin-top: 5px; margin-bottom: 5px;">
                                    <p><small>Fax</small> : <?php echo $r['fax']?></p><hr style="margin-top: 5px; margin-bottom: 5px;">
                                    <p><small>Riwayat Pendidikan</small> : <?php echo $r['rwy_pendidikan']?></p><hr style="margin-top: 5px; margin-bottom: 5px;">
                                    <p><small>Karya Sebelumnya</small> : <?php echo $r['karya']?></p><hr style="margin-top: 5px; margin-bottom: 5px;">   
                                    <p><small>Catatan</small> : <?php echo $r['catatan']?></p><hr style="margin-top: 5px; margin-bottom: 5px;">
                                    <p><small>Login Sebagai</small> : <?php echo $r['level']?></p>
                                <label class="switch switch-small">
                                    <input type="radio" name="id_reviewer" value="<?=$r['id_users']?>"/><span style="padding-left:28px;padding-top:1px">&nbsp;&nbsp;Pilih</span>
                                </label>
                                </div>
                            </div>                                
                        </div>
                        <!-- END DAFTAR REVIEWER -->
                    </div>
                    <?php $no++; } ?>
                            </div>
                            <div class="panel-footer">                               
                                 <button class="btn btn-primary pull-right">Simpan</button>
                                 <button class="btn btn-primary pull-left" onclick="self.history.back()">Kembali</button>
                            </div>
                            </div>
                        </div>
                    </div> 
                    </form>
                </div>

                <!-- END PAGE CONTENT WRAPPER -->                                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
     