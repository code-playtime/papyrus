<?php $template->includes("includes/header") ?>

        <?php $template->includes("includes/pagebar", [
                "pageTitle" => "Dashboard",
                "pageNavs" => ["Home", "Dashboard"]
        ]); ?>

        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon blue">👥</div>
                <div class="stat-info">
                    <h3>1,234</h3>
                    <p>Total Users</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon green">📦</div>
                <div class="stat-info">
                    <h3>567</h3>
                    <p>Products</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon orange">📋</div>
                <div class="stat-info">
                    <h3>89</h3>
                    <p>Orders</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon red">💰</div>
                <div class="stat-info">
                    <h3>$12,345</h3>
                    <p>Revenue</p>
                </div>
            </div>
        </div>

        <!-- Content Section -->
        <div class="content-section">
            <div class="section-header">
                Welcome to Your Dashboard
            </div>
            <div class="section-body">
                <p>This is a custom-built admin panel created with vanilla HTML, CSS, and JavaScript. It features:</p>
                <ul style="margin: 20px 0; padding-left: 20px;">
                    <li>Fully responsive design that works on all devices</li>
                    <li>Collapsible sidebar with smooth animations</li>
                    <li>Modern UI with clean design principles</li>
                    <li>No external dependencies or frameworks</li>
                    <li>Customizable and extensible architecture</li>
                </ul>
                <p>Start building your amazing application from here!</p>
            </div>
        </div>

<?php $template->includes("includes/footer") ?>
