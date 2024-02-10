<?php
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');
?>

<div class="content-wrapper">
    <?php
    if (isset($_GET['prod_id'])) 
    {
        $prod_id = $_GET['prod_id'];
        $query = "SELECT * FROM products WHERE id = '$prod_id'";
        $query_run = mysqli_query($con, $query);

        if (mysqli_num_rows($query_run) > 0) {
            $proditem = mysqli_fetch_array($query_run);

    ?>
            <section class="content mt-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?php include('message.php'); ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4>
                                        Product Edit
                                    </h4>
                                    <a href="product.php" class="btn btn-info btn-sm float-right">Back</a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="code.php" method="POST" enctype="multipart/form-data">

                                        <!-- this is used to get product id to update -->
                                        <input type="hidden" name="proditem_id" value="<?= $proditem['id'];?>">
                                        <!-- .. -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="">Category List</label>
                                                <?php
                                                // thsi code is used to get category items
                                                $query = "SELECT * FROM categories";
                                                $query_run = mysqli_query($con, $query);

                                                if (mysqli_num_rows($query_run) > 0) {
                                                ?>
                                                    <select name="category_id" required class="form-control">
                                                        <option value="">Select Category</option>
                                                        <?php foreach ($query_run as $cateitem) 
                                                        { ?>
                                                            <option value="<?= $cateitem['id']; ?>" <?= $proditem['category_id'] == $cateitem['id'] ? 'selected':''; ?>>
                                                            <?= $cateitem['name']; ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                <?php

                                                }

                                                ?>
                                                
                                                <div class="form-group">
                                                    <label for="">Product Name</label>
                                                    <input type="text" name="name" value="<?= $proditem['name'];?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Small Description</label>
                                                    <textarea name="small_description" class="form-control" rows="3"><?= $proditem['small_description'];?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Long Description</label>
                                                    <textarea name="long_description" class="form-control" rows="3"><?= $proditem['long_description'];?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Price</label>
                                                    <input type="text" name="price" value="<?= $proditem['price'];?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Offer Price</label>
                                                    <input type="text" name="offerprice" value="<?= $proditem['offerprice'];?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Quantity</label>
                                                    <input type="text" name="quantity" value="<?= $proditem['quantity'];?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="">Upload Image</label>
                                                    <input type="file" name="image" class="form-control">
                                                </div>
                                                <img src="uploads/productPic/<?= $proditem['image'];?>" width="50px" height="50px" alt="Image">
                                                <!-- this code is usde to old image -->
                                                 <input type="hidden" name="old_image" value="<?= $proditem['image'];?>">
                                                    <!-- .. -->
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Click to Update</label> <br>
                                                    <button type="submit" name="updateProd" class="btn btn-primary btn-block">Update</button>
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

    <?php

        } else {
            echo "<h4> Record Found.!</h4>";
        }
    }
    ?>

</div>

<?php
include('includes/script.php');
include('includes/footer.php');
?>