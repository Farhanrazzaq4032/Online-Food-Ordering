<?php
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Employer</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <?php include('message.php'); ?>
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">
                                Edit Registered Employer
                            </h2>
                            <a href="registered.php" class="btn btn-info btn-sm float-right">Back</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col md-6">
                                    <form action="code.php" method="POST">
                                        <div class="modal-body">
                                            <?php
                                                    if(isset($_GET['er_id'])) 
                                                    {
                                                        $er_id = $_GET['er_id'];
                                                        $query = "SELECT * FROM employer WHERE id ='$er_id' LIMIT 1";
                                                        $query_run = mysqli_query($con, $query);

                                                        if(mysqli_num_rows($query_run) > 0) 
                                                        {
                                                            foreach($query_run as $row) 
                                                            {
                                                                ?>
                                                                <input type="hidden" name="er_id" value="<?php echo $row['id']; ?>">
                                                                <div class="form-group">
                                                                    <label for="">Name</label>
                                                                    <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" placeholder="Name">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Email</label>
                                                                    <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control" placeholder="Email">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Phone Number</label>
                                                                    <input type="text" name="phone" value="<?php echo $row['phone']; ?>" class="form-control" placeholder="Phone Number">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Password</label>
                                                                    <input type="text" name="password" value="<?php echo $row['password']; ?>" password class="form-control" placeholder="Password">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Give Role</label>
                                                                    <select name="role_as" class="form-control">
                                                                        <option value="">
                                                                        <?php
                                                                            if ($row['role_as'] == "0") {
                                                                                echo "Admin";
                                                                            }
                                                                            elseif ($row['role_as'] == "1"){
                                                                                echo "Manger";

                                                                            }
                                                                            elseif ($row['role_as'] == "2"){
                                                                                echo "Chef";

                                                                            }
                                                                            elseif ($row['role_as'] == "3"){
                                                                                echo "Waiter";

                                                                            }
                                                                            else{
                                                                                echo "Invalid";

                                                                            }
                                                                        ?>
                                                                        </option>
                                                                        <option value="0">Admin</option>
                                                                        <option value="1">Manger</option>
                                                                        <option value="2">Chef</option>
                                                                        <option value="3">Waiter</option>
                                                                    </select>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                        else
                                                        {
                                                            echo "<h4> Record Found.!</h4>";
                                                        }
                                                    }
                                                    else
                                                        {
                                                            echo "<h4> Record Found.f!</h4>";
                                                        }

                                            ?>
                                         </div>
                                         <div class="modal-footer">
                                            <button type="submit" name="updateEr" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?php
include('includes/script.php');
include('includes/footer.php');
?>