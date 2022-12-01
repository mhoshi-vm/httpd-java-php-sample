<?php
header("Content-Type:application/json");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
$con = mysqli_connect(getenv('DB_HOST'),getenv('DB_USERNAME'),getenv('DB_PASSWORD'),getenv('DB_NAME'));
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}
$result = mysqli_query(
    $con,
    "SELECT * FROM `data`");
if(mysqli_num_rows($result)>0){
    while($row = $result->fetch_assoc()) {
        $myArray[] = $row;
    }
    echo json_encode($myArray);
    mysqli_close($con);
}else{
    response(NULL, NULL, 200,"No Record Found");
}
?>