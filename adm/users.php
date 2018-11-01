<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Информация о сотруднике</title>
	<link rel="stylesheet" type="text/css" href="/adm/css/users.css">

</head>
<body>

<?php
		ini_set('error_reporting', E_ALL);
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);

		require_once $_SERVER['DOCUMENT_ROOT'].'/phone/inf/base.php';

		function selectUsersName($dbase, $dbuser, $dbpass)
		{
			$ds = new PDO("pgsql:host=localhost;dbname=".$dbase, $dbuser, $dbpass);
			$sql = "SELECT id, u_name, u_family, u_otchestvo FROM u_users ORDER BY u_family";
			$query = $ds->prepare($sql);
			$query->execute();
			$result = $query->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}

		function selectTel($dbase, $dbuser, $dbpass)
		{
			$ds = new PDO("pgsql:host=localhost;dbname=".$dbase, $dbuser, $dbpass);
			$sql = "SELECT * FROM ph_phone order by ph_number";
			$query = $ds->prepare($sql);
			$query->execute();
			$result = $query->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}

?>



<!--Скрипт-->
<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
<h3 id="iname"></h3>
<label for="searchNsim">Номер SIM</label>
<input type="text" name="searchNsim" id="textsNsim"/>
<input type="button" value="найти" id="sNsim">
<select class="sel_users">
	<?php
		$usser = selectUsersName($dbase, $dbuser, $dbpass);
		foreach ($usser as $key) {
			echo "<option value='{$key['id']}'>".$key['u_family']." ".$key['u_name']." ".$key['u_otchestvo']."</option>"; 
			# code...
		}




	?>
</select>
<!--Вкладки-->
	<div class="usr-tabs">
		<input id="tab1" type="radio" name="tabs" checked>
    	<label for="tab1" title="Вкладка 1">Общая Информация</label>

    	<input id="tab2" type="radio" name="tabs">
    	<label for="tab2" title="Вкладка 1">SIM</label>

    	<input id="tab3" type="radio" name="tabs">
    	<label for="tab3" title="Вкладка 1">Вкладка 1</label>

    	<input id="tab4" type="radio" name="tabs">
    	<label for="tab4" title="Вкладка 1">Вкладка 1</label>

		<section id="content-tab1">
			<img class="usr-foto" src="">
			<fieldset>
				<legend>
					Контактная информация
				</legend>
				<ul>
					<li>
						<label for="usr-mphone" class="usrl">Телефон(моб)</label>
						<input name="usr-mphone" class="ph_phone usri">
					</li>
					<li>
						<label for="usr-phone" class="usrl">Телефон(внутр.)</label>
						<input name="usr-phone" class="vnutr usri" />
					</li>

					<li>
							<label for="usr-email" class="usrl">E-MAIL</label>
							<input name="usr-email" class="email usri" />
					</li>
					<li>
							<label for="usr-post" class="usrl">Почтовый адрес</label>
							<input name="usr-post" class="post usri" />
					</li>
				</ul>
			</fieldset>
			<fieldset>
				<legend>
					Общая
				</legend>
				<ul>
					<li>
						<label for="usr-phone" class="usrl">Дата рождения</label>
						<input type="date" name="usr-phone" class="u_date usri" />
					</li>

					<li>
							<label for="usr-sex" class="usrl">Пол</label>
							<select name="usr-sex" class="usri">
								
							</select>
					</li>
					<li>
							<label for="usr-passport" class="usrl">Пасспорт</label>
							<input name="usr-passport" class="pass usri" />
					</li>

					<li>
							<label for="usr-snils" class="usrl">СНИЛС</label>
							<input name="usr-snils" class="snils usri" />
					</li>
					<li>
							<label for="usr-inn" class="usrl">ИНН</label>
							<input name="usr-inn" class="inn usri" />
					</li>
					<li>
							<label for="usr-prop" class="usrl">Адрес прописки</label>
							<input name="usr-prop" class="reg usri" />
					</li>
					<li>
							<label for="usr-fact" class="usrl">Адрес факт</label>
							<input name="usr-fact" class="fact usri" />
					</li>
				</ul>
			</fieldset>
			<fieldset>
				<legend>
					Рабочая информация
				</legend>
				<ul>
					<li>
						<label for="usr-dol" class="usrl">Должность</label>
						<select name="usr-dol" class="usri" ></select>
					</li>
					<li>
						<label for="usr-kom" class="usrl">Номер отдела</label>
						<input name="usr-kom" class="usri" />
					</li>

					<li>
							<label for="usr-status" class="usrl">Статус</label>
							<select name="usr-status" class="usri" ></select>
					</li>
				</ul>
			</fieldset>

    	</section>

    	<section id="content-tab2">
	        <fieldset>
				<legend>
					Рабочая информация
				</legend>
				<ul>
					<li>
						<label for="usr-phone1" class="usrl">Номер телефона</label>
						<select name="usr-phone1" class="number usri" >
						<?php
							$tel = selectTel($dbase, $dbuser, $dbpass);
							foreach ($tel as $key) {
								echo "<option value='{$key['pid']}'>".$key['ph_number']."</option>"; 
								# code...
							}




	?>
						</select>
						<input class="but_number1" type="button" name="" value="привязать"/><p id="anso" class="bb"></p>
					</li>
					<li>
						<label for="usr-sim" class="usrl">Номер SIM</label>
						<input name="usr-sim" class="nsim usri" />
						<input class="but_number2" type="button" name="" value="сменить"/><p id="ns" class="bb"></p>
					</li>
					<li>
						<label for="usr-simtarif" class="usrl">Тарифный план</label>
						<input name="usr-simtarif" class="tarif usri" />
					</li>
					<li>
						<label for="usr-simcode" class="usrl">Код Тарифа</label>
						<input name="usr-simcode" class="code usri" />
					</li>
					<li>
						<label for="usr-simmin" class="usrl">Кол-во минут</label>
						<input name="usr-simmin" class="min usri" />
					</li>
					<li>
						<label for="usr-simgb" class="usrl">Кол-во GB</label>
						<input name="usr-simgb" class="gb usri" />
					</li>
					<li>
						<label for="usr-simsms" class="usrl">Кол-во SMS</label>
						<input name="usr-simsms" class="sms usri" />
					</li>
					<li>
						<label for="usr-simsumm" class="usrl">Сумма</label>
						<input name="usr-simsumm" class="summa usri" />
					</li>

					<li>
							<label for="usr-status" class="usrl">Статус</label>
							<select name="usr-status" class="usri" ></select>
					</li>
				</ul>

			</fieldset>
    	</section>

    	<section id="content-tab3">
	        <p>
			3 Здесь размещаете любое содержание....
	        </p>
    	</section>

    	<section id="content-tab4">
	        <p>
			4 Здесь размещаете любое содержание....
	        </p>
    	</section>
	</div><!--конец блока вкладок-->
