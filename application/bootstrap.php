<?php

if(isset($_GET['controller']))
	$action = $_GET['controller'];
else 
	$action = 'index';

$config = readConfig('../application/configs/config.ini', 'production');
$cnx=connect($config);

/* Aqui se crearia la sesion, se crearian las cookies,
 * y se verificaria que el usuario esta autenticado */

switch($action)
{
	case 'users':
		include("../application/controllers/users.php");
	break;
	case 'index':
	default;
		die("Al controller index");
	break;
}
?>