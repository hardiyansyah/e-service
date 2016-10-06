<!-- START BREADCRUMB -->
                <ul class="breadcrumb push-down-0">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Hasil Perbaikan Naskah</a></li>
                   
                </ul>
                <!-- END BREADCRUMB -->    
<!-- START RESPONSIVE TABLES -->
                     <div class="page-title">                    
                    
                     </div>
                   <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                
                
                    <div class="row">
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">  
                                <h3><span class="fa fa-arrow-circle-o-left"></span> Hasil Perbaikan Naskah</h3>                              
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        </ul>                                
                                </div>
                                <div class="panel-body">
                                    <table class="table datatable">
                                        <thead>
                                            		<th>No</th>
                                                    <th>Tanggal</th>
                                                    <th>Judul</th>
                                                    <th>Penulis</th>
                                                     <th>Penelaah</th>
                                                    <th>Hasil</th>
                                                   </tr>
                                            </thead>
                                            <tbody> 
                                                    
						<?php
						$user = $_SESSION['namauser'];
                        $tampil= mysql_query("SELECT * FROM users WHERE username ='$user'");
                        $cc=mysql_fetch_array($tampil);

                        $tp=mysql_query("SELECT * FROM revisi WHERE kirim='E' ");
                        $no = 1;
                        while($r=mysql_fetch_array($tp)){
                        $tp1= mysql_query("SELECT * FROM naskah WHERE id_naskah ='$r[id_naskah]'");
                        $r1=mysql_fetch_array($tp1);
                        $tp2= mysql_query("SELECT * FROM users WHERE id_users ='$r1[id_users]'");
                        $r2=mysql_fetch_array($tp2);
                        $tp3= mysql_query("SELECT * FROM users WHERE id_users ='$r[id_reviewer]'");
                        $r3=mysql_fetch_array($tp3);
 
                        $tanggal=tgl_indo($r['tanggal']);

						?>                      

                                                <tr id="trow_1">
                                                    <td class="text-center"><?php echo $no; ?></td>
                                                    <td><?php echo $tanggal; ?></span></td>
                                                    <td><strong><a href="media.php?hal=editor-lihat-revisi&id=<?php echo $r['id_rev']?>"><?php echo $r1['judul'] ?></a></strong></td>
                                                    <td><?php echo $r2['nama_lengkap']?></td>
                                                     <td><?php echo $r3['nama_lengkap']?></td>
                                                    <td>Hasil Telaah Ke <?php echo $r['status']?></span></td>
                                                   
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

      