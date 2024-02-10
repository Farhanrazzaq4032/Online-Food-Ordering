<?php
session_start();
include('config/dbcon.php');


if (isset($_POST['logoutBtn'])) {
    session_destroy();
    unset($_SESSION['auth']);
    unset($_SESSION['auth_er']);
    header('Location: login.php');
    exit(0);
}


if (isset($_POST['check_email'])) {

        $email = $_POST['email'];
        $checkemail = "SELECT email FROM employer WHERE email = '$email'";
        $email_query_run = mysqli_query($con, $checkemail);

        if(mysqli_num_rows($email_query_run) > 0){
            echo "Email address is already being used";
        } 
}

// Register User
// this code is to get data for the registered user form and innsert in to database
if(isset($_POST['addEr']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $role_as = $_POST['role_as'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordConfirm'];

    if($password == $passwordConfirm)
    {

        $checkemail = "SELECT email FROM employer WHERE email = '$email'";
        $email_query_run = mysqli_query($con, $checkemail);

        if(mysqli_num_rows($email_query_run) > 0){
            //Email Already
            $_SESSION['status'] = "That email address is already being used";
            header("Location: employees.php");
            exit(0);

        }
        else{
            //new Employer
            
            $user_query = "INSERT INTO employer (name,email,phone,password,role_as) 
            VALUE ('$name','$email','$phone','$password','$role_as')";
            $user_query_run = mysqli_query($con, $user_query);
    
            if($user_query_run)
            { 
                $_SESSION['status'] = "Employer Added Successfully";
                header("Location: employees.php");
                exit(0);

            }
            else
            {
                $_SESSION['status'] = "Employer Registration Failed";
                header("Location: employees.php");
                exit(0);

                
            }

        }

    }
    else
    {
        { 
            $_SESSION['status'] = "Password not match";
            header("Location: employees.php");
            exit(0);

        }   
    }


}
// this query is used to update user
if(isset($_POST['updateEr']))
{
    $er_id = $_POST['er_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $role_as = $_POST['role_as'];

    $query = "UPDATE employer SET name = '$name', email = '$email', phone = '$phone',
     password = '$password', role_as = '$role_as' WHERE id = '$er_id'";
    $query_run = mysqli_query($con,$query); 
    if($query_run)
    { 
        $_SESSION['status'] = "Employer Updated Successfully";
        header("Location: employees.php");
        exit(0);

    }
    else
    {
        $_SESSION['status'] = "Employer Registration Failed";
        header("Location: employees.php");
        exit(0);

    }
}


 // this query is used to Delete user
 
if (isset($_POST['deleteEr'])) 
{
    $er_id = $_POST['delete_id'];

    $query = "DELETE FROM employer WHERE id = '$er_id'";
    $query_run = mysqli_query($con,$query);

    if($query_run)
    { 
        $_SESSION['status'] = "Employer Deleted Successfully";
        header("Location: employees.php");
        exit(0);

    }
    else
    {
        $_SESSION['status'] = "Employer Deleting Failed";
        header("Location: employees.php");
        exit(0);

    }

}

// Categories
// this Query is used to Add Categories

if(isset($_POST['addCategory']))
{
    $name = $_POST['name'];
    $brief = $_POST['brief'];
    $icon = $_FILES['icon']['name'];

    // image validation
    $allowed_exe = array('png','jpg','jpeg');
    $file_exe = pathinfo($icon, PATHINFO_EXTENSION);

    // this code used to get img
    $filename = time().'.'.$file_exe;
    if(!in_array($file_exe, $allowed_exe))
    {
        $_SESSION['status'] = "Your are allowed only png, jpg, jpeg";
        header('Location: category.php');
        exit(0);
    }
    else
    {
        $query = "INSERT INTO categories (name,icon,brief)
                  VALUES ('$name','$filename','$brief')";
        $query_run = mysqli_query($con, $query);
        
        if($query_run)
        {
            move_uploaded_file($_FILES['icon']['tmp_name'], 'uploads/categoryPic/'.$filename);
            $_SESSION['status'] = "Category is Added Successfully";
        header('Location: category.php');
        exit(0);
        }
        else
        {
            $_SESSION['status'] = "Something is Wrong";
            header('Location: category.php');
            exit(0);
        }
    }

}





    // this query is used to update Category
if(isset($_POST['updateCate']))
{
    $cate_id = $_POST['cate_id'];
    $name = $_POST['name'];
    $brief = $_POST['brief'];
    $icon = $_FILES['icon']['name'];
    $old_icon = $_POST['old_icon'];

    if($icon != '')
    {
        $update_filename = $_FILES['icon']['name'];
         // image validation
    $allowed_exe = array('png','jpg','jpeg');
    $file_exe = pathinfo($update_filename, PATHINFO_EXTENSION);

    $filename = time().'.'.$file_exe;
        if(!in_array($file_exe, $allowed_exe))
        {
            $_SESSION['status'] = "Your are allowed only png, jpg, jpeg";
            header('Location: category.php');
            exit(0);
        }
        $update_filename = $filename;
    }
    else
    {
        $update_filename = $old_icon;
    }

    $query = "UPDATE categories SET name = '$name',brief = '$brief',icon='$update_filename' WHERE id = '$cate_id'";
    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        if($icon != '')
        {
             move_uploaded_file($_FILES['icon']['tmp_name'], 'uploads/categoryPic/'.$filename);
             if(file_exists('uploads/categoryPic/'.$old_icon))
             {
                unlink("uploads/categorytPic/".$old_icon);
             }

        }
        $_SESSION['status'] = "Category is Updated Successfully";
        header('Location: category.php');
         exit(0);
    }
    else
    {
        $_SESSION['status'] = "Category Updating Failed";
        header('Location: category.php');
         exit(0);
    }



}

 // this query is used to delete Categroy 
 
 if (isset($_POST['deleteCate'])) 
 {
     $delete_cate = $_POST['delete_cate'];
 
     $query = "DELETE FROM categories WHERE id = '$delete_cate'";
     $query_run = mysqli_query($con,$query);
 
     if($query_run)
     { 
         $_SESSION['status'] = "Category Deleting Successfully";
         header("Location: category.php");
         exit(0);

     }
     else
     {
         $_SESSION['status'] = "Category Deleted Failed";
         header("Location: category.php");
         exit(0);

     }
 
 }


// this code is Product
 // this code is used to Add Products
if(isset($_POST['prodSave']))
{
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $small_description = $_POST['small_description'];
    $long_description = $_POST['long_description'];
    $price = $_POST['price'];
    $offerprice = $_POST['offerprice'];
    $quantity = $_POST['quantity'];
    $image = $_FILES['image']['name'];

    // image validation
    $allowed_exe = array('png','jpg','jpeg');
    $file_exe = pathinfo($image, PATHINFO_EXTENSION);

    // this code used to get img
    $filename = time().'.'.$file_exe;
    if(!in_array($file_exe, $allowed_exe))
    {
        $_SESSION['status'] = "Your are allowed only png, jpg, jpeg";
        header('Location: product.php');
        exit(0);
    }
    else
    {
        $query = "INSERT INTO products (category_id,name,small_description,long_description,price,offerprice,quantity,image)
                  VALUES ('$category_id','$name','$small_description','$long_description','$price','$offerprice','$quantity','$filename')";
        $query_run = mysqli_query($con, $query);
        
        if($query_run)
        {
            move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/productPic/'.$filename);
            $_SESSION['status'] = "Product is Added Successfully";
        header('Location: product.php');
        exit(0);
        }
        else
        {
            $_SESSION['status'] = "Something is Wrong";
            header('Location: product.php');
            exit(0);
        }
    }

}



  // this query is used to delete Products 
 
  if (isset($_POST['deleteProd'])) 
  {
      $delete_prod = $_POST['delete_prod'];
  
      $query = "DELETE FROM products WHERE id = '$delete_prod'";
      $query_run = mysqli_query($con,$query);
  
      if($query_run)
      { 
          $_SESSION['status'] = "Product Deleting Successfully";
          header("Location: product.php");
          exit(0);

      }
      else
      {
          $_SESSION['status'] = "Product Deleted Failed";
          header("Location: product.php");
          exit(0);

      }
  
  }

//   this code is used to Update Product 
if(isset($_POST['updateProd']))
{
    
    $proditem_id = $_POST['proditem_id'];
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $small_description = $_POST['small_description'];
    $long_description = $_POST['long_description'];
    $price = $_POST['price'];
    $offerprice = $_POST['offerprice'];
    $quantity = $_POST['quantity'];

    $image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if($image != '')
    {
        $update_filename = $_FILES['image']['name'];
         // image validation
    $allowed_exe = array('png','jpg','jpeg');
    $file_exe = pathinfo($update_filename, PATHINFO_EXTENSION);

    // this code used to get img
    $filename = time().'.'.$file_exe;
        if(!in_array($file_exe, $allowed_exe))
        {
            $_SESSION['status'] = "Your are allowed only png, jpg, jpeg";
            header('Location: product.php');
            exit(0);
        }
        $update_filename = $filename;
    }
    else
    {
        $update_filename = $old_image;
    }

    $query = "UPDATE products SET 
                category_id='$category_id',
                name='$name',
                small_description='$small_description',
                long_description='$long_description',
                price='$price',
                offerprice='$offerprice',
                image='$update_filename'
                  WHERE id='$proditem_id'";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        if($image != '')
        {
             move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/productPic/'.$filename);
             if(file_exists('uploads/productPic/'.$old_image))
             {
                unlink("uploads/productPic/".$old_image);
             }

        }
        $_SESSION['status'] = "Product is Updated Successfully";
        header('Location: product.php');
         exit(0);
    }
    else
    {
        $_SESSION['status'] = "Product Updating Failed";
        header('Location: product.php');
         exit(0);
    }
}

   


// this code of Offer
 // this code is used to Add Offer
 if(isset($_POST['offerAdd']))
 {
     $title = $_POST['title'];  
     $image = $_FILES['image']['name'];
 
     // image validation
     $allowed_exe = array('png','jpg','jpeg');
     $file_exe = pathinfo($image, PATHINFO_EXTENSION);
 
     // this code used to get img
     $filename = time().'.'.$file_exe;
     if(!in_array($file_exe, $allowed_exe))
     {
         $_SESSION['status'] = "Your are allowed only png, jpg, jpeg";
         header('Location: offer-add.php');
         exit(0);
     }
     else
     {
         $query = "INSERT INTO offer (title,image) VALUES ('$title', '$filename')";
         $query_run = mysqli_query($con, $query);
         
         if($query_run)
         {
             move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/offerPic/'.$filename);
             $_SESSION['status'] = "Offer is Added Successfully";
         header('Location: offer.php');
         exit(0);
         }
         else
         {
             $_SESSION['status'] = "Something is Wrong";
             header('Location: offer.php');
             exit(0);
         }
     }
 
 }

 //   this code is used to Update Offer
if(isset($_POST['updateOffer']))
{
    
    $offeritem_id = $_POST['offeritem_id'];
    $title = $_POST['title'];
    $image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if($image != '')
    {
        $update_filename = $_FILES['image']['name'];
         // image validation
    $allowed_exe = array('png','jpg','jpeg');
    $file_exe = pathinfo($update_filename, PATHINFO_EXTENSION);

    // this code used to get img
    $filename = time().'.'.$file_exe;
        if(!in_array($file_exe, $allowed_exe))
        {
            $_SESSION['status'] = "Your are allowed only png, jpg, jpeg";
            header('Location: offer.php');
            exit(0);
        }
        $update_filename = $filename;
    }
    else
    {
        $update_filename = $old_image;
    }

    $query = "UPDATE offer SET 
                title='$title',
                image='$update_filename'
                  WHERE id='$offeritem_id'";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        if($image != '')
        {
             move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/offerPic/'.$filename);
             if(file_exists('uploads/offerPic/'.$old_image))
             {
                unlink("uploads/offerPic/".$old_image);
             }

        }
        $_SESSION['status'] = "Offer is Updated Successfully";
        header('Location: offer.php');
         exit(0);
    }
    else
    {
        $_SESSION['status'] = "Offer Updating Failed";
        header('Location: offer.php');
         exit(0);
    }
}

