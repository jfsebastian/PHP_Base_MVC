<?php

function readUsersPets()
{

}

function readUsersLanguages()
{
	
}

function readUsers($cnx)
{
	$sql = "SELECT userid,name,email,password,description,photo,coders,city
			FROM users
			INNER JOIN cities ON
				  users.cities_idcity=cities.idcity;";
	$arrayUsers = query($cnx,$sql);
	return $arrayUsers;
}

function readUser($id, $cnx)
{
	return $arrayUser;
}

function insertUser($arrayData, $cnx)
{
	$sql="INSERT * FROM users";
	$arrayUsers = query($cnx,$sql);
	return $lastID;
}

function updateUser($arrayData, $id, $cnx)
{
	return $numRows;
}

function deleteUser($id, $cnx)
{
	return $numRows;
}
?>