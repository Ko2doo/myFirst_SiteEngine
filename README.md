# логин и пароль от локальной базы данных

* лониг: testGen
* пароль: QZjHeVQATGRdLN4

база данных: testGen

# Гости и авторизированные пользователи:

Существует два типа пользователей сайта:
* Гости
* Авторизированные

# В функции top прописано условие для авторизированных и гостей:
<code>
	// Если пользователь зарегистрирован покажем ему слудающие ссылки:
	if ($_SESSION['id']) {
	echo '
		
			<li><a href="/">Главная</a></li>
			<li><a href="/profile">Профиль</a></li>
			<li><a href="/history">История</a></li>
	';
	}
	// Если это гость, то покажем ему следующее:
	else
		echo '
			<li><a href="/">Главная</a></li>
			<li><a href="/login">Вход</a></li>
			<li><a href="/register">Регистрация</a></li>
			<li><a href="/recovery">Восстановление пароля</a></li>
	';
</code>

# разбор кода в файле: history.php

<code>
	<script type="text/javascript" charset="utf-8" async defer>
		
		// Функция подгрузки контента (без перезагрузки страницы) из файла loader.php
		// загружает по 2 записи
		function load_history() {
			// body func...
			$.get('/loader', function( data ){
				// Выводим в id internalContent контент из БД
				// функция append(); добавляет контент к блоку
				

				// Обработчик данных из БД:

				// если у нас данные пришли (empty)
				if ( data == 'empty' ){
				 	$('#internalContent').text('История пуста'); // то запишем в него текст что История пуста
				}

				// Запишем второй обработчик для конца списка
				// если у нас data не ровняется end то дописываем в див (#internalContent) данные полученные из php скрипта
				// Т.е. то что находится в таблице
				else if ( data != 'end' ){
				 	$('#internalContent').append(data);
				}
			
			});
		}

		// вызываем функцию глобально,
		// т.е. чтобы контент сразу отображался на странице без нажатия на кнопку
		jQuery(document).ready(function() {
			load_history();
		});

	</script>
</code>

# Добавлена настройка защиты авторизации по email

 В БД записывается результат выбора пользователя
* Включить подтверждение входа это всегда (1)
* Выключить подтверждение входа это всегда (0)

# Автовыбор опций:
С помощью str_replace(); мы ищем в сессии выбор пользователя, и результат записываем в опции
<code>
	
	<select id="protected">
	<?=str_replace('"'.$_SESSION['protected'].'"', '"'.$_SESSION['protected'].'" selected', '<option value="0">Выключить подтвеждение входа</option><option value="1">Включить подтвеждение входа</option>')?>
	</select>

</code>

# Добавлена функция отправки кода подтверждения на email юзернейма для авторизации на сайте
Функцию можно включить или отключить в настройках профиля юзернейма

# ссылки на учебные материалы:

Огромное спасибо каналу: https://www.youtube.com/channel/UCpEWlcj5rkU1H9vkIf9Lb5g 
За этот прекрасный видеокурс по php
