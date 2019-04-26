<?php top( 'Восстановление пароля' ) ?>


	<h1 class="headline-form">Восстановление пароля</h1>
	<div id="logIn" method="post" accept-charset="utf-8">
		<input type="text" placeholder="E-mail" id="email">
		<input type="text" placeholder="<?captcha_show()?>" id="captcha">
		<button onclick="post_query('gform', 'recovery', 'email.captcha')" class="btn-default">Восстановление</button>
	</div>


<?php bottom() ?>

