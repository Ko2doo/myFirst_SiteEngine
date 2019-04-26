<?php top( 'Регистрация' ) ?>


	<h1 class="headline-form">Регистрация</h1>
	<div id="logIn">
		<input type="text" placeholder="Логин" id="email">
		<input type="password" placeholder="Пароль" id="password">
		<input type="text" placeholder="<?captcha_show()?>" id="captcha">
		<button onclick="post_query('gform', 'register', 'email.password.captcha')" class="btn-default">Регистрация</button>
	</div>


<?php bottom() ?>

