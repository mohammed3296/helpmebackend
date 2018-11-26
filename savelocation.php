<?php
//this php file used to insert the latitude and longitued for tracked user in the database..
//you will send the id of the tracked user and latitude and longitude .
 // $_GET["tracked_id"]=2; //for test
 // $_GET["latitude"]=55.0;  //for test
  //$_GET["longitude"]=55.0; //for test
	require 'connection.php';
	http://192.168.173.1/help-me/savelocation.php?currentuser=6&Latitude=27.06806689580735&Longitude=31.27657943656854&time=1517135467906
	if(isset($_GET["currentuser"]) && isset($_GET["asd1"]) && isset($_GET["asd2"])&& isset($_GET["time"])){
		
	$tracked_id= $_GET["currentuser"];
	$latitude=   $_GET["asd1"];
	$longitude=  $_GET["asd2"];
    $time=  $_GET["time"];
    
     $sql1 = "INSERT INTO tracking VALUES ('$tracked_id','$latitude','$longitude',' $time')";
     $dataarray=array();
    if ($con->query($sql1) === TRUE) {
    $dataarray["error"]=false;
	$dataarray["message"]="successful insertion for latitude and longitude! ";
    
	} 
	else{
		 $dataarray["error"]=true;
	     $dataarray["message"]="failur insertion for latitude and longitude! ";
	}
}
else
{
    $dataarray["error"]=true;
	$dataarray["message"]="the value not sent correctly";
}
    
	 //   header('Content_Type: application/json');
        echo json_encode($dataarray);
	 
?>