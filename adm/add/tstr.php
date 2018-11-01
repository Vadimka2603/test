<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
<form>
	<label for="tstr">
		Тип Строения:
	</label>
	<input type="text" name="tstr" id="tstr">
	<input id="tstradd" type="button" name="insert" value="Добавить">
	<div id="result"></div>
</form>
<script type="text/javascript">
	$('document').ready(function(){

	});
	/*вставка записи тип улицы.*/
	$('#tstradd').click(function() {
		var tnp = $('#tstr').val();
		/*alert(ult);*/
			$.ajax({
			url: '/adm/config/engine.php',
	        type: 'POST',
	        data: {tstr: tnp, enginedate: 8},
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