<?php
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');
?>

<div class="content-wrapper">>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php include('message.php'); ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                Product Add
                            </h4>
                            <a href="product.php" class="btn btn-info btn-sm float-right">Back</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Category List</label>
                                        <?php
                                        $query = "SELECT * FROM categories";
                                        $query_run = mysqli_query($con, $query);

                                        if (mysqli_num_rows($query_run) > 0) {
                                        ?>
                                            <select name="cate_id" class="form-control">
                                                <?php foreach ($query_run as $cateitem) { ?>
                                                    <option value="<?= $cateitem['id']; ?></"><?= $cateitem['name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        <?php

                                        }

                                        ?>
                                        <div class="form-group">
                                            <label for="">Product Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Product Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Small Description</label>
                                            <textarea name="small_description" class="form-control" required rows="3" placeholder="Enter Small Description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Long Description</label>
                                            <textarea name="long_description" class="form-control" required rows="3" placeholder="Enter Long Description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Price</label>
                                            <input type="text" name="price" class="form-control" required placeholder="Enter Price">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Offer Price</label>
                                            <input type="text" name="offerprice" class="form-control" required placeholder="Enter Offer Price">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Quantity</label>
                                            <input type="text" name="quantity" class="form-control" required placeholder="Enter Quantity">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Upload Image</label>
                                            <input type="file" name="image" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Click to Save</label> <br>
                                            <button type="submit" name="prodSave" class="btn btn-primary btn-block">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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