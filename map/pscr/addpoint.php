<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
require_once $_SERVER['DOCUMENT_ROOT'].'/map/db/db.php';

		function insPoint($pname, $coords, $link, $linkname, $contacts, $info, $preset)
		{
			try
			{
				$dbuser = "postgres";
        		$dbpass = "kf,fnfvbz";
        		$db = new PDO("pgsql:host=localhost;dbname=mapper", $dbuser, $dbpass);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$query = $db->prepare('select int_mapobj(?,?,?,?,?,?,?)');
				$query->bindParam(1, $pname, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT);
				$query->bindParam(2, $coords, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT);
				$query->bindParam(3, $link, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT);
				$query->bindParam(4, $linkname, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT);
				$query->bindParam(5, $contacts, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT);
				$query->bindParam(6, $info, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT);
				$query->bindParam(7, $preset, PDO::PARAM_INT|PDO::PARAM_INPUT_OUTPUT);
				$query->execute();
				//echo "All Good";
				//header ("Location: ".$_SERVER['HTTP_REFERER']);
			}
			catch(\PDOException $e)
			{
				echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
			}
		}

		
		if(count($_POST)>0)
		{
			$pname = $_POST['m_name'];
			$pcoords = $_POST['m_coords'];
			$plink = $_POST['m_link'];
			$plinkname = $_POST['m_linkname'];
			$pcontacts = $_POST['m_contacts'];
			$pinfo = $_POST['m_info'];
			$ppreset = $_POST['m_preset'];
			$a = insPoint($pname, $pcoords, $plink, $plinkname, $pcontacts, $pinfo, $ppreset);

		}
		else
		{
			echo "Нет данных для добавления";
		}
?>