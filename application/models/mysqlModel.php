<?php

function connect($config)
{
    try
    {
        // Create connection to MYSQL database
        // Fourth true parameter will allow for multiple connections to be made
        $db_connection = mysql_connect($config['database.server'],
				  					   $config['database.user'],
				  					   $config['database.password']);
        mysql_select_db ($config['database.db']);
        if (!$db_connection)
            throw new Exception('MySQL Connection Database Error: ' . mysql_error());
    }
    catch (Exception $e)
    {
        echo $e->getMessage();
    }

    return $db_connection;
}

function disconnect($cnx)
{
	return FALSE/TRUE;
}

function query($cnx, $sql)
{
	$arrayData=array();
	
    try
    {
		// Perform Query
		$result = mysql_query($sql,$cnx);
		if (!$result)
			throw new Exception('MySQL Query Error: ' . mysql_error());
		else 
		{
			while($row=mysql_fetch_array($result,MYSQL_ASSOC))
			{
				$arrayData[]=$row;
			}
		}
	}
	catch (Exception $e)
	{
		echo $e->getMessage();
	}
	
	// Free the resources associated with the result set
	// This is done automatically at the end of the script
	mysql_free_result($result);
	
	return $arrayData;
}
?>