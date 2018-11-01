<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
require_once $_SERVER['DOCUMENT_ROOT'].'/map/db/db.php';

		function insUser($pol, $pass, $law)
		{
			try
			{
				$dbuser = "postgres";
        		$dbpass = "kf,fnfvbz";
        		$db = new PDO("pgsql:host=localhost;dbname=mapper", $dbuser, $dbpass);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$query = $db->prepare('select int_users(?,?,?)');
				$query->bindParam(1, $pol, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT);
				$query->bindParam(2, $pass, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT);
				$query->bindParam(3, $law, PDO::PARAM_INT|PDO::PARAM_INPUT_OUTPUT);
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
			$logins = $_POST['logins'];
			$passwords = md5($_POST['passw']);
			$laws= $_POST['laws'];
			$a = insUser($logins, $passwords, $laws);

		}
		else
		{
			echo "Нет данных для добавления";
		}
?>