<!-- START BREADCRUMB -->
                <ul class="breadcrumb push-down-0">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Hasil Telaah Naskah</a></li>
                   
                </ul>
                <!-- END BREADCRUMB -->    
<!-- START RESPONSIVE TABLES -->
                     <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Hasil Telaah Naskah</h2>
                     </div>
                   <!-- PAGE CONTENT WRAPPER -->
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
                                            		<th>No</th>
                                                    <th>Tanggal</th>
                                                    <th>Judul</th>
                                                    <th>Penelaah 1</th>
                                                    <th>Penelaah 2</th>
                                                    <th>Hasil</th>
                                                   </tr>
                                            </thead>
                                            <tbody> 
                                                    
						<?php
						$user = $_SESSION['namauser'];
						$tampil= mysql_query("SELECT * FROM users WHERE username ='$user'");
						$cc=mysql_fetch_array($tampil);

						$tp=mysql_query("SELECT * FROM review WHERE kirim='E' OR kirim='O' GROUP BY status");
						$no = 1;
						while($r=mysql_fetch_array($tp)){
						$tp1= mysql_query("SELECT * FROM naskah WHERE id_naskah ='$r[id_naskah]'");
						$r1=mysql_fetch_array($tp1);
						$tp2= mysql_query("SELECT * FROM users WHERE id_users ='$r1[reviewer1]'");
						$r2=mysql_fetch_array($tp2);
                        $tp3= mysql_query("SELECT * FROM users WHERE id_users ='$r1[reviewer2]'");
                        $r3=mysql_fetch_array($tp3);

                            $dataRevisi1 = mysql_query("SELECT * FROM revisi WHERE id_reviewer = '$r1[reviewer1]' AND id_naskah = '$r[id_naskah]' ORDER BY id_rev DESC ");
                            $dataRevi1 = mysql_fetch_array($dataRevisi1);
                            $dataRevisi2 = mysql_query("SELECT * FROM revisi WHERE id_reviewer = '$r1[reviewer2]' AND id_naskah = '$r[id_naskah]' ORDER BY id_rev DESC ");
                            $dataRevi2 = mysql_fetch_array($dataRevisi2);

                        $dataReview1 = mysql_query("SELECT * FROM review WHERE id_reviewer = '$r1[reviewer1]' AND id_naskah = '$r[id_naskah]' AND (kirim='E' OR kirim='O')");
                        $dataReviewer1 = mysql_fetch_array($dataReview1);
                        $dataReview2 = mysql_query("SELECT * FROM review WHERE id_reviewer = '$r1[reviewer2]' AND id_naskah = '$r[id_naskah]' AND (kirim='E' OR kirim='O')");
                        $dataReviewer2 = mysql_fetch_array($dataReview2);
                        if(mysql_num_rows($dataReview1) == 0){
                            $namaReviewer1 = '';
                        }else{
                            $namaReviewer1 = $r2['nama_lengkap'];
                        }
                        if(mysql_num_rows($dataReview2) == 0){
                            $namaReviewer2 = '';
                        }else{
                            $namaReviewer2 = $r3['nama_lengkap'];
                        }

						$tgl=tgl_indo($r['tanggal']);

						?>                      

                                                <tr id="trow_1">
                                                    <td class="text-center"><?php echo $no; ?></td>
                                                    <td><?php echo $tgl; ?></span></td>
                                                    <td><strong><?php echo $r1['judul'] ?></strong></td>
                                                    <td><strong><a href="media.php?hal=editor-lihat-review&id=<?php echo $dataReviewer1['id_review']?>&id_rev=<?php echo $dataRevi1['id_rev']?>"><?=$namaReviewer1?></a></strong></td>
                                                    <td><strong><a href="media.php?hal=editor-lihat-review&id=<?php echo $dataReviewer2['id_review']?>&id_rev=<?php echo $dataRevi2['id_rev']?>"><?=$namaReviewer2?></a></strong></td>
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

      