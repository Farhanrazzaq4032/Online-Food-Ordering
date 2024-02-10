<?php
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
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
                <h4>Category</h4>
              </div>
              <a href="category.php" class="small-box-footer">Manage Category</a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h4>Product</h4>
              </div>
              <a href="product.php" class="small-box-footer">Manage Products</a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h4>Offers</h4>
              </div>
              <a href="offer.php" class="small-box-footer">Manage Offer</a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h4>New Order</h4>
              </div>
              <a href="new-order.php" class="small-box-footer">New Order</i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h4>Booking Order</h4>
              </div>
              <a href="booking-order.php" class="small-box-footer">Booking Order</i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h4>Confirm Order</h4>
              </div>
              <a href="confirm-order.php" class="small-box-footer">Confirm Order</i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h4>Order List</h4>
              </div>
              <a href="order-list.php" class="small-box-footer">Order List</i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h4>Employees</h4>
              </div>
              <a href="employees.php" class="small-box-footer">Employer</i></a>
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