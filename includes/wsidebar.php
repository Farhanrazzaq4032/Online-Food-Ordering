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
                        <a href="#" class="d-block"><?php echo $_SESSION['auth_er']['name'] ?> (Waiter) </a>
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
                        <a href="pwaiter.php" class="nav-link">
                            <h5>
                                Waiter
                            </h5>
                        </a>
                    </li>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->




</aside>