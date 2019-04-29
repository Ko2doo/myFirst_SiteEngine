<?php
	// Для просмотра полной карты подлючения используем
	// глобальную переменную $_SERVER в функции var_dump
	if ($_SERVER['REQUEST_URI'] == '/') $page = 'home';
	else{
		$page = substr($_SERVER['REQUEST_URI'], 1);
		// Пишем проверку, чтобы мусор обрезался из строки
		if ( !preg_match('/^[A-z0-9]{3,15}$/', $page) ) exit('error url');
	}

	// подключимся к базе данных
	// Функция: mysql_connect(); имеет несколько параметров
	// 1- знчение нужно узакать хост (локальный или глобальный) 
	// 2- имя базы
	// 3- пароль от БД
	// 4- имя пользователя
	$CONNECT = mysqli_connect('localhost', 'testGen', 'QZjHeVQATGRdLN4', 'testGen');
	if (!$CONNECT) exit('MySQL error');


session_start();

if ( file_exists('all/'.$page.'.php') ) include 'all/'.$page.'.php';
	
	// страница для авторизованных пользователей
# Храним в папке auth страницы и файлы только для авторезированных пользователей!
else if ( $_SESSION['id'] and file_exists('auth/'.$page.'.php') ) include 'auth/'.$page.'.php';
	
	// Для гостей
# Храним в папке guest страницы и файлы только для гостей!
else if ( !$_SESSION['id'] and file_exists('guest/'.$page.'.php') ) include 'guest/'.$page.'.php';
 // Ошибка!
else not_found();

function message( $text ) {
	exit('{ "message" : "'.$text.'"}');
}

function go( $url ) {
	exit('{ "go" : "'.$url.'"}');
}

// Функция для генерирования серкетного ключа для пароля
//Или его восстановления
// Для перемешивания строки случайным образом используем: str_shuffle();
function random_str( $num = 30 ){
	return substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, $num);
}

function not_found() {
	exit('Страница 404');
}

//Нестандартная капча
function captcha_show(){
	// массив с вопросами для капчи
	$questions = array(
		1 => 'Сколько будет 2x2 ?', 
		2 => 'Столица Украины ?', 
		3 => 'Цвет серой кошки ?', 
		4 => 'Луна круглая ?', 
	);

	// Вызываем рандомно один вопрос из капчи
	// используем для этого функцию: mt_rand()
	$numbCaptch = mt_rand( 1, count($questions) );

	//Запишем сгенерированный вопрос в сессию
	$_SESSION['captcha'] = $numbCaptch;

	echo $questions[$numbCaptch];

	// вызов капчи:
	//captcha_show()
}

// Проверка правильности вопроса для капчи
function captcha_valid(){
	// массив с правильными ответами для капчи
	$answers = array(
		1 => '4', 
		2 => 'киев', 
		3 => 'серый', 
		4 => 'да', 
	);

	//Условие для проверки правильности ответа
	// с помощью функции: strtolower() принудительно переводим пользовательский ответ в нижний регистр!
	if ( $_SESSION['captcha'] != array_search( strtolower($_POST['captcha']), $answers) ) {
		message('Упс! ответ не соответствует действительности =(');
	}
}

// Защита от SQL иньекций проверка на валидность пароля и емейла
function email_valid() {
	if ( !filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL) ) {
		message('E-mail указан не верно');
	}
}

// Проверка пароля
function password_valid() {
	if ( !preg_match('/^[A-z0-9]{10,30}$/', $_POST['password']) ) {
		message('Пароль указан не верно и может содержать 10-30 символов A-z0-9');
	}

	//Хэшируем пароль в md5
	$_POST['password'] = md5($_POST['password']);
}


// верх сайта
function top($title) {
	echo '
	<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width,initial-scale=1">
			<title>'.$title.'</title>
				<!-- my stylesheets -->
			<link rel="stylesheet" href="css/libs.min.css">
			<link rel="stylesheet" href="css/main.css">

				<!-- script\'s -onn -->
			<script src="js/libs.min.js"></script>
			<script src="js/script.js"></script>
				<!-- script\'s -off -->
		</head>

		<body>

		<div id="wrapper">
			
			<div class="menu">
				<div class="link-wraper">
					<ul class="list-link">
					<li><a href="/home">Главная</a></li>
					<li><a href="/contact">Обратная связь</a></li>
					';
				
				if ($_SESSION['id']) {
					echo '
						
							<li><a href="/logout">Выход</a></li>
							<li><a href="/profile">Профиль</a></li>
							<li><a href="/history">История</a></li>
					';
				}
				else
					echo '
						<li><a href="/login">Вход</a></li>
						<li><a href="/register">Регистрация</a></li>
						<li><a href="/recovery">Восстановление пароля</a></li>
				';

					echo'
								</ul>
							</div>
						</div>
						<div id="content">
							<div class="block">
					';
}

// Низ сайта
function bottom(){
	echo '
	</div> <!--/end block-->
	</div> <!--/end content-->
	</div> <!--/end wrapper-->
	</body>
	</html>
	';
}
?>