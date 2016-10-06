<?
include("phpmailer/class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->CharSet = 'UTF-8';
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth= true;
$mail->Port = 465; // Or 587
$mail->Username= 'icang88@gmail.com';
$mail->Password= '10215410884';
$mail->SMTPSecure = 'ssl';
?>
