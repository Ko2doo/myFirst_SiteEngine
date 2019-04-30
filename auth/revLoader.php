<?
# Подгрузка отзывов из БД в цикле while в ассоциативном массиве
# Вызываем этот скрипт в файле allReviews.php в jquery
$query = mysqli_query($CONNECT, 'SELECT `text`, `uid` FROM `reviews` ORDER BY `id` DESC');

	if ( !mysqli_num_rows($query) ) exit('Список отзывов пуст');

	while ( $row = mysqli_fetch_assoc($query) ) {

		$user = mysqli_fetch_assoc( mysqli_query($CONNECT, "SELECT `email` FROM `users` WHERE `id` = $row[uid]") );

		echo '
			<div class="reviewCard">
				<span class="sendName">Отправитель: '.$user['email'].'</span>
				<p class="reviewsText">
					'.nl2br( htmlspecialchars($row['text']), false).'
				</p>
			</div>
		';

	}

	// Стандартный шаблон для карточек с отзывами
	
	# <div class="reviewCard">
	# 	<span class="sendName">Отправитель: '.$user['email'].'</span>
	# 	<p class="reviewsText">
	# 		'.nl2br( htmlspecialchars($row['text']), false).'
	# 	</p>
	# </div>
?>