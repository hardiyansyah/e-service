<?php
//modul umum
if ($_GET['hal']=='login')
{ include "modul/modul_umum/mod_login/login.php";}
else
// if ($_GET['hal']=='dashboard')
// { include "modul/modul_umum/mod_home/dashboard.php";}
// else
if  ($_GET['hal']=='profil')
{include "modul/modul_umum/mod_profil/user_profil.php";}
else
if  ($_GET['hal']=='pemberitahuan')
{include "modul/modul_umum/mod_pemberitahuan/pemberitahuan.php";}
else
if  ($_GET['hal']=='login')
{include "login.php";}
else
if  ($_GET['hal']=='informasi')
{include "modul/modul_umum/mod_informasi/informasi.php";}
else
if  ($_GET['hal']=='ganti-password')
{include "modul/modul_umum/mod_password/password.php";}
else
if  ($_GET['hal']=='terms')
{include "modul/modul_umum/mod_terms/terms.php";}
else
//modul penulis
if  ($_GET['hal']=='dashboard-penulis')
{include "modul/modul_penulis/mod_home/home.php";}
else
if  ($_GET['hal']=='penulis-permohonan')
{include "modul/modul_penulis/mod_permohonan/permohonan.php";}
else
if  ($_GET['hal']=='penulis-monitoring')
{include "modul/modul_penulis/mod_naskah/monitoring.php";}
else
if  ($_GET['hal']=='penulis-revisi')
{include "modul/modul_penulis/mod_naskah/upload.php";}
else
if  ($_GET['hal']=='penulis-telaah-matriks')
{include "modul/modul_penulis/mod_telaah/telaah-matrik.php";}
else
if  ($_GET['hal']=='penulis-naskah')
{include "modul/modul_penulis/mod_naskah/naskah.php";}
else
//modul dewan
if  ($_GET['hal']=='dashboard-dewan')
{include "modul/modul_dewan/mod_home/home.php";}
else
if  ($_GET['hal']=='dewan-user')
{include "modul/modul_dewan/mod_user/user.php";}
else
if  ($_GET['hal']=='dewan-naskah')
{include "modul/modul_dewan/mod_naskah/naskah.php";}
else
if  ($_GET['hal']=='dewan-lihat-naskah')
{include "modul/modul_dewan/mod_naskah/lihat-naskah.php";}
else
if  ($_GET['hal']=='dewan-penilaian')
{include "modul/modul_dewan/mod_penilaian/penilaian.php";}
else
if  ($_GET['hal']=='dewan-hasil')
{include "modul/modul_dewan/mod_penilaian/hasil.php";}
else
if  ($_GET['hal']=='sidang')
{include "modul/modul_dewan/mod_sidang/sidang.php";}
else
if  ($_GET['hal']=='dewan-pilih-reviewer')
{include "modul/modul_dewan/mod_naskah/pilih-reviewer.php";}
else
if  ($_GET['hal']=='dewan-hasil-voting')
{include "modul/modul_dewan/mod_voting/hasil-voting.php";}
else
if  ($_GET['hal']=='dewan-detail-naskah')
{include "modul/modul_dewan/mod_voting/detail-naskah.php";}
else
if  ($_GET['hal']=='dewan-proses-review')
{include "modul/modul_dewan/mod_naskah/lihat-naskah-proses.php";}
else
if  ($_GET['hal']=='cari-reviewer')
{include "modul/modul_dewan/mod_naskah/cari-reviewer.php";}
else
if  ($_GET['hal']=='detail-reviewer')
{include "modul/modul_dewan/mod_naskah/detail-reviewer.php";}
else
	//modul editor_bahasa
