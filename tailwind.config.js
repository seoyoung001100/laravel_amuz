/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
  },
  plugins: [
    
  ],
}

// const plugin = require('tailwindcss/plugin')

// module.exports = {
//   plugins: [
//     plugin(function({ addUtilities, addComponents, e, config }) {
      
//     }),
//   ]
// }