                    <?php
                    $tampilnaskah= mysql_query("SELECT * FROM naskah WHERE id_naskah ='$_GET[id]'");
                    $tn=mysql_fetch_array($tampilnaskah); 
                    ?>  
<!-- START BREADCRUMB -->
                <ul class="breadcrumb push-down-0">
                    <li><a href="#">Home</a></li>
                    <li class="active">Monitoring Naskah</li>
                    <li class="active"><?php echo $tn['judul']?></li>
                </ul>
                <!-- END BREADCRUMB -->                                                
                                
                <!-- START CONTENT FRAME -->
                <div class="content-frame">     
                    <!-- START CONTENT FRAME TOP -->
                    <div class="content-frame-top">                        
                        <div class="page-title">                    
                            <h2><span class="fa fa-edit"></span> Monitoring Naskah</h2>
                        </div>                                                
                        <div class="pull-right">
                            <button class="btn btn-default content-frame-left-toggle"><span class="fa fa-bars"></span></button>
                        </div>                                                       
                    </div>               
                    <div class="content-frame-left">
                        <div class="form-group">
                         <h4>Judul Naskah</h4>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="fa fa-book"></span></div>
                                <input type="text" class="form-control" value="<?php echo $tn['judul'] ?>" />
                            </div>
                           <!--  <?php
                            $kategori=mysql_query("SELECT * FROM kategori WHERE id_kategori='$tn[kategori]' ");
                            $kat=mysql_fetch_array($kategori);
                            ?> -->
                            <h4>Instansi</h4>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="fa fa-pencil"></span></div>
                                <input type="text" class="form-control" value="<?php echo $tn['intansi']?>" />
                            </div>
                             <h4>Satuan Kerja</h4>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="fa fa-pencil"></span></div>
                                <input type="text" class="form-control" value="<?php echo $tn['satker']?>" />
                            </div>
                            <h4>Uraian Singkat Naskah</h4>
                            <textarea class="form-control push-down-10" id="new_task" rows="4"><?php echo $tn['abstrak']?></textarea>                            
                            <a href="files/<?php echo $tn['file']?>" target="_blank"><button class="btn btn-primary" ><span class="fa fa-download"></span> Download</button></a>
                          <?php
                            $stats=$tn['status'];
                            if ($stats=='proses'){
                                $cek1 = mysql_query("SELECT * FROM review WHERE id_naskah = '$tn[id_naskah]' AND id_reviewer = '$_SESSION[id_user]'") or die(mysql_error());
                                $jumlahCek1 = mysql_num_rows($cek1);
                                if($jumlahCek1 == 0){
                                    ?>
                                   <a href="media.php?hal=reviewer-upload-review&id=<?php echo $_GET['id']?>"><button class="btn btn-primary"><span class="fa fa-upload"></span> Telaah Naskah</button></a>
                                    <?php
                                    }else{
                                    echo '';
                                     ?>
                                 <?php } }?>
                        </div>                       
                    </div>       
                    <!-- END CONTENT FRAME TOP -->
                    
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
                                                    r.status = 1 AND r.id_reviewer = '$_GET[ref]' AND r.id_naskah = '$_GET[id]' GROUP BY r.status
                                                    ORDER by r.id_review ASC";
                                            $revnaskah=mysql_query($query);
                                            $no = 1;
                                            while($tr=mysql_fetch_array($revnaskah) ){                     
                                            $tgl2=tgl_indo($tr['tanggal']);
                                            // $select = "SELECT * FROM revisi WHERE id_reviewer ='$tr[id_reviewer]' AND id_naskah = '$tr[id_naskah]' AND kirim = 'P'";
                                            // $tableRevisi = mysql_query($select) or die(mysql_errno());
                                            // $jumlahRevisi = mysql_num_rows($tableRevisi);
                                            // if($tr['hasil_penilaian'] != 'diterima' && $jumlahRevisi==0){
                                            //     $button ='<a href="media.php?hal=penulis-revisi&id='.$_GET["id"].'&ref='.$tr["id_reviewer"].'"><button class="btn btn-primary"><span class="fa fa-upload"></span> Revisi</button></a>';
                                            // }else{
                                            //     $button = '';
                                            // }
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
                                                    r.status = 2 AND r.id_reviewer = '$_GET[ref]' AND r.id_naskah = '$_GET[id]' GROUP BY r.status
                                                    ORDER by r.id_review ASC";
                                            $revnaskah=mysql_query($query);
                                            $no = 1;
                                            while($tr=mysql_fetch_array($revnaskah) ){                     
                                            $tgl2=tgl_indo($tr['tanggal']);
                                            // $select = "SELECT * FROM revisi WHERE id_reviewer ='$tr[id_reviewer]' AND id_naskah = '$tr[id_naskah]' AND kirim = 'P'";
                                            // $tableRevisi = mysql_query($select) or die(mysql_errno());
                                            // $jumlahRevisi = mysql_num_rows($tableRevisi);
                                            // if($tr['hasil_penilaian'] != 'diterima' && $jumlahRevisi==0){
                                            //     $button ='<a href="media.php?hal=penulis-revisi&id='.$_GET["id"].'&ref='.$tr["id_reviewer"].'"><button class="btn btn-primary"><span class="fa fa-upload"></span> Revisi</button></a>';
                                            // }else{
                                            //     $button = '';
                                            // }
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
                                                    r.status = 3 AND r.id_reviewer = '$_GET[ref]' AND r.id_naskah = '$_GET[id]' GROUP BY r.status
                                                    ORDER by r.id_review ASC";
                                            $revnaskah=mysql_query($query);
                                            $no = 1;
                                            while($tr=mysql_fetch_array($revnaskah) ){                     
                                            $tgl2=tgl_indo($tr['tanggal']);
                                            // $select = "SELECT * FROM revisi WHERE id_reviewer ='$tr[id_reviewer]' AND id_naskah = '$tr[id_naskah]' AND kirim = 'P'";
                                            // $tableRevisi = mysql_query($select) or die(mysql_errno());
                                            // $jumlahRevisi = mysql_num_rows($tableRevisi);
                                            // if($tr['hasil_penilaian'] != 'diterima' && $jumlahRevisi==0){
                                            //     $button ='<a href="media.php?hal=penulis-revisi&id='.$_GET["id"].'&ref='.$tr["id_reviewer"].'"><button class="btn btn-primary"><span class="fa fa-upload"></span> Revisi</button></a>';
                                            // }else{
                                            //     $button = '';
                                            // }
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
                                                    <th width="60">Aksi</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody> 
                                            <?php
                                            $query = "SELECT * FROM revisi WHERE id_naskah ='$_GET[id]' AND status='1' AND id_reviewer ='$_GET[ref]'";
                                            $revnaskah=mysql_query($query);
                                            $no = 1;
                                            while($tr=mysql_fetch_array($revnaskah) ){      
                                            $tgl2=tgl_indo($tr['tanggal']);
                                            // $select = "SELECT * FROM review WHERE id_reviewer ='$tr[id_reviewer]' AND id_naskah = '$tr[id_naskah]'";
                                            // $tableRevisi = mysql_query($select) or die(mysql_error());
                                            // $jumlahRevisi = mysql_num_rows($tableRevisi);
                                            $select1 = "SELECT * FROM review WHERE id_reviewer ='$tr[id_reviewer]' AND id_naskah = '$tr[id_naskah]' ";
                                            $tableRevisi1 = mysql_query($select1) or die(mysql_error());
                                            $revisi1 = mysql_fetch_array($tableRevisi1);
                                            $kirim=$tr["kirim"];
                                            $status=$tr["status"];
                                            if($kirim =='R' AND $status ==1){
                                                $button ='<a href="media.php?hal=reviewer-upload-review&id='.$_GET["id"].'&ref='.$tr["id_reviewer"].'"><button class="btn btn-primary"><span class="fa fa-upload"></span>Telaah</button></a>';
                                            }else{
                                                $button = '';
                                            }
                                            ?>                                      
                                                <tr id="trow_1">
                                                    <td class="text-center"><?=$no?></td>
                                                    <td class="text-center"><?=$tgl2?></td>
                                                    <td><?php echo $tr['file_revisi']?></td>
                                                    <td><a href="revisi.php?&id=<?php echo $tr['id_naskah']?>&ke=<?php echo $tr['status']?>&ref=<?php echo $tr['id_reviewer']?>" target="_blank"><button class="btn btn-primary" ><span class="fa fa-print"></span>Print</button></a></span></td>
                                                    <td><a href ="files/<?php echo $tr['file_revisi'] ?>" target="_blank"><button class="btn btn-primary" ><span class="fa fa-download"></span>Download</button></a></td>
                                                    <td><?=$button?></td>
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
                                                    <th width="60">Aksi</th>
                                                 </tr>
                                            </thead>
                                            <tbody> 
                                            <?php
                                            $query = "SELECT * FROM revisi WHERE id_naskah ='$_GET[id]' AND status='2' AND id_reviewer ='$_GET[ref]'";
                                            $revnaskah=mysql_query($query);
                                            $no = 1;
                                            while($tr=mysql_fetch_array($revnaskah) ){                     
                                            $tgl2=tgl_indo($tr['tanggal']);
                                            // $select = "SELECT * FROM review WHERE id_reviewer ='$tr[id_reviewer]' AND id_naskah = '$tr[id_naskah]' AND kirim = 'P' AND status='3'";
                                            // $tableRevisi = mysql_query($select) or die(mysql_error());
                                            // $jumlahRevisi = mysql_num_rows($tableRevisi);
                                            $select2 = "SELECT * FROM review WHERE id_reviewer ='$tr[id_reviewer]' AND id_naskah = '$tr[id_naskah]' ";
                                            $tableRevisi2 = mysql_query($select2) or die(mysql_error());
                                            $revisi2 = mysql_fetch_array($tableRevisi2);
                                            $kirim=$tr["kirim"];
                                            $status=$tr["status"];
                                            if($kirim =='R' AND $status ==2){
                                                $button ='<a href="media.php?hal=reviewer-upload-review&id='.$_GET["id"].'&ref='.$tr["id_reviewer"].'"><button class="btn btn-primary"><span class="fa fa-upload"></span>Telaah</button></a>';
                                            }else{
                                                $button = '';
                                            }
                                            ?>                                             
                                              <tr id="trow_1">
                                                    <td class="text-center"><?=$no?></td>
                                                    <td class="text-center"><?=$tgl2?></td>
                                                    <td><?php echo $tr['file_revisi']?></td>
                                                    <td><a href="revisi.php?&id=<?php echo $tr['id_naskah']?>&ke=<?php echo $tr['status']?>&ref=<?php echo $tr['id_reviewer']?>" target="_blank"><button class="btn btn-primary" ><span class="fa fa-print"></span>Print</button></a></span></td>
                                                    <td><a href ="files/<?php echo $tr['file_revisi'] ?>" target="_blank"><button class="btn btn-primary" ><span class="fa fa-download"></span>Download</button></a></td>
                                                    <td><?=$button?></td>
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
                                                    <th width="60">Aksi</th> 
                                                 </tr>
                                            </thead>
                                            <tbody> 
                                            <?php
                                            $query = "SELECT * FROM revisi WHERE id_naskah ='$_GET[id]' AND status='3' AND id_reviewer ='$_GET[ref]'";
                                            $revnaskah=mysql_query($query);
                                            $no = 1;
                                            while($tr=mysql_fetch_array($revnaskah) ){                     
                                            $tgl2=tgl_indo($tr['tanggal']);
                                            // $select = "SELECT * FROM review WHERE id_reviewer ='$tr[id_reviewer]' AND id_naskah = '$tr[id_naskah]' AND kirim = 'P' AND status='3'";
                                            // $tableRevisi = mysql_query($select) or die(mysql_errno());
                                            // $jumlahRevisi = mysql_num_rows($tableRevisi);
                                            $select3 = "SELECT * FROM review WHERE id_reviewer ='$tr[id_reviewer]' AND id_naskah = '$tr[id_naskah]' ";
                                            $tableRevisi3 = mysql_query($select3) or die(mysql_error());
                                            $revisi3 = mysql_fetch_array($tableRevisi3);
                                            $kirim=$tr["kirim"];
                                            $status=$tr["status"];
                                            if($kirim =='R' AND $status ==3){
                                                $button ='<a href="media.php?hal=reviewer-upload-review&id='.$_GET["id"].'&ref='.$tr["id_reviewer"].'"><button class="btn btn-primary"><span class="fa fa-upload"></span>Telaah</button></a>';
                                            }else{
                                                $button = '';
                                            }
                                            ?>                                           
                                              <tr id="trow_1">
                                                    <td class="text-center"><?=$no?></td>
                                                    <td class="text-center"><?=$tgl2?></td>
                                                    <td><?php echo $tr['file_revisi']?></td>
                                                    <td><a href="revisi.php?&id=<?php echo $tr['id_naskah']?>&ke=<?php echo $tr['status']?>&ref=<?php echo $tr['id_reviewer']?>" target="_blank"><button class="btn btn-primary" ><span class="fa fa-print"></span>Print</button></a></span></td>
                                                    <td><a href ="files/<?php echo $tr['file_revisi'] ?>" target="_blank"><button class="btn btn-primary" ><span class="fa fa-download"></span>Download</button></a></td>
                                                    <td><?=$button?></td>
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
      