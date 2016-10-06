<!-- START BREADCRUMB -->
                <ul class="breadcrumb push-down-0">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Laporan Progres</a></li>
                   
                </ul>
                <!-- END BREADCRUMB -->    
<!-- START RESPONSIVE TABLES -->
                     
                   <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                
                
                    <div class="row">
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading"> 
                                <div class="page-title">                    
                    <h3><span class="fa fa-book"></span> Data Progres Naskah</h3>
                     </div>                               
                                        <ul class="panel-controls">
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>                                
                                </div>
                                <div class="panel-body">
                                    <table class="table datatable">
                                        <thead>
                                            <th>No</th>
                                                    <th>Judul</th>
                                                    <th>Nama Penulis</th>
                                                    <th>Instansi</th>
                                                    <th>Satuan Kerja</th>
                                                    <th>Tanggal</th>
                                                    <th>Reviewer 1</th>
                                                    <th>Reviewer 2</th>
                                                    <th>Status</th>
                                                 </tr>
                                            </thead>
                                            <tbody> 

                        <?php
                        $user = $_SESSION['namauser'];
                        $tampil= mysql_query("SELECT * FROM users WHERE username ='$user'");
                        $cc=mysql_fetch_array($tampil);

                        $tp=mysql_query("SELECT * FROM naskah ORDER BY id_naskah DESC");
                        $no = 1;
                        while($r=mysql_fetch_array($tp)){           
                                                    
                        $tampilr1= mysql_query("SELECT * FROM users WHERE id_users='$r[id_users]'");
                        $r1=mysql_fetch_array($tampilr1);

                        $tgl=tgl_indo($r['tanggal']);
                        if($r['status_kirim'] == 1){
                            $message = 'Belum Dikirim Ke Dewan';
                            $css = 'label label-info';
                        }else{
                            $message = 'Terkirim Ke Dewan';
                            $css = 'label label-success';
                        }

                  if ($r['status']=='ditolak'){
                        $re="<span class='label label-danger'>Di Tolak</span>";
                        }
                        else if ($r['status']=='proses'){
                        $re="<span class='".$css."'>".$pesan."</span>";
                        }
                        else if ($r['status']=='diterima' && $r['status_kirim']=='2'){
                        $re="<span class='".$css."'>Lolos Penilaian</span>";
                        }
                        else if ($r['status']=='diterima' && $r['status_kirim']=='3'){
                        $re="<span class='".$css."'>Verifikasi Editor Bahasa</span>";
                        }
                        else if ($r['status']=='diterima' && $r['status_kirim']=='4'){
                        $re="<span class='".$css."'>Verifikasi Editor Visual</span>";
                        }
                        else if ($r['status']=='sunting' && $r['status_kirim']=='4'){
                        $re="<span class='".$css."'>Proses Penyuntingan</span>";
                        }
                        else if ($r['status']=='masuk'){
                        $re="<span class='".$css."'>Masuk -".$message."</span>";
                        }
                        else {
                        $re="<span class='".$css."'>Baru - ".$message."</span>";
                        }

                         ?>                      

                                                <tr id="trow_1">
                                                    <td class="text-center"><?php echo $no; ?></td>
                                                    <td><strong><a href="media.php?hal=editor-laporan-progres&id=<?php echo $r['id_naskah']?>"><?php echo $r['judul'] ?></a></strong></td>
                                                    <td><?php echo $r1['nama_lengkap']?></td>
                                                <!--     <?php
                                                    $kategori=mysql_query("SELECT * FROM kategori WHERE id_kategori='$r[kategori]' ");
                                                     $kat=mysql_fetch_array($kategori);
                                                     ?> -->
                                                    <td><?php echo $r['intansi']?></span></td>
                                                    <td><?php echo $r['satker']?></span></td>
                                                    <td><?php echo $tgl; ?></span></td>
                                                    <?php
                                                    $reviewer=mysql_query("SELECT * FROM users WHERE id_users='$r[reviewer1]' ");
                                                     $rev=mysql_fetch_array($reviewer);
                                                     ?>
                                                    <td><?php echo $rev['nama_lengkap']?></span></td>
                                                     <?php
                                                    $reviewer2=mysql_query("SELECT * FROM users WHERE id_users='$r[reviewer2]' ");
                                                     $rev2=mysql_fetch_array($reviewer2);
                                                     ?>
                                                    <td><?php echo $rev2['nama_lengkap']?></span></td>
                                                    <td><?php echo $re; ?></span></td>
                                                                                                      
                                                </tr>
                                              <?php $no++; ?>
                                               <?php } ?>
                                      
                                               
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    <!-- END RESPONSIVE TABLES -->
                    
                <!-- END PAGE CONTENT WRAPPER -->                                    
                </div>         
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->    

      