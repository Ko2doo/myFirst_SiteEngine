<?php top( 'Обратная связь' ) ?>

	<h1 class="headline-form">Обратная связь</h1>
	<div id="contactMe">
	<span class="mailName">Укажите E-mail:</span>
	<input type="text" placeholder="E-mail" value="<?=$_SESSION['email']?>" id="email">
	<span class="messTitle">Введите сообщение:</span>
		<textarea id="message" placeholder="текст сообщения" maxlength="350" required></textarea>
		<input type="text" placeholder="<?captcha_show()?>" id="captcha">
		<button onclick="post_query('mail', 'contact', 'email.message.captcha')" class="btn-default">Отправить сообщение</button>
	</div>


<?php bottom() ?>