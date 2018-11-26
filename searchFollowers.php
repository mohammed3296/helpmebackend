<?php
 require 'connection.php';
 
    if(isset($_GET["id"]))
    {
         $search=$_GET["word"];
	        $id=$_GET["id"];
        $sql1="select id,email,first_name,last_name from user 
		where first_name like '$search%' and id != '$id' and id not in (select receiver from followers where receiver ='$id')";
															
       $result = $con->query($sql1);
							
       $dataarray=array();
							
   if ($result->num_rows > 0) {
	      $dataarray["error"]=false;
    
    while($row = $result->fetch_assoc()) {
     	$dataarray["user"][]= array('id' =>$row["id"] , 'email' =>$row["email"] , 'firstname' => $row["first_name"] , 'secondname' =>$row["last_name"]);
                                         }
 } else {
    $dataarray["error"]=true;
}
				}
  else
  {
     $dataarray["error"]=true;
   }

    echo json_encode($dataarray);

     $con->close();
?>

       