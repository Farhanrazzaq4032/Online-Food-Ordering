<?php
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');
?>

<div class="content-wrapper">
  <!-- <div class="content-header"> -->
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">New Orders</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
  <section class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <!-- Message Box Alert -->
          <?php include('message.php'); ?>
          <!------- Message Box Alert ----------->
          <div class="card">
            <div class="card-body">
              <form action="code.php" method="POST">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Order ID#</th>
                      <th>Customer Name</th>
                      <th>Guest</th>
                      <th>Table No#</th>
                      <th>Bill</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query_id = "SELECT * FROM order_id";
                    $query_id_run = mysqli_query($con, $query_id);

                    if (mysqli_num_rows($query_id_run) > 0) {

                      while ($arow = mysqli_fetch_assoc($query_id_run)) {
                        $order_id = $arow['order_id'];
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
                              <td>
                                <a href="view-order.php?order_id=<?=$row['order_id']; ?>" class="btn btn-light btn-sm">View</a>
                                <button type="submit" name="odr_confirm" class="btn btn-success btn-sm" value="<?=$row['order_id']; ?>">Confirm</button>
                                <button type="submit" name="odr_cancel" class="btn btn-danger btn-sm" value="<?=$row['order_id']; ?>">Cancel</button>
                              </td>
                            </tr>
                          <?php
                          }
                        }
                      }
                    }
                    else {
                      ?>
                      <tr>
                        <td colspan="5">No New Orderdsds</td>
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
    </div>
  </section>
</div>



<?php include('includes/script.php'); ?>
<?php include('includes/footer.php'); ?>