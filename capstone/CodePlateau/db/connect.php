<?php
	try
	{
		//Database config
		$db_host = 'localhost';
		$db_user = 'root';
		$db_pass = 'password01';
		$db_database = 'code_plateau';

		//end config

		$db = new PDO('mysql:host='.$db_host.';
										dbname='.$db_database, $db_user, $db_pass);
		$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
?>
