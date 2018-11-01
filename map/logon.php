<?php






	function auth(){
		if(count($_POST)>0)
		{
			$l = '';
			$p = '';
			$law = '';
			$login = $_POST['login'];
			$pass = $_POST['pass'];
			$a = getUser($login, $pass);
			foreach ($a as $authu) {
				$l = $authu['login'];
				$p = $authu['pass'];
				$law = $authu['law'];
			}
			$a = $arrayName = array('login' => $l, 'pass' => $p, 'law' =>  );
			return
		}
	}

?>
