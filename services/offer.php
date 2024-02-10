<?php
header('content-type: application/json');
include('../config/dbcon.php');


$query = "SELECT * FROM offer";
$result = mysqli_query($con, $query);

if(mysqli_num_rows($result) > 0)
{
    $response['status'] = "success";    
    $rows = array();
    while($row = mysqli_fetch_assoc($result))
    {
        $rows[] = $row;
    }
    $response['offer'] = $rows; 
    echo json_encode($response);

}
exit(0);



?>
