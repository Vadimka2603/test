
<head>
	<link rel="stylesheet" type="text/css" href="/adm/css/users.css">
	<!-- Подключение библиотеки jQuery -->
	<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
	<!-- Подключение jQuery плагина Masked Input -->
	<script type="text/javascript" src="/js/jquery.maskedinput.min.js"></script>
</head>

<?php

?>

<form class="usr-tabs">
	<fieldset>
		<legend>
			Ф.И.О.
		</legend>
		<ul>
			<li>
				<label for="family" class="usrl">
					Фамилие:
				</label>
				<input name="family" class="usri">
			</li>
			<li>
				<label for="names" class="usrl">
					Имя:
				</label>
				<input name="names" class="usri" />
			</li>

			<li>
				<label for="otch" class="usrl">
					Отчество:
				</label>
				<input name="otch" class="usri" />
			</li>
		</ul>
	</fieldset>
		
	<fieldset id="pd">
		<legend>
			Паспортные данные
		</legend>
		<ul>
			<li>
				<label for="pass_s" class="usrl">
					Серия:
				</label>
				<input name="pass_s" class="usri" />
			</li>
			<li>
				<label for="pass_n" class="usrl">
					Номер:
				</label>
				<input name="pass_n" class="usri" />
			</li>
			<li>
				<label for="pass_o" class="usrl">
					Кем:
				</label>
				<input name="pass_o" class="usri" />
			</li>
			<li>
				<label for="pass_с" class="usrl">
					Код подразделения:
				</label>
				<input name="pass_с" class="usri" />
			</li>
			<li>
				<label for="pass_d" class="usrl">
					Когда:
				</label>
				<input type="date" name="pass_d" class="usri" />
			</li>
		</ul>
	</fieldset>

	<fieldset>
		<legend>
			Дата рождения:
		</legend>
		<ul>
			<li>
				<label for="u_date" class="usrl">
					Дата рождения:
				</label>
				<input type="date" name="u_date" class="usri" />
			</li>
		</ul>
	</fieldset>

	<fieldset>
		<legend>
			ИНН и ПФР
		</legend>
		<ul>
			<li>
				<label for="inn" class="usrl">
					ИНН:
				</label>
				<input id="inn" name="inn" class="usri" />
			</li>
			<li>
				<label for="pfr" class="usrl">
					ПФР:
				</label>
				<input id="pfr" name="pfr" class="usri" />
			</li>
		</ul>
	</fieldset>
	<fieldset id="apr">
		<legend>
			Адрес Прописки
		</legend>
		<ul>
			<li>
				<label for="index_f" class="usrl">
					Индекс:
				</label>
				<input id="index_f" name="inn" class="usri" />
			</li>
			<li>
				<label for="cntr_f" class="usrl">
					Страна:
				</label>
				<input id="cntr_f" name="cntr_f" class="usri" />
			</li>
			<li>
				<label for="reg_f" class="usrl">
					Регион:
				</label>
				<input id="reg_f" name="reg_f" class="usri" />
			</li>
			<li>
				<label for="rag_f" class="usrl">
					Район:
				</label>
				<input id="rag_f" name="rag_f" class="usri" />
			</li>
			<li>
				<label for="nast_f" class="usrl">
					Тип Населенного пункта:
				</label>
				<select id="nast_f" name="nast_f" class="usri" >
					<!-- заполняется в js -->
				</select>
			</li>
			<li>
				<label for="nas_f" class="usrl">
					Населенный пункт:
				</label>
				<input id="nas_f" name="nas_f" class="usri" />
			</li>
			<li>
				<label for="ult_f" class="usrl">
					Тип улицы:
				</label>
				<select id="ult_f" name="ult_f" class="usri" >
					<!--заполняется в js-->
				</select>
			</li>
			<li>
				<label for="ul_f" class="usrl">
					Улица:
				</label>
				<input id="ul_f" name="ul_f" class="usri" />
			</li>
			<li>
				<label for="ndom_f" class="usrl">
					Номер дома:
				</label>
				<input id="ndom_f" name="ndom_f" class="usri" />
			</li>
			<li>
				<label for="tstr_f" class="usrl">
					Тип строения:
				</label>
				<select id="tstr_f" name="tstr_f" class="usri" >
					
				</select>
			</li>
			<li>
				<label for="nstr_f" class="usrl">
					Номер строения:
				</label>
				<input id="nstr_f" name="nstr_f" class="usri" />
			</li>
			<li>
				<label for="tpom_f" class="usrl">
					Тип помещения:
				</label>
				<select id="tpom_f" name="tpom_f" class="usri" >
					
				</select>
			</li>
			<li>
				<label for="npom_f" class="usrl">
					Номер помещения:
				</label>
				<input id="npom_f" name="npom_f" class="usri" />
			</li>
		</ul>
	</fieldset>
