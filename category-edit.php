<?php
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1 class="m-0">Dashboard</h1> -->
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Category</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Edit Category
                            </h2>
                            <a href="category.php" class="btn btn-info btn-sm float-right">Back</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col md-6">
                                    <form action="code.php" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">

                                            <!-- this used to edit Category items -->
                                            <?php
                                            if (isset($_GET['cateitem_id'])) {
                                                $cateitem_id = $_GET['cateitem_id'];
                                                $query = "SELECT * FROM categories WHERE id ='$cateitem_id' LIMIT 1";
                                                $query_run = mysqli_query($con, $query);

                                                if (mysqli_num_rows($query_run) > 0) {
                                                    foreach ($query_run as $cateitem) {
                                            ?>
                                                        <input type="hidden" name="cate_id" value="<?= $cateitem['id']; ?>">
                                                        <div class="form-group">
                                                            <label for="">Name</label>
                                                            <input type="text" name="name" value="<?= $cateitem['name']; ?>" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Brief</label>
                                                            <textarea name="brief" class="form-control" rows="3"><?= $cateitem['brief']; ?> </textarea>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="">Upload Image</label>
                                                                <input type="file" name="icon" class="form-control">
                                                            </div>
                                                            <img src="uploads/categoryPic/<?= $cateitem['icon']; ?>" width="50px" height="50px" alt="Icon">
                                                            <!-- this code is usde to old image -->
                                                            <input type="hidden" name="old_icon" value="<?= $cateitem['icon']; ?>">
                                                            <!-- .. -->
                                                        </div>
                                            <?php
                                                    }
                                                } else {
                                                    echo "<h4> Record Found.!</h4>";
                                                }
                                            }
                                            // else
                                            //     {
                                            //         echo "<h4> Record Found.f!</h4>";
                                            //     }

                                            ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="updateCate" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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