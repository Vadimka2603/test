
<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	$dbuser = "postgres";
    $dbpass = "kf,fnfvbz";
    $dbase = "alisa";
    $result = array();
	function selectusers($idu, $dbase, $dbuser, $dbpass)
	{
		$sql = "SELECT
	u.*,
	p.*,
	t.*,
	d.*
FROM u_users AS u

INNER JOIN ph_phone AS p ON u.id=p.u_id
INNER JOIN ph_tariff AS t ON t.tid =  p.ph_tariff
INNER JOIN u_dol AS d ON u.u_dol = d.did
INNER JOIN ph_operator AS O ON o.oid = t.t_operator
WHERE u.id =$idu";

	$ds = new PDO("pgsql:host=localhost;dbname=".$dbase, $dbuser, $dbpass);
	$query = $ds->prepare($sql);
	$query->execute();
	$result = $query->fetchAll(PDO::FETCH_ASSOC);
	return $result;


	}
		$b =array();
		$idu = $_POST['idu'];

		$idd = selectusers($idu, $dbase, $dbuser, $dbpass);
		/*echo '<pre>';
print_r($idd);*/
		foreach($idd as $item) {
			$b = array(
				"u_name" => $item['u_name'], //имя
				"u_family" => $item ['u_family'], //фамилие
				"u_otchestvo" => $item['u_otchestvo'], //отчество
				"ph_number" => $item['ph_number'], //номер телефона
				"u_pass_n" => $item['u_pass_n'], //номер пасспорта
				"u_pass_s" => $item['u_pass_s'], //серия паспорта
				"u_pass_c" => $item['u_pass_c'], //дата выдачи
				"u_date" => $item['u_date'], //дата рождения
				"u_mail" => $item['u_mail'], // почта
				"u_vnutr" => $item['u_vnutr'], //внутренний номер
				"u_adresreg_i" => $item['u_adresreg_i'],
				"u_adresreg_s" => $item['u_adresreg_s'],
				"u_adresreg_reg" => $item['u_adresreg_reg'],
				"u_adresreg_rag" => $item['u_adresreg_rag'],
				"u_adresreg_types" => $item['u_adresreg_types'],
				"u_adresreg_city" => $item['u_adresreg_city'],
				"u_adresreg_tul" => $item['u_adresreg_tul'],
				"u_adresreg_ul" => $item['u_adresreg_ul'],
				"u_adresreg_ndom" => $item['u_adresreg_ndom'],
				"u_adresreg_tstr" => $item['u_adresreg_tstr'],
				"u_adresreg_nstr" => $item['u_adresreg_nstr'],
				"u_adresreg_npom" => $item['u_adresreg_npom'],
				"u_inn" => $item['u_inn'],
				"u_pfr" => $item['u_pfr'],
				"u_adresprop_s" => $item['u_adresprop_s'],
				"u_adresprop_reg" => $item['u_adresprop_reg'],
				"u_adresprop_rag" => $item['u_adresprop_rag'],
				"u_adresprop_types" => $item['u_adresprop_types'],
				"u_adresprop_city" => $item['u_adresprop_city'],
				"u_adresprop_tul" => $item['u_adresprop_tul'],
				"u_adresprop_ul" => $item['u_adresprop_ul'],
				"u_adresprop_ndom" => $item['u_adresprop_ndom'],
				"u_adresprop_tstr" => $item['u_adresprop_tstr'],
				"u_adresprop_nstr" => $item['u_adresprop_nstr'],
				"u_adresprop_npom" => $item['u_adresprop_npom'],
				"ph_nsim" => $item['ph_nsim'],
				"t_name" => $item['t_name'],
				"t_code" => $item['t_code'],
				"t_min" =>$item['t_min'],
				"t_sms" =>$item['t_sms'],
				"t_int" =>$item['t_int'],
				"t_summ" =>$item['t_summ'],
				"tel" => $item['pid']


			);
		}
		echo json_encode($b);

?>
