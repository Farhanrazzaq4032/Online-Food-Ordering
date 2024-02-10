<?php
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');
?>

<div class="content-wrapper">
    <?php
    if (isset($_GET['offer_id'])) 
    {
        $offer_id = $_GET['offer_id'];
        $query = "SELECT * FROM offer WHERE id = '$offer_id'";
        $query_run = mysqli_query($con, $query);

        if (mysqli_num_rows($query_run) > 0) {
            $offeritem = mysqli_fetch_array($query_run);

    ?>
            <section class="content mt-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?php include('message.php'); ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4>
                                        Offer Edit
                                    </h4>
                                    <a href="product.php" class="btn btn-info btn-sm float-right">Back</a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="code.php" method="POST" enctype="multipart/form-data">

                                        <!-- this is used to get product id to update -->
                                        <input type="hidden" name="offeritem_id" value="<?= $offeritem['id'];?>">
                                        <!-- .. -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Title Name</label>
                                                    <input type="text" name="title" value="<?= $offeritem['title'];?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="">Upload Offer Image</label>
                                                    <input type="file" name="image" class="form-control">
                                                </div>
                                                <img src="uploads/offerPic/<?= $offeritem['image'];?>" width="50px" height="50px" alt="Image">
                                                <!-- this code is usde to old image -->
                                                 <input type="hidden" name="old_image" value="<?= $offeritem['image'];?>">
                                                    <!-- .. -->
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Click to Update</label> <br>
                                                    <button type="submit" name="updateOffer" class="btn btn-primary btn-block">Update</button>
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