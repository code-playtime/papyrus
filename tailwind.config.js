/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    // Main resources
    "./resources/**/*.{blade.php,vue,js,jsx,ts,tsx,scss,css}",
    
    // Modules - all variations
    "./modules/*/*.php",
    "./modules/*/views/**/*.php",
    
    // Public files
    "./public/**/*.html",
  ],
  theme: {
    colors: {
      transparent: "transparent",
      dark: {
        DEFAULT: "#000000",
        100: "#222222",
        200: "#3d3f43",
        300: "#556067",
        400: "#6d8389",
        500: "#87a8a8",
        600: "#a9cec2"
      },
      light: {
        DEFAULT: "#FFFFFF",
        100: "#ebf4f6",
        200: "#f8f9fa",
        300: "#dee2e6",
        400: "#ccfbf9",
        500: "#b5ffea",
        600: "#b6ffc9"
      },
      primary: {
        DEFAULT: "#169976",
        100: "#00948f",
        200: "#008da9",
        300: "#0083be",
        400: "#0076c9",
        500: "#3063c3"
      },
      success: "#8FA31E",
      danger: "#BF3131",
      info: "#4DA8DA",
      warning: "#FAA533"
    },
    extend: {
      screens: {
        xs: "360px",
        "2xl": "1441px"
      },
      boxShadow: {
        "card" : "0 2px 10px rgba(0, 0, 0, 0.1)"
      }
    },
  },
  plugins: [],
}

