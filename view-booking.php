<?php
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');
?>
<div class="content-wrapper">
 <?php
    if (isset($_GET['booking_id'])) {
        $booking_id = $_GET['booking_id'];
        $cust_query = "SELECT * FROM customer_order WHERE booking_id ='$booking_id' LIMIT 1";
        $cust_query_run = mysqli_query($con, $cust_query);

        //  order table query 
        $odr_query = "SELECT * FROM order_details WHERE odbk_id ='$booking_id'";
        $odr_query_run = mysqli_query($con, $odr_query);

        if (mysqli_num_rows($cust_query_run) > 0) {
            foreach ($cust_query_run as $row) {
    ?>
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Booking Id# <?php echo $row['booking_id']; ?></h1>
                        </div>
                    </div>
                </div>
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">

                                <!-- Profile Image -->
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">

                                        <h3 class="profile-username text-center font-weight-bold"><?php echo $row['name']; ?></h3>


                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>Guest</b> <a class="float-right"><?php echo $row['guest']; ?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Arrival Time</b> <a class="float-right"><?php echo $row['time']; ?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Price</b> <a class="float-right"><?php echo $row['price']; ?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <label for="">Comments</label>
                                                <p><?php echo $row['comment']; ?></p>

                                            </li>
                                        </ul>

                                        <a href="booking-order.php" class="btn btn-primary btn-block"><b>Back</b></a>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>

                    <?php
                }
            }
                    ?>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Price_Item</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        if (mysqli_num_rows($odr_query_run) > 0) {
                                            foreach ($odr_query_run as $row) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $row['product_name']; ?></td>
                                                    <td><?php echo $row['amount']; ?></td>
                                                    <td><?php echo $row['price_item']; ?></td>
                                                </tr>
                                            <?php
                                            }
                                        }

                                    ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

    <?php
            }
  ?>
                        </div>
                    </div>
                </section>
</div>

<?php
include('includes/script.php');
include('includes/footer.php');
?>