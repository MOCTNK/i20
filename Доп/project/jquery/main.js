$('document').ready( function() {

	function clearError() {
		$('#error-1').html("");
		$('#input-1').css("border-color", "#EBEBEB");
		$('#error-2').html("");
		$('#input-2').css("border-color", "#EBEBEB");
		$('#error-3').html("");
		$('#error-4').html("");
		$('#error-5').html("");
		$('#input-3').css("border-color", "#EBEBEB");
		$('#error-6').html("");
		$('#input-4').css("border-color", "#EBEBEB");
	}

	function checkErrors(data) {
		$error = data.split(".");
		if(parseInt($error[1]) == 1) {
			$('#error-1').html("Поле пусто или некорректный ввод данных. Имя должно содержать только буквы и иметь размер от 3 до 50 символов");
			$('#input-1').css("border-color", "red");
		}
		if(parseInt($error[2]) == 1) {
			$('#error-2').html("Поле пусто или некорректный ввод данных. Email должен содержать символ @ и иметь вид: pochta@mail.ru");
			$('#input-2').css("border-color", "red");
		}
		if(parseInt($error[3]) == 1) {
			$('#error-3').html("Выберите год рождения");
		}
		if(parseInt($error[4]) == 1) {
			$('#error-4').html("Выберите пол");
		}
		if(parseInt($error[5]) == 1) {
			$('#error-5').html("Поле пусто или некорректный ввод данных. Поле должно содержать только буквы и символы ,.!?-_, а так же максимальное количество символов 255");
			$('#input-3').css("border-color", "red");
		}
		if(parseInt($error[6]) == 1) {
			$('#error-6').html("Поле пусто или некорректный ввод данных. Поле должно содержать только буквы и символы ,.!?-_, а так же максимальное количество символов 1000");
			$('#input-4').css("border-color", "red");
		}
	}

	function insertData() {
		var form = $('#form');
		$.ajax({
			url: '/ajax/insert_data.php',      
			method: 'POST',                    
			data: form.serialize(),    
			success: function(data){  
				if(parseInt(data) == 0) {
					alert("Запись отправлена!");
					$(location).attr('href',"/");
				}
				if(parseInt(data) == 1) {
					checkErrors(data);
				}     
				if(parseInt(data) == 2) {
					alert("Данные не заданы!");
					$(location).attr('href',"/");
				} 
			}
		});
	}

	$('#send').click(function(e) {
		e.preventDefault();
		if($('#input-5').prop('checked')) {
			$('#inputc-5').css("color", "#555555");
			clearError();
			insertData();
		} else {
			$('#inputc-5').css("color", "red");
		}
	});
}); 