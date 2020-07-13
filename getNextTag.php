<?php

    session_start();

//open connection to mysql db
    $connection = mysqli_connect("localhost","uuuqq8y856pqp","e1h[fqj1(h%_","dbcjp34z5c9yg6");
    
	//fetch table rows from mysql db
    $sql = "select max(Tag)+1 as Tag,max(UpdatedDate) as UpdatedDate from MorningSquad";

    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

    while($row =mysqli_fetch_assoc($result))
    {
        $resultArray[] = $row;
    }


    // send the result
    echo json_encode($resultArray);
	
    //close the db connection
    mysqli_close($connection);
	session_destroy();
?>