<?
if ($_POST['contact_f']) {
	//captcha_valid();
	email_valid();

	# Если в сообщении 10 символов выводим сообщение с ошибкой!
	if (strlen($_POST['message']) < 10 or strlen($_POST['message']) > 350 ) {
		message('Длина сообщения должна состовлять 10-350 символов');
	}

	mail('ko2doodev@gmail.com', 'Обращение в службу поддержки', 'E-mail отправителя: <b>'.$_POST['email'].'</b><p>'.htmlspecialchars($_POST['message']).'</p>');


	message('Сообщение отправлено');
}

?>