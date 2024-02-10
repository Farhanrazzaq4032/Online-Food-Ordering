<?php
header('content-type: application/json');
include('../config/dbcon.php');


$query = "SELECT * FROM products";
$result = mysqli_query($con, $query);

if(mysqli_num_rows($result) > 0)
{
    $response['status'] = "success";    
    $rows = array();
    while($row = mysqli_fetch_assoc($result))
    {
        $rows[] = $row;
    }
    $response['products'] = $rows; 
    echo json_encode($response);

}
exit(0);



?>
