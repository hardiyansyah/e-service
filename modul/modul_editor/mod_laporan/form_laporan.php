<?php if(empty($_GET['id'])){

    }else{ ?>
    <?php
$judul=mysql_query("SELECT * FROM naskah WHERE id_naskah='$_GET[id]'");
$j=mysql_fetch_array($judul);
?>
<!-- START BREADCRUMB -->
                <ul class="breadcrumb push-down-0">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Progres Naskah</a></li>
                   
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
                    <h3><span class="fa fa-book"></span> Data Progres Naskah "<?php echo $j['judul'];?>"</h3>
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
                                                    <th>Nama</th>
                                                    <th>Jabatan</th>
                                                    <th>No. Telp</th>
                                                    <th>Email</th>
                                                    <th>Waktu Mulai</th>
                                                    <th>Waktu Selesai</th>
                                                    <th>Durasi</th>
                                                    <th>Keterangan</th>
                                                    <th>Kirim Email</th>
                                                </tr>
                                            </thead>
                                            <tbody> 

                        <?php
                        $user = $_SESSION['namauser'];
                        $tampil= mysql_query("SELECT * FROM users WHERE username ='$user'");
                        $cc=mysql_fetch_array($tampil);

                        $progres= mysql_query("SELECT * FROM countdown WHERE id_naskah='$_GET[id]' ORDER BY id DESC");
                        $no = 1;
                        while($p=mysql_fetch_array($progres)){           

                        $nama= mysql_query("SELECT * FROM users WHERE id_users='$p[id_user]'");
                        $u=mysql_fetch_array($nama);

                        $tgll=tgl_indo($p['start_date']);
                        $tgll2=tgl_indo($p['end_date']);
                        $tgl=$p['start_date'];
                        $tgl2=$p['end_date'];
                        // $durasi =date_diff('day',$p['start_date'],$p['end_date']);
                        $datetime1 = new DateTime($tgl);
                        $datetime2 = new DateTime($tgl2);
                        $durasi =$datetime1->diff($datetime2);
                        $durasi =floor((abs(strtotime($tgl2)-strtotime($tgl)))/(60*60*24));
                      
                        // echo $durasi;

                        ?>                      

                                                <tr id="trow_1">
                                                    <td class="text-center"><?php echo $no; ?></td>
                                                    <td><?php echo $u['nama_lengkap']?></td>
                                                    <td><?php echo $u['jabatan']?></span></td>
                                                    <td><?php echo $u['telp']?></span></td>
                                                    <td><?php echo $u['email']?></span></td>
                                           .        <td><?php echo $tgll;?></span></td>
                                                    <td><?php echo $tgll2; ?></span></td>
                                                    <td><?php echo $durasi ?> Hari</span></td>
                                                    <td><?php echo $p['ket']?></span></td>
                                                    <td><a href="media.php?hal=editor-kirim-email&id=<?php echo $_GET['id'];?>&u=<?php echo $p['id_user'];?>" ><button class="btn btn-success">Kirim</button></span></a></td>
                                                   
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

      
<?php } ?>
