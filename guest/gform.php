<?

 //Подтверждаем вход по email:
function go_auth($data){
	//в цикле записываем данные из БД в сессию нашего пользователя:
	foreach ($data as $key => $value){
		$_SESSION[$key] = $value;
	}

	go('profile');
}


if ($_POST['login_f']) {
	//Проверяем авторизован ли пользователь:
		//captcha_valid();
		email_valid();
		password_valid();

		//Запишем условие для проверки аккаунта и введенного пароля:
	if( !mysqli_num_rows(mysqli_query($CONNECT, "SELECT `id` FROM `users` WHERE `email` = '$_POST[email]' AND `password` = '$_POST[password]'")) )
		message('Аккаунт не найден');

	//извлекаем все поля из БД и создаем асоциативный массив с мопощью: mysqli_fetch_assoc();
	$row = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT * FROM `users` WHERE `email` = '$_POST[email]'"));

	# Проверка для ip адреса:
	if ($row['ip']) {
		# разбиваем массив
		$arr = explode(',', $row['ip']);

			# Запишем условие:
			# Если в нашем массиве не найден ip адрес,
			# то выводим сообщение с ошибкой авторизации
			if ( !in_array($_SERVER['REMOTE_ADDR'], $arr) ) {
				message("Упс! доступ запрещен для этого IP");
			}
					
	}

	# Условие для авторизации с помощью отправки кода на email
	if ( $row['protected'] == 1 ) {

		$code = random_str(5);

		$_SESSION['confirm'] = array(
			'type' => 'login',
			'data' => $row,
			'code' => $code,
			);

	 mail($_POST['email'], 'Подтверждение входа', "Код подтверждения входа: <b>$code</b>");

	 go('confirm');
	}

	go_auth($row);

}

// Редиректим на страницу входа
else if ($_POST['register_f']) {
	//captcha_valid();
	email_valid();
	password_valid();

	//Проверка дублированных email
	if( mysqli_num_rows(mysqli_query($CONNECT, "SELECT `id` FROM `users` WHERE `email` = '$_POST[email]'")) )
		message('Этот E-mail занят!');

	$code = random_str(5);

	$_SESSION['confirm'] = array(
		'type' => 'register',
		'email' => $_POST['email'],
		'password' => $_POST['password'],
		'code' => $code,
	);

	mail($_POST['email'], 'Регистрация', "Код подтверждения регистрации: <b>$code</b>");

	go('confirm');
}

//восстаовление пароля
else if ($_POST['recovery_f']) {
	email_valid();
	//captcha_valid();

	//Проверяем есть ли емейл в базе если нет то выводим аккаунт не найден
	if( !mysqli_num_rows(mysqli_query($CONNECT, "SELECT `id` FROM `users` WHERE `email` = '$_POST[email]'")) )
		message('Аккаунт не найден!');

	$code = random_str(5);

	$_SESSION['confirm'] = array(
		'type' => 'recovery',
		'email' => $_POST['email'],
		'code' => $code,
	);

	mail($_POST['email'], 'Восстановление пароля', "Код подтверждения восстановления пароля: <b>$code</b>");

	//редирект на страницу подтверждения
	go('confirm');


	message('Всё Ок');
}

else if ($_POST['confirm_f']) {

	if ( $_SESSION['confirm']['type'] == 'register') {
		
		// Проверка кода! который присылается в на почту
		if ( $_SESSION['confirm']['code'] != $_POST['code'] )
			message('Код подтверждения регистрации указан неверно');

		// записываем пользователей в mysql
		mysqli_query($CONNECT, "INSERT INTO `users` (`email`, `password`) VALUES ('".$_SESSION['confirm']['email']."', '".$_SESSION['confirm']['password']."', '', 0)");

			go('login');
	}

	//Условие для восстановления пароля:
	else if ( $_SESSION['confirm']['type'] == 'recovery') {
		//переменная $newpass которая рандомно подбирает новый пароль из 15символов

		// Проверка кода! который присылается в на почту
		if ( $_SESSION['confirm']['code'] != $_POST['code'] )
			message('Код подтверждения регистрации указан неверно');

		$newpass = random_str(15);

		// записываем пользователей в mysql
		mysqli_query($CONNECT, 'UPDATE `users` SET `password` = "'.md5($newpass).'" WHERE `email` = "'.$_SESSION['confirm']['email'].'"');
		unset($_SESSION['confirm']);

		//выводим сообщение с паролем
		message("Ваш новый пароль: $newpass");
	}

	# Отправим на email код подтверждения
	else if ( $_SESSION['confirm']['type'] == 'login'){
		// Проверка кода! который присылается в на почту
		if ( $_SESSION['confirm']['code'] != $_POST['code'] )
			message('Код подтверждения регистрации указан неверно');
			go_auth($_SESSION['confirm']['data']);
	}

	else not_found();
}


?>