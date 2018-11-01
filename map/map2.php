 <link rel="stylesheet" href="css/sheet.css" type="text/css" />
 <link rel="stylesheet" href="css/sp.css" type="text/css" />
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript">
    </script>
    <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../js/jquery.js"></script>


<body>
	<div id="wrapper">
		<div id="mnt">
			<a href="addpoint.php" rel="#overlay"><input type="button" id="plus" name="addsp" value="Добавить"></a>
		</div>
<!--MAP BLOCK -->
	<div class="map-block row">
		<div class="sidebar">
			<div class="accordion">
				
			</div>
		</div>

			<div class="maps">
				<div id="map" style=" height: 100%;"></div>
			</div>
            <div class="overlay" id="overlay">
                <div class="wrap"></div>
            </div>

	</div>



	</div>
	<script type="text/javascript">
	    //version 2

    // Заполняем коллекцию данными.

  $.getJSON('searcheshop.php', function(data) {
        var output="<ul>";
        for (var i in r) {
            output+="<li>" + r[i].m_name + " " + r[i].m_coords +"</li>";
        }

        output+="</ul>";
        document.getElementById("map").innerHTML=output;
  });

</script>
</body>