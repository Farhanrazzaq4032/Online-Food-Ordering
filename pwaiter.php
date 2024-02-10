<?php
include('authentication.php');
include('includes/header.php');
include('includes/wtopbar.php');
include('includes/wsidebar.php');
include('config/dbcon.php');
?>
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Waiter</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
  <section class="content">
    <div class="container">
      <div class="row">
        <?php include('message.php'); ?>
        <div class="card col-md-12">
          <div class="card-body">
            <form action="code.php" method="POST">
              <div class="card-header">
                <h4>
                  Order
                </h4>
              </div>
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Order ID#</th>
                    <th>Customer Name</th>
                    <th>Guest</th>
                    <th>Table No#</th>
                    <th>Bill</th>
                    <th>Chef Status</th>
                    <th>My Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                  <tbody>
                    <?php

                    $query_id = "SELECT * FROM confirm_odbk_id";
                    $query_id_run = mysqli_query($con, $query_id);
                    if (mysqli_num_rows($query_id_run) > 0) {

                      while ($arow = mysqli_fetch_assoc($query_id_run)) {
                        $order_id = $arow['odbk_id'];

                        $query = "SELECT * FROM customer_order WHERE order_id = '$order_id'";
                        $query_run = mysqli_query($con, $query);
                        if (mysqli_num_rows($query_run) > 0) {
                          foreach ($query_run as $row) {
                    ?>
                            <tr>
                              <td><?php echo $row['order_id']; ?></td>
                              <td><?php echo $row['name']; ?></td>
                              <td><?php echo $row['guest']; ?></td>
                              <td><?php echo $row['table_no']; ?></td>
                              <td><?php echo $row['price']; ?></td>
                              <td><?php echo $row['chef_status']; ?></td>
                              <td><?php echo $row['waiter_status']; ?></td>
                              <td>
                                <a href="waiter-view-order.php?order_id=<?= $row['order_id']; ?>" class="btn btn-light btn-sm">View</a>
                                <button type="submit" name="waiterOkBtn" class="btn btn-success btn-sm" value="<?=$row['order_id']; ?>">Ok</button>
                              </td>
                            </tr>
                      <?php
                          }
                        }
                      }
                    } else {
                      ?>
                      <tr>
                        <td colspan="5">No Order</td>
                      </tr>
                    <?php
                    }
                    ?>

                  </tbody>
              </table>
            </form>
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