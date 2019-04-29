<?
//Системный файл подгрузки контента


# В переменную #query запишем запрос к базе данных,
# с помощью функции mysqli_query();
# Глобальная переменная $CONNECT коннектит нас с БД.
# Далее извлекаем из БД с помощью (SELECT) указываем параметр для извлечения в нашем случае `text`
# Извлекаем из (FROM) таблицы `history`
# Выстовляем лимит командой (LIMIT)
# Модернизируем LIMIT так чтобы при каждом запросе на страницу выводило по 2 записи из БД
# Для этого используем: '.$_SESSION['loader'].', 2
# после + идет число 2 это означает что будет выведено 2 записи из БД
$query = mysqli_query($CONNECT, 'SELECT `text` FROM `history` LIMIT '.$_SESSION['loader'].', 2');

// функция mysqli_num_rows(); возвращает кол-во извлеченных столбцов из БД
# Условие если в БД ничего не находится то завершаем его
# командой exit;
if ( !mysqli_num_rows($query) ) {

	# Проверим сессию если она пустая (ровняется 0)
	# то пишем что таблица пустая ('empry')
	if ($_SESSION['loader'] == 0) exit('empty');
	# если нет, то это значит конец списка и напишем ('end')
	else exit('end');

	exit;
}


# перед циклом запишем сколько новостей мы будем подгружать:
$_SESSION['loader'] += 2;

# если все хорошо с помощью асоциативного массива выводим данные из таблицы
# обернутые в div с классом textBox с тегом a для текста

# Шаблон для всех новостных карточек:
	// <div id="internalContent">
	// 	<article class="textBox">
	// 		<div class="boxHeader">
	// 			<img src="img/demka.png">
	// 		</div>

	// 		<div class="boxBody">
	// 			<a href="#">
					
	// 			</a>
	// 		</div>
	// 	</article>

while ( $row = mysqli_fetch_assoc($query) ) {
	echo '
	<article class="textBox">
	<div class="boxHeader">
		<img src="img/demka.png">
	</div>
	<div class="boxBody">
		<a href="#">
	'
	 
	 .$row['text'].

	 '
	 </a>
	 </div>
	 </article>
	 ';
}


	

?>