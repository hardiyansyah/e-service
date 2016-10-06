<?php
/**
 * Created by PhpStorm.
 * User: Hardiyansyah
 * Date: 10/1/2016
 * Time: 11:15 PM
 */
<div class="row">
                                        <div class="col-md-12">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title"><strong>Daftar</strong> Penelaah</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <?php

                                                    $cari =$_POST['cari'];
                                                    // echo "$cari";

                                                    $tp=mysql_query("SELECT * FROM users WHERE blokir='N' AND nama_lengkap like '%$cari%' AND level='reviewer' order by nama_lengkap ASC;");
                                                    $no = 1;
                                                    while($r=mysql_fetch_array($tp)){
                                                        if($no = 1){ $posisi = 'checked'; }else{ $posisi = ''; }
                                                        ?>
                                                        <div class="col-md-3">
                                                            <!-- DAFTAR REVIEWER -->
                                                            <div class="panel panel-default">
                                                                <div class="panel-body profile">
                                                                    <div class="profile-image">
                                                                        <img src="foto_profil/<?php echo $r['foto']?>" alt="Lipipress"/>
                                                                    </div>
                                                                    <div class="profile-data">
                                                                        <div class="profile-data-name"><?php echo $r['nama_lengkap']?></div>
                                                                        <div class="profile-data-title"><?php echo $r['jabatan']?></div>
                                                                    </div>
                                                                </div>

                                                                <div class="panel-body">
                                                                    <div class="contact-info">
                                                                        <p><small>NIP</small> : <?php echo $r['nip']?></p><hr style="margin-top: 5px; margin-bottom: 5px;">
                                                                        <p><small>Username</small> : <?php echo $r['username']?></p><hr style="margin-top: 5px; margin-bottom: 5px;">
                                                                        <p><small>Alamat</small> : <?php echo $r['alamat']?></p><hr style="margin-top: 5px; margin-bottom: 5px;">
                                                                        <p><small>Jabatan</small> : <?php echo $r['jabatan']?></p><hr style="margin-top: 5px; margin-bottom: 5px;">
                                                                        <p><small>Email</small> : <?php echo $r['email']?></p><hr style="margin-top: 5px; margin-bottom: 5px;">
                                                                        <p><small>No. Telp/HP</small> : <?php echo $r['telp']?></p><hr style="margin-top: 5px; margin-bottom: 5px;">
                                                                        <p><small>Fax</small> : <?php echo $r['fax']?></p><hr style="margin-top: 5px; margin-bottom: 5px;">
                                                                        <p><small>Riwayat Pendidikan</small> : <?php echo $r['rwy_pendidikan']?></p><hr style="margin-top: 5px; margin-bottom: 5px;">
                                                                        <p><small>Karya Sebelumnya</small> : <?php echo $r['karya']?></p><hr style="margin-top: 5px; margin-bottom: 5px;">
                                                                        <p><small>Catatan</small> : <?php echo $r['catatan']?></p><hr style="margin-top: 5px; margin-bottom: 5px;">
                                                                        <p><small>Login Sebagai</small> : <?php echo $r['level']?></p>
                                                                        <label class="switch switch-small">
                                                                            <input type="radio" name="id_reviewer" value="<?=$r['id_users']?>"/><span style="padding-left:28px;padding-top:1px">&nbsp;&nbsp;Pilih</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- END DAFTAR REVIEWER -->
                                                        </div>
                                                        <?php $no++; } ?>
</div>
<div class="panel-footer">
    <button class="btn btn-primary pull-right">Simpan</button>
    <button class="btn btn-primary pull-left" onclick="self.history.back()">Kembali</button>
</div>
</div>
</div>
</div>