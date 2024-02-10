<?php
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');
?>

<div class="content-wrapper">
  <!-- <div class="content-header"> -->
  <!-- add table Modal -->
  <div class="modal fade" id="bkConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="code.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="booking_id" class="booking_id">
            <label for="">Table No</label>
            <input type="number" name="table_no" value="123" class="form-control" placeholder="Enter Table No" required>
          </div>
          <div class="modal-footer">
            <button type="submit" name="bk_confirm" class="btn btn-success btn-sm">Ok</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Booking Order</h1>
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
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Booking ID#</th>
                    <th>Customer Name</th>
                    <th>Guest</th>
                    <th>Time</th>
                    <th>Bill</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  $query_id = "SELECT * FROM booking_id";
                  $query_id_run = mysqli_query($con, $query_id);
                  if (mysqli_num_rows($query_id_run) > 0) {

                    while ($arow = mysqli_fetch_assoc($query_id_run)) {
                      $booking_id = $arow['booking_id'];
                      $query = "SELECT * FROM customer_order WHERE booking_id = '$booking_id'";
                      $query_run = mysqli_query($con, $query);

                      if (mysqli_num_rows($query_run) > 0) {

                        foreach ($query_run as $row) {
                  ?>
                          <tr>
                            <td><?php echo $row['booking_id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['guest']; ?></td>
                            <td><?php echo $row['time']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <form action="code.php" method="POST">
                            <td>
                              <a href="view-booking.php?booking_id=<?= $row['booking_id']; ?>" class="btn btn-light btn-sm">View</a>
                              <button href="button" class="btn btn-success btn-sm bkConfirmBtn" value="<?= $row['booking_id']; ?>">Confirm</button>
                              <button type="submit" name="bk_cancel" class="btn btn-danger btn-sm" value="<?=$row['booking_id']; ?>">Cancel</button>
                            </td>
                            </form>
                          </tr>
                    <?php
                        }
                      }
                    }
                  } else {
                    ?>
                    <tr>
                      <td colspan="5">No Record Found</td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>



<?php include('includes/script.php'); ?>
<script>
  $(document).ready(function() {
    $('.bkConfirmBtn').click(function(e) {
      e.preventDefault();
      var row = $(this).val();
      $('.booking_id').val(row);
      $('#bkConfirm').modal('show');

    });
  });
</script>
<?php include('includes/footer.php'); ?>