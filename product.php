<?php
include('authentication.php');
include('config/dbcon.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
?>

  <!-- Detele Modal -->
  <div class="modal fade" id="deleteProdmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="code.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="delete_prod" class="delete_prod_id">
            <p>
              You want to delete this Product ?
            </p>
          </div>
          <div class="modal-footer">
            <a href="product.php" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
            <button type="submit" name="deleteProd" class="btn btn-danger">Confirm</button>
          </div>
        </form>
      </div>
    </div>
  </div>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper mt-4">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Message Box Alert -->
                    <?php include('message.php'); ?>
                    <!------- Message Box Alert ----------->
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                Products
                                <a href="product-add.php" class="btn btn-primary float-right">Add</a>
                            </h4>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <!-- <th>ID</th> -->
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <?php
                                $query = "SELECT * FROM products";
                                $query_run = mysqli_query($con, $query);
                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $proditem)
                                    {
                                     ?>                                       
                                        <tr>
                                            <td hidden><?= $proditem['id']; ?></td>
                                            <td><?= $proditem['name']; ?></td>
                                            <td><?= $proditem['long_description']; ?></td>
                                            <td><?= $proditem['price']; ?></td>
                                            <td>
                                            <img src="uploads/productPic/<?= $proditem['image']; ?>" width="50px" height="50px" alt="Image">
                                            </td>
                                            <td><?= $proditem['created_at']; ?></td>
                                            <td>
                                                <a href="product-edit.php?prod_id=<?= $proditem['id']; ?>" class="btn btn-info btn-sm">Edit</a>
                                                <button href="button" class="btn btn-danger btn-sm deleteProdubtn" value="<?= $proditem['id']; ?>">Delete</button>
                                            </td>
                                        </tr>
                                     <?php
                                    }
                                } 
                                else 
                                {
                                    ?>
                                    <tr>
                                        <td colspan="7">No Record Found</td>
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


</div>



<?php include('includes/script.php'); ?>
 <!-- this script used to delete Product -->
<script>
  $(document).ready(function() {
    $('.deleteProdubtn').click(function(e) {
      e.preventDefault();
      var proditem_id = $(this).val();
      $('.delete_prod_id').val(proditem_id);
      $('#deleteProdmodal').modal('show');

    });
  });
</script>

<?php include('includes/footer.php'); ?>
