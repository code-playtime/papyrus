<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Admin Panel</title>
        <link rel="stylesheet" type="text/css" href="<?= asset("resources/css/panel.css") ?>" />
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-left">
            <button class="menu-toggle" id="menuToggle">
                <span class="icon-menu"></span>
            </button>
            <div class="logo">Papyrus</div>
        </div>
        <div class="header-right">
            <div class="user-menu">
                <div class="user-avatar" id="userAvatar">
                    <div class="avatar-img">JD</div>
                    <span class="user-name">John Doe</span>
                </div>
                <div class="dropdown-menu" id="userDropdown">
                    <a href="#" class="dropdown-item">Profile</a>
                    <a href="#" class="dropdown-item">Settings</a>
                    <a href="#" class="dropdown-item">Help</a>
                    <a href="<?= route("auth.logout") ?>" class="dropdown-item">Logout</a>
                </div>
            </div>
        </div>
    </header>

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
                    <a href="#" class="nav-link active">
                        <span class="nav-icon icon-dashboard"></span>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <span class="nav-icon icon-users"></span>
                        Users
                    </a>
                </li>
                <li class="nav-item">
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
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <span class="nav-icon icon-orders"></span>
                        Orders
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <span class="nav-icon icon-analytics"></span>
                        Analytics
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <span class="nav-icon icon-settings"></span>
                        Settings
                    </a>
                </li>
            </ul>
        </nav>
    </aside>
