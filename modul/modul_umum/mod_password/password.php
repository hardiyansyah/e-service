 <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
                            
                            <form class="form-horizontal" method="POST" action="modul/modul_umum/mod_password/proses_ganti.php">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Ganti</strong> Password</h3>
                                     </div>
                                     <?php 
                                    $user="$_SESSION[namauser]";
                                                                       
                                    $tampil= mysql_query("SELECT * FROM users WHERE username ='$user'");
                                    $r=mysql_fetch_array($tampil);
                                    ?>                        
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Password Lama</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                <input type="password" name="lama" value="" class="form-control"/>
                                                <input type="hidden" name="user" value="<?php echo $r['username'];?>"class="form-control"/>
                                            </div>            
                                            <span class="help-block">Masukkan Password Lama Anda</span>
                                        </div>
                                    </div>
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Password Baru</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                                <input type="password" name="baru" class="form-control"/>
                                            </div>            
                                            <span class="help-block">Masukan Password Baru Anda</span>
                                        </div>
                                    </div>                                 
                                    <div class="panel-footer">
                                            <input type="hidden" name="level" value="<?php echo $r['level'];?>"class="form-control"/>                                                                        
                                            <button class="btn btn-primary pull-right">SIMPAN <span class="fa fa-floppy-o fa-right"></span></button>
                                        </div>                     
                                    
                            </div>
                            </form>
                            
                        </div>
                    </div>                    
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
        