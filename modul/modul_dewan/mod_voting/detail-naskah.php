                <!-- START BREADCRUMB -->
                <ul class="breadcrumb push-down-0">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Naskah</a></li>
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
                                        <h3><span class="fa fa-book"></span> Data Naskah</h3>
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
                                            <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Nama Penulis</th>
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

                    						$tp=mysql_query("SELECT * FROM naskah WHERE status='masuk' AND status_kirim = 2 ORDER BY id_naskah DESC");
                    						$no = 1;
                    						while($r=mysql_fetch_array($tp)){			
                    													
                    						$tampilr1= mysql_query("SELECT * FROM users WHERE id_users='$r[id_users]'");
                    						$r1=mysql_fetch_array($tampilr1);

                    						$tgl=tgl_indo($r['tanggal']);
                                            if($r['status_kirim'] == 1){
                                                $message = 'Proses Telaah';
                                                $css = 'label label-success';
                                            }else{
                                                $message = 'Masuk';
                                                $css = 'label label-info';
                                            }
                    						if ($r['status']=='ditolak'){
                    						  $re="<span class='label label-danger'>Di Tolak</span>";
                    						} else if ($r['status']=='proses'){
                    						  $re="<span class='label label-warning'>Proses Telaah</span>";
                    						} else if ($r['status']=='diterima'){
                    						  $re="<span class='".$css."'>Di Terima</span>";
                    						} else {
                    						  $re="<span class='".$css."'>".$message."</span>";
                    						}

                                            $cek    = mysql_query("SELECT * FROM voting WHERE id_naskah = '$r[id_naskah]' AND id_dewan = '$_SESSION[id_user]'");
                                            $hasil = mysql_num_rows($cek);
                                             if($hasil == 0){
                                                $kata = '<span class="label label-danger">';
                                                $kata .= "Menunggu Voting</span>";
                                            }else{
                                               $kata = '<span class="label label-warning">';
                                               $kata .= "Menunggu Jawaban Penelaah</span>";
                                            }
                                        ?>                      
                                        <tr id="trow_<?php echo $no; ?>">
                                            <td class="text-center"><?php echo $no; ?></td>
                                            <td><strong><a href="media.php?hal=dewan-hasil-voting&id=<?php echo $r['id_naskah']?>"><?php echo $r['judul'] ?></a></strong></td>
                                            <td><?php echo $r1['nama_lengkap']?></td>
                                           <!--  <?php
                                                $kategori=mysql_query("SELECT * FROM kategori WHERE id_kategori='$r[kategori]' ");
        										$kat=mysql_fetch_array($kategori);
    										?>
                                            <td><?php echo $kat['nama']?></span></td> -->
                                            <td><?php echo $r['satker']?></span></td>
                                            <td><?php echo $tgl; ?></span></td>
                                            <td><?php echo $re; ?>-<?=$kata?></span></td>
                                        </tr>
                                        <?php $no++; } ?>
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

      