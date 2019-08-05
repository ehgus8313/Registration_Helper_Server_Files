<?php
 $con = mysqli_connect("localhost", "ehgus83133", "rnjs2264@@", "ehgus83133_godohosting_com");
 mysqli_set_charset($con,"utf8");
 $userID = $_POST["userID"];
 $userPassword = $_POST["userPassword"];

 $statement = mysqli_prepare($con, "SELECT userID, userPassword FROM USER2 WHERE userID = ?");
 mysqli_stmt_bind_param($statement, "s", $userID);
 mysqli_stmt_execute($statement);

 mysqli_stmt_store_result($statement);
 mysqli_stmt_bind_result($statement, $userID, $hash);

 $response = array();
 //$response["success"] = false;

include 'pbkdf2.compat.php';
while(mysqli_stmt_fetch($statement)){
  if(validate_password($userPassword, $hash)) {
  $reponse["success"] = true;
  $reponse["userID"] = $userID;
  $reponse["userPassword"] = $userPassword;
	}
}

if ($reponse["success"] != true) {
	$reponse["success"] = false;
}
  echo json_encode($reponse);
?>