if  ($_GET['hal']=='dashboard-editor_bahasa')
{include "modul/modul_editor_bahasa/mod_home/home.php";}
else
if  ($_GET['hal']=='editor_bahasa-user')
{include "modul/modul_editor_bahasa/mod_user/user.php";}
else
if  ($_GET['hal']=='editor_bahasa-naskah')
{include "modul/modul_editor_bahasa/mod_naskah/naskah.php";}
else
if  ($_GET['hal']=='editor_bahasa-lihat-naskah')
{include "modul/modul_editor_bahasa/mod_naskah/lihat-naskah.php";}
else
if  ($_GET['hal']=='dewan-penilaian')
{include "modul/modul_dewan/mod_penilaian/penilaian.php";}
else
if  ($_GET['hal']=='dewan-hasil')
{include "modul/modul_dewan/mod_penilaian/hasil.php";}
else
if  ($_GET['hal']=='sidang')
{include "modul/modul_dewan/mod_sidang/sidang.php";}
else
if  ($_GET['hal']=='dewan-pilih-reviewer')
{include "modul/modul_dewan/mod_naskah/pilih-reviewer.php";}
else
if  ($_GET['hal']=='dewan-hasil-voting')
{include "modul/modul_dewan/mod_voting/hasil-voting.php";}
else
if  ($_GET['hal']=='dewan-detail-naskah')
{include "modul/modul_dewan/mod_voting/detail-naskah.php";}
else
if  ($_GET['hal']=='dewan-proses-review')
{include "modul/modul_dewan/mod_naskah/lihat-naskah-proses.php";}
else
if  ($_GET['hal']=='cari-reviewer')
{include "modul/modul_dewan/mod_naskah/cari-reviewer.php";}
else
//modul reviewer
if  ($_GET['hal']=='dashboard-reviewer')
{include "modul/modul_reviewer/mod_home/home.php";}
else
if  ($_GET['hal']=='reviewer-telaah')
{include "modul/modul_reviewer/mod_telaah/telaah.php";}
else
if  ($_GET['hal']=='reviewer-telaah2')
{include "modul/modul_reviewer/mod_telaah/telaah2.php";}
else
if  ($_GET['hal']=='reviewer-review')
{include "modul/modul_reviewer/mod_review/review.php";}
else
if  ($_GET['hal']=='reviewer-monitoring')
{include "modul/modul_reviewer/mod_review/review-monitoring.php";}
else
if  ($_GET['hal']=='reviewer-upload-review')
{include "modul/modul_reviewer/mod_review/upload-review.php";}
else
if  ($_GET['hal']=='reviewer-detail-naskah')
{include "modul/modul_reviewer/mod_review/detail_naskah.php";}
else
//modul editor visual
if  ($_GET['hal']=='dashboard-editor_visual')
{include "modul/modul_editor_visual/mod_home/home.php";}
else
if  ($_GET['hal']=='editor_visual-naskah')
{include "modul/modul_editor_visual/mod_naskah/naskah.php";}
else
if  ($_GET['hal']=='editor_visual-sunting-naskah')
{include "modul/modul_editor_visual/mod_sunting/upload-sunting.php";}
else
if  ($_GET['hal']=='reviewer-review')
{include "modul/modul_editor_visual/mod_review/review.php";}
else
if  ($_GET['hal']=='reviewer-monitoring')
{include "modul/modul_editor_visual/mod_review/review-monitoring.php";}
else
if  ($_GET['hal']=='reviewer-upload-review')
{include "modul/modul_editor_visual/mod_review/upload-review.php";}
else
if  ($_GET['hal']=='reviewer-detail-naskah')
{include "modul/modul_editor_visual/mod_review/detail_naskah.php";}
else
//modul editor
if  ($_GET['hal']=='dashboard-editor')
{include "modul/modul_editor/mod_home/home.php";}
else
if  ($_GET['hal']=='editor-user')
{include "modul/modul_editor/mod_user/user.php";}
else
if  ($_GET['hal']=='editor-tambah-user')
{include "modul/modul_editor/mod_user/tambahuser.php";}
else
if  ($_GET['hal']=='editor-lihat-user')
{include "modul/modul_editor/mod_user/lihatuser.php";}
else
if  ($_GET['hal']=='editor-hapus-user')
{include "modul/modul_editor/mod_user/hapus_user.php";}
else
if  ($_GET['hal']=='editor-naskah')
{include "modul/modul_editor/mod_naskah/naskah.php";}
else
if  ($_GET['hal']=='editor-lihat-naskah')
{include "modul/modul_editor/mod_naskah/lihat-naskah.php";}
else
if  ($_GET['hal']=='editor-lihat-review')
{include "modul/modul_editor/mod_review/lihat-review.php";}
else
if  ($_GET['hal']=='editor-review')
{include "modul/modul_editor/mod_review/review.php";}
else
if  ($_GET['hal']=='editor-revisi')
{include "modul/modul_editor/mod_revisi/revisi.php";}
else
if  ($_GET['hal']=='editor-lihat-revisi')
{include "modul/modul_editor/mod_revisi/lihat-revisi.php";}
else
if  ($_GET['hal']=='editor-detail-naskah')
{include "modul/modul_editor/mod_naskah/detail-naskah.php";}
else
if  ($_GET['hal']=='editor-pilih-reviewer')
{include "modul/modul_editor/mod_naskah/pilih-reviewer.php";}
else
if  ($_GET['hal']=='editor-verifikasi-naskah')
{include "modul/modul_editor/mod_naskah/verifikasi-naskah.php";}
else
if  ($_GET['hal']=='editor-update-reviewer')
{include "modul/modul_editor/mod_naskah/update-reviewer.php";}
else
if  ($_GET['hal']=='editor-satker')
{include "modul/modul_editor/mod_satker/satker.php";}
else
if  ($_GET['hal']=='editor-satker-form')
{include "modul/modul_editor/mod_satker/form-satker.php";}
else
if  ($_GET['hal']=='editor-import')
{include "modul/modul_editor/mod_import/import.php";}
else
if  ($_GET['hal']=='editor-edit-data')
{include "modul/modul_editor/mod_import/edit-data.php";}
else
if  ($_GET['hal']=='editor-import-form')
{include "modul/modul_editor/mod_import/form-import.php";}
else
if  ($_GET['hal']=='editor-import-aksi')
{include "modul/modul_editor/mod_import/aksi.php";}
else
if  ($_GET['hal']=='editor-satker-aksi')
{include "modul/modul_editor/mod_satker/aksi.php";}
else
if  ($_GET['hal']=='editor-berkas')
{include "modul/modul_editor/mod_berkas/berkas.php";}
else
if  ($_GET['hal']=='editor-berkas-form')
{include "modul/modul_editor/mod_berkas/form-berkas.php";}
else
if  ($_GET['hal']=='editor-berkas-aksi')
{include "modul/modul_editor/mod_berkas/aksi.php";}
else
if  ($_GET['hal']=='editor-laporan')
{include "modul/modul_editor/mod_laporan/laporan.php";}
else
if  ($_GET['hal']=='editor-laporan-progres')
{include "modul/modul_editor/mod_laporan/form_laporan.php";}
else
if  ($_GET['hal']=='editor-laporan-progres-aksi')
{include "modul/modul_editor/mod_laporan/aksi_laporan.php";}
else
if  ($_GET['hal']=='editor-kirim-email')
{include "modul/modul_editor/mod_laporan/kirim_email.php";}
else
// modul rekomendasi
if  ($_GET['hal']=='editor-rekomendasi-reviewer')
{include "modul/modul_editor/mod_rekomendasi/naskah.php";}
else
if  ($_GET['hal']=='editor-detail-rekomendasi')
{include "modul/modul_editor/mod_rekomendasi/rekomendasi.php";}
else
include 'pages-error-404.php';
?>