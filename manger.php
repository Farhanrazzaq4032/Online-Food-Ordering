<?php
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/msidebar.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
        </div>
      </div>
  </div>
 <!-- /.content-header -->
 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-12">
          <?php include('message.php'); ?>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Category</h3>
              </div>
              <a href="category.php" class="small-box-footer">Manage Category</a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Product<sup style="font-size: 20px"></h3>
              </div>
              <a href="product.php" class="small-box-footer">Manage Products</a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Offers</h3>
              </div>
              <a href="offer.php" class="small-box-footer">Manage Offer</a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>New Order</h3>
              </div>
              <a href="order.php" class="small-box-footer">New Order</i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>Booking Order</h3>
              </div>
              <a href="booking-order.php" class="small-box-footer">Booking Order</i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        </section>
    <!-- /.content -->
</div>

<?php
include('includes/script.php');
include('includes/footer.php');
?>