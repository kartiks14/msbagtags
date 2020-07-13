<?php

    session_start();

    $JSON = $_POST['data'];
	
	$object = json_decode($JSON,true);

//open connection to mysql db
    $connection = mysqli_connect("localhost","uuuqq8y856pqp","e1h[fqj1(h%_","dbcjp34z5c9yg6");
    
	//fetch table rows from mysql db
    $sql = "select Name from MorningSquad_Rounds where UpdatedDate = '". $object['datetime'] ."'";
    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

	$bagTagsArray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $bagTagsArray[] = $row;
    }
	
	$bagTagsJSON = json_encode($bagTagsArray);
	
	echo $bagTagsJSON;
	
    //close the db connection
    mysqli_close($connection);
	session_destroy();
?>