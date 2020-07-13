<?php

    session_start();

    $JSON = $_POST['data'];
	
	$object = json_decode($JSON,true);

//open connection to mysql db
    $connection = mysqli_connect("localhost","uuuqq8y856pqp","e1h[fqj1(h%_","dbcjp34z5c9yg6");
    
	//fetch table rows from mysql db
    if(is_null($object['datetime'])){
        $sql = "select * from MorningSquad where UpdatedDate in (select max(UpdatedDate) from MorningSquad) order by Tag asc";
    } else if ($object['dir'] < 0){
	    $sql = "select * from MorningSquad where UpdatedDate in (select max(UpdatedDate) from MorningSquad where UpdatedDate <'".$object['datetime']."' order by UpdatedDate) order by Tag asc";
    } else {
	    $sql = "select * from MorningSquad where UpdatedDate in (select min(UpdatedDate) from MorningSquad where UpdatedDate >'".$object['datetime']."' order by UpdatedDate) order by Tag asc";
    }
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