<!-- START BREADCRUMB -->
                <ul class="breadcrumb push-down-0">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">File Berkas</a></li>
                   
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
                    <h3><span class="fa fa-book"></span> Data File Penting</h3>
                     </div>    
                      <div class="col-md-4">
                        <form action="media.php?hal=editor-berkas-form&action=add" method="POST">
                        <button type="submit" class="btn btn-success"><i class="fa fa-plus-square-o"></i> Tambah </button>
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
                                                    <th>Nama File</th>
                                                    <th>File</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody> 

					                           <?php
                                                    $no = 1;
                                                    $berkas=mysql_query("SELECT * FROM file_penting");
                                                     while($ber=mysql_fetch_array($berkas))
                                                     {
                                                 ?>                  

                                                <tr id="trow_<?php echo $ber['id_file'];?>">
                                                    <td class="text-center"><?php echo $no; ?></td>
                                                    <td><?php echo $ber['nama_file']?></td>
                                                    <td><a href="file_penting/<?php echo $ber['file'] ?>" class="btn btn-default btn-rounded btn-sm"><span class="fa fa-download"></span><strong>Download</strong></a></td>
                                                   <td>
                                                    <form action="media.php?hal=editor-berkas-form&action=edit" method="POST">
                                                        <input type="hidden" value="<?php echo $ber['id_file']?>" name="berid">
                                                        <button type="submit" class="btn btn-default btn-rounded btn-sm"><span class="fa fa-pencil"></span></button>
                                                        <a href="#" class="mb-control btn btn-danger btn-rounded btn-sm" data-box="#mb-delete<?php echo $ber['id_file'];?>"><span class="fa fa-times"></span></a>
                                                    </form> 
                                                    <div class="message-box animated fadeIn" data-sound="alert" id="mb-delete<?php echo $ber['id_file'];?>">
                                                    <div class="mb-container">
                                                        <div class="mb-middle">
                                                            <div class="mb-title"><span class="fa fa-times-circle"></span> Delete <strong>File</strong> ?</div>
                                                            <div class="mb-content">
                                                                <p>Are you sure you want delete this File?</p>                    
                                                                <p>Press No if you cancel this action, Press Yes to delete this user.</p>
                                                            </div>
                                                            <div class="mb-footer">
                                                                <div class="pull-right">
                                                                <a href="media.php?hal=editor-berkas-aksi&action=delete&katid=<?php echo $ber['id_file']?>"
                                                                     class="btn btn-danger btn-lg">Yes</a>
                                                                    <button class="btn btn-default btn-lg mb-control-close">No</button>
                                                               
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                                   
                                                    </td>
                                                                                                    
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

      