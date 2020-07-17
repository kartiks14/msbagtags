<?php

    session_start();
	
	$JSON = $_POST['data'];
	
	$object = json_decode($JSON,true);

    $fileName = '';
	$fileCntr = 0;
    foreach ($object['fileExtensions'] as $f){
        $fileName .= 'Scorecard ' . $object['datetime']."-".$fileCntr.".".$f.";";
		$fileCntr = $fileCntr + 1;
    }
    $fileName = rtrim($fileName,";");

//open connection to mysql db
    $connection = mysqli_connect("localhost","uuuqq8y856pqp","e1h[fqj1(h%_","dbcjp34z5c9yg6");

	//fetch table rows from mysql db
	//$sql = "UPDATE `dbcjp34z5c9yg6`.`MorningSquad` SET `Tag` = '".$object['tag']."' WHERE Id ='".$object['id']."'";

    $sql= "UPDATE `dbcjp34z5c9yg6`.`MorningSquad` SET `imgName` = '".$fileName."' WHERE UpdatedDate = '".$object['datetime']."'";
	
	$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

    //close the db connection
    mysqli_close($connection);
	session_destroy();
?>