    <!-- Sidebar Overlay for Mobile -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="user-info">
                <div class="avatar-img">JD</div>
                <div class="user-details">
                    <h4>John Doe</h4>
                    <small>Administrator</small>
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
                    <a href="<?= route("panel.articles") ?>" class="nav-link <?= route_in(['panel.articles', 'panel.articles.create', 'panel.articles.edit']) ? 'active' : '' ?>">
                        <i class="fa fa-pencil-square-o"></i>
                        Articles
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-pencil-square-o"></i>
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
