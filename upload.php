<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require_once('connection.php');
    $image       = $_POST['image'];
    $placename   = $_POST['placename'];
    $datetime    = $_POST['datetime'];
    $description = $_POST['description'];
    $usermail    = $_POST['usermail'];
    $userphone   = $_POST['userphone'];
    $childname   = $_POST['childname'];
    $childage    = $_POST['childage'];
    $childsex    = $_POST['childsex'];
    $height      = $_POST['height'];
    $weight      = $_POST['weight'];
    $hair        = $_POST['hair'];
    $eyes        = $_POST['eyes'];
    $latitude    = $_POST['latitude'];
    $longitude   = $_POST['longitude'];
	$username111    = $_POST['usernameusername'];
      $dataarray = array();
    
    
    $sql = "SELECT id FROM poster ORDER BY id ASC";
    
    $res = mysqli_query($con, $sql);
    
    $id = 0;
    
    while ($row = mysqli_fetch_array($res)) {
        $id = $row['id'];
    }
     // $path = "uploads/" .$childname. "_" . $childsex . "_" . $id . ".png";
     //$path = "uploads/$id.png";    
    $path = "uploads/" . str_replace(" ","_",$childname) . "_" . $childsex . "_" . $id . ".png";

    $actualpath = "http://192.168.173.1/help-me/$path";
    
    $sql1  = "INSERT INTO poster ( image ,placename ,datetime ,description ,usermail ,userphone ,childname ,childage ,childsex ,height ,weight ,hair ,eyes ,latitude ,longitude  , username) VALUES ('$actualpath','$placename','$datetime','$description','$usermail','$userphone','$childname','$childage','$childsex','$height','$weight','$hair','$eyes','$latitude','$longitude' , '$username111')";
  
    if (mysqli_query($con, $sql1)) {
        file_put_contents($path, base64_decode($image));
        $dataarray["message"] = "successfully";
    } else {
        $dataarray["message"] = "Error in base64_decode ! ";
		//$dataarray["message"] = mysql_error($sql1);
		
    }
    
    mysqli_close($con);
} else {
    $dataarray["message"] = "some error occure ! ";
}
echo json_encode($dataarray);