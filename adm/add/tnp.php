<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
<form>
	<label for="tnp">
		Тип Населенного пункта:
	</label>
	<input type="text" name="tnp" id="tnp">
	<input id="tnpadd" type="button" name="insert" value="Добавить">
	<div id="result"></div>
</form>
<script type="text/javascript">
	$('document').ready(function(){

	});
	/*вставка записи тип улицы.*/
	$('#tnpadd').click(function() {
		var tnp = $('#tnp').val();
		/*alert(ult);*/
			$.ajax({
			url: '/adm/config/engine.php',
	        type: 'POST',
	        data: {tnp: tnp, enginedate: 4},
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