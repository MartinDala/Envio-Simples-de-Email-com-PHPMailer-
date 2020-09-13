<?php

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');


$email=$_POST['email'];
$titulo=$_POST['titulo'];
$corpo=$_POST['corpo'];
if($email=="" ||$titulo=="" || $corpo==""){
    echo "Preencha os dados";
}else{

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
	#$mail->SMTPDebug = SMTP::DEBUG_SERVER;
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'martindala40@gmail.com';
	$mail->Password = 'Elsamina2019';
	$mail->Port = 587;

	$mail->setFrom('martindala40@gmail.com');
	$mail->addAddress($email);


	$mail->isHTML(true);
	$mail->Subject = $titulo;
	$mail->Body = '<strong>'.$corpo.'</strong>';
	$mail->AltBody = 'HB SMART-Tecnologia Inteligente';

	if($mail->send()) {
		echo 'Email enviado com sucesso';
	} else {
		echo 'Email nao enviado';
	}
} catch (Exception $e) {
	echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}
