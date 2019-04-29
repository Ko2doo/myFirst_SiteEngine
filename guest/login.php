<?php top( 'Вход' ) ?>

	<h1 class="headline-form">Вход</h1>
	<div id="formBlock">
		<input type="text" placeholder="Логин" id="email">
		<input type="password" placeholder="Пароль" id="password">
		<input type="text" placeholder="<?captcha_show()?>" id="captcha">
		<button onclick="post_query('gform', 'login', 'email.password.captcha')" class="btn-default">Войти</button>
		<button class="btn-default" onclick="go('recovery')">Восстановить пароль</button>
	</div>


<?php bottom() ?>