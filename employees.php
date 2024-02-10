<?php
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');
?>

<div class="content-wrapper">
  <!-- Modal -->
  <div class="modal fade" id="addEr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Employer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="code.php" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>
            <div class="form-group">
              <label for="">Email</label>
              <span class="already_email text-danger ml-2"></span>
              <input type="email" name="email" class="form-control email_id" placeholder="Email" required>
            </div>
            <div class="form-group">
              <label for="">Phone Number</label>
              <input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
            </div>
            <div class="row">
              <div class="form-group">
                <label for="">Give Role</label>
                <select name="role_as" class="form-control" required>
                  <option>Select</option>
                  <option value="0">Admin</option>
                  <option value="1">Manger</option>
                  <option value="2">Chef</option>
                  <option value="3">Waiter</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Password</label>
                  <input type="password" name="password" password class="form-control" placeholder="Password" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Confirm</label>
                  <input type="password" name="passwordConfirm" password class="form-control" placeholder="Confirm" required>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a href="registered.php" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
            <button type="submit" name="addEr" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Detele Modal -->
  <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="code.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="delete_id" class="delete_er_id">
            <p>
              You want to delete this Employer ?
            </p>
          </div>
          <div class="modal-footer">
            <a href="employees.php" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
            <button type="submit" name="deleteEr" class="btn btn-danger">Confirm</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <section class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <!-- Message Box Alert -->
          <?php include('message.php'); ?>
          <!------- Message Box Alert ----------->
          <div class="card">
            <div class="card-header">
              <h2 class="card-title">Registered Employer
              </h2>
              <a href="#" data-toggle="modal" data-target="#addEr" class="btn btn-primary btn-sm float-right">Add Employer</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = "SELECT * FROM employer";
                  $query_run = mysqli_query($con, $query);

                  if (mysqli_num_rows($query_run) > 0) {


                    foreach ($query_run as $row) {
                  ?>
                      <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td>
                          <?php
                          if ($row['role_as'] == "0") {
                            echo "Admin";
                          } elseif ($row['role_as'] == "1") {
                            echo "Manger";
                          } elseif ($row['role_as'] == "2") {
                            echo "Chef";
                          } elseif ($row['role_as'] == "3") {
                            echo "Waiter";
                          } else {
                            echo "Invalid";
                          }
                          ?>
                        </td>
                        <td>
                          <a href="employer-edit.php?er_id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">Edit</a>
                          <button href="button" class="btn btn-danger btn-sm deletebtn" value="<?php echo $row['id']; ?>">Delete</button>
                        </td>
                      </tr>
                    <?php
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

    $('.email_id').keyup(function(e) {
      var email = $('.email_id').val();
      $.ajax({
        type: "POST",
        url: "code.php",
        data: {
          "check_email": 1,
          "email": email,

        },
        success: function(response) {
          $('.already_email').text(response);
        }
      });
    });
  });
</script>


<!-- Script for delete btn -->
<script>
  $(document).ready(function() {
    $('.deletebtn').click(function(e) {
      e.preventDefault();
      var user_id = $(this).val();
      $('.delete_er_id').val(user_id);
      $('#deletemodal').modal('show');

    });
  });
</script>

<?php include('includes/footer.php'); ?>