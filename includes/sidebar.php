<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="#" class="brand-link">
    <img src="assets/dist/img/ofo logo.jpg" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Domain Name</span>
  </a>

  <!-- Sidebar -->
  <div id="sidebar">
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <?php
        if (isset($_SESSION['auth'])) {
        ?>
          <div class="image">
            <img src="assets/dist/img/Restaurant.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $_SESSION['auth_er']['name'] ?> (Manger) </a>
          <?php
        }
          ?>
          </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
                Manage
                <i class="right fas bi bi-caret-left-fill"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="category.php" class="nav-link">
                  <i class="far bi bi-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="product.php" class="nav-link">
                  <i class="far bi bi-circle nav-icon"></i>
                  <p>Products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="offer.php" class="nav-link">
                  <i class="far bi bi-circle nav-icon"></i>
                  <p>New Offer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="order-list.php" class="nav-link">
                  <i class="far bi bi-circle nav-icon"></i>
                  <p>Order List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="employees.php" class="nav-link">
                  <i class="far bi bi-circle nav-icon"></i>
                  <p>Employer Details</p>
                </a>
              </li>
            </ul>
          </li>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
                Customer Order
                <i class="right fas bi-caret-left-fill"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="new-order.php" class="nav-link">
                  <i class="far bi bi-circle nav-icon"></i>
                  <p>New Order</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="booking-order.php" class="nav-link">
                  <i class="far bi bi-circle nav-icon"></i>
                  <p>Booking Order</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="confirm-order.php" class="nav-link">
                  <i class="far bi bi-circle nav-icon"></i>
                  <p>Confirm Order</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
                Employees
                <i class="right fas bi-caret-left-fill"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="waiter.php" class="nav-link">
                  <i class="far bi bi-circle nav-icon"></i>
                  <p>Waiter</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="chef.php" class="nav-link">
                  <i class="far far bi bi-circle nav-icon"></i>
                  <p>Chef</p>
                </a>
              </li>
            </ul>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
  </div>
  <!-- /.sidebar -->




</aside>