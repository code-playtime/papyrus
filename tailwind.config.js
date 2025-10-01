/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    // Main resources
    "./resources/**/*.{blade.php,vue,js,jsx,ts,tsx,scss,css}",
    
    // Modules - all variations
    "./modules/*/*.php",
    
    // Public files
    "./public/**/*.html",
  ],
  theme: {
    colors: {
      transparent: "transparent",
      dark: {
        100: "#222222",
        200: "#3d3f43",
        300: "#556067",
        400: "#6d8389",
        500: "#87a8a8",
        600: "#a9cec2"
      },
      light: {
        100: "#ebf4f6",
        200: "#ccfbf9",
        300: "#b5ffea",
        400: "#b6ffc9",
        500: "#cfff9d",
        600: "#f9f871"
      },
      primary: {
        100: "#169976",
        200: "#00948f",
        300: "#008da9",
        400: "#0083be",
        500: "#0076c9",
        600: "#3063c3"
      }
    },
    extend: {
      screens: {
        xs: "360px",
        "2xl": "1441px"
      }
    },
  },
  plugins: [],
}

