<?
# Тут обрабатывается запрос отправленный ajax ом

if ($_POST['reviews_f']) {
	
	# Ставим ограничение на кол-во отправляемых пользователями символов
	if (strlen($_POST['message']) < 10 or strlen($_POST['message']) > 400 ) {
		message('Длина сообщения должна состовлять 10-400 символов');
	}

	# запишем в переменную то что должно инжектиться в БД
	$injectReviews = 'INSERT INTO `reviews` (`uid`, `text`) VALUES ("'.$_SESSION['id'].'", "'.mysqli_real_escape_string($CONNECT, $_POST['message']).'")';

	# Записываем в БД
	mysqli_query($CONNECT, $injectReviews);

		//message('Сообщение отправлено');

		# редиректим на страницу с отзывами
		go('allReviews');
}

?>