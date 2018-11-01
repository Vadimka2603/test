 <link rel="stylesheet" href="css/sheet.css" type="text/css" />
 <link rel="stylesheet" href="css/sp.css" type="text/css" />
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript">
    </script>
    <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../js/jquery.js"></script>

<?php
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    session_start();

    $is_auth=false;
    $law = '';

    if ($_SESSION['is_auth'])
    {
        $is_auth = true;
        $law = $_SESSION['law'];
        require_once 'selectpoint.php';
        $mapobj = $result;

    }
    else{
        header('Location: index.php');
        exit();
    }


?>


<body>
	<div id="wrapper">
<?php
    if($is_auth == true) {
        if($law == 1){
            echo '<div id="mnt">';
            echo '<div class="logon"><span>'.$_COOKIE['login'].'</span><a href="exit.php">Выход</a></div>';
            echo '</div>';
        }
        if($law == 3){
            echo '<div id="mnt">';
            echo '<a href="addpoint.php" rel="#overlay" class="abra"><input type="button" id="plus" name="addsp" value="Добавить"></a>';

            echo '<a href="addu.php" rel="#overlay" class="abra"><input type="button" id="plus" name="addu" value="+Пользователь"></a>';

            echo '<div class="logon"><span>'.$_COOKIE['login'].'</span><a href="exit.php">Выход</a></div>';
            echo '</div>';
        }

    }
    else {

    }
?>
        <div id="btn"></div>
<!-- MAP block -->
		<div class="map-block row">
			<div class="sidebar">
				<div class="accordion">
					
				</div>

				
			</div>
			<div class="maps">
				<div id="map" style=" height: 100%;"></div>
			</div>
            <div class="overlay" id="overlay">x
                <div class="wrap">x</div>
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
    var myPoints;
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
                
                foreach($mapobj as $arr)
                {
                    $text = '';
                    //$arr = explode(';', $line);
                    $text =  "{ coords:[" . $arr['m_coords'] . "],
                    text:' " . $arr['m_name'] . "',
                    content:'<strong>Сайт: </strong><a href=\"". $arr['m_link'] ."\" >" . $arr['m_linkname']."</a>"."<br>"."<strong>Контакты: </strong>".$arr['m_contacts']."<br>"."<strong>ИНФО: </strong>".$arr['m_info']."',pres: '" . $arr['p_link'] . "',
                    mname: '".$arr['m_name']."',
                    mlink: '".$arr['m_link'] ."',
                    mlinkname: '".$arr['m_linkname'] ."', 
                    mcontacts: '".$arr['m_contacts']."', 
                    minfo: '".$arr['m_info']."', 
                    mpres: '".$arr['p_link']."',
                    mid: '".$arr['id']."',  
                    pimg: '".$arr['p_img']."'},";
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
                        pres: 'islands#blueHotelCircleIcon',
                        mname: 'RADISSON RESORT, ZAVIDOVO',
                        mlink: 'https://www.radissonblu.com/ru/hotel-zavidovo',
                        mlinkname: 'www.radissonblu.com',
                        mcontacts: '+7 48242 78 0 78 -секретарь maksim.busurin@radissonblu.com или azrael1987@mail.ru',
                        minfo: '17.11.2017- Готовы работать с января 2018 года. Связаться с закупщиком. Он на встречу в Твери. maksim.busurin@radissonblu.com или azrael1987@mail.ru',
                        mpres:'islands#blueHotelCircleIcon',
                        mid: '1',
                        pimg: 'img/map/blue.png' }



        ];

    // Заполняем коллекцию данными.
    for (var i = 0, l = myPoints.length; i < l; i++) {

        var point = myPoints[i];
        myCollection.add(new ymaps.Placemark(
            point.coords, {
                balloonContentHeader: point.text,
                iconCaption: point.text,
                balloonContentBody:point.content,
               
                balloonContentFooter: "Подвал"
            },
            {
                preset: point.pres
            }
        ));
        $('.accordion').append('<section>')
        $('.accordion>section:last-child').append('<h2 id="'+i+'"><span><img src="'+point.pimg+'"></span><a href="#"><p>'+point.mname+'</p></a></h2>');

            $('.accordion>section:last-child').append('<div><form id="'+point.mid+'" class="pointer"><ul>'+
                '<input type="text" name="mid" class="mid" value="'+point.mid+'">'+
                '<li>'+
                '<label for="link"><span>Сайт:</span></label>'+
                '<a href="'+point.mlink+'" name="link" class="c">'+point.mlinkname+'</a></li>'+
                '<li><label for="contacts"><span>Контакты:</span></label>'+
                '<textarea name="contacts">'+point.mcontacts+'</textarea></li>'+
                '<li>'+
                '<label for="info"><span>Инфо:</span></label>'+
                '<textarea name="info">'+point.minfo+'</textarea>'+
                '</li>'+
                '<li>'+
                '<p id="eto"></p><button class="submit" type="submit" onclick="javascript: f_send(this.form);event.preventDefault();">Изменить</button>'+
                '</li>'+
                '</ul></form></div>');


    }

    //Добавляем возможность прыгать к балуну а так же раскрываем и закрываем список
    $('.accordion h2').click(function(){
        var p = $(this).attr('id');

        if( $(this).next().is(':hidden') )
        {
            $('.accordion h2').removeClass('active').next().slideUp();  
            $(this).addClass('active').next().slideDown();
            myMap.setZoom(10);
            myMap.setCenter(myPoints[p].coords, 10, {duration: 1200}).then(function () {
                myMap.setZoom(12, {duration: 1000});
                myMap.balloon.open(myPoints[p].coords, "<strong>"+myPoints[p].text+"</strong><br>" + myPoints[p].content, {
                    // Опция: не показываем кнопку закрытия.
                    closeButton: true
                });
                //myMap.setCenter(myPoints[p].coords, 10);
            });

        }
        else {
            $(this).addClass('active').next().slideDown();
            $('.accordion h2').removeClass('active').next().slideUp();
            myMap.balloon.close(myPoints[p].coords, myPoints[p].contetnt , {
                // Опция: не показываем кнопку закрытия.
                closeButton: true
                });
            }
            return false;
    });


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
<script>
    $(function() {
    $(".abra").overlay(function() {
        var wrap = this.getContent().find("div.wrap");
        if (wrap.is(":empty")) {
            wrap.load(this.getTrigger().attr("href"));
        }
        else{
           wrap.load(this.getTrigger().attr("href"));

        }
    });
});
</script>


</body>
