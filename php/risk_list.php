<?php
/*	Author:		Kyle Foreman (kforeman@post.harvard.edu)
	Date:		11 January 2012
	Purpose:	Load risk factor list
*/

	// load in mysql server configuration
	include 'mysql_config.php';

	// connect to the database
	$pdo = new PDO($dsn, $username, $password);
	
	// make an empty array in which to put the data
	$rows = array();
	
	// prepare the query
	$stmt = $pdo->prepare('SELECT * FROM gbd_risks ORDER BY risk_name;');

	// query the database
	$stmt->execute(array('default'));
	
	// save the mysql results into an array
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	// return the results in json format
	if (count($rows)) echo json_encode($rows);
	else echo '"failure"';
?>