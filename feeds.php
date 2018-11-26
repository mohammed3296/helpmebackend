<?php
	require 'connection.php';
    
    $sql1="select * from poster order by id desc;";

    $resu= mysqli_query($con,$sql1);

    $dataarray=array();
    $i=0;
	if(mysqli_num_rows($resu) >0)
	{	
		$dataarray["error"]=false;
		$dataarray["message"]="successful query!";
		while($rr2=mysqli_fetch_assoc($resu)){		
		$arrayName["$i"] = array('id' =>$rr2["id"] , 'image' =>$rr2["image"] , 'placename' => $rr2["placename"] , 'datetime' =>$rr2["datetime"] , 'description' =>$rr2["description"], 'usermail' =>$rr2["usermail"], 'userphone' =>$rr2["userphone"], 'childname' =>$rr2["childname"], 'childage' =>$rr2["childage"], 'childsex' =>$rr2["childsex"], 'height' =>$rr2["height"], 'weight' =>$rr2["weight"], 'hair' =>$rr2["hair"], 'eyes' =>$rr2["eyes"], 'latitude' =>$rr2["latitude"], 'longitude' =>$rr2["longitude"], 'username' =>$rr2["username"]);
			
		$i++;
	}
	$dataarray["feeds"]=$arrayName;
    }
    else {
		$dataarray["error"]=true;
		$dataarray["message"]="Server: Not Found !";
    }
	    header('Content_Type: application/json');
    echo json_encode($dataarray);
	 
?>