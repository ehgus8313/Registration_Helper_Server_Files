<?php
$con = mysqli_connect("localhost", "ehgus83133", "rnjs2264@@", "ehgus83133_godohosting_com");

$userID = $_POST["userID"];
$userPassword = $_POST["userPassword"];
$userName = $_POST["userName"];
$userEmail = $_POST["userEmail"];
$userGender = $_POST["userGender"];
$userMajor = $_POST["userMajor"];
$admin = $_POST["admin"];

include 'pbkdf2.compat.php';
$hash = create_hash($userPassword);
$statement = mysqli_prepare($con, "INSERT INTO USER2 VALUES(?, ?, ?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($statement, "sssssss", $userID, $hash, $userName, $userEmail, $userGender, $userMajor,$admin);
mysqli_stmt_execute($statement);

$response = array();
$response["success"] = true;

echo json_encode($response);

?>
