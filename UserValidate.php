<?php
$con = mysqli_connect("localhost", "ehgus83133", "rnjs2264@@", "ehgus83133_godohosting_com");

$userID = $_POST["userID"];

$statement = mysqli_prepare($con, "SELECT * FROM USER2 WHERE userID = ?");
mysqli_stmt_bind_param($statement, "s", $userID);
mysqli_stmt_execute($statement);
mysqli_stmt_store_result($statement);


$response = array();
$response["success"] = true;

while(mysqli_stmt_fetch($statement)){
$response["success"] = false;
$response["userID"] = $userID;
}

echo json_encode($response);
?>
