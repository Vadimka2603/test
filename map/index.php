<style>
	body {
		background: rgba(212,228,239,1);

	}

	.loginblock {
		background: white;
		display: block;
		width: 500px;
		height: 300px;
		margin:150px auto;
		-webkit-box-shadow: 3px 7px 18px -6px rgba(0,0,0,0.75);
		-moz-box-shadow: 3px 7px 18px -6px rgba(0,0,0,0.75);
		box-shadow: 3px 7px 18px -6px rgba(0,0,0,0.75);
		border-radius: 8px;
	}
	.iname {
		display: block;
		position: relative;
		width: 100%;
		height: 70px;
		/*background: red;*/
		border-top-left-radius: 8px;
		border-top-right-radius: 8px;
	}

	.logo {
		width: 400px;
		height: 68px;
		background: white;
		margin: 0 auto;
		border-bottom: 1px solid #f2f4a8;

	}

	.iform {
		display: block;
		width: 498px;
		height: 225px;
		margin: 0 auto;
	}
	.logo span {
		display: block;
		  width: 230px;
		  height: 30px;
		  text-align: center;
		  font-size: 24px;
		  color: green;
		  letter-spacing: -5px;
		  font-weight: 700;
		  text-transform: uppercase;
		  animation: in 2.75s ease-out forwards;
		  text-shadow: 0px 0px 5px #f2f4a8, 0px 0px 7px #f2f4a8;
		  margin: 0 auto;
		  padding: 20px;
}

@keyframes in{
    0%{
    	letter-spacing: -2px;
    	margin-left: -20px;
    }
    30%{
    	letter-spacing: 4px;
    	margin-left: -15px;
    }
    100%{
    	letter-spacing: 8px;
    	margin-left: -1px;
    }

}
.uform {
	display: block;
	width: 400px;
	height: 200px;
	margin: 0 auto;

}
.uform ul {
	 width:100%;
	 list-style-type:none;
	 list-style-position:outside;
	 margin:0px;
	 padding:25px;
}

.uform li {
	 padding:8px;
	 position:relative;
}

.uform li:first-child {
	margin-top: 25px;
 	clear:both;
}

.uform label {
 width:70px;
 margin-top: 5px;
 display:inline-block;
 float:left;
 padding:3px;
}

.uform label {
	font-family: Lucida Console;
	font-size: 12px;
	text-transform: uppercase;
	font-weight: bold;
}
.uform input {
 height:20px;
 width:150px;
 margin-top: 3px;
}

.uform .pt {
 height:30px;
 width:150px;
 margin-top: 3px;
}
.uform .pt {margin-left:83px;margin-top: 10px;}
.uform .pt {
 background-color: #68b12f;
 background: -webkit-gradient(linear, left top, left bottom, from(#68b12f), to(#50911e));
 background: -webkit-linear-gradient(top, #68b12f, #50911e);
 background: -moz-linear-gradient(top, #68b12f, #50911e);
 background: -ms-linear-gradient(top, #68b12f, #50911e);
 background: -o-linear-gradient(top, #68b12f, #50911e);
 background: linear-gradient(top, #68b12f, #50911e);
 border: 1px solid #509111;
 border-bottom: 1px solid #5b992b;
 border-radius: 3px;
 -webkit-border-radius: 3px;
 -moz-border-radius: 3px;
 -ms-border-radius: 3px;
 -o-border-radius: 3px;
 box-shadow: inset 0 1px 0 0 #9fd574;
 -webkit-box-shadow: 0 1px 0 0 #9fd574 inset ;
 -moz-box-shadow: 0 1px 0 0 #9fd574 inset;
 -ms-box-shadow: 0 1px 0 0 #9fd574 inset;
 -o-box-shadow: 0 1px 0 0 #9fd574 inset;
 color: white;
 font-weight: bold;
 padding: 6px 10px;
 text-align: center;
 text-shadow: 0 -1px 0 #396715;
}
.uform .pt:hover {
 opacity:.85;
 cursor: pointer;
}
.uform .pt:active {
 border: 1px solid #20911e;
 box-shadow: 0 0 10px 5px #356b0b inset;
 -webkit-box-shadow:0 0 10px 5px #356b0b inset ;
 -moz-box-shadow: 0 0 10px 5px #356b0b inset;
 -ms-box-shadow: 0 0 10px 5px #356b0b inset;
 -o-box-shadow: 0 0 10px 5px #356b0b inset;
}

</style>

<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
		function getLaw($login1, $pass1)
	{
			try
			{
				$dbuser = "postgres";
        		$dbpass = "kf,fnfvbz";
        		$db = new PDO("pgsql:host=localhost;dbname=mapper", $dbuser, $dbpass);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$query = $db->prepare('SELECT * FROM USERS WHERE login=? AND pass=?');
				$query->bindParam(1, $login1, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT);
				$query->bindParam(2, $pass1, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT);
				$query->execute();
				$res = $query->fetchAll(PDO::FETCH_ASSOC);
				return $res;
				//echo "All Good";
				//header ("Location: ".$_SERVER['HTTP_REFERER']);
			}
			catch(\PDOException $e)
			{
				echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
				return '0'.$e->getMessage();
			}		
	}

	function getUser($login, $pass)
	{
			try
			{
				$dbuser = "postgres";
        		$dbpass = "kf,fnfvbz";
        		$db = new PDO("pgsql:host=localhost;dbname=mapper", $dbuser, $dbpass);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$query = $db->prepare('SELECT * FROM USERS WHERE login=? AND pass=?');
				$query->bindParam(1, $login, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT);
				$query->bindParam(2, $pass, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT);
				$query->execute();
				$result = $query->fetchColumn();
				$res = $query->fetchAll(PDO::FETCH_ASSOC);
				foreach ($res as $ar) {
					$law = $ar['law'];
					echo $law;
					# code...
				}
				return $result;
				//echo "All Good";
				//header ("Location: ".$_SERVER['HTTP_REFERER']);
			}
			catch(\PDOException $e)
			{
				echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
				return '0'.$e->getMessage();
			}		
	}



?>
<body>

	<div class="loginblock">
		<div class="iname">
			<div class="logo">
				<span>AGRO-MAP</span>
			</div>
		</div>
		<div class="iform">
			<form class="uform" method="post">
				<ul>
					<li>
						<label for="login">Логин:</label>
						<input type="text" name="login" required>
					</li>
					<li>
						<label for="passw">Пароль:</label>
						<input type="password" name="passw" required>
					</li>
					<input type="submit" name="" class="pt" value="Войти">
	<?php
						ini_set('error_reporting', E_ALL);
						ini_set('display_errors', 1);
						ini_set('display_startup_errors', 1);
					session_start();
						if(count($_POST)>0){
							$l = $_POST['login'];
							$p = md5($_POST['passw']);
							$a = getUser($l, $p);
							$b = getLaw($l, $p);
							
							if($a>0){
								foreach ($b as $v) {
								$law = $v['law'];
							}
								echo 'user is in: '.$_POST['login']. 'you law = '.$law;
								$_SESSION['is_auth'] = true;
								$_SESSION['law'] = $law;
								setcookie('login', $l, time() + 3600, '/map/');
								setcookie('law', $law, time() + 3600, '/map/');
								header('Location: tts1.php');
								exit();
							}
							else
							{
								echo '<br>Таких данных нет ';

							}

						} 
	?>
				</ul>
			</form>
		</div>
	</div>
</body>

