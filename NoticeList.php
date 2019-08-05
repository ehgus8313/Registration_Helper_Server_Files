<?php
    $con = mysqli_connect("localhost", "ehgus83133", "rnjs2264@@", "ehgus83133_godohosting_com");
    $result = mysqli_query($con, "SELECT * FROM NOTICE ORDER BY noticeDate DESC;");
    $response = array();

    while($row = mysqli_fetch_array($result)){
      array_push($response, array("noticeContent"=>$row[0], "noticeName"=>$row[1], "noticeDate"=>$row[2]));
    }

    echo json_encode(array("response"=>$response));
    mysqli_close($con);
    ?>
