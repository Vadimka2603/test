<?php
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

	require_once '../map/db/db.php';

		   	$db = new PDO("pgsql:host=localhost;dbname=mapper", $dbuser, $dbpass);

		    $query = $db->prepare("SELECT m.*, p.p_link, p.p_img  FROM mapobj m INNER JOIN  m_preset p ON m.m_preset = p.id ORDER BY m_name;");

		    $query->execute();

	    	$result = $query->fetchAll(PDO::FETCH_ASSOC);

	    	return $result;
?>