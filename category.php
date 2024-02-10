<?php
include('authentication.php');
include('config/dbcon.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
?>

<!-- Modal -->
<div class="modal fade" id="catgoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Upload Icon</label>
                        <input type="file" name="icon" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Brief</label>
                        <textarea name="brief" class="form-control" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="addCategory" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Detele Modal -->
<div class="modal fade" id="deleteCatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="delete_cate" class="delete_cate_id">
                    <p>
                        You want to delete this Category ?
                    </p>
                </div>
                <div class="modal-footer">
                    <a href="category.php" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                    <button type="submit" name="deleteCate" class="btn btn-danger">Confirm</button>
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
                                Category
                                <a href="#" data-toggle="modal" data-target="#catgoryModal" class="btn btn-primary float-right">Add</a>
                            </h4>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Icon</th>
                                    <th>Name</th>
                                    <th>Brief</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM categories";
                                $query_run = mysqli_query($con, $query);
                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $cateitem) {
                                ?>
                                        <tr>
                                            <td>
                                            <img src="uploads/categoryPic/<?= $cateitem['icon']; ?>" width="50px" height="50px" alt="Image">
                                        </td>
                                            <td><?= $cateitem['name']; ?></td>
                                            <td><?= $cateitem['brief']; ?></td>
                                            <td>
                                                <a href="category-edit.php?cateitem_id=<?= $cateitem['id']; ?>" class="btn btn-info btn-sm">Edit</a>
                                                <button href="button" class="btn btn-danger btn-sm deleteCatebtn" value="<?= $cateitem['id']; ?>">Delete</button>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
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
<!-- this script used to delete Category -->
<script>
    $(document).ready(function() {
        $('.deleteCatebtn').click(function(e) {
            e.preventDefault();
            var cateitem_id = $(this).val();
            $('.delete_cate_id').val(cateitem_id);
            $('#deleteCatemodal').modal('show');

        });
    });
</script>

<?php include('includes/footer.php'); ?>