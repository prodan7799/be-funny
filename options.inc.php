<? defined("INC_SCAN") or die(header("Location: /error.php"));

$db = mysql_connect("localhost","be-funny","aYCmevYtEsftTHVW");
@mysql_select_db("be-funny",$db);
@mysql_query("SET NAMES cp1251");

$request_url = string_slash($_SERVER[REQUEST_URI]);
$http_host = string_slash($_SERVER[HTTP_HOST]);
$http_user_agent = string_slash($_SERVER[HTTP_USER_AGENT]);

$site_page = explode("_", $request_url);
$site_page = explode(".", $site_page[1]);

$arr_title = array("���������� �������","������� ��� ��������������","������� ��� ������","������� ��� �����","������� �������","������� �� �������","�������� �������","������� ����� ��������","�������� �������","������ ����","������� 2013","������ �������","������� ��� �������","������ ���","������� ��� ���������","������� ��� ������","������� ��� ������","������� � �������","���������� ������� ��� ��������������","������� ��","������� ��� �����","������� �������","�������� �������","������� ��� ������","������� ��� ���� �������","�������� �������","������� ��� �������","������ �������","�������� ������� 2013","����� ������� 2013","������� ������������","������� ��� ����","������� ��� ����� �����","��������� �������","����� ������ �������","������� ��� ����� �� �������","������� ��� ����","������� ������� ��� ��������������","������� ��� ������ � �����","������� ��� ������","������� 2013 ����","������� ��� �����","������� �������","���������� �������","������� �������","������� ��� ������","���������� ������� ��� �����","������� ��� ����� �����","������� �� ������� ��� ������","������� ��������","������� � ������","����� �������","�������� ������� �� �������","������� ��� ������","����� ������� �������","������� ��� ������","������� ��� �����","�������� ������� ��� ������","������ ��� ����������","������ �� �������","������� ������","������ � �����","������ � �����","������ ������� �����","�������� ������","������ ������","������ � ��������","������� ������","������� ������","������ � �����","���������� ������","������ �� ����","������ ���","���������� ������","������� � ������","����� ������","������ ��� ������","������ �� ������","������ � ������������","����� ������","�������� ������","������ ������","������ � ��������","��������� ������","������ � �������","������ ��� ������","������ �� ��������","������ � �����","����� ���������� ������","��������� ������","�������� ������","��������� ������","������ �� ������������","������ � ����� � �����","������ ��� �������","������ �� �����","�������� ��� �����","�������� ����������","������� ��������","�������� � �����","�������� � ������������","�������� ��� ���������","�������� ��� ������","������ ��������","�������� ������� �����","����� ��������","�������� ��������","�������� � �������","�������� ��� ������","�������� �����","������������, ��������, ������","�������� �� �������","�������� ��� ����","������ ��������","�������� � ������ �����","�������� ��� ������","������� ��������","��������, ��������","����� ��������","������� ��������","��������, ������, �������","�������� ��� �����","�������� ��� �����","�������� � ����� � �����","�������� ��� ������","��������� ��������","���������� �������� � ������������","����� ��������","�������� ��������","�������� ��������","������� �������� � ������������","�������� � �����","�������� ��� ����� �������","����� � ��������","�������� �������","�������� � ������","�������� ��� ������","�������� �� �������","�������� ��� ����� �� �������","������ ��������","�������� �������","�������� ��� �����","�������� ��������� ��������","�������� ���������","�����, ������, ��������","�������� ���������","�������� � �������","�������� � ����� � ����������","�������� ��� ������ � ������","���������� ��������","������, �����, ��������","������ ��������","�������� ��� �������","���������� �����","����� �� �����","���������� ����� �� �����","������������ �����","����� ���������� �����","����� � ��������","������� �����","�������������� �����","����� � ��������","���������� ����� � ��������","����� �����","��������� �����","������������ �����","���������� ����� � ��������","������� � �����","���� ���");

$title_def = "��������� �����, ��������, ��������� � ������.";
$description_def = "����� ������� ������������������ �������� � ����� ������� ��� ��������� ������� �������� ���� �������.";

if($request_url == "/")
{
	$title = $title_def;
	$description = $description_def;
}
else if($request_url == "/map.php")
{
	$title = $title_def." ����� �����.";
	$description = $description_def." ����� �����.";
}
else if($request_url == "/control.php")
{
	$title = $title_def." Control.";
	$description = $description_def." Control Panel.";
}
else if($request_url == "/error.php")
{
	$title = $title_def." ��������� ������.";
	$description = $description_def." ��������� ������.";
}
else
{
	setlocale(LC_CTYPE, array('ru_RU.CP1251',"ru_RU","ru","rus_RUS"));
	$res_arr_title = $arr_title[rand(0,170)];
	$title = ucfirst($res_arr_title).", �� ������� � ����� ���������.";
	$description = ucfirst($res_arr_title).", �� ������� � ����� ���������. ".$description_def;
}

$host_name = "Be-Funny.ru";
$keywords = "������, �������, ��������, �����, ������, �����, ����, ���������";
$email_address = "igorb@mail.ua";
$myPassword = "PfR40CAxCcfrY6qVfPGjiDgp";
$year_start = 2013;
$limit_record = 15;

function string_slash($str_post)
{
	$str = $str_post;
	$str = trim($str);
	$str = str_replace("�", "�", $str);
	$str = htmlspecialchars($str);
	return $str;
}

function reg_expres($var, $strlen_min, $strlen_max, $preg_match)
{
	if(empty($var) || strlen($var) < $strlen_min || strlen($var) > $strlen_max || !preg_match($preg_match,$var))
	{
		return true;
	}
	
	else
	{
		return false;
	}
}

if(strpos($http_user_agent, "Googlebot") !== false)
{
	mail($email_address, "Google, ����� ��� �� �����", "GoogleBot ������� ��� ��������: ".$request_url);
}

if(strpos($http_user_agent, "YandexBot") !== false)
{
	mail($email_address, "Yandex, ����� ��� �� �����", "YandexBot ������� ��� ��������: ".$request_url);
}

?>