<?php 
if ( !$_SESSION['confirm']['code'] ) not_found();
	top( 'Подтверждение' ) 

?>

	<h1 class="headline-form">Подтверждение</h1>
	<div id="formBlock">
		<input type="text" placeholder="Код" id="code">
		<button onclick="post_query('gform', 'confirm', 'code')" class="btn-default">Подтвердить</button>
	</div>


<?php bottom() ?>

