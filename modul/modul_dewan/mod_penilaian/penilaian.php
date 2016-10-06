<!-- START BREADCRUMB -->
                <ul class="breadcrumb push-down-0">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Laporan</a></li>
                   
                </ul>
        <!-- END BREADCRUMB -->    
<!-- START RESPONSIVE TABLES -->
                    <?php
                    $jumcc= mysql_num_rows(mysql_query("SELECT * FROM review WHERE kirim='D' "));
                    if ($jumcc=='0'){
                            echo"";
                    }
                    else {
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">

                                <div class="panel-heading">
                                    <h3 class="panel-title">Usulan Penilaian</h3>
                                </div>

                                <div class="panel-body panel-body-table">

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-actions">
                                            <thead>
                                                <tr>
                                                    <th width="50">No</th>
                                                    <th width="100">Tanggal</th>
                                                    <th>Judul</th>
                                                    <th width="100">Penelaah</th>
                                                    <th width="100">Hasil</th>
                                                </tr>
                                            </thead>
                                            <tbody> 
						<?php
						$tp=mysql_query("SELECT * FROM review WHERE kirim='D' ");
                            $no = 1;
                            while($r=mysql_fetch_array($tp)){
                            $tp1= mysql_query("SELECT * FROM naskah WHERE id_naskah ='$r[id_naskah]'");
                            $r1=mysql_fetch_array($tp1);
                            $tp2= mysql_query("SELECT * FROM users WHERE id_users ='$r[id_reviewer]'");
                            $r2=mysql_fetch_array($tp2);
						$tgl=tgl_indo($r['tanggal']);
						?>                      

                                                <tr id="trow_1">
                                                    <td class="text-center"><?php echo $no; ?></td>
                                                    <td class="text-center"><?php echo $tgl; ?></td>
                                                    <td><strong><a href="media.php?hal=dewan-hasil&id=<?php echo $r['id_review']?>"><?php echo $r1['judul']?></a></strong></td>
                                                    <td><?php echo $r2['nama_lengkap']?></td>
                                                   
                                                    <td>Hasil Telaah Ke <?php echo $r['status']?></span></td>
                                                  
                                                   
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
                    <!-- END RESPONSIVE TABLES -->
                <?php } ?>    

            <!-- END PAGE CONTENT -->
             <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">

                                <div class="panel-heading">
                                    <h3 class="panel-title">History Penilaian</h3>
                                </div>

                                <div class="panel-body panel-body-table">

                                     <div class="panel-body">
                                    <table class="table datatable">
                                        <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Perihal</th>
                                                    <th>Hasil</th>
                                                </tr>
                                            </thead>
                                            <tbody> 
                        <?php
                       $tp=mysql_query("SELECT * FROM history order by id_history DESC");
                            $no = 1;
                            while($r=mysql_fetch_array($tp)){
                        if ($r['hasil']=='diterima'){
                        $re="<span class='label label-success'>Di Terima</span>";
                        }
                        else if ($r['hasil']=='diterima_syarat'){
                        $re="<span class='label label-info'>Di Terima Dengan Syarat</span>";
                        }
                        else {
                        $re="<span class='label label-warning'>Di Tolak</span>";
                        }
                             ?>                      

                                                <tr id="trow_1">
                                                    <td class="text-center"><?php echo $no; ?></td>
                                                    <td><?php echo $r['hal'] ?></td>                                                  
                                                    <td class="text-center"><?php echo $re; ?></span></td>                                                   
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
                    <!-- END RESPONSIVE TABLES -->



                <!-- END PAGE CONTENT WRAPPER -->                                    
                </div>         
            </div>     
        </div>
        <!-- END PAGE CONTAINER -->    

     