<fieldset id="ap">
		<legend>
			Адрес Проживания
		</legend>
		<ul>
			<li>
				<label for="index" class="usrl">
					Индекс:
				</label>
				<input id="index" name="index" class="usri" />
			</li>
			<li>
				<label for="cntr" class="usrl">
					Страна:
				</label>
				<input id="cntr" name="cntr" class="usri" />
			</li>
			<li>
				<label for="reg" class="usrl">
					Регион:
				</label>
				<input id="reg" name="reg" class="usri" />
			</li>
			<li>
				<label for="rag" class="usrl">
					Район:
				</label>
				<input id="rag" name="rag" class="usri" />
			</li>
			<li>
				<label for="nast" class="usrl">
					Тип Населенного пункта:
				</label>
				<select id="nast" name="nast" class="usri" >
					<!-- Заполняется в js -->
				</select>
			</li>
			<li>
				<label for="nas" class="usrl">
					Населенный пункт:
				</label>
				<input id="nas" name="nas" class="usri" />
			</li>
			<li>
				<label for="ult" class="usrl">
					Тип улицы:
				</label>
				<select id="ult" name="ult" class="usri">
					<!--заполняется в js-->
				</select>
			</li>
			<li>
				<label for="ul" class="usrl">
					Улица:
				</label>
				<input id="ul" name="ul" class="usri" />
			</li>
			<li>
				<label for="ndom" class="usrl">
					Номер дома:
				</label>
				<input id="ndom" name="ndom" class="usri" />
			</li>
			<li>
				<label for="tstr" class="usrl">
					Тип строения:
				</label>
				<select id="tstr" name="tstr" class="usri" >
					
				</select>
			</li>
			<li>
				<label for="nstr" class="usrl">
					Номер строения:
				</label>
				<input id="nstr" name="nstr" class="usri" />
			</li>
			<li>
				<label for="tpom" class="usrl">
					Тип помещения:
				</label>
				<select id="tpom" name="tpom" class="usri" >
					<!-- 6 номер при заполнении -->
				</select>
			</li>
			<li>
				<label for="npom" class="usrl">
					Номер помещения:
				</label>
				<input id="npom" name="npom" class="usri" />
			</li>
		</ul>
	</fieldset>
	<fieldset id="si">
		<legend>
			Служебная информация
		</legend>
		<ul>
			<li>
				<label for="nkomn" class="usrl">
					Кабинет:
				</label>
				<input id="nkomn" name="nkomn" class="usri" />
			</li>
			<li>
				<label for="vnom" class="usrl">
					Внутрений:
				</label>
				<input id="vnom" name="vnom" class="usri" />
			</li>
			<li>
				<label for="mobile" class="usrl">
					Мобильный:
				</label>
				<input id="mobile" name="mobile" class="usri" />
			</li>
			<li>
				<label for="mail" class="usrl">
					Почта:
				</label>
				<input id="mail" name="mail" class="usri" />
			</li>
			<li>
				<label for="dol" class="usrl">
					Должность:
				</label>
				<input id="dol" name="dol" class="usri" />
			</li>
	</fieldset>

</form>

<script type="text/javascript">
	//маска ввода для пфр
	$(function(){
	  // Получить элемент, к которому необходимо добавить маску
	  $("#pfr").mask("999-999-999 99");
	});


	//функция выбора типа улицы
	$('document').ready(function(){
		$.ajax({
	        url : '/adm/config/engine.php',
	        type : 'POST',
	        data: {enginedate: 2},
	        success: function (html) {
	        	$.each(JSON.parse(html), function(key, entry){
	        		$('#ult').append($('<option></option>').attr('value', entry['id']).text(entry['ul_name']));
	        		$('#ult_f').append($('<option></option>').attr('value', entry['id']).text(entry['ul_name']));
	        		
	        	});
	        	$('#ult').val(1).change();
	        	$('#ult_f').val(1).change();

	        	console.log() // The value of your php $row['adverts'] will be displayed
	        },
	        error : function () {
	           alert("error");
	        }
    	})
		//конец функция выбора типа улицы

		//Тип населеного пунка
		$.ajax({
	        url : '/adm/config/engine.php',
	        type : 'POST',
	        data: {enginedate: 5},
	        success: function (html) {
	        	$.each(JSON.parse(html), function(key, entry){
	        		$('#nast').append($('<option></option>').attr('value', entry['tnpid']).text(entry['tnp_name']));
	        		$('#nast_f').append($('<option></option>').attr('value', entry['tnpid']).text(entry['tnp_name']));
	        		
	        	});
	        	$('#nast').val(1).change();
	        	$('#nast_f').val(1).change();

	        	console.log() // The value of your php $row['adverts'] will be displayed
	        },
	        error : function () {
	           alert("error");
	        }
    	})
		//конец функция выбора типа населенного пункта


		//Тип помещения
		$.ajax({
	        url : '/adm/config/engine.php',
	        type : 'POST',
	        data: {enginedate: 7},
	        success: function (html) {
	        	$.each(JSON.parse(html), function(key, entry){
	        		$('#tpom').append($('<option></option>').attr('value', entry['tpomid']).text(entry['tpom_name']));
	        		$('#tpom_f').append($('<option></option>').attr('value', entry['tpomid']).text(entry['tpom_name']));
	        		
	        	});
	        	$('#tpom').val(1).change();
	        	$('#tpom_f').val(1).change();

	        	console.log() // The value of your php $row['adverts'] will be displayed
	        },
	        error : function () {
	           alert("error");
	        }
    	})
		//конец функция выбора типа помещения

		//Функция выбора типа строения 

			$.ajax({
	        url : '/adm/config/engine.php',
	        type : 'POST',
	        data: {enginedate: 9},
	        success: function (html) {
	        	$.each(JSON.parse(html), function(key, entry){
	        		$('#tstr').append($('<option></option>').attr('value', entry['tstrid']).text(entry['tstr_name']));
	        		$('#tstr_f').append($('<option></option>').attr('value', entry['tstrid']).text(entry['tstr_name']));
	        		
	        	});
	        	$('#tstr').val(1).change();
	        	$('#tstr_f').val(1).change();

	        	console.log() // The value of your php $row['adverts'] will be displayed
	        },
	        error : function () {
	           alert("error");
	        }
    	})

	});

</script>