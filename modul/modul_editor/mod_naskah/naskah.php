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
                                            <th>No</th>
                                                    <th>Judul</th>
                                                    <th>Nama Penulis</th>
                                                    <th>Instansi</th>
                                                    <th>Satuan Kerja</th>
                                                    <th>Tanggal</th>
                                                    <th>Status</th>
                                                    <th>Oleh</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody> 

						<?php
						$user = $_SESSION['namauser'];
						$tampil= mysql_query("SELECT * FROM users WHERE username ='$user'");
						$cc=mysql_fetch_array($tampil);

						$tp=mysql_query("SELECT * FROM naskah WHERE status='$_GET[id]' ORDER BY id_naskah DESC");
						$no = 1;
						while($r=mysql_fetch_array($tp)){			
													
						$tampilr1= mysql_query("SELECT * FROM users WHERE id_users='$r[id_users]'");
						$r1=mysql_fetch_array($tampilr1);

                        $review= mysql_query("SELECT * FROM review WHERE id_naskah='$r[id_naskah]'");
                        $view=mysql_fetch_array($review);

                        $revisi= mysql_query("SELECT * FROM revisi WHERE id_naskah='$r[id_naskah]'");
                        $visi=mysql_fetch_array($revisi);

						$tgl=tgl_indo($r['tanggal']);
                        if($r['status_kirim'] ==1 && $r['status'] =='baru'){
                            $message = 'Belum di verifikasi';
                            $css = 'label label-info';
                        }
                        else if($r['status_kirim'] ==1 && $r['status'] =='masuk'){
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

                        $stat=$_GET['id'];
                            if ($stat == 'masuk'){
                            $status="Masuk";
                            $link="lihat";
                            }
                            else if($stat == 'baru'){
                             $link="verifikasi";
                            }
                            else{
                                $link="detail";
                            }
                            ?>                      

                                                <tr id="trow_1">
                                                    <td class="text-center"><?php echo $no; ?></td>
                                                    <td><strong><a href="media.php?hal=editor-<?php echo $link?>-naskah&id=<?php echo $r['id_naskah']?>"><?php echo $r['judul'] ?></a></strong></td>
                                                    <td><?php echo $r1['nama_lengkap']?></td>
                                                <!--     <?php
                                                    $kategori=mysql_query("SELECT * FROM kategori WHERE id_kategori='$r[kategori]' ");
            										 $kat=mysql_fetch_array($kategori);
            										 ?> -->
                                                    <td><?php echo $r['intansi']?></span></td>
                                                    <td><?php echo $r['satker']?></span></td>
                                                    <td><?php echo $tgl; ?></span></td>
                                                    <td><?php echo $re; ?></span></td>
                                                    <td><?php echo $r['editor'] ?></span></td>
                                                    <td>
                                                   <!--  <form action="<?=$site?>modul/modul_editor/mod_naskah/hapus_naskah.php" method="POST">
                                                        <input type="hidden" value="<?php echo $r['id_naskah']?>" name="id_naskah">
                                                        <input type="hidden" value="<?php echo $_GET['status']?>" name="status">
                                                      	<button type="submit" class="btn btn-danger btn-rounded btn-sm"><span class="fa fa-pencil"></span></button> -->
                                                       <a href="#" class="mb-control profile-control-right" data-box="#mb-signout-<?php echo $r['id_naskah'];?>"><span class="fa fa-times-circle"></a>
                                                    <!-- </form> -->
                                                    </td>
                                                   
                                                </tr>
                                              <?php $no++; ?>
										        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout-<?php echo $r['id_naskah'];?>">
										            <div class="mb-container">
										                <div class="mb-middle">
										                    <div class="mb-title"><span class="fa fa-times-circle"></span> Delete <strong>Naskah</strong> ?</div>
										                    <div class="mb-content">
										                        <p>Are you sure you want delete this Naskah?</p>                    
										                        <p>Press No if you cancel this action, Press Yes to delete this Naskah.</p>
										                    </div>
										                    <div class="mb-footer">
										                        <div class="pull-right">
										                        <form action="<?=$site?>modul/modul_editor/mod_naskah/hapus_naskah.php" method="POST">
										                        <input type="hidden" name="id_naskah" value="<?php echo $r['id_naskah']?>">
										                        <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
										                            <button type="submit" class="btn btn-danger btn-lg">Yes</button>
										                            <button class="btn btn-default btn-lg mb-control-close">No</button>
										                        </form>
										                        </div>
										                    </div>
										                </div>
										            </div>
										        </div>
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

      