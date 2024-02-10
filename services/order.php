<?php
header('Content-Type: application/json');
include('../config/dbcon.php');

$data_body = file_get_contents('php://input');
$data = json_decode($data_body, true);

$name = $data['customer_detail']['name'];
$guest = $data['customer_detail']['guest'];
$table_no = $data['customer_detail']['table_no'];
$price = $data['customer_detail']['price'];
$comment = $data['customer_detail']['comment'];
$created_at = $data['customer_detail']['created_at'];
$order_id = mt_rand();

$query_customer = "INSERT INTO customer_order (order_id,name,guest,table_no,price,comment,created_at) VALUES ('$order_id', '$name', '$guest', '$table_no', '$price', '$comment', '$created_at')";
$query_run_customer = mysqli_query($con, $query_customer);
if ($query_run_customer) {   
    $query_id = "INSERT INTO order_id (order_id) VALUE ('$order_id')";
    $query_id_run = mysqli_query($con, $query_id);

    foreach ($data["order_detail"] as $order_item) {
        $product_id = $order_item["product_id"];
        $product_name = $order_item["product_name"];
        $amount = $order_item["amount"];
        $price_item = $order_item["price_item"];
    
        $query_order = "INSERT INTO order_details (odbk_id,product_id,product_name,amount,price_item) VALUES ('$order_id', '$product_id', '$product_name', '$amount', '$price_item')";
        $query_run_order = mysqli_query($con, $query_order);   
        
    }
    if ($query_run_order){
        $response['status'] = "Order Successful";

        $query = "SELECT * FROM customer_order WHERE order_id = '$order_id' LIMIT 1" ;
        $result = mysqli_query($con, $query); 
        if(mysqli_num_rows($result) > 0){  
             while($row = mysqli_fetch_assoc($result))
            $response['data'] = $row; 
        }

    }
    else{
        $response['status'] = "Order Failed";  
        
    }   
      
    
}
else{
    $response['status'] = "Order Failed";  

}

echo json_encode($response);
exit(0);






   




?>