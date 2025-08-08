export const panel = {
    isMobile() {
        return window.innerWidth <= 768;
    },

    toggleMenu() {
        const { isMobile } = panel;

        panel.menuToggle.addEventListener('click', function () {
            if (isMobile()) {
                panel.sidebar.classList.toggle('mobile-open');
                panel.sidebarOverlay.classList.toggle('active');
            } else {
                panel.sidebar.classList.toggle('collapsed');
                panel.mainContent.classList.toggle('expanded');
            }
        });

        panel.sidebarOverlay.addEventListener('click', function () {
            panel.sidebar.classList.remove('mobile-open');
            panel.sidebarOverlay.classList.remove('active');
        });

        window.addEventListener('resize', function () {
            if (!isMobile()) {
                panel.sidebar.classList.remove('mobile-open');
                panel.sidebarOverlay.classList.remove('active');
            }
        });
    },

    setupUserDropdown() {
        panel.userAvatar.addEventListener('click', function (e) {
            e.stopPropagation();
            panel.userDropdown.classList.toggle('active');
        });

        document.addEventListener('click', function () {
            panel.userDropdown.classList.remove('active');
        });

        panel.userDropdown.addEventListener('click', function (e) {
            e.stopPropagation();
        });
    },

    setupSubmenus() {
        document.querySelectorAll('[data-submenu]').forEach(function (link) {
            link.addEventListener('click', function (e) {
                e.preventpanel();
                const submenuId = this.getAttribute('data-submenu') + '-submenu';
                const submenu = document.getElementById(submenuId);
                const parentItem = this.closest('.nav-item');

                submenu.classList.toggle('active');
                parentItem.classList.toggle('expanded');
            });
        });
    },

    setupActiveNavLinks() {
        document.querySelectorAll('.sidebar-nav .nav-link').forEach(function (link) {
            link.addEventListener('click', function (e) {
                if (this.hasAttribute('data-submenu')) return;

                document.querySelectorAll('.sidebar-nav .nav-link').forEach(function (l) {
                    l.classList.remove('active');
                });

                this.classList.add('active');

                if (panel.isMobile()) {
                    panel.sidebar.classList.remove('mobile-open');
                    panel.sidebarOverlay.classList.remove('active');
                }
            });
        });
    },

    init() {
        // DOM Elements
        panel.menuToggle = document.getElementById('menuToggle');
        panel.sidebar = document.getElementById('sidebar');
        panel.mainContent = document.getElementById('mainContent');
        panel.sidebarOverlay = document.getElementById('sidebarOverlay');
        panel.userAvatar = document.getElementById('userAvatar');
        panel.userDropdown = document.getElementById('userDropdown');

        panel.toggleMenu();
        panel.setupUserDropdown();
        panel.setupSubmenus();
        panel.setupActiveNavLinks();

        // Set global scroll behavior
        document.documentElement.style.scrollBehavior = 'smooth';

        console.log('Custom Admin Panel Loaded Successfully!');
    }
};

