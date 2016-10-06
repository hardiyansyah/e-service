<!-- START BREADCRUMB -->
                <ul class="breadcrumb push-down-0">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Telaah Naskah</a></li>
                   
                </ul>
                <!-- END BREADCRUMB -->    
<!-- START RESPONSIVE TABLES -->
                     <div class="page-title">                    
                    <h2><span class="fa fa-book"></span> Telaah Naskah</h2>
                     </div>
                    <div class="page-content-wrap">                
                
                    <div class="row">
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">                                
                                        <ul class="panel-controls">
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        </ul>                                
                                </div>
                                <div class="panel-body">
                                    <table class="table datatable">
                                        <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Judul</th>
                                                    <th>Instansi</th>
                                                    <th>Satuan Kerja</th>
                                                    <th>Tanggal</th>
                                                    <th>Status</th>
                                                    

                                                </tr>
                                            </thead>
                                            <tbody> 
                            <?php
                            $user = $_SESSION['namauser'];
                            $tampil= mysql_query("SELECT * FROM users WHERE username ='$user'");
                            $cc=mysql_fetch_array($tampil);

                            $tp=mysql_query("SELECT * FROM naskah WHERE reviewer1='$cc[id_users]' OR reviewer2 ='$cc[id_users]' ORDER BY id_naskah DESC");
                            $no = 1;
                            while($r=mysql_fetch_array($tp)){
                                                        
                            $review= mysql_query("SELECT * FROM review WHERE id_naskah='$r[id_naskah]'");
                            $view=mysql_fetch_array($review);
                            $revisi= mysql_query("SELECT * FROM revisi WHERE id_naskah='$r[id_naskah]'");
                            $visi=mysql_fetch_array($revisi);

                            $tgl1=tgl_indo($r['tanggal']);

                            if($r['status_kirim'] == 1){
                            $message = 'Belum Dikirim Ke Dewan';
                            $css = 'label label-info';
                        }else{
                            $message = 'Terkirim Ke Dewan';
                            $css = 'label label-success';
                        }

                        if($view['kirim'] == 'E'){
                        $pesan = 'Verifikasi Managing Editor';
                        $css = 'label label-warning';
                      }
                       else if($view['kirim'] == 'P'){
                        $pesan = 'Proses Perbaikan';
                        $css = 'label label-warning';
                      }
                      else{
                        $pesan = 'Proses Telaah';
                        $css = 'label label-info';
                        }
                        
                        if ($r['status']=='ditolak'){
                        $re="<span class='label label-danger'>Di Tolak</span>";
                        }
                        else if ($r['status']=='proses'){
                        $re="<span class='".$css."'>".$pesan."</span>";
                        }
                        else if ($r['status']=='diterima'){
                        $re="<span class='".$css."'>Di Terima</span>";
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
                                                    <td><a href="media.php?hal=reviewer-monitoring&id=<?php echo $r['id_naskah']?>&ref=<?php echo $cc['id_users']?>"<strong><?php echo $r['judul']?></strong></a></td>
                                                   <!--  <?php
                                                    $kategori=mysql_query("SELECT * FROM kategori WHERE id_kategori='$r[kategori]' ");
            										 $kat=mysql_fetch_array($kategori);
            										 ?> -->
                                                    <td><?php echo $r['intansi'] ?></td>
                                                    <td><?php echo $r['satker'] ?></span></td>

                                                    <!-- <?php
                                                     $penulis=mysql_query("SELECT * FROM users WHERE id_users='$r[id_users]' ");
                                                     $pen=mysql_fetch_array($penulis);
            										 ?> -->
                                                
                                                    <td><?php echo $r['satker'] ?></span></td>
                                                   <td><?php echo $re;?></span></td>
                                                  
                                                </tr>
                                               <?php $no++; ?>
                                               <?php } ?>
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

            