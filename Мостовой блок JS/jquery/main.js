$('document').ready( function() {

	// ----------- "Слайдер" -------------

	// Задает ссылку картинке
	function setSrc(inObj, toObj) {
		var inSrc = $(inObj).attr("src");
		$(toObj).attr("src", inSrc);
	}

	// При наведении заменяет картинку
	$(".product__slaider-image").mouseover(function() {
		var id = $(this).attr('id');
		setSrc("#"+id, "#product");
	});

	// При отведении возвращает на стандартную
	$(".product__slaider-image").mouseout(function() {
		setSrc("#slaider-image-1", "#product");
	});


	// ----------- Счетчик -------------

	// Нажатие на '-'
	$("#counter-minus").click(function() {
		var value = parseInt($("#counter-count").val());
		if(isNaN(value)) {
			value = 1;
		}
		if(value > 1) {
			value--;
		}
		$("#counter-count").val(value);
	});

	// Нажатие на '+'
	$("#counter-plus").click(function() {
		var value = parseInt($("#counter-count").val());
		if(isNaN(value)) {
			value = 1;
		}
		value++;
		$("#counter-count").val(value);
	});

	// Нажатие на 'Купить'
	$("#buy").click(function() {
		var value = parseInt($("#counter-count").val());
		if(isNaN(value)) {
			value = 1;
		}
		$.notice("В корзину добавлено  "+value+"  товаров"); // Библиотека notice
	});
}); 