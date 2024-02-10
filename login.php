<?php
session_start();
include('includes/header.php');
if (isset($_SESSION['auth'])) {
    $_SESSION['status'] = "Already logged In";
    header('Location: index.php');
    exit(0);
}
?>

<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 my-5">
                <div class="card my-5">
                    <div class="maind">
                        <div class="card-header bg-light">
                            Log In
                        </div>
                        <div class="card-body">
                            <?php include('message.php'); ?>
                            <form action="logincode.php" method="POST">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form_group">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                                <hr>
                                <div class="form-group">
                                    <button type="submit" name="loginBtn" class="btnd btn-primary btn-block">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<?php include('includes/script.php'); ?>