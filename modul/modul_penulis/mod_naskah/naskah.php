<script type="text/javascript">
    $(function(){
        var current = window.location.href;
            if(current == 'http://localhost/e-services/media.php?hal=penulis-naskah&action=true'){
                $('#berhasilSimpan').hide().fadeIn('slow').delay(2000).slideUp();
            }else{
                $('#berhasilSimpan').hide();
            }
        $("#tutup-success").click(function(){
            $('#berhasilSimpan').hide();
        });
    });
</script>
<!-- START BREADCRUMB -->
                <ul class="breadcrumb push-down-0">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Manajeman Naskah</a></li>
                   
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
                                <h3><span class="fa fa-book"></span> Naskah Anda</h3>                             
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
                                                    <th>Tanggal Masuk</th>
                                                   <!--  <th>Reviewer 1</th>
                                                    <th>Reviewer 2</th> -->
                                                    <th>Status</th>
                                                    

                                                </tr>
                                            </thead>
                                            <tbody> 
                                                <?php
                                                $user = $_SESSION['namauser'];
                                                $tampil= mysql_query("SELECT * FROM users WHERE username='$user'");
                                                $cc=mysql_fetch_array($tampil);

                                                $tp=mysql_query("SELECT * FROM naskah WHERE id_users='$cc[id_users]' ORDER BY id_naskah DESC");
                                                $no = 1;
                                                while($r=mysql_fetch_array($tp)){

                                                $review= mysql_query("SELECT * FROM review WHERE id_naskah='$r[id_naskah]'");
                                                $view=mysql_fetch_array($review);

                                                $revisi= mysql_query("SELECT * FROM revisi WHERE id_naskah='$r[id_naskah]'");
                                                $visi=mysql_fetch_array($revisi);

                                                $tgl1=tgl_indo($r['tanggal']);
                                                // if ($r['status']=='ditolak'){
                                                // $re="<span class='label label-danger'>Di Tolak</span>";
                                                // }
                                                // else if ($r['status']=='proses'){
                                                // $re="<span class='label label-warning'>Proses</span>";
                                                // }
                                                // else if ($r['status']=='diterima'){
                                                // $re="<span class='label label-success'>Di Terima</span>";
                                                // }
                                                // else {
                                                // $re="<span class='label label-info'>Masuk</span>";
                                                // }
                                                if($r['status_kirim'] ==  1 && $r['status'] == 'baru' ){
                                                    $message = 'Proses Verifikasi Kelengkapan';
                                                    $css = 'label label-info';
                                                }
                                                else if($r['status_kirim'] == 1 && $r['status'] == 'masuk' )
                                                {
                                                    $message = 'Lolos Verifikasi Kelengkapan';
                                                    $css = 'label label-success';
                                                }
                                                else
                                                {
                                                    $message = 'Proses Penentuan Penelaah';
                                                    $css = 'label label-success';
                                                }

                                                 if($view['kirim'] == 'E'){
                                                    $pesan = 'Verifikasi Managing Editor';
                                                    $link ='media.php?hal=penulis-monitoring&id='.$r['id_naskah'].'';
                                                    $css = 'label label-warning';
                                                  }
                                                   else if($view['kirim'] == 'P'){
                                                    $link ='media.php?hal=penulis-monitoring&id='.$r['id_naskah'].'';
                                                    $pesan = 'Menunggu Perbaikan';
                                                    $css = 'label label-warning';
                                                  }
                                                  else{
                                                   $pesan = 'Proses Telaah';
                                                   $link ='media.php?hal=penulis-monitoring&id='.$r['id_naskah'].'';
                                                }

                                                if ($r['status']=='ditolak'){
                                                    $link ='media.php?hal=penulis-permohonan';
                                                    $re="<span class='label label-danger'>Di Tolak</span>";
                                                }
                                                else if ($r['status']=='proses'){
                                                    $link ='media.php?hal=penulis-monitoring&id='.$r['id_naskah'].'';
                                                    $re="<span class='".$css."'>".$pesan."</span>";
                                                }
                                                else if ($r['status']=='diterima'){
                                                    $link ='media.php?hal=penulis-monitoring&id='.$r['id_naskah'].'';
                                                    $re="<span class='".$css."'>Lolos Penilaian</span>";
                                                }
                                                else if ($r['status']=='masuk'){
                                                    $link ='media.php?hal=penulis-monitoring&id='.$r['id_naskah'].'';
                                                    $re="<span class='".$css."'>Masuk - ".$message."</span>";
                                                }
                                                else {
                                                    $re="<span class='".$css."'>Baru - ".$message."</span>";
                                                    $link ='media.php?hal=penulis-monitoring&id='.$r['id_naskah'].'';
                                                }
                                                ?>                                           
                                              <tr id="trow_1">
                                                    <td class="text-center"><?php echo $no; ?></td>
                                                    <td><a href="<?php echo $link; ?>"<strong><?php echo $r['judul']?></strong></a></td>
                                                  <!--   <?php
                                                    $kategori=mysql_query("SELECT * FROM kategori WHERE id_kategori='$r[kategori]' ");
            										 $kat=mysql_fetch_array($kategori);
            										 ?> -->
                                                    <td><?php echo $r['intansi'] ?></td>
                                                    <td><?php echo $r['satker'] ?></td>
                                                    <td><?php echo $tgl1; ?></td>
                                                   <!--  <?php
                                                     $reviewer=mysql_query("SELECT * FROM users WHERE id_users ='$r[reviewer1]' ");
            										 $rev=mysql_fetch_array($reviewer);
            										 ?>
                                                    <td><?php echo $rev['jabatan'] ?></span></td>
                                                    <?php
                                                     $reviewer=mysql_query("SELECT * FROM users WHERE id_users ='$r[reviewer2]' ");
                                                     $rev=mysql_fetch_array($reviewer);
                                                     ?>
                                                     <td><?php echo $rev['jabatan'] ?></span></td> -->
                                                   <td><?php echo $re ?></td>
                                                  
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

        <!-- success -->
        <div class="message-box animated fadeIn" id="berhasilSimpan">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-check"></span> Berhasil</div>
                    <div class="mb-content">
                        <p>Selamat, Naskah anda Berhasil dikirmkan ke Editor</p>                    
                        <!-- <p>Press No if youwant to continue work. Press Yes to logout current user.</p> -->
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <!-- <a href="#" class="btn btn-success btn-lg" id="tutup-success">Yes</a> -->
                            <button class="btn btn-success btn-lg mb-control-close" id="tutup-success">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end success -->

            