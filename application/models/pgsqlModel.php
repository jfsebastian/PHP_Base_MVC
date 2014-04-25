<?php

function connect($config)
{
    try
    {
        // Create connection to MYSQL database
        // Fourth true parameter will allow for multiple connections to be made
        $db_connection = pg_connect('host='.$config['database.server'].' '.
				  					'user='.$config['database.user'].' '.
				  					'password='.$config['database.password'].' '.
        							'dbname='.$config['database.db']
						);
        if (!$db_connection)
            throw new Exception('PostgreSQL Connection Database Error: ' . pg_last_error());
    }
    catch (Exception $e)
    {
        echo $e->getMessage();
    }

    return $db_connection;
}

function disconnect($cnx)
{
	//pg_close($cnx)
	return FALSE/TRUE;
}

function query($sql, $cnx)
{
	$arrayData=array();
	
    try
    {
		// Perform Query
		$result = pg_query($cnx,$sql);
		if ($result==false)
			throw new Exception('PostgreSQL Query Error: ' . pg_last_error() . ' On: ' . $sql);
		else 
		{
			if(is_resource($result))
				while($row=pg_fetch_array($result,MYSQL_ASSOC))
				{
					$arrayData[]=$row;
				}
			else 
				$arrayData[]=$result;
		}
	}
	catch (Exception $e)
	{
		echo $e->getMessage();
	}
	
	// Free the resources associated with the result set
	// This is done automatically at the end of the script
	if(is_resource($result))
		pg_free_result($result);
	
	return $arrayData;
}
?>