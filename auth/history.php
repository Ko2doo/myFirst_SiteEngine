<?
 top( 'История' );
	// запишем сессию передадим loader.php и зададим 0
 # т.е. при каждом обновлении страницы, страница будет очищаться
	$_SESSION['loader'] = 0;

 ?>
<script type="text/javascript" charset="utf-8" async defer>
	// Функция подгрузки контента (без перезагрузки страницы) из файла loader.php
	function load_history() {
		// body func...
		$.get('/loader', function( data ){
			

			// Обработчик данных из БД:
			if ( data == 'empty' ){
			 	$('#internalContent').text('История пуста'); // то запишем в него текст что История пуста
			}
			else if ( data != 'end' ){
			 	$('#internalContent').append(data);
			}
		
		});
	}

	// вызываем функцию глобально,
	jQuery(document).ready(function() {
		load_history();
	});

</script>




<div id="internalContent"></div>

<button onclick="load_history()" class="btn-default btn-more">Показать еще..</button>

<?php bottom() ?>