<? top('Все отзывы')?>
<script type="text/javascript" charset="utf-8" async defer>
	// Функция подгрузки контента (без перезагрузки страницы) из файла revLoader.php
	function load_reviews() {
		// body func...
		$.get('/revLoader', function(loadRev){
			
			// Обработчик данных из БД:
			if ( loadRev == 'empty' ){
			 	$('.reviews').text('История пуста'); // то запишем в него текст что История пуста
			}
			else if ( loadRev != 'end' ){
			 	$('.reviews').append(loadRev);
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