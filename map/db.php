<?php
	
{
    $dbuser = "postgres";
    $dbpass = "kf,fnfvbz";
    
    if(!$link = new PDO("pgsql:host=localhost;dbname=mapper", $dbuser, $dbpass))
        {
            echo '<br>Не могу подключится к базе даннных';
            exit();
        }
?>