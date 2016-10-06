<script type="text/javascript" src="js/benzscript.js"></script>
<style type="text/css" href="css/benzshaddow.css"></style>
 <!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Verifikasi Kelengkapan Naskah</li>
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
            $naskah = mysql_query("SELECT * FROM naskah WHERE id_naskah = '$_GET[id]'");
            $nas = mysql_fetch_array($naskah);
            $penulis= mysql_query("SELECT * FROM users WHERE id_users ='$nas[id_users]'");
            $p=mysql_fetch_array($penulis);
        ?>
            <form method="POST" action="modul/modul_editor/mod_naskah/verifikasi.php" enctype="multipart/form-data" class="form-horizontal">
            <input type="hidden" name="id" value=<?php echo $_GET['id']?>>
            <input type="hidden" name="id_penulis" value=<?php echo $p['id_users']?>>
            <input type="hidden" name="id_editor" value=<?php echo $_SESSION['id_user']?>>
            <input type="hidden" name="namaEditor" value=<?php echo $r['nama_lengkap']?>>
            <input type="hidden" name="tgl" value=<?php echo $nas['tanggal']?>>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Verifikasi</strong> Kelengkapan Naskah</h3>
                </div>
              <div class="panel panel-default tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Bahan Awal</a></li>
                        <li><a href="#tab-second" role="tab" data-toggle="tab">Bahan Isi</a></li>
                        <li><a href="#tab-third" role="tab" data-toggle="tab">Bahan Akhir</a></li>
                        <li><a href="#tab-four" role="tab" data-toggle="tab">Hasil Verifikasi</a></li>
                    </ul>
              </div>
              <div class="panel-body tab-content">

                <div class="tab-pane active" id="tab-first">
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Halaman Judul</label>
                        <div class="col-md-6 col-xs-12">
                            <label class="check"><input type="checkbox" class="icheckbox" name="hal_judul[]" value="Hardcopy (OK)" /> Hardcopy*</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label class="check"><input type="checkbox" class="icheckbox" name="hal_judul[]" value="Softcopy (OK)"/> Softcopy**</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label class="check"><input type="text" placeholder="keterangan" name="hal_judul[]"/></label>
                            <span class="help-block">Tanpa Nama Penulis / Ada Nama Penulis</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Halaman Persembahan</label>
                        <div class="col-md-6 col-xs-12">
                            <label class="check"><input type="checkbox" class="icheckbox" name="hal_persembahan[]" value="Hardcopy (OK)" /> Hardcopy*</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label class="check"><input type="checkbox" class="icheckbox" name="hal_persembahan[]" value="Softcopy (OK)" /> Softcopy**</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label class="check"><input type="text" placeholder="keterangan" name="hal_persembahan[]"/></label>
                            <span class="help-block">Opsional</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Kata Pengantar dari Ahli/Pakar</label>
                        <div class="col-md-6 col-xs-12">
                            <label class="check"><input type="checkbox" class="icheckbox" name="kata_pengantar[]" value="Hardcopy (OK)"/> Hardcopy*</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label class="check"><input type="checkbox" class="icheckbox" name="kata_pengantar[]" value="Softcopy (OK)"/> Softcopy**</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label class="check"><input type="text" placeholder="keterangan" name="kata_pengantar[]"/></label>
                            <span class="help-block">Harus ada</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Prakata dari penulis</label>
                        <div class="col-md-6 col-xs-12">
                            <label class="check"><input type="checkbox" class="icheckbox" name="prakata[]" value="Hardcopy (OK)"/> Hardcopy*</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label class="check"><input type="checkbox" class="icheckbox" name="prakata[]" value="Softcopy (OK)"/> Softcopy**</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label class="check"><input type="text" placeholder="keterangan" name="prakata[]" /></label>
                            <span class="help-block">Harus ada</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Prolog***</label>
                        <div class="col-md-6 col-xs-12">
                            <label class="check"><input type="checkbox" class="icheckbox" name="prolog[]" value="Hardcopy (OK)"/> Hardcopy*</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label class="check"><input type="checkbox" class="icheckbox" name="prolog[]" value="Softcopy (OK)"/> Softcopy**</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label class="check"><input type="text" placeholder="keterangan" name="prolog[]"/></label>
                            <span class="help-block">Harus ada</span>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Daftar Isi</label>
                    <div class="col-md-6 col-xs-12">
                        <label class="check"><input type="checkbox" class="icheckbox" name="daftar_isi[]" value="Hardcopy (OK)"/> Hardcopy*</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label class="check"><input type="checkbox" class="icheckbox" name="daftar_isi[]" value="Softcopy (OK)"/> Softcopy**</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label class="check"><input type="text" placeholder="keterangan" name="daftar_isi[]"/></label>
                        <span class="help-block">Harus ada</span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Daftar Gambar</label>
                    <div class="col-md-6 col-xs-12">
                        <label class="check"><input type="checkbox" class="icheckbox" name="daftar_gambar[]" value="Hardcopy (OK)"/> Hardcopy*</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label class="check"><input type="checkbox" class="icheckbox" name="daftar_gambar[]" value="Softcopy (OK)"/> Softcopy**</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label class="check"><input type="text" placeholder="keterangan" name="daftar_gambar[]" /></label>
                        <span class="help-block">Opsional</span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Daftar Tabel</label>
                    <div class="col-md-6 col-xs-12">
                        <label class="check"><input type="checkbox" class="icheckbox" name="daftar_tabel[]" value="Hardcopy (OK)"/> Hardcopy*</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label class="check"><input type="checkbox" class="icheckbox" name="daftar_tabel[]" value="Softcopy (OK)"/> Softcopy**</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label class="check"><input type="text" placeholder="keterangan" name="daftar_tabel[]"/></label>
                        <span class="help-block">Opsional</span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Daftar Lampiran</label>
                    <div class="col-md-6 col-xs-12">
                        <label class="check"><input type="checkbox" class="icheckbox" name="daftar_lampiran[]" value="Hardcopy (OK)"/> Hardcopy*</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label class="check"><input type="checkbox" class="icheckbox" name="daftar_lampiran[]" value="Softcopy (OK)" /> Softcopy**</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label class="check"><input type="text" placeholder="keterangan" name="daftar_lampiran[]"/></label>
                        <span class="help-block">Opsional</span>
                    </div>
                    </div>
                </div>
                <!-- Tab Riwayat Penulis Start -->
                <div class="tab-pane" id="tab-second">
                    <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Pendahuluan</label>
                    <div class="col-md-6 col-xs-12">
                    <label class="check"><input type="checkbox" class="icheckbox" name="pendahuluan[]" value="Hardcopy (OK)"/> Hardcopy*</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="check"><input type="checkbox" class="icheckbox" name="pendahuluan[]" value="Softcopy (OK)"/> Softcopy**</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="check"><input type="text" placeholder="keterangan" name="pendahuluan[]" /></label>
                    <span class="help-block">Opsional</span>
                     </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Bagian (Topik utama yang terdiri atas beberapa bab)</label>
                    <div class="col-md-6 col-xs-12">
                    <label class="check"><input type="checkbox" class="icheckbox" name="bagian[]" value="Hardcopy (OK)" /> Hardcopy*</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="check"><input type="checkbox" class="icheckbox" name="bagian[]" value="Softcopy (OK)"/> Softcopy**</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="check"><input type="text" placeholder="keterangan" name="bagian[]"/></label>
                    <span class="help-block">Opsional</span>
                     </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Bab</label>
                    <div class="col-md-6 col-xs-12">
                    <label class="check"><input type="checkbox" class="icheckbox" name="bab[]" value="Hardcopy (OK)"/> Hardcopy*</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="check"><input type="checkbox" class="icheckbox" name="bab[]" value="Softcopy (OK)"/> Softcopy**</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="check"><input type="text" placeholder="keterangan" name="bab[]"/></label>
                    <span class="help-block">Opsional</span>
                     </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Subbab</label>
                    <div class="col-md-6 col-xs-12">
                    <label class="check"><input type="checkbox" class="icheckbox" name="subbab[]" value="Hardcopy (OK)"/> Hardcopy*</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="check"><input type="checkbox" class="icheckbox" name="subbab[]" value="Softcopy (OK)"/> Softcopy**</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="check"><input type="text" placeholder="keterangan" name="subbab[]"/></label>
                    <span class="help-block">Opsional</span>
                     </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Gambar termasuk Diagram atau Skema (diberi nomor dan keterangan)</label>
                    <div class="col-md-6 col-xs-12">
                    <label class="check"><input type="checkbox" class="icheckbox" name="gambar[]" value="Hardcopy (OK)"/> Hardcopy*</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="check"><input type="checkbox" class="icheckbox" name="gambar[]" value="Softcopy (OK)"/> Softcopy**</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="check"><input type="text" placeholder="keterangan" name="gambar[]" /></label>
                    <span class="help-block">Opsional</span>
                     </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Tabel (diberi nomor dan keterangan)</label>
                    <div class="col-md-6 col-xs-12">
                    <label class="check"><input type="checkbox" class="icheckbox" name="tabel[]" value="Hardcopy (OK)"/> Hardcopy*</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="check"><input type="checkbox" class="icheckbox" name="tabel[]" value="Softcopy (OK)"/> Softcopy**</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="check"><input type="text" placeholder="keterangan" name="tabel[]"/></label>
                    <span class="help-block">Opsional</span>
                     </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Epilog***</label>
                    <div class="col-md-6 col-xs-12">
                    <label class="check"><input type="checkbox" class="icheckbox" name="epilog[]" value="Hardcopy (OK)"/> Hardcopy*</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="check"><input type="checkbox" class="icheckbox" name="epilog[]" value="Softcopy (OK)"/> Softcopy**</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="check"><input type="text" placeholder="keterangan" name="epilog[]"/></label>
                    <span class="help-block">Harus ada</span>
                     </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab-third">
                    <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Daftar Pustaka</label>
                    <div class="col-md-6 col-xs-12">
                    <label class="check"><input type="checkbox" class="icheckbox" name="daftar_pustaka[]" value="Hardcopy (OK)" /> Hardcopy*</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="check"><input type="checkbox" class="icheckbox" name="daftar_pustaka[]" value="Softcopy (OK)"/> Softcopy**</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="check"><input type="text" placeholder="keterangan" name="daftar_pustaka[]"/></label>
                    <span class="help-block">Harus ada</span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Biodata singkat penulis/kontributor </label>
                    <div class="col-md-6 col-xs-12">
                    <label class="check"><input type="checkbox" class="icheckbox" name="biodata[]" value="Hardcopy (OK)"/> Hardcopy*</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="check"><input type="checkbox" class="icheckbox" name="biodata[]" value="Softcopy (OK)"/> Softcopy**</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="check"><input type="text" placeholder="keterangan" name="biodata[]" /></label>
                    <span class="help-block">Harus ada</span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Daftar istilah/Glosarium </label>
                    <div class="col-md-6 col-xs-12">
                    <label class="check"><input type="checkbox" class="icheckbox" name="daftar_istilah[]" value="Hardcopy (OK)"/> Hardcopy*</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="check"><input type="checkbox" class="icheckbox" name="daftar_istilah[]" value="Softcopy (OK)"/> Softcopy**</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="check"><input type="text" placeholder="keterangan" name="daftar_istilah[]"/></label>
                    <span class="help-block">Opsional</span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Daftar Singkatan dan Akronim</label>
                    <div class="col-md-6 col-xs-12">
                    <label class="check"><input type="checkbox" class="icheckbox" name="daftar_singkatan[]" value="Hardcopy (OK)"/> Hardcopy*</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="check"><input type="checkbox" class="icheckbox" name="daftar_singkatan[]" value="Softcopy (OK)"/> Softcopy**</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="check"><input type="text" placeholder="keterangan" name="daftar_singkatan[]" /></label>
                    <span class="help-block">Opsional</span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Lampiran (jika diperlukan)</label>
                    <div class="col-md-6 col-xs-12">
                    <label class="check"><input type="checkbox" class="icheckbox" name="lampiran[]" value="Hardcopy (OK)"/> Hardcopy*</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="check"><input type="checkbox" class="icheckbox" name="lampiran[]" value="Softcopy (OK)"/> Softcopy**</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="check"><input type="text" placeholder="keterangan" name="lampiran[]"/></label>
                    <span class="help-block">Opsional</span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Indeks (dibuat oleh penulis)</label>
                    <div class="col-md-6 col-xs-12">
                    <label class="check"><input type="checkbox" class="icheckbox" name="dex[]" value="Hardcopy (OK)"/> Hardcopy*</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="check"><input type="checkbox" class="icheckbox" name="dex[]" value="Softcopy (OK)"/> Softcopy**</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="check"><input type="text" placeholder="keterangan" name="dex[]"/></label>
                    <span class="help-block">Harus ada</span>
                    </div>
                    </div>
                </div>
                    <div class="tab-pane" id="tab-four">
                    <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Hasil Verifikasi</label>
                    <div class="col-md-6 col-xs-12">
                    <label class="check"><input type="radio" class="icheckbox" name="hasil" value="Lolos Verifikasi"/>Lolos Verifikasi</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="check"><input type="radio" class="icheckbox" name="hasil" value="Tidak Lolos Verifikasi"/>Tidak Lolos Verifikasi</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span class="help-block">Harus ada</span>
                     </div>
                    </div>
                    <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">Catatan</label>
                <div class="col-md-6 col-xs-12">
                <textarea class="form-control" rows="5" name="catatan"></textarea>
                <span class="help-block">Tulisakan Catatan Anda</span>
                </div>
                </div>
                        <button class="btn btn-primary pull-right">Simpan <span class="fa fa-floppy-o fa-right"></span></button>
                </div>
              </div>
            </div>
            </form>
        </div>
    </div>
    <div class="panel-footer">
        * = Rangkap 2 Ekslempar<br>
        ** = Naskah Dalam Format Microsof Word<br>
        *** = Untuk Naskah buku Bunga Rampai<br>
    </div>
</div>


        