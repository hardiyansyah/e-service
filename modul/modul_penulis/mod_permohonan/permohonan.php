<script type="text/javascript" src="js/benzscript.js"></script>
<style type="text/css" href="css/benzshaddow.css"></style>
 <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Permohonan Penerbitan</li>
                </ul>
                <!-- END BREADCRUMB -->
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">     
                        <?php
                            $user = $_SESSION['namauser'];
							$tampil= mysql_query("SELECT * FROM users WHERE username ='$user'");
							$r=mysql_fetch_array($tampil);
						?>
                            <form method="POST" action="modul/modul_penulis/mod_permohonan/input.php" enctype="multipart/form-data" class="form-horizontal">
                            <input type="hidden" name="idu" value=<?php echo $r['id_users']?>>
                            <input type="hidden" name="nama_lengkap" value=<?php echo $r['nama_lengkap']?>>
                            <input type="hidden" name="alamat" value=<?php echo $r['alamat']?>>
                            <input type="hidden" name="email" value=<?php echo $r['email']?>>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Permohonan</strong> Penerbitan</h3>
                                   
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
                                                <input type="text" name="judul" class="form-control"/>
                                            </div>                                            
                                            <span class="help-block">Isikan Judul Naskah</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Instansi</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="intansi" class="form-control"/>
                                            </div>                                            
                                            <span class="help-block">Isikan Instansi</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Satuan Kerja</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="satker" class="form-control"/>
                                            </div>                                            
                                            <span class="help-block">Isikan Satuan Kerja</span>
                                        </div>
                                    </div>
                                    
                                   <!-- <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Satuan Kerja</label>
                                        <div class="col-md-6 col-xs-12"> 
                                     <select class="form-control select" name="kategori">
                                       <option value=0 selected>- Pilih Satuan Kerja -</option>";
                                          <?php
                                            $tampil=mysql_query("SELECT * FROM kategori ORDER BY id_kategori");
                                            while($row=mysql_fetch_array($tampil)){
                                              echo "<option value=$row[id_kategori]>$row[nama]</option>";
                                             ?>    
                                             <?php } ?>                                                                          
                                            </select>
                                            <span class="help-block">Pilih Satuan Kerja</span>
                                       
                                        </div>
                                    </div> -->
                                       <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Uraian Singkat</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="abstrak"></textarea>
                                            <span class="help-block">Isikan Uraian Singkat Naskah Anda</span>
                                        </div>
                                    </div>
                                     <!-- <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Status Penulisan</label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <select class="form-control select" id="jenisPenulis" name="status_penulisan">
                                                <option value="P">Perorangan</option>
                                                <option value="K">Kelompok</option>
                                            </select>
                                            <span class="help-block">Pilih Status Penulisan</span>
                                        </div>
                                    </div> -->
                                    <!-- Form Tambahan jika status penulisan == Kelompok -->
                                    <!-- <div class="form-group" id="daftarAnggota">
                                        <label class="col-md-3 col-xs-12 control-label">Nama Anggota</label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <input type="text" class="tagsinput" name="anggota" value=""/>
                                            <span class="help-block">Masukkan Nama-Nama Anggota Kelompok</span>
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Jumlah Halaman</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-clipboard"></span></span>
                                                <input type="text" name="halaman" class="form-control"/>
                                            </div>                                            
                                            <span class="help-block">Isikan Jumlah Halaman Naskah Anda</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Surat Permohonan</label>
                                        <div class="col-md-6 col-xs-12">                                                                                                                                        
                                            <input type="file" class="fileinput btn-primary" name="fupload" id="filename" title="Browse file"/>
                                            <span class="help-block">*File Harus Berextensi PDF</span>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Surat Pengajuan</label>
                                        <div class="col-md-6 col-xs-12">                                                                                                                                        
                                            <input type="file" class="fileinput btn-primary" name="fupload1" id="filename" title="Browse file"/>
                                            <span class="help-block">*File Harus Berextensi PDF</span>
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Upload Naskah</label>
                                        <div class="col-md-6 col-xs-12">                                                                                                                                        
                                            <input type="file" class="fileinput btn-primary" name="fupload2" id="filename" title="Browse file"/>
                                            <span class="help-block">*File Harus Berextensi DOC (Word Document) </span>
                                        </div>
                                    </div>
                                        </div>
                                    <!-- Tab Riwayat Penulis Start -->
                                        <div class="tab-pane" id="tab-second">
                                    
                                        <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Riwayat Pendidikan</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name=""><?=$r['rwy_pendidikan']?></textarea>
                                            <span class="help-block">Isikan Riwayat Pendidikan Anda</span>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Karya Buku</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name=""><?=$r['karya']?></textarea>
                                            <span class="help-block">Isikan Karya Buku 3 (tiga) Tahun Terakhir</span>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Catatan</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name=""><?=$r['catatan']?></textarea>
                                            <span class="help-block">Isikan Catatan Pribadi/pengalaman yang bermanfaat dan berkaitan dengan bidang/karya</span>
                                        </div>
                                        </div>
                                       </div>  
                                    <!-- Tab Riwayat Naskah Start -->                                      
                                        <div class="tab-pane" id="tab-third">                      
                                        <div class="form-group">                                        
                                            <label class="col-md-3 col-xs-12 control-label">Jenis Terbitan</label>
                                            <div class="col-md-3">
                                                <select name="jenis_terbitan" class="form-control select">
                                                    <option selected="selected"value="0">- Jenis Terbitan -</option>
                                                    <option value="Buku Ilmiah">Buku Ilmiah</option>
                                                     <option value="Buku Ilmiah Populer">Buku Umum (Ilmiah Populer)</option>
                                                    <option value="Buku Umum">Buku Umum</option>
                                                    <option value="Monografi">Monografi</option>
                                                    <option value="Bunga Rampai">Bunga Rampai</option>
                                                    <option value="Prosiding">Prosiding</option>
                                                </select>
                                            </div>                                            
                                        </div>
                                        <div class="form-group">                                        
                                            <label class="col-md-3 col-xs-12 control-label">Kepengarangan</label>
                                            <div class="col-md-3">
                                                <select name="kepengarangan" id="kepengarangan" class="form-control select">
                                                    <option selected="selected"value="0">- Jenis Karangan -</option>
                                                    <option value="Naskah Buku">Naskah Buku</option>
                                                    <option value="Bunga Rampai">Bunga Rampai</option>
                                                </select>
                                            </div>                                            
                                        </div>
                                        <!-- Form yang tampil setelah melakukan pemilihan jenis kepengarangan -->
                                        <div id="naskahBuku">
                                        <div class="form-group">                                        
                                            <label class="col-md-3 col-xs-12 control-label">Editor</label>
                                            <div class="col-md-6">
                                                <div class="panel panel-default">
                                                    <div class="panel-body panel-body-table">
                                                        <table class="table table-bordered test">
                                                            <tr>
                                                                <th>Nama</th>
                                                                <th>No. Telp / HP</th>
                                                                <th>Email</th>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="text" class="txtbox form-control" value="" name="namaEditor[]" /></td>
                                                                <td><input type="text" class="txtbox form-control" value="" name="telpEditor[]" /></td>
                                                                <td><input type="text" class="txtbox form-control" value="" name="emailEditor[]" /></td>
                                                            </tr>
                                                        </table>
                                                        <div style="padding: 8px 10px;">
                                                            <div type="button" class="btn btn-success plusbtn"><i class="fa fa-plus-square-o"></i> Tambah</div>
                                                            <div type="button" class="btn btn-danger minusbtn"><i class="fa fa-minus-square-o"></i> Hapus</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">                                        
                                            <label class="col-md-3 col-xs-12 control-label">Author</label>
                                            <div class="col-md-6">
                                                <div class="panel panel-default">
                                                    <div class="panel-body panel-body-table">
                                                        <table class="table table-bordered author">
                                                            <tr>
                                                                <th>Nama</th>
                                                                <th>No. Telp / HP</th>
                                                                <th>Email</th>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="text" class="txtbox form-control" value="" name="namaAuthor[]" /></td>
                                                                <td><input type="text" class="txtbox form-control" value="" name="telpAuthor[]" /></td>
                                                                <td><input type="text" class="txtbox form-control" value="" name="emailAuthor[]" /></td>
                                                            </tr>
                                                        </table>
                                                        <div style="padding: 8px 10px;">
                                                            <div type="button" class="btn btn-success plusbtnAuthor"><i class="fa fa-plus-square-o"></i> Tambah</div>
                                                            <div type="button" class="btn btn-danger minusbtnAuthor"><i class="fa fa-minus-square-o"></i> Hapus</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">                                        
                                            <label class="col-md-3 col-xs-12 control-label">Co-Author</label>
                                            <div class="col-md-6">
                                                <div class="panel panel-default">
                                                    <div class="panel-body panel-body-table">
                                                        <table class="table table-bordered co">
                                                            <tr>
                                                                <th>Nama</th>
                                                                <th>No. Telp / HP</th>
                                                                <th>Email</th>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="text" class="txtbox form-control" value="" name="namaCo[]" /></td>
                                                                <td><input type="text" class="txtbox form-control" value="" name="telpCo[]" /></td>
                                                                <td><input type="text" class="txtbox form-control" value="" name="emailCo[]" /></td>
                                                            </tr>
                                                        </table>
                                                        <div style="padding: 8px 10px;">
                                                            <div type="button" class="btn btn-success plusbtnCo"><i class="fa fa-plus-square-o"></i> Tambah</div>
                                                            <div type="button" class="btn btn-danger minusbtnCo"><i class="fa fa-minus-square-o"></i> Hapus</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div id="bungaRampai">
                                        <!-- Form yang tampil pemilihan jenis kepengarangan Bunga Rampai-->
                                        <div class="form-group">                                        
                                            <label class="col-md-3 col-xs-12 control-label">Editor</label>
                                            <div class="col-md-6">
                                                <div class="panel panel-default">
                                                    <div class="panel-body panel-body-table">
                                                        <table class="table table-bordered test">
                                                            <tr>
                                                                <th>Nama</th>
                                                                <th>No. Telp / HP</th>
                                                                <th>Email</th>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="text" class="txtbox form-control" value="" name="namaEditor[]" /></td>
                                                                <td><input type="text" class="txtbox form-control" value="" name="telpEditor[]" /></td>
                                                                <td><input type="text" class="txtbox form-control" value="" name="emailEditor[]" /></td>
                                                            </tr>
                                                        </table>
                                                        <div style="padding: 8px 10px;">
                                                            <div type="button" class="btn btn-success plusbtn"><i class="fa fa-plus-square-o"></i> Tambah</div>
                                                            <div type="button" class="btn btn-danger minusbtn"><i class="fa fa-minus-square-o"></i> Hapus</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">                                        
                                            <label class="col-md-3 col-xs-12 control-label">Author</label>
                                            <div class="col-md-6">
                                                <div class="panel panel-default">
                                                    <div class="panel-body panel-body-table">
                                                        <table class="table table-bordered author">
                                                            <tr>
                                                                <th>Nama</th>
                                                                <th>No. Telp / HP</th>
                                                                <th>Email</th>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="text" class="txtbox form-control" value="" name="namaAuthor[]" /></td>
                                                                <td><input type="text" class="txtbox form-control" value="" name="telpAuthor[]" /></td>
                                                                <td><input type="text" class="txtbox form-control" value="" name="emailAuthor[]" /></td>
                                                            </tr>
                                                        </table>
                                                        <div style="padding: 8px 10px;">
                                                            <div type="button" class="btn btn-success plusbtnAuthor"><i class="fa fa-plus-square-o"></i> Tambah</div>
                                                            <div type="button" class="btn btn-danger minusbtnAuthor"><i class="fa fa-minus-square-o"></i> Hapus</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">                                        
                                            <label class="col-md-3 col-xs-12 control-label">Co-Author</label>
                                            <div class="col-md-6">
                                                <div class="panel panel-default">
                                                    <div class="panel-body panel-body-table">
                                                        <table class="table table-bordered co">
                                                            <tr>
                                                                <th>Nama</th>
                                                                <th>No. Telp / HP</th>
                                                                <th>Email</th>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="text" class="txtbox form-control" value="" name="namaCo[]" /></td>
                                                                <td><input type="text" class="txtbox form-control" value="" name="telpCo[]" /></td>
                                                                <td><input type="text" class="txtbox form-control" value="" name="emailCo[]" /></td>
                                                            </tr>
                                                        </table>
                                                        <div style="padding: 8px 10px;">
                                                            <div type="button" class="btn btn-success plusbtnCo"><i class="fa fa-plus-square-o"></i> Tambah</div>
                                                            <div type="button" class="btn btn-danger minusbtnCo"><i class="fa fa-minus-square-o"></i> Hapus</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <!-- Form yang tampil setelah melakukan pemilihan jenis kepengarangan -->

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Uraian Buku</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="uraian_buku"></textarea>
                                            <span class="help-block">Uraikan tujuan dan lingkup buku ini</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Keistimewaan</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="keistimewaan"></textarea>
                                            <span class="help-block">Jelaskan keistimewaan buku ini dibandingkan dengan buku sejenis (jika ada), seperti edisi/materi baru, penulis/kontributor terkemuka, atau bahasan pada topik khusus. Jika memungkinkan sertakan judul buku pembanding.</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Sasaran Pembaca</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="well" style="overflow: auto;">
                                                    <div class="col-md-6">
                                                        <div class="checkbox">
                                                            <label><input type="checkbox" value="Mahasiswa / Pelajar" name="sasaran[]">
                                                                Mahasiswa / Pelajar 
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label><input type="checkbox" value="Praktisi" name="sasaran[]">
                                                                Praktisi
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label><input type="checkbox" value="Peneliti / Akademis" name="sasaran[]">
                                                                Peneliti / Akademis
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label><input type="checkbox" value="Dosen / Guru" name="sasaran[]">
                                                                Dosen / Guru
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="checkbox">
                                                            <label><input type="checkbox" value="Industri / Pengusaha" name="sasaran[]">
                                                                Industri / Pengusaha
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label><input type="checkbox" value="Karyawan / Staff" name="sasaran[]">
                                                                Karyawan / Staff
                                                            </label>
                                                        </div>
                                                        
                                                        <div class="checkbox" id="lainnya">
                                                            <label><input type="checkbox" id="other">
                                                                Lainnya 
                                                            </label>
                                                        </div>
                                                        <input type="text" name="sasaran[]" class="form-control" id="input-other" style="display:none;" placeholder="Tuliskan sasaran anda"/>
                                                    </div>
                                                </div>
                                                <span class="help-block">Beri Tanda Ceklis untuk setiap pilihan</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Ketertarikan buku</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="ketertarikan"></textarea>
                                            <span class="help-block">Komunitas (ilmiah) akademi/profesional yang diperkirakan tertarik dengan buku Anda.</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Daftar E-mail / Website</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="daftar_email_web"></textarea>
                                            <span class="help-block">Berikan daftar e-mail, website, blog (perseorangan atau organisasi) yang mungkin dapat digunakan untuk mempromosikan buku Anda.</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Cara Memasarkan Buku</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="cara_memasarkan"></textarea>
                                            <span class="help-block">Menurut Anda tempat dan cara apa yang baik untuk mendistribusikan/memasarkan buku ini.</span>
                                            </div>
                                        </div>
                                          <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Perkiraan Cetakan</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="perkiraan_cetak"></textarea>
                                            <span class="help-block">Perkiraan jumlah cetakan berdasarkan potensi pendistribusian dan pemasaran.</span>
                                            </div>
                                        </div>
                                        <div class="form-group">                                        
                                            <label class="col-md-3 col-xs-12 control-label">Rekomendasi Penelaah</label>
                                            <div class="col-md-9">
                                                <div class="panel panel-default">
                                                    <div class="panel-body panel-body-table">
                                                        <table class="table table-bordered ahli">
                                                            <tr>
                                                                <th>Nama</th>
                                                                <th>Jabatan</th>
                                                                <th>No. Telp</th>
                                                                <th>Email</th>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="text" class="txtbox form-control" value="" name="namaAhli[]" /></td>
                                                                <td><input type="text" class="txtbox form-control" value="" name="jabatanAhli[]" /></td>
                                                                <td><input type="text" class="txtbox form-control" value="" name="telpAhli[]" /></td>
                                                                <td><input type="text" class="txtbox form-control" value="" name="emailAhli[]" /></td>
                                                            </tr>
                                                        </table>
                                                        <div style="padding: 8px 10px;">
                                                            <div type="button" class="btn btn-success plusbtnAhli"><i class="fa fa-plus-square-o"></i> Tambah</div>
                                                            <div type="button" class="btn btn-danger minusbtnAhli"><i class="fa fa-minus-square-o"></i> Hapus</div>
                                                        </div>
                                                    </div>
                                                     <span class="help-block">Isikan Ahli/spesialis bidang yang diperkirakan tertarik menelaah (review) buku Anda.</span>
                                                </div>
                                             <label class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="validate[required]" name="terms" id="terms" value="1"/> Ya, <a href="media.php?hal=terms" target="_blank">Saya Menyetujui Syarat dan Ketentuan LIPI Press.</a>  
                                              </label>
                                            </label>
                                            </div>
                                    </div>
                                        </div> 
                                        <div style="display:none;" class="panel-footer" id="button" > 
                                            <div class="panel panel-default">
                                                <div class="panel-body">                            
                                                    <div class="tocify-content">
                                                        <h2>Dengan ini menyatakan dengan sebenar-benarnya bahwa :</h2>
                                                        <p>1. Naskah yang diserahkan adalah karya asli dan bebas dari fabrikasi, falsifikasi, plagiasi, duplikasi, fragmentasi/salami, dan pelanggaran hak cipta data/isi.</p>
                                                        <p>2. Naskah belum pernah diterbitkan dan tidak sedang dipertimbangkan oleh penerbit lain.</p>
                                                        <p>3. Apabila dikemudian hari ada implikasi terhadap hal-hal yang disebutkan di atas, bukan menjadi tanggung jawab Penerbit dan Dewan Editor.</p>                      
                                                    </div> 
                                                </div>
                                            </div>
                                            <button class="btn btn-primary pull-right" >Simpan <span class="fa fa-floppy-o fa-right"></span></button>
                                        </div>
                                        </div>
                                    </div>
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
        