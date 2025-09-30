/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    // Main resources
    "./resources/**/*.{blade.php,vue,js,jsx,ts,tsx,scss,css}",
    
    // Modules - all variations
    "./modules/*/*.php",
    "./modules/*/Resources/**/*.{blade.php,vue,js,jsx,ts,tsx}",
    "./modules/*/Resources/views/**/*.blade.php",
    "./modules/*/Resources/assets/**/*.{vue,js,jsx,scss,css}",
    "./modules/*/Http/Controllers/**/*.php",
    "./modules/*/Entities/**/*.php",
    
    // App directory
    "./app/**/*.php",
    
    // Public files
    "./public/**/*.html",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

