<?php
header("Content-Type: text/html; charset=UTF-8");
$con = mysqli_connect("localhost", "ehgus83133", "rnjs2264@@", "ehgus83133_godohosting_com");

$userID = $_GET["userID"];

$result = mysqli_query($con, "SELECT COURSE.courseID, COURSE.courseTime, COURSE.courseProfessor, COURSE.courseTitle, COURSE.courseCredit FROM USER2, COURSE, SCHEDULE WHERE USER2.userID = '$userID' AND USER2.userID = SCHEDULE.userID AND SCHEDULE.courseID = COURSE.courseID");

$response = array();
while($row = mysqli_fetch_array($result)){
	array_push($response, array("courseID"=>$row[0], "courseTime"=>$row[1], "courseProfessor"=>$row[2], "courseTitle"=>$row[3], "courseCredit"=>$row[4]));
}

function han ($s) { return reset(json_decode('{"s":"'.$s.'"}')); }
function to_han ($str) { return preg_replace('/(\\\u[a-f0-9]+)+/e','han("$0")',$str); }
	

    echo to_han (json_encode(array("response"=>$response)));
    mysqli_close($con);
    ?>