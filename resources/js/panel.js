// import { } from "module";
import BlockEditor from "./Editor/BlockEditor";

// Mobile detection
function isMobile() {
    return window.innerWidth <= 768;
}

// DOM Elements
const menuToggle = document.getElementById('menuToggle');
const sidebar = document.getElementById('sidebar');
const mainContent = document.getElementById('mainContent');
const sidebarOverlay = document.getElementById('sidebarOverlay');
const userAvatar = document.getElementById('userAvatar');
const userDropdown = document.getElementById('userDropdown');

// Menu Toggle Functionality
menuToggle.addEventListener('click', function() {
    if (isMobile()) {
        sidebar.classList.toggle('mobile-open');
        sidebarOverlay.classList.toggle('active');
    } else {
        sidebar.classList.toggle('collapsed');
        mainContent.classList.toggle('expanded');
    }
});

// Close sidebar when clicking overlay (mobile)
sidebarOverlay.addEventListener('click', function() {
    sidebar.classList.remove('mobile-open');
    sidebarOverlay.classList.remove('active');
});

// Handle window resize
window.addEventListener('resize', function() {
    if (!isMobile()) {
        sidebar.classList.remove('mobile-open');
        sidebarOverlay.classList.remove('active');
    }
});

// User Dropdown Functionality
userAvatar.addEventListener('click', function(e) {
    e.stopPropagation();
    userDropdown.classList.toggle('active');
});

// Close dropdown when clicking outside
document.addEventListener('click', function() {
    userDropdown.classList.remove('active');
});

// Prevent dropdown from closing when clicking inside
userDropdown.addEventListener('click', function(e) {
    e.stopPropagation();
});

// Submenu Functionality
document.querySelectorAll('[data-submenu]').forEach(function(link) {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        const submenuId = this.getAttribute('data-submenu') + '-submenu';
        const submenu = document.getElementById(submenuId);
        const parentItem = this.closest('.nav-item');
        
        // Toggle submenu
        submenu.classList.toggle('active');
        parentItem.classList.toggle('expanded');
    });
});

// Navigation Link Active State
document.querySelectorAll('.sidebar-nav .nav-link').forEach(function(link) {
    link.addEventListener('click', function(e) {
        // Don't handle if it's a submenu toggle
        if (this.hasAttribute('data-submenu')) {
            return;
        }
        
        // Remove active class from all links
        document.querySelectorAll('.sidebar-nav .nav-link').forEach(function(l) {
            l.classList.remove('active');
        });
        
        // Add active class to clicked link
        this.classList.add('active');
        
        // Close mobile sidebar
        if (isMobile()) {
            sidebar.classList.remove('mobile-open');
            sidebarOverlay.classList.remove('active');
        }
    });
});

// Smooth scrolling for better UX
document.documentElement.style.scrollBehavior = 'smooth';

// Initialize
document.addEventListener('DOMContentLoaded', function() {
    console.log('Custom Admin Panel Loaded Successfully!');
});

// Editor JS Setup
const editor = new BlockEditor("editor-container");
