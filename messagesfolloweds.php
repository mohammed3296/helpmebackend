<?php
//this php file used to send the latitude and longitude for specific followed user.
//you will send the id of the followed user .
  //  $_GET["followed_id"]=2; //for test
	require 'connection.php';
	if(isset($_GET["followedid"])){
	$followed_id = $_GET["followedid"];
    
    $sql1="select latitude ,longitude,time from tracking where  sender=$followed_id";

    $resu= mysqli_query($con,$sql1);

    $dataarray=array();
    $i=0;
	if(mysqli_num_rows($resu) >0)
	{	
		$dataarray["error"]=false;
		$dataarray["message"]="successful query!";
		while($rr2=mysqli_fetch_assoc($resu))
		{		
		$arrayName["$i"] = array('latitude' =>$rr2["latitude"] , 'longitude' =>$rr2["longitude"], 'time' =>$rr2["time"]);
			
		$i++;
	     }
	$dataarray["path"]=$arrayName;
    }
    else {
		$dataarray["error"]=true;
		$dataarray["message"]="ther is no tracking for this user !";
    }
	    header('Content_Type: application/json');
	}
	    else {
	    	$dataarray["error"]=true;
	    
		$dataarray["message"]="id not sent !";}
    echo json_encode($dataarray);
	 
?>