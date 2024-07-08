/** @type {import('tailwindcss').Config} */
export default {
  darkMode: 'class',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      maxHeight: {
        '400px': '400px',
      },
    },
  },
  plugins: [
    require('tailwind-scrollbar'),
  ],
}

