<? top('Все отзывы')?>
<script type="text/javascript" charset="utf-8" async defer>
	// Функция подгрузки контента (без перезагрузки страницы) из файла revLoader.php
	function load_reviews() {
		// body func...
		$.get('/revLoader', function( data ){
			
			// Обработчик данных из БД:
			if ( data == 'empty' ){
			 	$('.reviews').text('История пуста'); // то запишем в него текст что История пуста
			}
			else if ( data != 'end' ){
			 	$('.reviews').append(data);
			}
		
		});

		// в див с классом reviews будем записывать все отзывы из БД
	}

	// вызываем функцию глобально
	jQuery(document).ready(function() {
		load_reviews();
	});

</script>

<h1 class="headline-form">Список отзывов</h1>
<div class="reviews"></div>


<? bottom()?>