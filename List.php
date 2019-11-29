<?php
 header("Content-Type: text/html; charset=UTF-8");
$con = mysqli_connect("localhost", "ehgus83133", "rnjs2264@@", "ehgus83133_godohosting_com");
mysqli_set_charset($con,"utf8");
$result = mysqli_query($con, "SELECT * FROM USER2;");
$response = array();

while($row = mysqli_fetch_array($result)) {
array_push($response, array("userID"=>$row[0], "userName"=>$row[2], "userEmail"=>$row[3], "userGender"=>$row[4], "userMajor"=>$row[5], "admin"=>$row[6]));
}

function han ($s) { return reset(json_decode('{"s":"'.$s.'"}')); }
function to_han ($str) { return preg_replace('/(\\\u[a-f0-9]+)+/e','han("$0")',$str); }
	

    echo to_han (json_encode(array("response"=>$response)));
mysqli_close($con);
?>
