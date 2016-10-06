    <ul class="breadcrumb push-down-0">
                    <li><a href="#">Editor</a></li>
                    <li class="active">Import Data Peneliti</li>
                </ul>
<?php
$uploadedStatus = 0;


if ( isset($_FILES["file"])) {
//if there was an error uploading the file
if ($_FILES["file"]["error"] > 0) {
echo "";
}
else {
if (file_exists($_FILES["file"]["name"])) {
unlink($_FILES["file"]["name"]);
}
$storagename = "data_upload/datates.xlsx";
move_uploaded_file($_FILES["file"]["tmp_name"],  $storagename);
$uploadedStatus = 1;
}
} else {
echo "";
}


?>
<div class="content-frame-body">
            
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Upload Data Peneliti</h3>
					<form action="<?php echo 'media.php?hal=editor-import-form'?>" method="post" enctype="multipart/form-data">
						<div class="col-md-12">
						<input type="file" name="file" id="file" multiple class="file" data-preview-file-type="any"/>
						</div>
					</form>
				</div>
			</div>
			<?if($uploadedStatus==1){
				echo "<tr><td ><center<b>Data Bershasil di Upload, Import Data Peneliti Ke Database <a href='http://localhost/me/e-service/config/import/import.php'>Klik Disini</a> </b></center></td></tr></table>";
			}?>  
		</div>
	</div>       
</div>