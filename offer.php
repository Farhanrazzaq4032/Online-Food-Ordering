<?php
include('authentication.php');
include('config/dbcon.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
?>

<!-- Detele Modal -->
<div class="modal fade" id="deleteOffermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Offer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="code.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="delete_offer" class="delete_offer_id">
            <p>
              You want to delete this Offer ?
            </p>
          </div>
          <div class="modal-footer">
            <a href="offer.php" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
            <button type="submit" name="deleteOffer" class="btn btn-danger">Confirm</button>
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
                              Offer
                                <a href="offer-add.php" class="btn btn-primary float-right">Add</a>
                            </h4>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Ofer Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                            <?php
                                $query = "SELECT * FROM offer";
                                $query_run = mysqli_query($con, $query);
                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $item)
                                    {
                                     ?>                                       
                                        <tr>
                                            <td hidden><?= $item['id']; ?></td>
                                            <td><?= $item['title']; ?></td>
                                            <td>
                                            <img src="uploads/offerPic/<?= $item['image']; ?>" width="50px" height="50px" alt="Image">
                                            </td>
                                            <td>
                                                <a href="offer-edit.php?offer_id=<?= $item['id']; ?>" class="btn btn-info btn-sm">Edit</a>
                                                <button href="button" class="btn btn-danger btn-sm deleteOfferbtn" value="<?= $item['id']; ?>">Delete</button>
                                            </td>
                                        </tr>
                                     <?php
                                    }
                                } 
                                else 
                                {
                                    ?>
                                    <tr>
                                        <td colspan="3">No Record Found</td>
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
 <!-- this script used to delete Offer -->
<script>
  $(document).ready(function() {
    $('.deleteOfferbtn').click(function(e) {
      e.preventDefault();
      var proditem_id = $(this).val();
      $('.delete_offer_id').val(proditem_id);
      $('#deleteOffermodal').modal('show');

    });
  });
</script>

<?php include('includes/footer.php'); ?>