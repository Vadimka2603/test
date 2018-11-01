<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
<form>
	<label for="tpom">
		Тип Строения:
	</label>
	<input type="text" name="tpom" id="tpom">
	<input id="tpomadd" type="button" name="insert" value="Добавить">
	<div id="result"></div>
</form>
<script type="text/javascript">
	$('document').ready(function(){

	});
	/*вставка записи тип улицы.*/
	$('#tpomadd').click(function() {
		var tnp = $('#tpom').val();
		/*alert(ult);*/
			$.ajax({
			url: '/adm/config/engine.php',
	        type: 'POST',
	        data: {tpom: tnp, enginedate: 6},
	        success: function (html) {
	        	$('#result').append('добавленно');
	        	console.log() // The value of your php $row['adverts'] will be displayed
	        },
	        error : function () {
	           alert("error");
	        }
		})
	});
</script>