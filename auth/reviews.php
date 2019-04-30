<?php top( 'Отзывы' ) ?>

	<h1 class="headline-form">Отзывы</h1>
	<div id="contactMe">
	<span class="mailName">Укажите E-mail:</span>
	<input type="text" placeholder="E-mail" value="<?=$_SESSION['email']?>" id="email">
	<span class="messTitle">Введите сообщение:</span>
		<textarea id="message" placeholder="текст сообщения" required></textarea>
		<button onclick="post_query('add', 'reviews', 'email.message')" class="btn-default">Добавить отзыв</button>
	</div>


<?php bottom() ?>