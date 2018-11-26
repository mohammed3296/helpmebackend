<?php
 require 'connection.php';
 
  $dataarray["error"]=false;
 if(isset($_GET["followers"]))
 {
	$c=0;
	$id = $_GET["followers"] ;
    $current_id=$_GET["currentuser"];
	while($c<count($id))
	{
		
		$d= $id[$c];
        $sql = "insert into followers (sender,receiver) values ( $d,$current_id)";
		if ($con->query(($sql))===false) {
   
	 $dataarray["error"]=true;
    }
       $c+=1;
	}    
    
}
else
{
	 $dataarray["error"]=true;
}

echo json_encode($dataarray);
 
 ?>