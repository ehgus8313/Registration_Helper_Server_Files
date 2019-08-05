<?php
header("Content-Type: text/html; charset=UTF-8");
$con = mysqli_connect("localhost", "ehgus83133", "rnjs2264@@", "ehgus83133_godohosting_com");

$userID = $_GET["userID"];

$result = mysqli_query($con, "SELECT COURSE.courseID, COURSE.courseGrade, COURSE.courseTitle, COURSE.courseDivide, COURSE.coursePersonnel, COUNT(SCHEDULE.courseID), COURSE.courseCredit FROM COURSE, SCHEDULE WHERE SCHEDULE.courseID IN (SELECT SCHEDULE.courseID FROM SCHEDULE WHERE SCHEDULE.userID = '$userID') AND SCHEDULE.courseID = COURSE.courseID GROUP BY SCHEDULE.courseID");

$response = array();
while($row = mysqli_fetch_array($result)){
	array_push($response, array("courseID"=>$row[0], "courseGrade"=>$row[1], "courseTitle"=>$row[2], "courseDivide"=>$row[3], "coursePersonnel"=>$row[4], "COUNT(SCHEDULE.courseID)"=>$row[5], "courseCredit"=>$row[6]));
}

function han ($s) { return reset(json_decode('{"s":"'.$s.'"}')); }
function to_han ($str) { return preg_replace('/(\\\u[a-f0-9]+)+/e','han("$0")',$str); }
	

    echo to_han (json_encode(array("response"=>$response)));
    mysqli_close($con);
    ?>