if (isset($_POST['deleteOffer'])) 
{
    $delete_offer = $_POST['delete_offer'];

    $query = "DELETE FROM offer WHERE id = '$delete_offer'";
    $query_run = mysqli_query($con,$query);

    if($query_run)
    { 
        $_SESSION['status'] = "Offer Deleting Successfully";
        header("Location: offer.php");
        exit(0);

    }
    else
    {
        $_SESSION['status'] = "Offer Deleted Failed";
        header("Location: offer.php");
        exit(0);

    }

}


//this code is used ot confirm order


if(isset($_POST['odr_confirm'])){
    $order_id = $_POST['odr_confirm'];

    $query = "INSERT INTO confirm_odbk_id (odbk_id) VALUE ('$order_id')";
    $query_run = mysqli_query($con, $query);

if($query_run)
{ 
    $query = "DELETE FROM order_id WHERE order_id = '$order_id'";
    $query_run = mysqli_query($con,$query);

    $_SESSION['status'] = "Order Confirm";
    header("Location: new-order.php");
    exit(0);

}
else
{
    $_SESSION['status'] = "Order Failed";
    header("Location: new-order.php");
    exit(0);

}

}

//this code is used to cancel order

if(isset($_POST['odr_cancel'])){

    $order_id = $_POST['odr_cancel'];

    $query = "DELETE FROM order_id WHERE order_id = '$order_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run){

        $_SESSION['status'] = "Order Cancel";
    header("Location: new-order.php");
    exit(0);

    }
    else{
        $_SESSION['status'] = "Order Cancel Failed";
    header("Location: new-order.php");
    exit(0);

    }


}


