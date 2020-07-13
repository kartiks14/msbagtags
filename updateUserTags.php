<?php

    session_start();
	
	$JSON = $_POST['data'];
	
	$object = json_decode($JSON,true);
    $currentDateTime = date('Y-m-d H:i:s');

//open connection to mysql db
    $connection = mysqli_connect("localhost","uuuqq8y856pqp","e1h[fqj1(h%_","dbcjp34z5c9yg6");

	//fetch table rows from mysql db
	//$sql = "UPDATE `dbcjp34z5c9yg6`.`MorningSquad` SET `Tag` = '".$object['tag']."' WHERE Id ='".$object['id']."'";

    $sql= "INSERT INTO  `dbcjp34z5c9yg6`.`MorningSquad` (`Name`, `Tag`, `UpdatedDate`) VALUES ";
	
	
	foreach ($object['tagList'] as $i){
		$sql.= "('".$i['Name']."','".$i['Tag']."','".$currentDateTime."'),";
	}
	$sql = rtrim($sql,",");
	$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

    //close the db connection
    mysqli_close($connection);
	session_destroy();
?>