<?php
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');
?>
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Order List</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
  <section class="content">
    <div class="container">
      <div class="row">
        <div class="card col-md-12">
          <div class="card-body">
              <div class="card-header">
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
                    <th>Payment</th>
                    <th>Action</th>
                  </tr>
                </thead>
                  <tbody>
                    <?php

                    $query_id = "SELECT * FROM confirm_order";
                    $query_id_run = mysqli_query($con, $query_id);
                    if (mysqli_num_rows($query_id_run) > 0) {

                      while ($arow = mysqli_fetch_assoc($query_id_run)) {
                        $order_id = $arow['confirm_order_id'];

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
                              <td><?php echo $row['payment']; ?></td>
                              <td>
                                <a href="list-view-order.php?order_id=<?= $row['order_id']; ?>" class="btn btn-light btn-sm">View</a>
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