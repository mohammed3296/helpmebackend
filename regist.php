<?php
//this link is used  on the client side !
//localhost/help-me/regist.php?firstname=ihgf&secondname=hhhh&email=1234567891011fci%40gmail.com&phone=01155280747&password=qwer&i=1
include 'connection.php';
if(isset($_GET["firstname"])&& isset($_GET["secondname"] )&& isset($_GET["email"]) &&isset($_GET["phone"])&& isset($_GET["password"])){
  
	 $first_name = $_GET["firstname"];
     $last_name = $_GET["secondname"];
     $email = $_GET["email"];
     $phone = $_GET["phone"];
     $pass = $_GET["password"];
	 
		//Save Data to Database
    $sql1="select* from user where email='$email'";
    $sql2 = "INSERT INTO user VALUES (null,'$first_name','$last_name','$email','$pass',' ','$phone','true','1','1')";
    $resu= mysqli_query($con,$sql1);

     $dataarray=array();
	if(mysqli_num_rows($resu) > 0)
	{
		$dataarray["error"]=true;
		$dataarray["message"]="Orleady exit !";
    
	}
	else 
	if ($con->query($sql2) === TRUE) {
    $dataarray["error"]=false;
	$dataarray["message"]="You have registered successfully ! ";
    
	} 
	else{
		$dataarray["error"]=true;
		$dataarray["message"]="some error occure ! ";
		 
	}
 header('Content_Type: application/json');
 echo json_encode($dataarray);
}
else {
	
	//echo ("error");
}
?>