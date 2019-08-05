<?php
$con = mysqli_connect("localhost", "ehgus83133", "rnjs2264@@", "ehgus83133_godohosting_com");

$userID = $_POST["userID"];
$courseID = $_POST["courseID"];

$statement = mysqli_prepare($con, "INSERT INTO SCHEDULE VALUES(?, ?)");
mysqli_stmt_bind_param($statement, "ss", $userID, $courseID);
mysqli_stmt_execute($statement);

$response = array();
$response["success"] = true;

echo json_encode($response);

?>
