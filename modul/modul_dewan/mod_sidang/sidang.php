 <style type="text/css">
table {
	font: 12px/24px Verdana, Arial, Helvetica, sans-serif;
	border-collapse: collapse;
	width: 930px;
	margin:0 auto;
	}

th {
	border: 1px solid #CCC;
	padding: 0 0.5em;
	text-align: center;
	background-color:#1994c3
	}
td {
	border: 1px solid #CCC;
	padding: 0 0.5em;
	background-color:#d6eef7;
	}
h1 {
	color:#003300;
	font:22px "Trebuchet MS";
	text-align:center;
}
</style>
<link rel="stylesheet" type="text/css" />
<script type="text/javascript" </script>
	<script type="text/javascript"</script>
	<script type="text/javascript">
		$(function() {
		$( "#input,#input2" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
		});
	</script>
<script type="text/javascript">var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-3674746-17']);  _gaq.push(['_trackPageview']); (function() {  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true; ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })(); </script>
 <?php
 $aksi="modul/mod_review/aksi_review.php";
switch($_GET['aksi']){
default:

echo"
<hr>
<div role='main' class='container checkout'>
        <div class='row'>
          <div class='span5'>
         
            <h1>Review Naskah</h1>";
			
			
             echo"
			 <table cellpadding='0' rules='all' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    
                                    <th >No.</th>
                                    <th >Judul</th>
                                    <th >Kategori</th>
                                    <th>Tanggal</th>
									<th>Manage Editor</th>
									<th>Status</th>
									
                                </tr>
                            </thead>
                            <tbody>";
							$user = $_SESSION['namauser'];
$tampil= mysql_query("SELECT * FROM users WHERE username ='$user'");
$cc=mysql_fetch_array($tampil);

							$tp=mysql_query("SELECT * FROM naskah WHERE reviewer1='$cc[id_users]'");
							$no = $posisi+1;
							while($r=mysql_fetch_array($tp)){
							$harga=format_rupiah($r[harga]);
							
$tampilr1= mysql_query("SELECT * FROM admins WHERE id_editor='$r[editor]'");
$r1=mysql_fetch_array($tampilr1);
 
$tgl1=tgl_indo($r[tanggal]);

                             echo"<tr>
                                   
                                    <td>$no</td>
                                    <td><a href='?hal=review&aksi=monitoring&id=$r[id_naskah]'>$r[judul]</a></td>
                                    <td>$r[kategori]</td>
									<td>$tgl1</td>
									<td>$r1[nama_lengkap]</td>
									
									<td>$r[status]</td>
									
                                    
                                    
                                </tr>";
								$no++;
							}
                               
                                        
                        echo"</tbody>
                        </table>
			 
           
          </div>
          
         
        </div>
      </div>    

";
break;
case "monitoring":
echo"
<hr/>
      <div role='main' class='container checkout'>
        <div class='row'>
        
          ";
			

$tampilnaskah= mysql_query("SELECT * FROM naskah WHERE id_naskah ='$_GET[id]'");
$tn=mysql_fetch_array($tampilnaskah);
echo"
          
      <div class='span9 checkout-list'>
	  
             <form method='POST' action='$aksi?aksi=input2' enctype='multipart/form-data' style='padding-left: 15px;'>
		  
		 
          <table class='list'>
		  
		  <tr><th colspan='2'>Detail Naskah</th> </tr>
		  
		  <tr><td>Judul</td>     <td> : $tn[judul]</td></tr>
		  
		   <tr><td>Kategori Naskah</td>     <td> : $tn[kategori]</td></tr>
		    <tr><td>Abstrack</td><td> :<textarea name='alamat' cols='100'  rows='8' tabindex='4'>$tn[abstrak]</textarea></td></tr>
			 <tr><td></td></tr>   
			<tr><td>File Naskah</td><td><a href ='../../files/$tn[file]'target='_blank'>Download</a></td></tr>
			
          <tr><td colspan=2>
          </td></tr>
		  </table></form>
		  <form method='POST' action='$aksi?aksi=input2' enctype='multipart/form-data' style='padding-left: 15px;'>	
				<table class='list'>
				 <thead>
							<tr>
								<th colspan='5'>Hasil Revisi</th>
									
                                </tr>
                                <tr>
								<th>Tanggal Pengiriman</th>
								<th>Status</th>
								<th>Nama File</th>
								<th>Hasil Telaah</th>
								<th>Download File</th>
									
                                </tr>
                            </thead>
                            <tbody>";
							

							$revisi=mysql_query("SELECT * FROM revisi WHERE id_naskah='$_GET[id]' ORDER BY status ASC");
							$revnaskah=mysql_query("SELECT * FROM review WHERE id_naskah='$_GET[id]' ORDER BY status ASC");
							while($tr=mysql_fetch_array($revisi) and $rev=mysql_fetch_array($revnaskah)){
							
							
$tgl2=tgl_indo($tr[tanggal]);
$tgl3=tgl_indo($rev[tanggal]);
					
                             echo"<tr>
                                   
                                    <td >$tgl2</td>
                             
                                    <td>revisi &nbsp ke &nbsp $tr[status]</td>
									
									<td>$tr[file_revisi]</td>
									<th rowspan='2'><input type=submit value=Lihat></th>
									
									<th><input type=submit value=Download></th>
								    
                                </tr>
								<tr>
                                   
                                    <td >$tgl3</td>
                             
                                    <td>review &nbsp ke &nbsp $rev[status]</td>
									
									<td>$rev[file_rev]</td>
									
									<th><input type=submit value=Download></th>
								    
                                </tr>
								<tr>
								<th colspan='5'>--</th>
									
                                </tr>";
							}
                                       
                        echo"</tbody>
				</table></form>
          <form method='POST' action='$aksi?aksi=input2' enctype='multipart/form-data' style='padding-left: 15px;'>	
				<table class='list'>
				 <thead>
							<tr>
								<th colspan='5'>Hasil Revisi Terakhir</th>
									
                                </tr>
                                <tr>
								<th>Tanggal Pengiriman</th>
								<th>Status</th>
								<th>Nama File</th>
								<th>Hasil Telaah</th>
								<th>Download File</th>
									
                                </tr>
                            </thead>
                            <tbody>";
							
$revnaskah=mysql_query("SELECT * FROM revisi WHERE id_naskah='$_GET[id]'");
$rev=mysql_fetch_array($revnaskah);
$jum=mysql_num_rows(mysql_query("select * from revisi where id_naskah='$rev[id_naskah]'"));
$revn=mysql_query("SELECT * FROM revisi WHERE id_naskah='$_GET[id]' and status='$jum'");
$rr=mysql_fetch_array($revn);
							
$tgl2=tgl_indo($rr[tanggal]);
					
                             echo"
								<tr>
                                   
                                    <td >$tgl2</td>
                             
                                    <td>revisi &nbsp ke &nbsp $rr[status]</td>
									
									<td>$rr[file_revisi]</td>
									<th rowspan='2'><input type=submit value=Lihat></th>
									
									<th><input type=submit value=Download></th>
							
                                </tr>
								
								";
							            
                        echo"</tbody>
				</table></form>

 						<form method='POST' action='?hal=review&aksi=upload&id=$_GET[id]' enctype='multipart/form-data' style='padding-left: 15px;'>	
				<table class='list'>
				<th colspan='4'>Upload File Yang Telah Direview</th>
				<th><input type=submit value=Upload></th>
				</table></form>
					
          </div>
        
        </div>
      </div>    ";
	  //////////
	 
break;
case "upload":
echo"
<hr/>
      <div role='main' class='container checkout'>
        <div class='row'>
        
          ";
			

$tampilnaskah= mysql_query("SELECT * FROM naskah WHERE id_naskah ='$_GET[id]'");
$tn=mysql_fetch_array($tampilnaskah);
$tampiluser= mysql_query("SELECT * FROM users WHERE id_users='$tn[id_users]'");
$tu=mysql_fetch_array($tampiluser);

echo"
          
       <div class='span9 checkout-list'>
	 
              <form method='POST' action='$aksi?hal=review&act=uploadrev' enctype='multipart/form-data' style='padding-left: 15px;'>
		   <input type=hidden name=id value='$tn[id_naskah]'>
		    <input type=hidden name=id1 value='$tn[reviewer1]'>
			<input type=hidden name=iduser value='$tu[id_users]'>
			<input type=hidden name=isi value='naskah anda dengan judul $tn[judul] telah selesai di review, silahkan cek di halaman naskah'>
";
			 $jmlrev=mysql_num_rows(mysql_query("select * from review where id_naskah='$tn[id_naskah]'"));
			
        echo"  
		<input type=hidden name=id2 value='$jmlrev'>
		
          <table class='list'>
		
		  <tr><th colspan='3'>Upload Hasil Review</th> </tr>
		  
		 <tr><td>Upload File Review</td><td> : <input type=file name='fupload' size=40> </td><td>*</td></tr>
		  
		   <tr><td colspan='2'></td><th><input type=submit value=Telaah>
		    
          </th></tr>
			
			<tr><th colspan='3'>Keterangan</th> </tr>
			
			<tr> <td>* &nbsp </td><td colspan='2'>: &nbsp File Harus Berformat .doc (Word Dokumen)</td></tr>

		   <tr><th><input type=submit value=Back></th><td colspan='2'></td></tr>
          
          </table></form>
          </div>
        
        </div>
      </div>    ";
       }            
 ?>