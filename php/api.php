<?php
header("Content-Type:application/json");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
$con = mysqli_connect($_ENV['DB_HOST'],$_ENV['DB_USER'],$_ENV['DB_PASS'],$_ENV['DB_NAME']);
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}
$result = mysqli_query(
     $con,
     "SELECT * FROM `data`");
if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_array($result);
    response($row);
    mysqli_close($con);
}else{
    response(NULL, NULL, 200,"No Record Found");
}

function response($row){
    $json_response = json_encode($row);
    echo $json_response;
}
?>