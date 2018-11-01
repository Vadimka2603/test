<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
<form>
	<label for="ul_type">
		Тип улицы:
	</label>
	<input type="text" name="ul_type" id="ul_type">
	<input id="ultype" type="button" name="insert" value="Добавить">
	<div id="result"></div>
</form>
<script type="text/javascript">
	$('document').ready(function(){

	});
	/*вставка записи тип улицы.*/
	$('#ultype').click(function() {
		var ult = $('#ul_type').val();
		/*alert(ult);*/
			$.ajax({
			url: '/adm/config/engine.php',
	        type: 'POST',
	        data: {ultype: ult, enginedate: 1},
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