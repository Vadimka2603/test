<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

require_once $_SERVER['DOCUMENT_ROOT'].'/phone/inf/base.php';

function updateNsim($id, $nsim, $dbase, $dbuser, $dbpass)
{
	$sql = "UPDATE ph_phone
			SET ph_nsim = $nsim
			WHERE pid = $id";
	$ds = new PDO("pgsql:host=localhost;dbname=".$dbase, $dbuser, $dbpass);
	$query = $ds->prepare($sql);
	$query->execute();
	$result = $query->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}

function updateTel($uid, $pid, $dbase, $dbuser, $dbpass)
{
	
	$sql = "UPDATE ph_phone
			SET u_id = $uid
			WHERE pid = $pid";
	$ds = new PDO("pgsql:host=localhost;dbname=".$dbase, $dbuser, $dbpass);
	$query = $ds->prepare($sql);
	$query->execute();
	$result = $query->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}


	if($_POST['upd'] = 1)
	{
		updateTel($_POST['uid'], $_POST['pid'], $dbase, $dbuser, $dbpass);
	}
	if($_POST['upd'] = 2)
	{
		updateNsim($_POST['pid'], $_POST['ns'], $dbase, $dbuser, $dbpass);
	}
	

?>