<?php
$con = mysqli_connect("localhost", "ehgus83133", "rnjs2264@@", "ehgus83133_godohosting_com");

$userID = $_POST["userID"];

$statement = mysqli_prepare($con, "DELETE FROM USER2 WHERE userID = ?");
 mysqli_stmt_bind_param($statement, "s", $userID);
 mysqli_stmt_execute($statement);

$response = array();
$response["success"] = true;

echo json_encode($response);
?>