//this code is usde to Order Booking

if(isset($_POST['bk_confirm'])){
    $booking_id = $_POST['booking_id'];
    $table_no = $_POST['table_no'];

    $query_table = "UPDATE customer_order SET order_id = '$booking_id', table_no = '$table_no' WHERE booking_id = '$booking_id'";
    $query_table_run = mysqli_query($con, $query_table);

if($query_table_run)
{ 
    $query = "INSERT INTO confirm_odbk_id (odbk_id) VALUE ('$booking_id')";
    $query_run = mysqli_query($con, $query);
    if($query_run ){
        $query_d = "DELETE FROM booking_id WHERE booking_id = '$booking_id'";
        $query_d_run = mysqli_query($con, $query_d);

            $_SESSION['status'] = "Booking Confirm";
            header("Location: booking-order.php");
            exit(0);

    }
}
else
{
    $_SESSION['status'] = "Booking Failed";
    header("Location: booking-order.php");
    exit(0);

}

}

//booking Cansel code

if(isset($_POST['bk_cancel'])){

    $booking_id = $_POST['bk_cancel'];

    $query = "DELETE FROM booking_id WHERE booking_id = '$booking_id'";
    $query_run = mysqli_query($con,$query);

    if($query_run){

        $_SESSION['status'] = "Booking Cancel";
            header("Location: booking-order.php");
            exit(0);

    }
    else{
        $_SESSION['status'] = "Booking Cancel Failed";
        header("Location: booking-order.php");
        exit(0);

    }

}

