<?

if ($_POST['form_id'] == 'form_updateMap'){

	// подключаем модуль получения данных по интерактивной карте с учетом отправленных POST параметров
    include($_SERVER['DOCUMENT_ROOT'].'/modules/map2/include/data.php');
    // подключаем модуль Яндекс.Карты
    include($_SERVER['DOCUMENT_ROOT'].'/modules/map2/include/map.php');

}

// сохранение нарисованной пользователем окружности на карте в БД при нажатии кнопки Сохранить
if ($_POST['form_id'] == 'form_saveCircle' and $_SESSION['user_id'] > 0){
	$radius = clearData($_POST['radius']);
    $lng = clearData($_POST['lng']);
    $lat = clearData($_POST['lat']);

    if (!empty($radius)
    and !empty($lng)
    and !empty($lat)){    	db_query("INSERT INTO mos_users_circles (
    		user_id,
    		radius,
    		lng,
    		lat,
    		time_date
    	)
    	VALUES
    	(
    		'".intval($_SESSION['user_id'])."',
    		'".$radius."',
    		'".$lng."',
    		'".$lat."',
    		'".date('Y-m-d H:i:s')."'
    	)");
    }

    exit('ok');

}

?>