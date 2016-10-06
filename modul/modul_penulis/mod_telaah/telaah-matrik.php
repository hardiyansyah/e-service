<?php
$revii= mysql_query("SELECT * FROM review WHERE id_review='$_GET[id]'");
$rev1=mysql_fetch_array($revii);
$tampilnaskah= mysql_query("SELECT * FROM naskah WHERE id_naskah ='$_GET[id]'");
$tn=mysql_fetch_array($tampilnaskah);
$tampiluser= mysql_query("SELECT * FROM users WHERE id_users='$tn[id_users]'");
$tu=mysql_fetch_array($tampiluser);
?>
          <!-- START BREADCRUMB -->
                <ul class="breadcrumb push-down-0">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Input Matriks</a></li>
                    <li><a href="#"><?php echo $tn['judul']?></a></li>
                   
                </ul>
                <!-- END BREADCRUMB -->    
<!-- START RESPONSIVE TABLES -->
                    <div class="page-title">                    
                    <h2><span class="fa fa-book"></span> Matriks Perbaikan <?php echo $tn['judul']?></h2>
                     </div>

            
                                       <div class="panel-body">  
                                <table class="table datatable">
                                        <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>BAB</th>
                                                    <th>Sub Bab</th>
                                                    <th>Halaman</th>
                                                    <th>Catatan Koreksi</th>
                                                    <th>Hasil Perbaikan</th>
                                                    

                                                </tr>
                                            </thead>
                                            <tbody> 
                            <?php
                            $user = $_SESSION['namauser'];
                            $tampil= mysql_query("SELECT * FROM users WHERE username ='$user'");
                            $cc=mysql_fetch_array($tampil);

                            $tampilnaskah12= mysql_query("SELECT * FROM review WHERE id_review='$_GET[id]'");
                            $tnn=mysql_fetch_array($tampilnaskah12);
                            $tp=mysql_query("SELECT * FROM matriks WHERE id_naskah='$_GET[id]' AND revisi_ke='$_GET[ke]' AND id_reviewer='$_GET[ref]'");
                            $no = 1;
                            while($rnn=mysql_fetch_array($tp)){
                             ?>

                             <tr>
                                
                                    <td ><?php echo $no;?></td>
                                    <td ><?php echo $rnn['bab']?></td>
                                    <td ><?php echo $rnn['sub_bab']?></td>
                                    <td ><?php echo $rnn['halaman']?></td>
                                    <td ><?php echo $rnn['catatan']?></td>
                                    <td ><?php echo $rnn['hasil_revisi']?></td>
                                   
                                </tr>
                                 <?php
                                $no++;  } ?>

                             </tbody>
                            </table>
    <form method="POST" action="modul/modul_penulis/mod_telaah/aksi_matrik.php" enctype="multipart/form-data'"
           <input type="hidden" name="ids" value="<?php echo $tn['id_users']?>">
           <?php 
           $reviii= mysql_query("SELECT * FROM review WHERE id_review='$_GET[id]'");
            $rev11=mysql_fetch_array($reviii);
            // $tampilnaskah= mysql_query("SELECT * FROM naskah WHERE id_naskah ='$rev1[id_naskah]'");
            // $tn=mysql_fetch_array($tampilnaskah);
            $jmlrev=mysql_num_rows(mysql_query("select * from review where id_naskah='$tn[id_naskah]'"));
            $tampilnaskah12= mysql_query("SELECT * FROM review WHERE id_naskah='$_GET[id]' AND status='$jmlrev'");
            $tnn=mysql_fetch_array($tampilnaskah12);
            ?>
         <input type="hidden" name="ke" value="<?php echo $_GET['ke']?>">
         <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
          <input type="hidden" name="id_reviewer" value="<?php echo $_GET['ref']?>">
             <div class="content-frame-left">
                    <h3> INPUT MATRIK PERBAIKAN </h3>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="fa fa-pencil"></span></div>
                                <input type="text" class="form-control" placeholder ="Bab" name="bab" value="" />
                            </div>
                            <h4></h4>
                              <div class="input-group">
                                <div class="input-group-addon"><span class="fa fa-pencil"></span></div>
                                <input type="text" class="form-control" placeholder ="Sub Bab" name="subbab" value="" />
                            </div>
                            <h4></h4>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="fa fa-pencil"></span></div>
                                <input type="text" class="form-control" placeholder ="Halaman" name="hal" value="" />
                            </div>
                            <h4></h4>
                            <textarea class="form-control push-down-10" name="catatan" placeholder ="Catatan Koreksi" rows="4"></textarea>   
                            <textarea class="form-control push-down-10" name="hasil" placeholder ="Hasil Revisi" rows="4"></textarea>                            
                          </div>                       
                        <button type="submit" class="btn btn-primary pull-left" ><span class="fa fa-file"></span>Simpan Perbaikan Matriks</button>                 
                   
                </form>

            <form method='POST' action="modul/modul_penulis/mod_telaah/aksi_kirim.php">
             <input type="hidden" name="id_penulis" value="<?php echo $cc['id_users']?>">
             <input type="hidden" name="id_naskah" value="<?php echo $_GET['id']?>">
             <input type="hidden" name="id_reviewer" value="<?php echo $_GET['ref']?>">
             <input type="hidden" name="revisi_ke" value="<?php echo $_GET['ke']?>">
             <input type="hidden" name="status_tgl" value="<?php echo $tn['status_tgl']?>">
            <button type="submit" class="btn btn-primary pull-right" ><span class="fa fa-file"></span>Selesai</button>      
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

        