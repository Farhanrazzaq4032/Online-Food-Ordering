<?php
header('content-type: application/json');
include('../config/dbcon.php');

$prod_id = $_GET['id'];
    $query = "SELECT * FROM products WHERE id = $prod_id";
    $result = mysqli_query($con, $query);
if(isset($prod_id)){
    $response['status'] = "success"; 
    $row = mysqli_fetch_assoc($result);
    $response['product'] = $row;
    echo json_encode($response);
}
else{
    $response['status'] = "Failed";
    $response['msg'] = "Invalid Parameter";
    echo json_encode($response);


}
exit(0);



?>

