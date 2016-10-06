<link rel="stylesheet" href="assets/countdown/css/font.css" />
<link rel="stylesheet" href="assets/countdown/css/styles.css" />
<link rel="stylesheet" href="assets/countdown/countdown/jquery.countdown.css" />
				<!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Lihat Naskah</li>
                </ul>
                <!-- END BREADCRUMB -->
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
                        <?php
                            $detail= mysql_query("SELECT * FROM naskah WHERE id_naskah='$_GET[id]'");
                            $r2   = mysql_fetch_array($detail);
                            $nama_user= mysql_query("SELECT * FROM users WHERE id_users='$r2[id_users]'");
                            $r3   = mysql_fetch_array($nama_user);
                                                ?>
                            <div class="form-horizontal">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                	<div class="col-md-2">
                                    	<h3 class="panel-title"><strong>Detail</strong> Naskah</h3>
                                	</div>
                                	<!-- <div class="col-md-3 col-md-offset-1">
                                    	<p id="note-before">Sisa waktu EDITOR untuk naskah ini :</p>
                                    	<div id="note-after" style="display:none" class="noteAfter">WAKTU ANDA SUDAH HABIS</div>
										<div id="countdown"></div>
                                	</div>
                                	<div class="col-md-3">
                                    	<p id="notif-before">Sisa waktu proses PENILAIAN :</p>
                                    	<p id="notif-after" style="display:none">Waktu Anda Sudah Habis</p>
										<div id="countdown2"></div>
                                	</div> -->
                                </div>
                                <div class="panel panel-default tabs">                            
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Formulir Input Naskah</a></li>
                                    <li><a href="#tab-second" role="tab" data-toggle="tab">Riwayat Penulis</a></li>
                                    <li><a href="#tab-third" role="tab" data-toggle="tab">Riwayat Naskah</a></li>
                                </ul>
                                <div class="panel-body tab-content">
                                <div class="tab-pane active" id="tab-first">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Judul Naskah</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="judul" class="form-control" value="<?=$r2['judul']?>" />
                                            </div>                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Instansi</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="intansi" class="form-control" value="<?=$r2['intansi']?>" />
                                            </div>                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Satuan Kerja</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="satker" class="form-control" value="<?=$r2['satker']?>" />
                                            </div>                                            
                                        </div>
                                    </div>
                               <!--     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Satuan Kerja</label>
                                        <div class="col-md-6 col-xs-12"> 
                                            <select class="form-control select" name="kategori">
                                            <?php $tampil=mysql_query("SELECT * FROM kategori WHERE id_kategori = '$r2[kategori]'");
                                                $row=mysql_fetch_array($tampil);
                                                echo "<option value=".$row['id_kategori'].">".$row['nama']."</option>";
                                            ?> 
                                            </select>
                                        </div>
                                    </div> -->
                                       <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Uraian Singkat</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="abstrak"><?=$r2['abstrak']?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Jumlah Halaman</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-clipboard"></span></span>
                                                <input type="text" name="halaman" class="form-control" value="<?=$r2['halaman']?>" />
                                            </div>                                            
                                        </div>
                                    </div>
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Tanggal Upload</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                <input type="text" class="form-control" value="<?php echo $r2['tanggal']?>">                                            
                                            </div>
                                        </div>
                                    </div>
                                         <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">File Surat Permohonan</label>
                                        <div class="col-md-6 col-xs-12">                                                                                                                                        
                                        <a href="files/<?php echo $r2['permohonan']?>" target="_blank"><button class="btn btn-primary" ><span class="fa fa-download"></span> Download</button></a>
                                        </div>
                                    </div>
                               <!--      <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">File Surat Pengajuan</label>
                                        <div class="col-md-6 col-xs-12">                                                                                                                                        
                                        <a href="files/<?php echo $r2['pengajuan']?>" target="_blank"><button class="btn btn-primary" ><span class="fa fa-download"></span> Download</button></a>
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">File Naskah</label>
                                        <div class="col-md-6 col-xs-12">                                                                                                                                        
                                        <a href="files/<?php echo $r2['file']?>" target="_blank"><button class="btn btn-primary" ><span class="fa fa-download"></span> Download</button></a>
                                        </div>
                                    </div>
                                <!--     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Status Naskah</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-info"></span></span>
                                                <input type="text" value="<?php echo $r2['status']?>"class="form-control"/>
                                             </div>                    
                                            </div>
                                    </div> -->
                                    </div>
                                    <!-- Tab Riwayat Penulis Start -->
                                        <div class="tab-pane" id="tab-second">
                                            <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Nama</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                <input type="text" value="<?php echo $r3['nama_lengkap']?>"class="form-control"/>
                                            </div>                                            
                                        </div>
                                    </div>
                                      <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Alamat</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" ><?php echo $r3['alamat']?></textarea>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Email</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                                                <input type="text" value="<?php echo $r3['email']?>" class="form-control"/>
                                            </div>                                            
                                            </div>
                                    </div>
                                        <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Riwayat Pendidikan</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name=""><?=$r3['rwy_pendidikan']?></textarea>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Karya Buku</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name=""><?=$r3['karya']?></textarea>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Catatan</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name=""><?=$r3['catatan']?></textarea>
                                        </div>
                                        </div>
                                       </div>  
                                    <!-- Tab Riwayat Naskah Start -->                                      
                                        <div class="tab-pane" id="tab-third">                      
                                        <div class="form-group">                                        
                                            <label class="col-md-3 col-xs-12 control-label">Jenis Terbitan</label>
                                            <div class="col-md-3">
                                                <select name="jenis_terbitan" class="form-control select">
                                                    <option value="<?=$r2['jenis_terbitan']?>"><?=$r2['jenis_terbitan']?></option>
                                                </select>
                                            </div>                                            
                                        </div>
                                        <div class="form-group">                                        
                                            <label class="col-md-3 col-xs-12 control-label">Kepengarangan</label>
                                            <div class="col-md-3">
                                                <select name="kepengarangan" id="kepengarangan" class="form-control select">
                                                    <option value="<?=$r2['kepengarangan']?>"><?=$r2['kepengarangan']?></option>
                                                </select>
                                            </div>                                            
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Uraian Buku</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="uraian_buku"><?=$r2['uraian_buku']?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Keistimewaan</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="keistimewaan"><?=$r2['keistimewaan']?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Sasaran Pembaca</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="keistimewaan"><?=$r2['sasaran_pembaca']?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Ketertarikan buku</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="ketertarikan"><?=$r2['ketertarikan']?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Daftar E-mail / Website</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="daftar_email_web"><?=$r2['daftar_email_web']?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Cara Memasarkan Buku</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="cara_memasarkan"><?=$r2['cara_memasarkan']?></textarea>
                                            </div>
                                        </div>
                                          <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Perkiraan Cetakan</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="perkiraan_cetak"><?=$r2['perkiraan_cetak']?></textarea>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">                               
                                     <div class="form-group">                                        
                                            <div class="col-md-2 col-md-offset-3">
                                                <button class="btn btn-success btn-block" onclick="self.history.back()">Kembali</button>
                                            </div>
                                             <div class="col-md-2">
                                               <a href="print.php?&id=<?php echo $r2['id_naskah']?>" target="_blank"><button type="submit" class="btn btn-success btn-block">Print</button></a>
                                            </div>
                                            
                                            <?php if($r2['status_kirim'] == 1){ ?>
                                            <form id="kirim">
                                            <input type="hidden" value="<?=$_SESSION['email']?>" name="email_editor">
                                            <input type="hidden" value="<?php echo $_GET['id'];?>" name="idnya">
                                            <div class="col-md-2">
                                                <button type="submit" class="btn btn-success btn-block">Kirim Ke Dewan Editor</button>
                                            </div>
                                            </form> 
                                            <?php } ?>     
                                            <!-- <div class="col-md-2">
                                                <a href="media.php?hal=editor-pilih-reviewer&id=<?php echo $r2['id_naskah']?>"><button class="btn btn-warning btn-block">Kirim Ke Dewan</button></a>
                                            </div> -->
                                        </div>      
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
        <script>
            $(function(){
                String.prototype.toHHMMSS = function () {
                    var sec_num = parseInt(this, 10); // don't forget the second param
                    var hours   = Math.floor(sec_num / 3600);
                    var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
                    var seconds = sec_num - (hours * 3600) - (minutes * 60);

                    if (hours   < 10) {hours   = "0"+hours;}
                    if (minutes < 10) {minutes = "0"+minutes;}
                    if (seconds < 10) {seconds = "0"+seconds;}
                    var time    = hours+':'+minutes+':'+seconds;
                    return time;
                }
                d1 = new Date('<?php echo $r2['tanggal']?>');
                d2 = new Date();
                var second = ((d2-d1)/1000).toString();
                formatted = second.toHHMMSS();
                // alert(formatted);

                $("#kirim").submit(function(event) {
                    event.preventDefault();
                    $.ajax({
                        method: "POST",
                        url: "modul/modul_editor/mod_naskah/kirim.php",
                        data: { id: "<?php echo $_GET['id']?>",
                                type: "naskah",
                                emailEditor:"<?php echo $_SESSION['email'];?>",
                                namaEditor:"<?=$_SESSION['namalengkap']?>",
                                idUser : "<?=$_SESSION['id_user']?>",
                                idPenulis : "<?=$r2['id_users']?>",
                                idNaskah : "<?=$_GET['id']?>",
                                tgl :"<?=$r2['tanggal']?>",
                                duration: formatted,
                                start_date: "<?php echo $r2['tanggal']?>"
                            }
                    })
                    .done(function(msg) {
                        alert(msg);
                        window.location.href = "media.php?hal=editor-naskah&id=masuk";
                    });
                });
            });
        </script>
		<script src="assets/countdown/countdown/jquery.countdown.js"></script>
        <script type="text/javascript">
            $(function(){
                var noteBefore = $('#note-before');
                var noteAfter = $('#note-after');
                var notifBefore = $('#notif-before');
                var notifAfter = $('#notif-after');
                var digit = $('#digit');
                    ts = new Date(2012, 0, 1),
                    newYear = true;

                if((new Date()) > ts){
                    waktuUpload = new Date('<?php echo $r2['tanggal']?>').getTime();
                    // The new year is here! Count towards something else.
                    // Notice the *1000 at the end - time must be in milliseconds
                    // ts2 = (new Date()).getTime() + 40*24*60*60*1000;
                    // ts = (new Date()).getTime() + 3*24*60*60*1000;
                    // alert(waktuUpload);
                    var ts = waktuUpload + 3*24*60*60*1000;
                    var ts2 = waktuUpload + 40*24*60*60*1000;
                    // ts2 = (new Date()).getTime() + 5*1000;
                    // newYear = false;
                }
             
                $('#countdown').countdown({
                    timestamp   : ts,
                    callback    : function(days, hours, minutes, seconds){
                        var message = "";
                        var messageNotif = "";
                        // message += days + " day" + ( days==1 ? '':'s' ) + ", ";
                        // message += hours + " hour" + ( hours==1 ? '':'s' ) + ", ";
                        // message += minutes + " minute" + ( minutes==1 ? '':'s' ) + " and ";
                        // message += seconds + " second" + ( seconds==1 ? '':'s' ) + " <br />";
                        message += "Sisa Waktu Anda adalah";
                        if(days == 0 && hours == 0 && minutes == 0 && seconds == 0){
                            noteBefore.slideUp();
                            noteAfter.slideDown();
                            messageNotif += "Anda Sudah Melebihi Batas Waktu Yang Ditentukan";
                            $( "#countdown" ).slideUp(); 
                            $(".digit.static").css("background-color", "red");
                            $(".digit.static").css("background-image", "red");
                            $("#countdown2").fadeIn();
                            $.ajax({
                                
                            })
                        }
                        // notifBefore.html(messageNotif);
                        // noteBefore.html(message);
                    }
                });

                $('#countdown2').countdown({
                    timestamp   : ts2,
                    callback    : function(days, hours, minutes, seconds){
                        // var message = "";
                        // message += days + " day" + ( days==1 ? '':'s' ) + ", ";
                        // message += hours + " hour" + ( hours==1 ? '':'s' ) + ", ";
                        // message += minutes + " minute" + ( minutes==1 ? '':'s' ) + " and ";
                        // message += seconds + " second" + ( seconds==1 ? '':'s' ) + " <br />";
                        // noteBefore.html(message);
                    }
                }); 
            });
        </script>
     