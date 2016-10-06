<?php
$naskah= mysql_query("SELECT * FROM naskah WHERE id_naskah='$_GET[id]'");
$n=mysql_fetch_array($naskah);
$tampiluser= mysql_query("SELECT * FROM users WHERE id_users='$_GET[u]'");
$tu=mysql_fetch_array($tampiluser);
?>
          <!-- START BREADCRUMB -->
                <ul class="breadcrumb push-down-0">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Kirim Email</a></li>
                    <li><a href="#"><?php echo $n['judul']?></a></li>
                   
                </ul>
                <!-- END BREADCRUMB -->    
<!-- START RESPONSIVE TABLES -->
                    <div class="page-title">                    
                    <h2><span class="fa fa-envelope"></span> Kirim Email</h2>
                     </div>
                     <div class="panel-body">  
                                
    <form method="POST" action="modul/modul_editor/mod_laporan/aksi_laporan.php" enctype="multipart/form-data'">
             <input type="hidden" name="id_users" value="<?php echo $_GET['u']?>">
             <input type="hidden" name="id_naskah" value="<?php echo $_GET['id']?>">
             <input type="hidden" name="id_editor" value="<?php echo $_SESSION['id_user']?>">       
             <div class="content-frame-left">
                            <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="fa fa-users"></span></div>
                                <input type="text" class="form-control" placeholder ="Nama Users" name="nama" value="<?=$tu['nama_lengkap'];?>" disabled/>
                            </div>
                            <h4></h4>
                              <div class="input-group">
                                <div class="input-group-addon"><span class="fa fa-envelope"></span></div>
                                <input type="text" class="form-control" placeholder ="Email" name="email" value="<?=$tu['email'];?>" disabled/>
                            </div>
                            <h4></h4>
                            <h4></h4>
                            <textarea class="form-control push-down-10" name="pesan" placeholder ="Isi Pesan" rows="4"></textarea>                           
                          </div>                       
                        <button type="submit" class="btn btn-primary pull-left" ><span class="fa fa-file"></span>Kirim</button>                 
                </form>

         </div>
           </div>  
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

        