//order Status code for Watiter

if(isset($_POST['waiterOkBtn'])){
    $order_id = $_POST['waiterOkBtn'];
    $query = "UPDATE customer_order SET waiter_status = 'Done' WHERE order_id = '$order_id'";
    $query_run = mysqli_query($con, $query);
    if($query_run ){
            $_SESSION['status'] = "Order Deliver";
            header("Location: pwaiter.php");
            exit(0);

    }
    else{
        $_SESSION['status'] = "Failed";
        header("Location: waiter.php");
        exit(0);

    }
}

//order Status code for Chef

if(isset($_POST['chefOkBtn'])){
    $order_id = $_POST['chefOkBtn'];
    $query = "UPDATE customer_order SET chef_status = 'Ready' WHERE order_id = '$order_id'";
    $query_run = mysqli_query($con, $query);
    if($query_run ){
            $_SESSION['status'] = "Order Ready";
            header("Location: pchef.php");
            exit(0);

    }
    else{
        $_SESSION['status'] = "Failed";
        header("Location: chef.php");
        exit(0);

    }
}


//order Status code for Chef

if(isset($_POST['confirmOkBtn'])){
    $confirm_order_id = $_POST['confirmOkBtn'];
    $query = "UPDATE customer_order SET payment = 'Yes' WHERE order_id = '$confirm_order_id'";
    $query_run = mysqli_query($con, $query);
if($query_run)
{ 
    $query_c_id = "INSERT INTO confirm_order (confirm_order_id) VALUE ('$confirm_order_id')";
    $query_c_run = mysqli_query($con, $query_c_id);
    if($query_c_run ){
        $query_d = "DELETE FROM confirm_odbk_id WHERE odbk_id = '$confirm_order_id'";
        $query_d_run = mysqli_query($con, $query_d);

            $_SESSION['status'] = "Order Completed";
            header("Location: confirm-order.php");
            exit(0);

    }
}
else
{
    $_SESSION['status'] = "Failed";
    header("Location: confirm-order.php");
    exit(0);

}

}
?>
 
