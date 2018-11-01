    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript">
    </script>
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<?php
	$filename = 'arrayJS.txt';
	$data = file_get_contents($filename);
	$json = $data;	
?>
<script>
	//version 2
	function init() {
    var myMap = new ymaps.Map('map', {
            center: [56.859901, 35.955571],
            zoom: 10
        },
        {suppressMapOpenBlock: true}
        ),
    // Создаем коллекцию.
        myCollection = new ymaps.GeoObjectCollection(),

        myPoints = [
        	<?php
        	    	$filename = 'array.txt';
					$data = file('array.txt');
        		foreach($data as $line)
        		{
        			$text = '';
        			$arr = explode(';', $line);
  					$text =  "{ coords:[" . $arr[0] . "],text:' " . $arr[1] . "',content:'<strong>Сайт: </strong><a href=\"". $arr[2] ."\" >" . $arr[3]."</a>"."<br>"."<strong>Контакты: </strong>".$arr[4]."<br>"."<strong>ИНФО: </strong>".$arr[5]."',pres: '" . $arr[6] . "'},";
  					//$text = preg_replace('(\r\n|\n|\r)', "<BR/>", $text);
  					$text = str_replace(chr(13),'',$text);
					$text = str_replace(chr(10),'',$text);
  					echo $text;
  					echo '
  					';

        		}
        	 ?>
        	 	   { coords: [56.59447634531365, 36.52092067986953], 
		            	text: 'RADISSON RESORT, ZAVIDOVO',
		            	content: '<strong>Сайт: </strong> <a href="https://www.radissonblu.com/ru/hotel-zavidovo">www.radissonblu.com</a><br> <strong>Контакты: </strong>+7 48242 78 0 78 -секретарь maksim.busurin@radissonblu.com или azrael1987@mail.ru<strong><br>ИНФО: </strong> 	17.11.2017- Готовы работать с января 2018 года. Связаться с закупщиком. Он на встречу в Твери. maksim.busurin@radissonblu.com или azrael1987@mail.ru',
		            	pres: 'islands#redHotelCircleIcon' }



        ];

    // Заполняем коллекцию данными.
    for (var i = 0, l = myPoints.length; i < l; i++) {
        var point = myPoints[i];
        myCollection.add(new ymaps.Placemark(
            point.coords, {
                balloonContent: point.content,
                iconCaption: point.text
            },
            {
            	preset: point.pres
            }
        ));
    }

    // Добавляем коллекцию меток на карту.
    myMap.geoObjects.add(myCollection);

    // Создаем экземпляр класса ymaps.control.SearchControl
    var mySearchControl = new ymaps.control.SearchControl({
        options: {
            // Заменяем стандартный провайдер данных (геокодер) нашим собственным.
            provider: new CustomSearchProvider(myPoints),
            // Не будем показывать еще одну метку при выборе результата поиска,
            // т.к. метки коллекции myCollection уже добавлены на карту.
            noPlacemark: true,
            resultsPerPage: 5
        }});

    // Добавляем контрол в верхний правый угол,
    myMap.controls
        .add(mySearchControl, { float: 'right' });
}


// Провайдер данных для элемента управления ymaps.control.SearchControl.
// Осуществляет поиск геообъектов по массиву points.
// Реализует интерфейс IGeocodeProvider.
function CustomSearchProvider(points) {
    this.points = points;
}

// Провайдер ищет по полю text стандартным методом String.ptototype.indexOf.
CustomSearchProvider.prototype.geocode = function (request, options) {
    var deferred = new ymaps.vow.defer(),
        geoObjects = new ymaps.GeoObjectCollection(),
    // Сколько результатов нужно пропустить.
        offset = options.skip || 0,
    // Количество возвращаемых результатов.
        limit = options.results || 20;
        
    var points = [];
    // Ищем в свойстве text каждого элемента массива.
    for (var i = 0, l = this.points.length; i < l; i++) {
        var point = this.points[i];
        if (point.text.toLowerCase().indexOf(request.toLowerCase()) != -1) {
            points.push(point);
        }
    }
    // При формировании ответа можно учитывать offset и limit.
    points = points.splice(offset, limit);
    // Добавляем точки в результирующую коллекцию.
    for (var i = 0, l = points.length; i < l; i++) {
        var point = points[i],
            coords = point.coords,
                    text = point.text;

        geoObjects.add(new ymaps.Placemark(coords, {
            name: text + ' name',
            description: text + ' description',
            balloonContentBody: '<p>' + text + '</p>',
            boundedBy: [coords, coords]
        }));
    }

    deferred.resolve({
        // Геообъекты поисковой выдачи.
        geoObjects: geoObjects,
        // Метаинформация ответа.
        metaData: {
            geocoder: {
                // Строка обработанного запроса.
                request: request,
                // Количество найденных результатов.
                found: geoObjects.getLength(),
                // Количество возвращенных результатов.
                results: limit,
                // Количество пропущенных результатов.
                skip: offset
            }
        }
    });

    // Возвращаем объект-обещание.
    return deferred.promise();
};

ymaps.ready(init);
</script>

    <div id="map" style="width: 100%; height: 100%;"></div>