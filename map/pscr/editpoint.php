<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	
	function updatePoint($cont, $infer, $mid){
		try
			{
				$dbuser = "postgres";
        		$dbpass = "kf,fnfvbz";
        		$db = new PDO("pgsql:host=localhost;dbname=mapper", $dbuser, $dbpass);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$query = $db->prepare('UPDATE mapobj SET m_contacts=?, m_info=? WHERE id=?;');
				$query->bindParam(1, $cont, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT);
				$query->bindParam(2, $infer, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT);
				$query->bindParam(3, $mid, PDO::PARAM_INT|PDO::PARAM_INPUT_OUTPUT);
				$query->execute();
				//echo "All Good";
				//header ("Location: ".$_SERVER['HTTP_REFERER']);
			}
		catch(PDOException $e)
			{
				echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
			}
		}
		
		
		
		if(count($_POST)>0)
		{
			$mid = $_POST['mid'];
			$minfo = $_POST['info'];
			$mcontacts = $_POST['contacts'];

			$a = updatePoint($mcontacts, $minfo, $mid);

		}
		else
		{
			echo "Нет данных для добавления";
		}
		
?>