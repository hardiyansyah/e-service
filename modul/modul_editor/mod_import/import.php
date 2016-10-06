<!-- START BREADCRUMB -->
                <ul class="breadcrumb push-down-0">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Import Data</a></li>
                   
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
                    <h3><span class="fa fa-book"></span> Data Peneliti</h3>
                     </div>    
                      <div class="col-md-4">
                        <form action="media.php?hal=editor-import-form&action=import" method="POST">
                        <button type="submit" class="btn btn-success"><i class="fa fa-plus-square-o"></i> Import </button>
                        </form>
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
                                                    <th>Unit Kerja</th>
                                                    <th>Bidang Kepakaran</th>
                                                    <th>Jabatan Peneliti</th>
                                                    <th>Instansi</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody> 

					                           <?php
                                                    $no = 1;
                                                    $user=mysql_query("SELECT * FROM peneliti where import ='Y'");
                                                     while($u=mysql_fetch_array($user))
                                                     {
                                                 ?>                  

                                                <tr id="trow_1">
                                                    <td class="text-center"><?php echo $no; ?></td>
                                                    <td><?php echo $u['nama_lengkap']?></td>
                                                    <td><strong><?php echo $u['unit_kerja'] ?></strong></td>
                                                   <td><?php echo $u['bidang_kepakaran']?></span></td>
                                                   <td><?php echo $u['jabatan_peneliti']?></span></td>
                                                   <td><?php echo $u['instansi']?></span></td>
                                                  <td>
                                                    <form action="media.php?hal=editor-edit-data" method="POST">
                                                        <input type="hidden" value="<?php echo $u['id_peneliti']?>" name="userid">
                                                      <button type="submit" class="btn btn-default btn-rounded btn-sm"><span class="fa fa-pencil"></span></button>
                                                       <a href="#" class="mb-control btn btn-danger btn-rounded btn-sm" data-box="#mb-signout-<?php echo $u['id_peneliti'];?>"><span class="fa fa-times"></span></a>
                                                    </form>                                                    
                                                    </td>
                                                                                                    
                                                </tr>
                                                <!-- MESSAGE BOX-->
                     <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout-<?php echo $u['id_peneliti'];?>">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-times-circle"></span> Hapus <strong>Data Peneliti</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want delete?</p>                    
                        <p>Press No if you cancel this action, Press Yes to delete this user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                        <a href="media.php?hal=editor-import-aksi&action=delete&userid=<?php echo $u['id_peneliti']?>"
                             class="btn btn-danger btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->  

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

      