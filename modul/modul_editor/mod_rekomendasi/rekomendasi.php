<?php if(empty($_GET['id'])){

    }else{ ?>
<!-- START BREADCRUMB -->
                <ul class="breadcrumb push-down-0">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Detail Rekomendasi</a></li>
                </ul>
                <!-- END BREADCRUMB -->    
                <!-- START RESPONSIVE TABLES -->
                   <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading"> 
                                    <div class="page-title">                    
                                        <h3><span class="fa fa-book"></span> Hasil Voting Dewan Editor</h3>
                                    </div>                                                              
                                </div>
                                <div class="panel-body">
                                    <table class="table datatable">
                                        <thead>
                                            <th>No</th>
                                                    <th>Nama Dewan</th>
                                                    <th>Pilihan Penelaah</th>
                                                </tr>
                                            </thead>
                                            <tbody> 
					                            <?php
                                                    $no = 1;
                                                    $query = "SELECT
                                                        v.id_dewan as v_id_dewan,
                                                        v.id_reviewer as v_id_reviewer,
                                                        v.id_naskah as v_id_naskah,
                                                        v.tgl_dipilih as v_tgl_dipilih,
                                                        v.status as v_status,
                                                        u.id_users as u_id_users,
                                                        u.nama_lengkap as u_nama_lengkap
                                                        FROM voting v, users u
                                                        WHERE v.id_dewan = u.id_users AND v.id_naskah = '$_GET[id]'
                                                        ORDER BY v.id DESC;
                                                        ";

                                                    $hasil_voting = mysql_query($query);
                                                    while($row=mysql_fetch_array($hasil_voting)) {
                                                        $reviewer = mysql_query("SELECT * FROM users WHERE id_users ='$row[v_id_reviewer]'");
                                                        $rev = mysql_fetch_array($reviewer);
                                                ?>                  
                                                <tr id="trow_<?=$no?>">
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $row['u_nama_lengkap']?></td>
                                                    <td><strong><?php echo $rev['nama_lengkap'] ?></strong></td>
                                                </tr> 
                                              <?php $no++; ?>
                                               <?php } ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- END RESPONSIVE TABLES -->
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading"> 
                                    <div class="page-title">                    
                                        <h3><span class="fa fa-book"></span> Data Hasil Voting</h3>
                                    </div>                                                              
                                </div>
                                <div class="panel-body">
                                    <div>
                                        <?php
                                            $query2 = "SELECT vo.id_reviewer,count(*) as total_voting,
                                            vo.id_reviewer as id_reviewer,
                                            vo.status as status,
                                            us.id_users as id_reviewer_cek,
                                            us.nama_lengkap as nama_lengkap
                                            FROM voting vo, users us WHERE 
                                            id_naskah = '$_GET[id]' AND
                                            vo.id_reviewer = us.id_users
                                            GROUP BY id_reviewer ORDER BY total_voting DESC";

                                            $queryTotal = "SELECT * FROM `voting` WHERE id_naskah = '$_GET[id]' AND status = '1' or status = '2'";
                                            $data_total = mysql_query($queryTotal) or die(mysql_error());
                                            $data_reviewer = mysql_query($query2) or die(mysql_error());
                                            $total = mysql_num_rows($data_total);

                                            $no = 1;
                                            $link="?hal=reviewer-detail-naskah&id=";
                                            $info="Penugasan Telaah Naskah baru telah diterima, silahkan klik pesan ini untuk melihat";
                                        ?>
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Penelaah</th>
                                                    <th>Jumlah Voting</th>
                                                    <th>Status</th>
                                                    <th>Tanyakan Kesanggupan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 

                                                $total_nn = array();
                                                while($r = mysql_fetch_array($data_reviewer)){
                                                if($r['status'] == 0){
                                                    $status = '<span class="label label-info label-form">Tanyakan</span>';
                                                    $button_tanyakan ='<button type="submit" class="pull-right btn btn-success">Kirim</button>';
                                                }elseif($r['status'] == 1){
                                                    $status = '<span class="label label-danger label-form">Tidak Sanggup</span>';
                                                    $button_tanyakan ='';
                                                }elseif($r['status'] == 3){
                                                    $status = '<span class="label label-warning label-form">Terkirim</span>';
                                                    $button_tanyakan ='<button type="submit" class="pull-right btn btn-success">Kirim</button>';
                                                }else{
                                                    $status = '<span class="label label-success label-form">Sanggup</span>';
                                                    $button_tanyakan ='';
                                                }
                                                if($r['status'] == 2){
                                                    $nn = 1;
                                                }else{
                                                    $nn = 0;
                                                }
                                                $total_nn[] = $nn;
                                            ?>
                                            <tr id="trow_<?=$no?>">
                                                <td><?=$no?></td>
                                                <td><?=$r['nama_lengkap']?></td>
                                                <td><?=$r['total_voting']?></td>
                                                <td><?php echo $status;?></td>
                                                <td>
                                                <?php
                                                $selectTglstatus = mysql_query("SELECT * FROM naskah WHERE id_naskah = '$_GET[id]'");
                                                $tglStatus = mysql_fetch_array($selectTglstatus);
                                                ?>
                                                    <form action="modul/modul_editor/mod_rekomendasi/tanya_reviewer.php" method="POST">
                                                        <input type="hidden" value="<?=$link?>" name="link">
                                                        <input type="hidden" value="<?=$_GET['id']?>" name="id_naskah">
                                                        <input type="hidden" value="<?=$info?>" name="isi">
                                                        <input type="hidden" value="<?php echo $r['id_reviewer']?>" name="id_reviewer">
                                                        <input type="hidden" value="<?php echo $_SESSION['id_user']?>" name="id_editor">
                                                        <input type="hidden" value="<?php echo $tglStatus['status_tgl']?>" name="status_tgl">
                                                        <?=$button_tanyakan?>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php $no++; } ?>
                                            <?php 
                                            $select = mysql_query("SELECT * FROM naskah WHERE id_naskah = '$_GET[id]'");
                                            $baris = mysql_fetch_array($select);
                                            $status = $baris['status'];
                                            $jenis =$baris['jenis_terbitan'];
                                                if(array_sum($total_nn) == 2 && $status=="masuk"){
                                                    $button_start = '<div class="panel-footer">                                                                        
                                                                        <button type="submit" class="btn btn-primary pull-right">MULAI PROSES TELAAH <span class="fa fa-play fa-right"></span></button>
                                                                    </div>';
                                                }elseif(array_sum($total_nn) == 1 && $status=="masuk" && $jenis=="Buku Ilmiah Populer"){
                                                    $button_start = '<div class="panel-footer">                                                                        
                                                                        <button type="submit" class="btn btn-primary pull-right">MULAI PROSES TELAAH <span class="fa fa-play fa-right"></span></button>
                                                                    </div>';
                                                }elseif(array_sum($total_nn) == 1 && $total == 4 && $status=="masuk"){
                                                    $button_start = '<div class="panel-footer">                                                                        
                                                                        <button type="submit" class="btn btn-primary pull-right">MULAI PROSES TELAAH <span class="fa fa-play fa-right"></span></button>
                                                                    </div>';
                                                }elseif(array_sum($total_nn) == 0 && $total == 4 && $status=="proses"){
                                                    $button_start = '';
                                                }else{
                                                    $button_start = '';
                                                }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <form id="start_review">
                                    <?=$button_start?>
                                    </form>  
                            </div>
                        </div>
                    </div>
                </div> 
                <!-- END PAGE CONTENT WRAPPER -->                                    
                </div>         
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
<?php } ?>
<script type="text/javascript">
    $(function(){
        $("#start_review").submit(function(event) {
            event.preventDefault();
            $.ajax({
                method: "POST",
                url: "modul/modul_editor/mod_rekomendasi/start_review.php",
                data: { idNaskah: "<?php echo $_GET['id']?>",
                        id_editor: "<?php echo $_SESSION['id_user']?>",
                        type:"start reviewer"

                    }
            })
            .done(function(msg) {
                // alert(msg);
                alert('Proses Review Sudah Dimulai');
                window.location.href = "media.php?hal=editor-detail-rekomendasi&id=<?php echo $_GET['id']?>";
            });
        });
    });
</script>
