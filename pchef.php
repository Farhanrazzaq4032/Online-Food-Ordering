<?php
include('authentication.php');
include('includes/header.php');
include('includes/ctopbar.php');
include('includes/csidebar.php');
include('config/dbcon.php');
?>
<div class="content-wrapper">
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Chef</h1>
        <?php include('message.php'); ?>
      </div>
    </div>
  </div>
    <section class="content">
        <form action="code.php" method="POST">
        <?php
        $query_id = "SELECT * FROM confirm_odbk_id";
        $query_id_run = mysqli_query($con, $query_id);
        if (mysqli_num_rows($query_id_run) > 0) {
            while ($arow = mysqli_fetch_assoc($query_id_run)) {

                $order_id = $arow['odbk_id'];
                $cust_query = "SELECT * FROM customer_order WHERE order_id ='$order_id'";
                $cust_query_run = mysqli_query($con, $cust_query);

                //  order details query
                $odr_query = "SELECT * FROM order_details WHERE odbk_id ='$order_id'";
                $odr_query_run = mysqli_query($con, $odr_query);

                if (mysqli_num_rows($cust_query_run) > 0) {
                    foreach ($cust_query_run as $row) {
        ?>
                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card card-outline">
                                        <div class="card-body box-profile">
                                            <h3 class="profile-username text-center font-weight-bold"><?php echo $row['name']; ?></h3>
                                            <ul class="list-group mb-3">
            
                                                    <label for="">Ordre No#</label>
                                                    <p><?php echo $row['order_id']; ?></p>
                                                    <label for="">My Status</label>
                                                    <p><?php echo $row['chef_status']; ?></p>
                                                    <label for="">Comments</label>
                                                    <p><?php echo $row['comment']; ?></p>
                                            </ul>
                                        </div>
                                    <button type="submit" name="chefOkBtn" class="btn btn-success btn-sm" value="<?=$row['order_id']; ?>">Ok</button>

                                        <!-- /.card-body -->
                                    </div>

                                </div>
                        <?php
                        
                    }
            }
            else{
                ?>
                    <h4>
                     No Order
                    </h4>
                <?php
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
                    </div>

                <?php

        }
        }
        else{
            ?>
                <h4>
                 No Order
                </h4>
            <?php
        }
                ?>
                            </div>
                        </div>
        </form>
    </section>
</div>

<?php
include('includes/script.php');
include('includes/footer.php');
?>