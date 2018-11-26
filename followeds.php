<?php
//this php file used to send the name and id and email for the people who are pushed track button for their followers.
//you will send the current id .
   // $_GET["current_id"]=1;// for test
	require 'connection.php';
	if(isset($_GET["currentuser"])){
	$current_id = $_GET["currentuser"];
    
    $sql1="select sender as id ,first_name , last_name, email  from user,(( select tracking.Sender from tracking ,followers 
    	where  (followers.receiver=$current_id and followers.sender=tracking.Sender) group by tracking.Sender ) as tracking) where sender=user.id";

    $resu= mysqli_query($con,$sql1);

    $dataarray=array();
    $i=0;
	if(mysqli_num_rows($resu) >0)
	{	
		$dataarray["error"]=false;
		$dataarray["message"]="successful query!";
		while($rr2=mysqli_fetch_assoc($resu)){		
		$arrayName["$i"] = array('id' =>$rr2["id"] , 'email' =>$rr2["email"] , 'firstname' => $rr2["first_name"] , 'secondname' =>$rr2["last_name"] );
			
		$i++;
	}
	$dataarray["user"]=$arrayName;
    }
    else {
		$dataarray["error"]=true;
		$dataarray["message"]="Server: Not Found !";
    }
	    header('Content_Type: application/json');
	}
	    else {
	    	$dataarray["error"]=true;
	    
		$dataarray["message"]="id not sent !";}
    echo json_encode($dataarray);
	 
?>