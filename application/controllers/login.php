<?php
require_once(APPLICATION_PATH."/models/loginModel.php");

switch($arrayRequest['action'])
{
	case 'index':
	case 'login':
		if($_POST)
		{
			loginUser($cnx, $_POST);
			$content = "Estas autenticado";
			header("Location: /users/select");
		}
		else
			$content = renderView('login/login', array(), $config);
		break;
	case 'logout':
		break;
	default:
		break;
}

$params = array('userName'=>'Agustin',
				'content'=>$content);
echo renderLayout("layout_login.php", $params, $config);

?>