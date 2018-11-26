<?php
//this link is used  on the client side !
//localhost/help-me/login.php?email=......&phone=........
	require 'connection.php';
	$pass = $_GET["password"];
    $email = $_GET["email"];
    $sql1="select* from user where email='$email' && password= '$pass'";
    $resu= mysqli_query($con,$sql1);

    $dataarray=array();
	if(mysqli_num_rows($resu) == 1)
	{	
		$rr2=mysqli_fetch_assoc($resu);
		$dataarray["error"]=false;
		$dataarray["message"]="Server: Login successed!";
		
		$dataarray["user"]=$arrayName = array('id' =>$rr2["id"] , 'email' =>$rr2["email"] , 'firstname' => $rr2["first_name"] , 'secondname' =>$rr2["last_name"]  , 
			'phone' =>$rr2["phone"]  );
    }
    else {
		$dataarray["error"]=true;
		$dataarray["message"]="Server: Not Found !";
    }
	    header('Content_Type: application/json');
    echo json_encode($dataarray);

	 
?>