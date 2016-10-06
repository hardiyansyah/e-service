<!-- START BREADCRUMB -->
                <ul class="breadcrumb push-down-0">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Informasi</a></li>
                   
                </ul>
                <!-- END BREADCRUMB -->    
<!-- START RESPONSIVE TABLES -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">

                                <div class="panel-heading">
                                    <h3 class="panel-title">Informasi Anda</h3>
                                </div>

                                <div class="panel-body panel-body-table">

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-actions">
                                            <thead>
                                                <tr>
                                                    <th width="50">No</th>
                                                    <th>Pemberitahuan</th>
                                                    <th width="100">Tanggal</th>
                                                    <th width="100">Status</th>
                                                    <th width="100">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody> 
<?php
$user = $_SESSION['namauser'];
$tampil= mysql_query("SELECT * FROM users WHERE username ='$user'");
$cc=mysql_fetch_array($tampil);
$batas  = 10;
$tp=mysql_query("SELECT * FROM pemberitahuan WHERE id_users=$cc[id_users] ORDER BY id_info DESC LIMIT  $batas");
$no =1;
while($r=mysql_fetch_array($tp)){

$tgl=tgl_indo($r['tanggal']);
if ($r['baca']=='Y'){
$re="<span class='label label-success'>TERBACA</span>";
}
else {
$re="<span class='label label-warning'>BELUM TERBACA</span>";
}
?>                                           <form method="POST" action="modul/modul_umum/mod_informasi/aksi_informasi.php" enctype="multipart/form-data">
                                                <input type="hidden" name="link" value="<?php echo $r['link']?>">
												<input type="hidden" name="baca" value="Y">
												<input type="hidden" name="id" value="<?php echo $r['id_info']?>">
                                                <tr id="trow_1">
                                                    <td class="text-center"><?php echo $no; ?></td>
                                                    <td><strong><?php echo $r['isi']?></strong></td>
                                                    <td><?php echo $tgl; ?></td>
                                                    <td><?php echo $re; ?></span></td>
                                                    <td>
                                                    <button class="btn btn-danger btn-rounded btn-sm" >Baca</button>
                                                    </td>
                                                </tr>
                                                </form>
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
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->    

      