
<?php
$user = $_SESSION['namauser'];
$tampil= mysql_query("SELECT * FROM users WHERE username='$user'");
$cc=mysql_fetch_array($tampil);
$jum14= mysql_num_rows(mysql_query("SELECT * FROM pemberitahuan WHERE id_users='$cc[id_users]' AND baca='N'"));

$jum= mysql_num_rows(mysql_query("SELECT * FROM review WHERE kirim='E'"));
$jum7= mysql_num_rows(mysql_query("SELECT * FROM revisi WHERE kirim='E'"));
$jum2= mysql_num_rows(mysql_query("SELECT * FROM naskah WHERE status='masuk' AND id_users='$cc[id_users]'"));
$jum4= mysql_num_rows(mysql_query("SELECT * FROM naskah WHERE status='proses' AND id_users='$cc[id_users]'"));
$jum5= mysql_num_rows(mysql_query("SELECT * FROM naskah WHERE status='diterima' AND id_users='$cc[id_users]'"));
$jum6= mysql_num_rows(mysql_query("SELECT * FROM naskah WHERE status='ditolak' AND id_users='$cc[id_users]'"));
$jum8=($jum+$jum7);
$jum3= mysql_num_rows(mysql_query("SELECT * FROM naskah"));

$jum9= mysql_num_rows(mysql_query("SELECT * FROM users WHERE level='penulis' AND blokir='N'"));
$jum10= mysql_num_rows(mysql_query("SELECT * FROM users WHERE level='reviewer' AND blokir='N'"));
$jum11= mysql_num_rows(mysql_query("SELECT * FROM users WHERE level='dewan' AND blokir='N'"));
$jum12= mysql_num_rows(mysql_query("SELECT * FROM users WHERE level='editor' AND blokir='N'"));
$jum13=($jum9+$jum10+$jum11+$jum12);


// if ($jum8=='0'){
// $jum1="<div class='informer informer-danger'>0</div>";
// }
// else {
// $jum1="<div class='informer informer-warning'>$jum8</div>";
// }

 ?>
 <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li class="active">Dashboard</li>
                </ul>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-info push-down-20">
                                <span style="color: #FFF500;">SELAMAT DATANG</span> <strong><?php echo $cc['nama_lengkap']?> </strong> Di Aplikasi E-Services LIPI Press !!!
                                <button type="button" class="close" data-dismiss="alert">×</button>
                            </div>
                        </div>
                    </div>

                    <!-- START WIDGETS -->                    
                    <div class="row">
                        <div class="col-md-3">
                            
                            <!-- START WIDGET SLIDER -->
                            <div class="widget widget-default widget-carousel">
                                <div class="owl-carousel" id="owl-example">
                                    <div>                                    
                                        <div class="widget-title">Total Penulis</div>                                                                        
                                        <div class="widget-int"><?php echo $jum9; ?></div>
                                    </div>
                                    <div>                                    
                                        <div class="widget-title">Total Naskah</div>
                                        <div class="widget-subtitle">Masuk</div>
                                        <div class="widget-int"><?php echo $jum2;?></div>
                                    </div>
                                    <div>                                    
                                        <div class="widget-title">Total Naskah</div>
                                        <div class="widget-subtitle">Proses Review</div>
                                        <div class="widget-int"><?php echo $jum4;?></div>
                                    </div>
                                </div>                            
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>                             
                            </div>         
                            <!-- END WIDGET SLIDER -->
                            
                        </div>
                        <div class="col-md-3">
                            
                            <!-- START WIDGET MESSAGES -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='pages-messages.html';">
                                <div class="widget-item-left">
                                    <span class="fa fa-book"></span>
                                </div>                             
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?php echo "$jum2"; ?></div>
                                    <div class="widget-title">Naskah Anda</div>
                                   
                                </div>      
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>
                            </div>                            
                            <!-- END WIDGET MESSAGES -->
                            
                        </div>
                        <div class="col-md-3">
                            
                            <!-- START WIDGET REGISTRED -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='pages-address-book.html';">
                                <div class="widget-item-left">
                                    <span class="fa fa-user"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?php echo $jum13; ?></div>
                                    <div class="widget-title">Total User</div>
                                    <div class="widget-subtitle">Di Sistem E-services</div>
                                </div>
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>                            
                            </div>                            
                            <!-- END WIDGET REGISTRED -->
                            
                        </div>
                        <div class="col-md-3">
                            
                            <!-- START WIDGET CLOCK -->
                            <div class="widget widget-danger widget-padding-sm">
                                <div class="widget-big-int plugin-clock">00:00</div>                            
                                <div class="widget-subtitle plugin-date">Loading...</div>
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>                            
                                <div class="widget-buttons widget-c3">
                                    <div class="col">
                                        <a href="#"><span class="fa fa-clock-o"></span></a>
                                    </div>
                                    <div class="col">
                                        <a href="#"><span class="fa fa-bell"></span></a>
                                    </div>
                                    <div class="col">
                                        <a href="#"><span class="fa fa-calendar"></span></a>
                                    </div>
                                </div>                            
                            </div>                        
                            <!-- END WIDGET CLOCK -->
                            
                        </div>
                    </div>
                    <!-- END WIDGETS -->                    
                    
                    <div class="row">
                        <div class="col-md-12">
                            
                            <!-- START SALES BLOCK -->
                            <div class="panel panel-default">
                               <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Naskah Baru</h3>         
                                    <ul class="panel-controls">
                                        <li><a href="#" class="control-danger"><span class="fa fa-pencil"></span></a></li>
                                    </ul>
                                </div>
                                <?php
                                $tp=mysql_query("SELECT * FROM naskah WHERE status ='masuk' ORDER BY id_naskah DESC ");
                                while($r=mysql_fetch_array($tp)){
                                $tgl=tgl_indo($r['tanggal']);
                                 ?>
                                <div class="panel-body scroll" style="height: 230px;">                               
                                    <h6><?php echo $r['judul'] ?></h6>
                                    <p>
                                        <?php echo $r['abstrak']?> 
                                        <span class="text-muted"><i class="fa fa-clock-o"></i><?php echo $tgl; ?></span>
                                    </p>
                                    <?php } ?> 
                                </div>
                            </div>
                            <!-- END NEWS WIDGET -->
                         
                            </div>
                            <!-- END SALES BLOCK -->
                            
                        </div>
                        
                                                                                       
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- END PROJECTS BLOCK -->
                            
                        </div>
                    </div>
                   