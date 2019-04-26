<?
if ( $_POST['edit_f'] ) {

	if ( $_POST['password'] and md5($_POST['password']) != $_SESSION['password'] ) {

		password_valid();
		# Инжектим в БД новый пароль
		# тут проверка по id который берется из БД
		//mysqli_query($CONNECT, "UPDATE `users` SET `password` = '$_POST[password]' WHERE `id` = '$_SESSION[id]'");

		# тут в конце идет проверка сессии по емейлу юзернейма.
		mysqli_query($CONNECT, "UPDATE `users` SET `password` = '$_POST[password]' WHERE `email` = '$_SESSION[email]'");
		
	}

	//message('Пароль успешно обновлен');

	// Условие для вывода ip в свой профиль
	if ( $_POST['ip'] != $_SESSION['ip'] ) {

		if ($_POST['ip']) {
			# разбиваем ip адреса на массив
			$arr = explode(',', $_POST['ip']);

				# Проверяем массив:
				# Можем добавить от 1го до пяти IP адресов
				if ( count($arr) <= 0 or count($arr) > 4 ) {
					message('Лимит 1 - 5 IP');
				}

				# Зададим цикл
				foreach ($arr as $key => $value) {
					# перебираем полученный IP адрес из массива,
					# если false то выводим ошибку
					if (!filter_var($value, FILTER_VALIDATE_IP)) {
						message("IP $value указан неверно");
					}
				
					# В нашу секцию IP записываем данные из формы
					# и сохраняем в сессию
					$_SESSION['ip'] = $_POST['ip'];

				}

		}	else $_SESSION['ip'] = '';
		
		// Берем ip из сессии и добавляем ip в БД
		mysqli_query($CONNECT, "UPDATE `users` SET `ip` = '$_SESSION[ip]'");
	}

	# проверка для защиты подтверждение входа по email-у:
	# для начала проверяем на момент одинаковых данных
	if ( $_POST['protected'] != $_SESSION['protected'] ) {
		
		# второе развитие:
		if ( $_POST['protected'] == 1 ){
			$_SESSION['protected'] = 1;
		}else{
			$_SESSION['protected'] = 0;
		}

		# Запрос к БД:
		mysqli_query($CONNECT, "UPDATE `users` SET `protected` = $_SESSION[protected] WHERE `id` = '$_SESSION[id]'");


	}

	# Если все хорошо выводим:
	message('Сохранено');
}





?>