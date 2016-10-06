 <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Pilih Penelaah</li>
                </ul>
                <!-- END BREADCRUMB -->
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <?php
                    error_reporting(0);
                        $detail= mysql_query("SELECT * FROM naskah WHERE id_naskah='$_GET[id]'");
                        $r2   = mysql_fetch_array($detail);
                        $nama_user= mysql_query("SELECT * FROM users WHERE id_users='$r2[id_users]'");
                        $r3   = mysql_fetch_array($nama_user);

                        $info="Penugasan Telaah Naskah baru telah diterima, silahkan klik pesan ini untuk melihat";
                        $link="?hal=reviewer-monitoring&id=$r2[id_naskah]";
                    ?>
                    <div class="form-horizontal">          
                    <div class="row">
                        <div class="col-md-12">
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
                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Instansi</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-book"></span></span>
                                                <input type="text" value="<?php echo $r2['intansi']?>"class="form-control"/>
                                             </div>                                            
                                            </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Satuan Kerja</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-book"></span></span>
                                                <input type="text" value="<?php echo $r2['satker']?>"class="form-control"/>
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
                                </div>  
                            </div>
                        </div>
                    </div>
                        <div class="panel panel-default tabs">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Daftar Penelaah</a></li>
                                <li><a href="#tab-second" role="tab" data-toggle="tab">Daftar Calon Penelaah</a></li>
                            </ul>
                            <div class="panel-body tab-content">
                                <div class="tab-pane active" id="tab-first">
                                    <div class="panel-body">
                                        <table class="table datatable">
                                            <thead>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>NIP</th>
                                            <th>Jabatan</th>
                                            <th>Email</th>
                                            <th>No. Telp</th>
                                            <th>View</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php
                                            $no = 1;
                                            $user=mysql_query("SELECT * FROM users WHERE blokir='N' AND level='reviewer'");
                                            while($u=mysql_fetch_array($user))
                                            {
                                                ?>

                                                <tr id="trow_1">
                                                    <td class="text-center"><?php echo $no; ?></td>
                                                    <td><?php echo $u['nama_lengkap']?></td>
                                                    <td><strong><?php echo $u['nip'] ?></strong></td>
                                                    <td><?php echo $u['jabatan']?></span></td>
                                                    <td><?php echo $u['email']?></span></td>
                                                    <td><?php echo $u['telp']?></span></td>
                                                    <td>
                                                        <form action="media.php?hal=detail-reviewer&id=<?=$r2['id_naskah']?>" method="POST">
                                                            <input type="hidden" value="<?php echo $u['id_users']?>" name="id_users">
                                                            <button type="submit" class="btn btn-default btn-rounded btn-sm"><span class="fa fa-sign-in"></span></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <!-- MESSAGE BOX-->
                                                <?php $no++; ?>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Tab Riwayat Penulis Start -->
                                <div class="tab-pane" id="tab-second">
                                    <div class="panel-body">
                                        <table class="table datatable">
                                            <thead>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Unit Kerja</th>
                                            <th>Bidang Kepakaran</th>
                                            <th>Jabatan Peneliti</th>
                                            <th>Instansi</th>
                                            <th>View</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php
                                            $no = 1;
                                            $user=mysql_query("SELECT * FROM peneliti where import ='Y'");
                                            while($u=mysql_fetch_array($user))
                                            {
                                                ?>

                                                <tr id="trow_1">
                                                    <td class="text-center"><?php echo $no; ?></td>
                                                    <td><?php echo $u['nama_lengkap']?></td>
                                                    <td><strong><?php echo $u['unit_kerja'] ?></strong></td>
                                                    <td><?php echo $u['bidang_kepakaran']?></span></td>
                                                    <td><?php echo $u['jabatan_peneliti']?></span></td>
                                                    <td><?php echo $u['instansi']?></span></td>
                                                    <td>
                                                        <form action="media.php?hal=editor-edit-data" method="POST">
                                                            <input type="hidden" value="<?php echo $u['id_peneliti']?>" name="userid">
                                                            <button type="submit" class="btn btn-default btn-rounded btn-sm"><span class="fa fa-sign-in"></span></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php $no++; ?>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

                <!-- END PAGE CONTENT WRAPPER -->                                                
            </div>            
            <!-- END PAGE CONTENT -->