<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	/*подключаем бд*/
	require_once $_SERVER['DOCUMENT_ROOT'].'/phone/inf/base.php';

	/*скрипт для вставки записи
		в Тип улицы
		№1
	*/
	function insUlType($ultype, $dbase, $dbuser, $dbpass)
	{
		try
		{
			$ds = new PDO("pgsql:host=localhost;dbname=".$dbase, $dbuser, $dbpass);
			$ds->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$query = $ds->prepare("select ins_u_tul(?)");
			$query->bindParam(1, $ultype, PDO::PARAM_STR, 5);
			$query->execute();
			echo "выполненно";
		}
		catch(\PDOException $e)
		{
			echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
		}

	}
	/*
	№2
	функция добавления пользователя
	*/
	function insUser()
	{

	}

	/*
	#3
	функция выборки типов улицы
	*/

	function selStreetType($dbase, $dbuser, $dbpass)
	{
		$sql = "SELECT tul_id, ul_name FROM u_tul ORDER BY ul_name";
		$ds = new PDO("pgsql:host=localhost;dbname=".$dbase, $dbuser, $dbpass);
		$query = $ds->prepare($sql);
		$query->execute();
		$result = $query->fetchAll(PDO::FETCH_ASSOC);
		$jsonarray = array();
		foreach ($result as $key) {
			$jsonarray[] = array(
				"id" => $key['tul_id'],
				"ul_name" => $key['ul_name']
				
			);
		}

		return $jsonarray;
	}

	/*
	#4 - Добавление типа населеного пункта

	*/

	function insNPType($tnp, $dbase, $dbuser, $dbpass)
	{
		try
		{
			$ds = new PDO("pgsql:host=localhost;dbname=".$dbase, $dbuser, $dbpass);
			$ds->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$query = $ds->prepare("select ins_u_tnp(?)");
			$query->bindParam(1, $tnp, PDO::PARAM_STR, 5);
			$query->execute();
			echo "выполненно";
		}
		catch(\PDOException $e)
		{
			echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
		}

	}
	// №5 выборка типа Населеного пункта

	function selNPType($dbase, $dbuser, $dbpass)
	{
		$sql = "SELECT tnpid, tnp_name FROM u_tnp ORDER BY tnp_name";
		$ds = new PDO("pgsql:host=localhost;dbname=".$dbase, $dbuser, $dbpass);
		$query = $ds->prepare($sql);
		$query->execute();
		$result = $query->fetchAll(PDO::FETCH_ASSOC);
		$jsonarray = array();
		foreach ($result as $key) {
			$jsonarray[] = array(
				"tnpid" => $key['tnpid'],
				"tnp_name" => $key['tnp_name']
				
			);
		}

		return $jsonarray;
	}


	//6 - Тип Помещения
	function insPomType($tnpom, $dbase, $dbuser, $dbpass)
	{
		try
		{
			$ds = new PDO("pgsql:host=localhost;dbname=".$dbase, $dbuser, $dbpass);
			$ds->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$query = $ds->prepare("select ins_u_tpom(?)");
			$query->bindParam(1, $tnpom, PDO::PARAM_STR, 5);
			$query->execute();
			echo "выполненно";
		}
		catch(\PDOException $e)
		{
			echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
		}

	}
	//7 выборка помещения
	function selNpomType($dbase, $dbuser, $dbpass)
	{
		$sql = "SELECT tpomid, tpom_name FROM u_tpom ORDER BY tpom_name";
		$ds = new PDO("pgsql:host=localhost;dbname=".$dbase, $dbuser, $dbpass);
		$query = $ds->prepare($sql);
		$query->execute();
		$result = $query->fetchAll(PDO::FETCH_ASSOC);
		$jsonarray = array();
		foreach ($result as $key) {
			$jsonarray[] = array(
				"tpomid" => $key['tpomid'],
				"tpom_name" => $key['tpom_name']
				
			);
		}

		return $jsonarray;
	}

	//8 строение 
		function insStrType($tstr, $dbase, $dbuser, $dbpass)
	{
		try
		{
			$ds = new PDO("pgsql:host=localhost;dbname=".$dbase, $dbuser, $dbpass);
			$ds->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$query = $ds->prepare("select ins_u_tstr(?)");
			$query->bindParam(1, $tstr, PDO::PARAM_STR, 5);
			$query->execute();
			echo "выполненно";
		}
		catch(\PDOException $e)
		{
			echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
		}

	}
	//9 выборка строения
	function selStrType($dbase, $dbuser, $dbpass)
	{
		$sql = "SELECT tstrid, tstr_name FROM u_tstr ORDER BY tstr_name";
		$ds = new PDO("pgsql:host=localhost;dbname=".$dbase, $dbuser, $dbpass);
		$query = $ds->prepare($sql);
		$query->execute();
		$result = $query->fetchAll(PDO::FETCH_ASSOC);
		$jsonarray = array();
		foreach ($result as $key) {
			$jsonarray[] = array(
				"tstrid" => $key['tstrid'],
				"tstr_name" => $key['tstr_name']
				
			);
		}

		return $jsonarray;
	}






	
	if(isset($_POST['enginedate']))
	{
		/*Разбор значений и выполнение функций*/
	
		if($_POST['enginedate'] == 1)
		{
			insUlType($_POST['ultype'], $dbase, $dbuser, $dbpass);
		}
		else{
			if($_POST['enginedate'] == 2)
			{
				$test = selStreetType($dbase, $dbuser, $dbpass);

				echo json_encode($test);
			}
			if($_POST['enginedate'] == 4)
			{
				insNPType($_POST['tnp'], $dbase, $dbuser, $dbpass);
			}
			//выборка типа Нас пункта
			if($_POST['enginedate'] == 5)
			{
				$test = selNPType($dbase, $dbuser, $dbpass);

				echo json_encode($test);
			}
			if($_POST['enginedate'] == 6)
			{
				insPomType($_POST['tpom'], $dbase, $dbuser, $dbpass);
			}
			if($_POST['enginedate'] == 7)
			{
				$test = selNpomType($dbase, $dbuser, $dbpass);

				echo json_encode($test);
			}
			if($_POST['enginedate'] == 8)
			{
				insStrType($_POST['tstr'], $dbase, $dbuser, $dbpass);
			}
			if($_POST['enginedate'] == 9)
			{
				$test = selStrType($dbase, $dbuser, $dbpass);

				echo json_encode($test);
			}

		}

		/*Добавляем тип нас пункта*/



	}
	else
	{
		echo "нет запроса POST";
	}



?>