<?php
session_start();
include('config/dbcon.php');

if(isset($_POST['loginBtn']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $log_query = "SELECT * FROM employer WHERE email = '$email' AND password = '$password' LIMIT 1";
    $log_query_run = mysqli_query($con, $log_query);

    if(mysqli_num_rows($log_query_run) > 0)
    {
        foreach($log_query_run as $row){
            $id = $row['id'];
            $name = $row['name'];
            $email = $row['email'];
            $role_as = $row['role_as'];
        }
        $_SESSION['auth'] = "$role_as";
        $_SESSION['auth_er'] = [
            'name'=>$name,
            'email'=>$email,
            'role_as'=>$role_as

        ];

        if ($_SESSION['auth'] == "0") {

            $_SESSION['status'] = "Logged In Sucessfully";
            header('Location: index.php');
            die("farhan");
        }
        elseif ($_SESSION['auth'] == "1") {
            
            $_SESSION['status'] = "Logged In Sucessfully";
            header('Location: index.php');
        }
        elseif ($_SESSION['auth'] == "2") {
            
            $_SESSION['status'] = "Logged In Sucessfully";
            header('Location: pchef.php');
        }
        elseif ($_SESSION['auth'] == "3") {
            
            $_SESSION['status'] = "Logged In Sucessfully";
            header('Location: pwaiter.php');
        }
        

        
    }
    else
    {
        $_SESSION['status'] = "Insert correct Email and Password";
        header("Location: login.php");
    }

}
else
{
    $_SESSION['status'] = "Failed";
    header("Location: login.php");
}

?>