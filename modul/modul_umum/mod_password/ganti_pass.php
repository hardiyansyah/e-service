<?php
include "cek_login.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Halaman Ganti Password Administrator</title>
</head>

<body>
<form id="gantipass" name="gantipass" method="post" action="proses_ganti.php">
  <label>Username anda
  <input type="text" name="user" value="<?=$_SESSION["valid_user"];?>" />
  </label>
  <p>
    <label>Password baru
    <input type="password" name="newpass" />
    </label>
  </p>
  <p>
    <label>
    <input name="kirim" type="submit" id="kirim" value="kirim" />
    </label>
  </p>
</form>
<p>&nbsp;</p>
</body>
</html>
<center>[<a href="admin.php">Kembali</a>]</center>
