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
