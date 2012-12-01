<?php

function readUserPets($id,$cnx)
{
	$arrayPets = array();
	
	$sql = "SELECT pet
			FROM pets
			INNER JOIN users_has_pets ON
				  users_has_pets.users_iduser=".$id." AND
				  users_has_pets.pets_idpet=pets.idpet;";
	$results = query($cnx,$sql);
	foreach ($results as $result)
		$arrayPets[] = $result['pet'];
	return implode(",",$arrayPets);
}

function readUserLanguages($id,$cnx)
{
	$arrayLanguages = array();
	
	$sql = "SELECT language
			FROM languages
			INNER JOIN users_has_languages ON
				  users_has_languages.users_iduser=".$id." AND
				  users_has_languages.languages_idlanguage=languages.idlanguage;";
	$results = query($cnx,$sql);
	foreach ($results as $result)
		$arrayLanguages[] = $result['language'];
	return implode(",",$arrayLanguages);
}

function readUsers($cnx)
{
	$sql = "SELECT iduser,name,email,password,description,city,coders,photo
			FROM users
			INNER JOIN cities ON
				  users.cities_idcity=cities.idcity;";
	$arrayUsers = query($cnx,$sql);
	for($i=0;$i<count($arrayUsers);$i++)
	{
		$arrayUsers[$i]['pets'] = readUserPets($arrayUsers[$i]['iduser'],$cnx);
		$arrayUsers[$i]['languages'] = readUserLanguages($arrayUsers[$i]['iduser'],$cnx);
	}
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