 <link rel="stylesheet" href="css/sheet.css" type="text/css" />
 <link rel="stylesheet" href="css/sp.css" type="text/css" />
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript">
    </script>
    <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../js/jquery.js"></script>

<?php
        require_once 'selectpoint.php';
        $mapobj = $result;
?>


<body>
	<div id="wrapper">

		<div id="mnt">
			<a href="addpoint.php" rel="#overlay"><input type="button" id="plus" name="addsp" value="Добавить"></a>
		</div>
        <div id="btn"></div>
<!-- MAP block -->
		<div class="map-block row">
			<div class="sidebar">
				<div class="accordion">
					<?php
                        foreach($mapobj as $arr)
                        {
                            echo '<section>';
                            echo '<h2><a href="#">'.$arr['m_name'].'<img src="'.$arr['p_img'].'"></a></h2>';
                            echo '<div>';
                            echo '<form class="pointer">';
                            echo '<ul>';
                            echo '<li>';
                            echo '<label for="link"><span>Сайт:</span></label>';
                            echo '<a href="'.$arr['m_link'].'" name="link" class="c">'.$arr['m_linkname'].'</a>';
                            echo '</li>';
                            echo '<li>';
                            echo '<label for="contacts"><span>Контакты:</span></label>';
                            echo '<textarea name="contacts">'.$arr['m_contacts'].'</textarea>';
                            echo '</li>';
                            echo '<li>';
                            echo '<label for="info"><span>Инфо:</span></label>';
                            echo '<textarea name="info">'.$arr['m_info'].'</textarea>';
                            echo '</li>';
                            echo '<li>';
                            echo '<button class="submit" type="submit">Изменить</button>';
                            echo '<button class="dispoint" type="submit">Показать</button>';;
                            echo '</li>';
                            echo '</ul>';
                            echo '</form>';
                            echo '</div>';
                            echo '</section>';

                        }

					 ?>
					
				</div>

				
			</div>
			<div class="maps">
				<div id="map" style=" height: 100%;"></div>
			</div>
            <div class="overlay" id="overlay">
                <div class="wrap"></div>
            </div>
		</div>

		<div id="menustack">
			
		</div>

	</div>
        <script type="text/javascript">
    //version 2
    var myMap;
    var myCollection;
    var ii;
    function init() {
    myMap = new ymaps.Map('map', {
            center: [56.859901, 35.955571],
            zoom: 10
        },
        {suppressMapOpenBlock: true}
        ),
        menu = $('<ul class="menu"></ul>');
    // Создаем коллекцию.
        myCollection = new ymaps.GeoObjectCollection(),

        myPoints = [
            <?php
                    $filename = 'array.txt';
                    $data = file('array.txt');
                
                foreach($mapobj as $arr)
                {
                    $text = '';
                    //$arr = explode(';', $line);
                    $text =  "{ coords:[" . $arr['m_coords'] . "],text:' " . $arr['m_name'] . "',content:'<strong>Сайт: </strong><a href=\"". $arr['m_link'] ."\" >" . $arr['m_linkname']."</a>"."<br>"."<strong>Контакты: </strong>".$arr['m_contacts']."<br>"."<strong>ИНФО: </strong>".$arr['m_info']."',pres: '" . $arr['p_link'] . "'},";
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
                        content: '<strong>Сайт: </strong> <a href="https://www.radissonblu.com/ru/hotel-zavidovo">www.radissonblu.com</a><br> <strong>Контакты: </strong>+7 48242 78 0 78 -секретарь maksim.busurin@radissonblu.com или azrael1987@mail.ru<strong><br>ИНФО: </strong>   17.11.2017- Готовы работать с января 2018 года. Связаться с закупщиком. Он на встречу в Твери. maksim.busurin@radissonblu.com или azrael1987@mail.ru',
                        pres: 'islands#blueHotelCircleIcon' }



        ];

    // Заполняем коллекцию данными.
    for (var i = 0, l = myPoints.length; i < l; i++) {
        ii = myPoints[i];
        var point = myPoints[i];
        myCollection.add(new ymaps.Placemark(
            point.coords, {
 
                iconCaption: point.text,
                balloonContentBody:point.content,
                balloonContentHeader: point.text,
                balloonContentFooter: "Подвал"
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

$('#btn').append('<button id="test">ИИИепта</button>')
$('#btn').click(function() {
                myMap.panTo([ii.coords]).then(function () {
                        myMap.balloon.open(ii.coords, ii, {
        // Опция: не показываем кнопку закрытия.
        closeButton: false
    }); //
                });
            });
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
	<script>
		$(document).ready(function(){

			$('.accordion h2').click(function(){
			if( $(this).next().is(':hidden') )
				{
				$('.accordion h2').removeClass('active').next().slideUp();	
				$(this).addClass('active').next().slideDown();
				}
				else {
					$(this).addClass('active').next().slideDown();
					$('.accordion h2').removeClass('active').next().slideUp();
				}
				return false;
			});
		});

            $(function() {
    $("a[rel]").overlay(function() {
        var wrap = this.getContent().find("div.wrap");
        if (wrap.is(":empty")) {
            wrap.load(this.getTrigger().attr("href"));
        }
    });
});
</script>

<script type="text/javascript">

</script>
</body>
