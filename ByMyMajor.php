<?php
header("Content-Type: text/html; charset=UTF-8");
$con = mysqli_connect("localhost", "ehgus83133", "rnjs2264@@", "ehgus83133_godohosting_com");

$userID = $_GET["userID"];

$result = mysqli_query($con, "SELECT COURSE.courseID, COURSE.courseGrade, COURSE.courseTitle, COURSE.courseProfessor, COURSE.courseCredit
, COURSE.courseDivide, COURSE.coursePersonnel, COURSE.courseTime FROM COURSE, SCHEDULE, USER2 WHERE USER2.userMajor IN (SELECT
 userMajor FROM USER2 WHERE userID = '$userID') AND USER2.userID = SCHEDULE.userID AND SCHEDULE.courseID = COURSE.courseID GROUP BY
 SCHEDULE.courseID ORDER BY COUNT(SCHEDULE.courseID) DESC LIMIT 5;");

$response = array();
while($row = mysqli_fetch_array($result)){
	array_push($response, array("courseID"=>$row[0], "courseGrade"=>$row[1], "courseTitle"=>$row[2], "courseProfessor"=>$row[3], "courseCredit"=>$row[4], "courseDivide"=>$row[5], "coursePersonnel"=>$row[6], "courseTime"=>$row[7]));
}

function han ($s) { return reset(json_decode('{"s":"'.$s.'"}')); }
function to_han ($str) { return preg_replace('/(\\\u[a-f0-9]+)+/e','han("$0")',$str); }
	

    echo to_han (json_encode(array("response"=>$response)));
    mysqli_close($con);
    ?>