<div class="searchMenu">
	
</div>
	</div>
<script type="text/javascript">
	/*заполняем формы */
	$('.sel_users').on('change', function() {
		var s = $(".sel_users").val();
	
		$.ajax({
        url : 'pscpt/selectusers.php',
        type : 'POST',
        data: {idu: s},
        success: function (html) {
        	var res = JSON.parse(html);
        	var iname = res['u_family']+' ' + res['u_name']+' '+ res['u_otchestvo'];
        	var ph_phone = res['ph_number'];
        	var u_date = res['u_date'];
        	var pass = res['u_pass_s'] + ' '+ res['u_pass_n'];
        	var email = res['u_mail'];
        	var vnutr = res['u_vnutr'];
        	var adress = res['u_adresreg_i'] +','+res['u_adresreg_s'] +','+res['u_adresreg_reg'] +','+res['u_adresreg_rag'] +','+res['u_adresreg_types'] +','+res['u_adresreg_city'] +','+res['u_adresreg_tul'] +','+res['u_adresreg_ul'] +','+res['u_adresreg_ndom'] +','+res['u_adresreg_tstr'] +','+res['u_adresreg_nstr'] +','+res['u_adresreg_npom'];
        	var snils = res['u_pfr'];
        	var inn = res['u_inn'];
        	var fact = res['u_adresprop_s']+','+res['u_adresprop_reg']+','+res['u_adresprop_rag']+','+res['u_adresprop_types']+','+res['u_adresprop_city']+','+res['u_adresprop_tul']+','+res['u_adresprop_ul']+','+res['u_adresprop_ndom']+','+res['u_adresprop_tstr']+','+res['u_adresprop_nstr']+','+res['u_adresprop_npom'];
        	var nsim = res['ph_nsim'];
        	var tname = res['t_name'];
        	var tcode = res['t_code'];
        	var tmin = res['t_min'];
        	var tsms = res['t_sms'];
        	var tint = res['t_int'];
        	var tsumm = res['t_summ'];
        	var tel = res['tel'];
        	$('#iname').val(iname); // Вставляем имя фамилию
        	$('.ph_phone').val(ph_phone); //Номер телефона
        	$('.number').val(ph_phone);
        	$('.pass').val(pass);
        	$('.u_date').val(u_date);
        	$('.email').val(email);
        	$('.vnutr').val(vnutr);
        	$('.post').val(adress);
        	$('.snils').val(snils);
        	$('.inn').val(inn);
        	$('.reg').val(adress);
        	$('.fact').val(fact);
        	$('.nsim').val(nsim);
        	$('.tarif').val(tname);
        	$('.code').val(tcode);
        	$('.min').val(tmin);
        	$('.sms').val(tsms);
        	$('.gb').val(tint);
        	$('.summa').val(tsumm);
        	$('.number').val(tel).change();
           console.log(res['u_name'], res['u_vnutr'], res['t_summ'], res['tel']) // The value of your php $row['adverts'] will be displayed
        },
        error : function () {
           alert("error");
        }
    })
	});


/*обновление номера у пользователя */
$('.but_number1').click(function() {
	var userid = $(".sel_users").val();
	var up = 1;
	var numberid = $('.number').val();
	$.ajax({
		url: 'pscpt/update/updatesim.php',
        type: 'POST',
        data: {uid: userid, upd: up, pid: numberid},
        success: function (html) {
        	$('#anso').append('Привязанно');
        	console.log() // The value of your php $row['adverts'] will be displayed
        },
        error : function () {
           alert("error");
        }
	})
});


/*обновляем номер сим */
$('.but_number2').click(function() {
	var nsim = $(".nsim").val();
	var up = 2;
	var numberid = $('.number').val();
	$.ajax({
		url: 'pscpt/update/updatesim.php',
        type: 'POST',
        data: {ns: nsim, upd: up, pid: numberid},
        success: function (html) {
        	$('#ns').append('Измененно');
        	console.log() // The value of your php $row['adverts'] will be displayed
        },
        error : function () {
           alert("error");
        }
	})
});

/*анимация блока*/
$('#sNsim').click(function() {
	if($('.searchMenu').is(':visible')) {
		$('.searchMenu').hide('slow');
	}
	else {
		$('.searchMenu').show('slow');
	}
});
</script>
</body>
</html>