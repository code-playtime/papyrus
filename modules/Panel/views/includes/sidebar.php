    <!-- Sidebar Overlay for Mobile -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="user-info">
                <div class="avatar-img">JD</div>
                <div class="user-details">
                    <h4><?= auth()->user("name") ?></h4>
                    <small><?= auth()->user("role") ?></small>
                </div>
            </div>
        </div>
        <nav>
            <ul class="sidebar-nav">
                <li class="nav-item">
                    <a href="<?= route("panel.dashboard") ?>" class="nav-link <?= route_is('panel.dashboard') ? 'active' : '' ?>">
                        <i class="fa fa-dashboard"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= route("panel.articles") ?>" class="nav-link <?= route_in(sidebar_options("articles")) ? 'active' : '' ?>">
                        <i class="fa fa-file-text-o"></i>
                        Articles
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= route("panel.books") ?>" class="nav-link <?= route_in(sidebar_options("books")) ? 'active' : '' ?>">
                        <i class="fa fa-book"></i>
                        Books
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link" data-submenu="products">
                        <span class="nav-icon icon-products"></span>
                        Products
                        <span class="nav-arrow icon-arrow"></span>
                    </a>
                    <ul class="nav-submenu" id="products-submenu">
                        <li><a href="#" class="nav-link">All Products</a></li>
                        <li><a href="#" class="nav-link">Add Product</a></li>
                        <li><a href="#" class="nav-link">Categories</a></li>
                    </ul>
                </li> -->
            </ul>
        </nav>
    </aside>
