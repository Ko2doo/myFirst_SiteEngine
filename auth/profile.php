<?php top( 'Профайл' ) ?>
	
	<h1 class="headline-form">Редактировать</h1>
	<div id="logIn">
		<input type="password" placeholder="Новый пароль" id="password">
		<input type="text" placeholder="Список IP" value="<?=$_SESSION['ip']?>" id="ip">

		<div class="protectOpt">
			<select id="protected">

			<?=str_replace('"'.$_SESSION['protected'].'"', '"'.$_SESSION['protected'].'" selected', '<option value="0">Подтверждение входа ВЫКЛ.</option><option value="1">Подтвеждение входа ВКЛ.</option>')?>
			</select>
		</div>

		<button onclick="post_query('aform', 'edit', 'password.ip.protected')" class="btn-default">Сохранить</button>
	</div>

<?php bottom() ?>
