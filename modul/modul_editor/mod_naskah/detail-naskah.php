<?php
                   $detail= mysql_query("SELECT * FROM naskah WHERE id_naskah='$_GET[id]'");
                   $r2   = mysql_fetch_array($detail);
                   $nama_user= mysql_query("SELECT * FROM users WHERE id_users='$r2[id_users]'");
                   $r3   = mysql_fetch_array($nama_user);
                   ?>       
<!-- START BREADCRUMB -->
                <ul class="breadcrumb push-down-0">
                    <li><a href="#">Home</a></li>
                    <li class="active">Detail Naskah</li>
                    <li class="active"><?php echo $r2['judul']?></li>
                </ul>
                <!-- END BREADCRUMB -->                                                
                                
                <!-- START CONTENT FRAME -->
                <div class="content-frame">     
                    <!-- START CONTENT FRAME TOP -->
                    <div class="content-frame-top">                        
                        <div class="page-title">                    
                            <h2><span class="fa fa-edit"></span> Detail Naskah <?php echo $r2['judul']?></h2>
                        </div>                                                
                        <div class="pull-right">
                            <button class="btn btn-default content-frame-left-toggle"><span class="fa fa-bars"></span></button>
                        </div>                                                       
                    </div>           
                    <div class="content-frame-left">
                    <h3> Identitas Penulis </h3>
                        <div class="form-group">
                         <h4>Nama Lengkap</h4>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="fa fa-user"></span></div>
                                <input type="text" class="form-control" value="<?php echo $r3['nama_lengkap'] ?>" />
                            </div>
                            <h4>Email</h4>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="fa fa-envelope"></span></div>
                                <input type="text" class="form-control" value="<?php echo $r3['email'] ?>" />
                            </div>
                            <h4>Alamat</h4>
                            <textarea class="form-control push-down-10" id="new_task" rows="4"><?php echo $r3['alamat']?></textarea>                            
                            </div>                       
                        
                    <!-- END CONTENT FRAME TOP -->
                     <h3> Identitas Naskah </h3>
                        <div class="form-group">
                         <h4>Judul Naskah</h4>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="fa fa-book"></span></div>
                                <input type="text" class="form-control" value="<?php echo $r2['judul'] ?>" />
                            </div>
                            <h4>Instansi</h4>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="fa fa-book"></span></div>
                                <input type="text" class="form-control" value="<?php echo $r2['intansi'] ?>" />
                            </div>
                            <h4>Satuan Kerja</h4>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="fa fa-book"></span></div>
                                <input type="text" class="form-control" value="<?php echo $r2['satker'] ?>" />
                            </div>
                            <h4>Tanggal Upload</h4>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="fa fa-calendar"></span></div>
                                <input type="text" class="form-control" value="<?php echo $r2['tanggal'] ?>" />
                            </div> 
                            <?php
                            $nama_user= mysql_query("SELECT * FROM users WHERE id_users='$r2[reviewer1]'");
                            $r4   = mysql_fetch_array($nama_user);
                            ?>
                            <h4>Penelaah 1</h4>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="fa fa-user"></span></div>
                                <input type="text" class="form-control" value="<?php echo $r4['nama_lengkap'] ?>" />
                            </div>   
                            <?php
                            $nama_user= mysql_query("SELECT * FROM users WHERE id_users='$r2[reviewer2]'");
                            $r5   = mysql_fetch_array($nama_user);
                            ?>
                            <h4>Penelaah 2</h4>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="fa fa-user"></span></div>
                                <input type="text" class="form-control" value="<?php echo $r5['nama_lengkap'] ?>" />
                            </div>   
                            <h4>Status</h4>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="fa fa-info"></span></div>
                                <input type="text" class="form-control" value="<?php echo $r2['status'] ?>" />
                            </div>                                                   
                        </div>
                        <a href="files/<?php echo $r2['file']?>" target="_blank"><button class="btn btn-primary" ><span class="fa fa-download"></span> Download Naskah</button></a>
                        <br><br>
                        <?php if ($r2['status']=='diterima' && $r2['status_kirim']=='2'){
                        $formUp     = "<form action='modul/modul_editor/mod_naskah/verifikasi_editor_bahasa.php' method='post'>";
                        $re         ="Verifikasi Editor Bahasa";
                        $link       ="
                                    <input type='hidden' name='id_naskah' value='$r2[id_naskah]'/>
                                    <input type='hidden' name='idUser' value='$_SESSION[id_user]'/>
                                    <input type='hidden' name='namaEditor' value='$_SESSION[namalengkap]'/>
                                    <input type='hidden' name='idPenulis' value='$r3[id_users]'/>
                                    <input type='hidden' name='tgl' value='$r2[status_tgl]'/>
                                    <input type='hidden' name='isi' value='Anda ditugaskan untuk memverifikasi naskah dengan judul $r2[judul]'/>
                                    ";
                        $icon       ="fa fa-send";

                        } else if ($r2['status']=='diterima' && $r2['status_kirim']=='3'){
                        
                        $formUp     = "";
                        $re         ="Menunggu Jawaban Editor Bahasa";
                        $link       ="";
                        $form       ="";
                        $icon       ="fa fa-spinner";
                
                        } else if ($r2['status']=='diterima' && $r2['status_kirim']=='4'){
                        $formUp     = "<form action='modul/modul_editor/mod_naskah/kirim_visual.php' method='post'>";
                        $re         ="Menunggu Jawaban Editor Visual";
                        $link       ="
                                    <input type='hidden' name='id_naskah' value='$r2[id_naskah]'/>
                                    <input type='hidden' name='idUser' value='$_SESSION[id_user]'/>
                                    <input type='hidden' name='namaEditor' value='$_SESSION[namalengkap]'/>
                                    <input type='hidden' name='idPenulis' value='$r3[id_users]'/>
                                    <input type='hidden' name='tgl' value='$r2[status_tgl]'/>
                                    </form>";
                        $icon       ="fa fa-send";
                        $form="";
                        }else{
                            $formUp     = "";
                            $re         ="Tidak Ada Status";
                            $link       ="";
                            $form       ="";
                            $icon       ="fa fa-spinner";
                        }?>
                        <?=$formUp?>
                        <?=$link?>
                        <button class="btn btn-primary" ><span class="<?php echo $icon;?>"></span><?php echo $re;?></button>
                  
                    </div>
                   <!-- START CONTENT FRAME BODY -->
                    <div class="content-frame-body">
                                                
                        <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Hasil Telaah Ke 1</h3>
                                </div>

                                <div class="panel-body panel-body-table">

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-actions">
                                            <thead>
                                                <tr>
                                                    <th width="15" class="text-center">No</th>
                                                    <th width="100">Tanggal</th>
                                                    <th width="100">Hasil Penilaian</th>
                                                    <th width="100">Nama File</th>
                                                    <th width="100">Hasil Telaah</th>
                                                    <th width="100">Download File</th>
                                                    <!-- <th width="60">Aksi</th> -->
                                                </tr>
                                            </thead>
                                            <tbody> 
                                            <?php
                                            $query = "SELECT r.id_naskah as id_naskah,
                                                    r.id_review as id_review,
                                                    r.kirim as kirim,
                                                    r.id_reviewer as id_reviewer,
                                                    r.file_rev as file_review,
                                                    r.tanggal as tanggal,
                                                    r.jabatan as jabatan,
                                                    r.status as status_review,
                                                    t.usulan_nilai as hasil_penilaian,
                                                    p.nilai as nilai_telaah2
                                                    FROM review r, hasil_telaah t, penilaian p
                                                    WHERE r.id_review = t.id_review AND
                                                    t.id_review = p.id_review AND 
                                                    r.status = 1 AND r.id_naskah = $_GET[id]
                                                    ORDER by r.id_review ASC";
                                            $revnaskah=mysql_query($query);
                                            $no = 1;
                                            while($tr=mysql_fetch_array($revnaskah) ){                     
                                            $tgl2=tgl_indo($tr['tanggal']);
                                            $select = "SELECT * FROM revisi WHERE id_reviewer ='$tr[id_reviewer]' AND id_naskah = '$tr[id_naskah]'";
                                            $tableRevisi = mysql_query($select) or die(mysql_errno());
                                            $jumlahRevisi = mysql_num_rows($tableRevisi);
                                            if($tr['hasil_penilaian'] != 'diterima' && $jumlahRevisi==0){
                                                $button ='<a href="media.php?hal=penulis-revisi&id='.$_GET["id"].'&ref='.$tr["id_reviewer"].'"><button class="btn btn-primary"><span class="fa fa-upload"></span>Perbaiki Naskah</button></a>';
                                            }else{
                                                $button = '';
                                            }
                                            ?>                                           
                                                <tr id="trow_1">
                                                    <td class="text-center"><?=$no?></td>
                                                    <td class="text-center"><?=$tgl2?></td>
                                                    <td><?php echo $tr['hasil_penilaian']?></td>
                                                    <td><?php echo $tr['file_review'] ?></td>
                                                    <td><a href="review.php?&id=<?php echo $tr['id_review']?>" target="_blank"><button class="btn btn-primary" ><span class="fa fa-print"></span>Print</button></a></span></td>
                                                    <td><a href ="files/<?php echo $tr['file_review'] ?>" target="_blank"><button class="btn btn-primary" ><span class="fa fa-download"></span>Download</button></a></td>
                                                    <!-- <td><?=$button?></td> -->
                                                </tr>
                                            <?php $no++; } ?>
                                            </tbody>
                                        </table>
                                        </div>   

                                    <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Hasil Telaah Ke 2</h3>
                                </div>

                                <div class="panel-body panel-body-table">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-actions">
                                            <thead>
                                                <tr>
                                                    <th width="15" class="text-center">No</th>
                                                    <th width="100">Tanggal</th>
                                                    <th width="100">Hasil Penilaian</th>
                                                    <th width="100">Nama File</th>
                                                    <th width="100">Hasil Telaah</th>
                                                    <th width="100">Download File</th>
                                                    <!-- <th width="60">Aksi</th> -->
                                                </tr>
                                            </thead>
                                            <tbody> 
                                            <?php
                                            $query = "SELECT r.id_naskah as id_naskah,
                                                    r.id_review as id_review,
                                                    r.kirim as kirim,
                                                    r.id_reviewer as id_reviewer,
                                                    r.file_rev as file_review,
                                                    r.tanggal as tanggal,
                                                    r.jabatan as jabatan,
                                                    r.status as status_review,
                                                    t.usulan_nilai as hasil_penilaian,
                                                    p.nilai as nilai_telaah2
                                                    FROM review r, hasil_telaah t, penilaian p
                                                    WHERE r.id_review = t.id_review AND
                                                    t.id_review = p.id_review AND
                                                    r.status = 2 AND r.id_naskah = $_GET[id]
                                                    ORDER by r.id_review ASC";
                                            $revnaskah=mysql_query($query);
                                            $no = 1;
                                            while($tr=mysql_fetch_array($revnaskah) ){                     
                                            $tgl2=tgl_indo($tr['tanggal']);
                                            $select = "SELECT * FROM revisi WHERE id_reviewer ='$tr[id_reviewer]' AND id_naskah = '$tr[id_naskah]'";
                                            $tableRevisi = mysql_query($select) or die(mysql_errno());
                                            $jumlahRevisi = mysql_num_rows($tableRevisi);
                                            if($tr['hasil_penilaian'] != 'diterima' && $jumlahRevisi==0){
                                                $button ='<a href="media.php?hal=penulis-revisi&id='.$_GET["id"].'&ref='.$tr["id_reviewer"].'"><button class="btn btn-primary"><span class="fa fa-upload"></span>Perbaiki Naskah</button></a>';
                                            }else{
                                                $button = '';
                                            }
                                            ?>                                           
                                              <tr id="trow_1">
                                                    <td class="text-center"><?=$no?></td>
                                                    <td class="text-center"><?=$tgl2?></td>
                                                    <td><?php echo $tr['hasil_penilaian']?></td>
                                                    <td><?php echo $tr['file_review'] ?></td>
                                                    <td><a href="review.php?&id=<?php echo $tr['id_review']?>" target="_blank"><button class="btn btn-primary" ><span class="fa fa-print"></span>Print</button></a></span></td>
                                                    <td><a href ="files/<?php echo $tr['file_review'] ?>" target="_blank"><button class="btn btn-primary" ><span class="fa fa-download"></span>Download</button></a></td>
                                                    <!-- <td><?=$button?></td> -->
                                                </tr>
                                            <?php $no++; } ?>
                                            </tbody>
                                        </table>
                                    </div>                                
                                </div>



                            </div> 
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Hasil Telaah Ke 3</h3>
                                </div>
                                <div class="panel-body panel-body-table">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-actions">
                                            <thead>
                                                <tr>
                                                    <th width="15" class="text-center">No</th>
                                                    <th width="100">Tanggal</th>
                                                    <th width="100">Hasil Penilaian</th>
                                                    <th width="100">Nama File</th>
                                                    <th width="100">Hasil Telaah</th>
                                                    <th width="100">Download File</th>
                                                    <!-- <th width="60">Aksi</th> -->
                                                </tr>
                                            </thead>
                                            <tbody> 
                                            <?php
                                            $query = "SELECT r.id_naskah as id_naskah,
                                                    r.id_review as id_review,
                                                    r.kirim as kirim,
                                                    r.id_reviewer as id_reviewer,
                                                    r.file_rev as file_review,
                                                    r.tanggal as tanggal,
                                                    r.jabatan as jabatan,
                                                    r.status as status_review,
                                                    t.usulan_nilai as hasil_penilaian,
                                                    p.nilai as nilai_telaah2
                                                    FROM review r, hasil_telaah t, penilaian p
                                                    WHERE r.id_review = t.id_review AND
                                                    t.id_review = p.id_review AND
                                                    r.status = 3 AND r.id_naskah = $_GET[id]
                                                    ORDER by r.id_review ASC";
                                            $revnaskah=mysql_query($query);
                                            $no = 1;
                                            while($tr=mysql_fetch_array($revnaskah) ){                     
                                            $tgl2=tgl_indo($tr['tanggal']);
                                            $select = "SELECT * FROM revisi WHERE id_reviewer ='$tr[id_reviewer]' AND id_naskah = '$tr[id_naskah]'";
                                            $tableRevisi = mysql_query($select) or die(mysql_errno());
                                            $jumlahRevisi = mysql_num_rows($tableRevisi);
                                            if($tr['hasil_penilaian'] != 'diterima' && $jumlahRevisi==0){
                                                $button ='<a href="media.php?hal=penulis-revisi&id='.$_GET["id"].'&ref='.$tr["id_reviewer"].'"><button class="btn btn-primary"><span class="fa fa-upload"></span>Perbaiki Naskah</button></a>';
                                            }else{
                                                $button = '';
                                            }
                                            ?>                                           
                                              <tr id="trow_1">
                                                    <td class="text-center"><?=$no?></td>
                                                    <td class="text-center"><?=$tgl2?></td>
                                                    <td><?php echo $tr['hasil_penilaian']?></td>
                                                    <td><?php echo $tr['file_review'] ?></td>
                                                    <td><a href="review.php?&id=<?php echo $tr['id_review']?>" target="_blank"><button class="btn btn-primary" ><span class="fa fa-print"></span>Print</button></a></span></td>
                                                    <td><a href ="files/<?php echo $tr['file_review'] ?>" target="_blank"><button class="btn btn-primary" ><span class="fa fa-download"></span>Download</button></a></td>
                                                    <!-- <td><?=$button?></td> -->
                                                </tr>
                                            <?php $no++; } ?>
                                            </tbody>
                                        </table>
                                    </div>                                
                                </div>
                            </div> 
                            <br>
                            <br>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Hasil Perbaikan Ke 1</h3>
                                </div>

                                <div class="panel-body panel-body-table">

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-actions">
                                            <thead>
                                                <tr>
                                                    <th width="15" class="text-center">No</th>
                                                    <th width="100">Tanggal</th>
                                                    <th width="100">Nama File</th>
                                                    <th width="100">Hasil Perbaikan</th>
                                                    <th width="100">Download File</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody> 
                                            <?php
                                            $query = "SELECT * FROM revisi WHERE id_naskah ='$_GET[id]' AND status='1'";
                                            $revnaskah=mysql_query($query);
                                            $no = 1;
                                            while($tr=mysql_fetch_array($revnaskah) ){                     
                                            $tgl2=tgl_indo($tr['tanggal']);
                                            ?>                                           
                                                <tr id="trow_1">
                                                    <td class="text-center"><?=$no?></td>
                                                    <td class="text-center"><?=$tgl2?></td>
                                                    <td><?php echo $tr['file_revisi']?></td>
                                                    <td><a href="revisi.php?&id=<?php echo $tr['id_naskah']?>&ke=<?php echo $tr['status']?>&ref=<?php echo $tr['id_reviewer']?>" target="_blank"><button class="btn btn-primary" ><span class="fa fa-print"></span>Print</button></a></span></td>
                                                    <td><a href ="files/<?php echo $tr['file_revisi'] ?>" target="_blank"><button class="btn btn-primary" ><span class="fa fa-download"></span>Download</button></a></td>
                                                  </tr>
                                            <?php $no++; } ?>
                                            </tbody>
                                        </table>
                                   </div>                           
                            </div>
                        </div>
                                <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Hasil Perbaikan Ke 2</h3>
                                </div>

                                <div class="panel-body panel-body-table">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-actions">
                                            <thead>
                                                <tr>
                                                    <th width="15" class="text-center">No</th>
                                                    <th width="100">Tanggal</th>
                                                    <th width="100">Nama File</th>
                                                    <th width="100">Hasil Perbaikan</th>
                                                    <th width="100">Download File</th>
                                                 </tr>
                                            </thead>
                                            <tbody> 
                                            <?php
                                            $query = "SELECT * FROM revisi WHERE id_naskah ='$_GET[id]' AND status='2'";
                                            $revnaskah=mysql_query($query);
                                            $no = 1;
                                            while($tr=mysql_fetch_array($revnaskah) ){                     
                                            $tgl2=tgl_indo($tr['tanggal']);
                                            ?>                                          
                                              <tr id="trow_1">
                                                    <td class="text-center"><?=$no?></td>
                                                    <td class="text-center"><?=$tgl2?></td>
                                                    <td><?php echo $tr['file_revisi']?></td>
                                                    <td><a href="revisi.php?&id=<?php echo $tr['id_naskah']?>&ke=<?php echo $tr['status']?>&ref=<?php echo $tr['id_reviewer']?>" target="_blank"><button class="btn btn-primary" ><span class="fa fa-print"></span>Print</button></a></span></td>
                                                    <td><a href ="files/<?php echo $tr['file_revisi'] ?>" target="_blank"><button class="btn btn-primary" ><span class="fa fa-download"></span>Download</button></a></td>
                                                  </tr>
                                            <?php $no++; } ?>
                                            </tbody>
                                        </table>
                                    </div>                                
                                </div>
                            </div> 
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Hasil Perbaikan Ke 3</h3>
                                </div>
                                <div class="panel-body panel-body-table">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-actions">
                                            <thead>
                                                <tr>
                                                    <th width="15" class="text-center">No</th>
                                                    <th width="100">Tanggal</th>
                                                    <th width="100">Nama File</th>
                                                    <th width="100">Hasil Perbaikan</th>
                                                    <th width="100">Download File</th>
                                                 </tr>
                                            </thead>
                                            <tbody> 
                                            <?php
                                            $query = "SELECT * FROM revisi WHERE id_naskah ='$_GET[id]' AND status='3'";
                                            $revnaskah=mysql_query($query);
                                            $no = 1;
                                            while($tr=mysql_fetch_array($revnaskah) ){                     
                                            $tgl2=tgl_indo($tr['tanggal']);
                                            ?>                                       
                                              <tr id="trow_1">
                                                    <td class="text-center"><?=$no?></td>
                                                    <td class="text-center"><?=$tgl2?></td>
                                                    <td><?php echo $tr['file_revisi']?></td>
                                                    <td><a href="revisi.php?&id=<?php echo $tr['id_naskah']?>&ke=<?php echo $tr['status']?>&ref=<?php echo $tr['id_reviewer']?>" target="_blank"><button class="btn btn-primary" ><span class="fa fa-print"></span>Print</button></a></span></td>
                                                    <td><a href ="files/<?php echo $tr['file_revisi'] ?>" target="_blank"><button class="btn btn-primary" ><span class="fa fa-download"></span>Download</button></a></td>
                                                  </tr>
                                            <?php $no++; } ?>
                                            </tbody>
                                        </table>
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
<?php //} ?>
      