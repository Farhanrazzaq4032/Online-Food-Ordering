<?php
header('Content-Type: application/json');
include('../config/dbcon.php');

$data_body = file_get_contents('php://input');
$data = json_decode($data_body, true);

$name = $data['booking_order']['name'];
$guest = $data['booking_order']['guest'];
$time = $data['booking_order']['time'];
$price = $data['booking_order']['price'];
$comment = $data['booking_order']['comment'];
$created_at = $data['booking_order']['created_at'];
$booking_id = mt_rand();

$query_customer = "INSERT INTO customer_order (booking_id,name,guest,time,price,comment,created_at) VALUES ('$booking_id', '$name', '$guest', '$time', '$price', '$comment', '$created_at')";
$query_run_customer = mysqli_query($con, $query_customer);
if ($query_run_customer) {
    $query_id = "INSERT INTO booking_id (booking_id) VALUE ('$booking_id')";
    $query_id_run = mysqli_query($con, $query_id);

    foreach ($data["order_detail"] as $order_item) {
        $product_id = $order_item["product_id"];
        $product_name = $order_item["product_name"];
        $amount = $order_item["amount"];
        $price_item = $order_item["price_item"];
    
        $query_order = "INSERT INTO order_details (odbk_id,product_id,product_name,amount,price_item) VALUES ('$booking_id', '$product_id', '$product_name', '$amount', '$price_item')";
        $query_run_order = mysqli_query($con, $query_order);   
        
    }
    if ($query_run_order){
        $response['status'] = "Booking Successful";  

        //this is API to send data to Mobile appliction
        $query = "SELECT * FROM customer_order WHERE booking_id = '$booking_id' LIMIT 1" ;
        $result = mysqli_query($con, $query); 
        if(mysqli_num_rows($result) > 0){  
            //  $rows = array();
             while($row = mysqli_fetch_assoc($result))
            $response['data'] = $row; 
        }
    }
    else{
        $response['status'] = "Booking Failed";  
        
    
    }   
      
    
}
else{
    $response['status'] = "Booking Failed";  

}

echo json_encode($response);
exit(0);





   




?>