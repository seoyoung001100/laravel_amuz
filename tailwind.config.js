/** @type {import('tailwindcss').Config} */
const plugin = require('tailwindcss/plugin')
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
  ],
  theme: {
    extend: {},
  },
  plugins: [
    // require('@tailwindcss/typography'),
    // require('@tailwindcss/forms'),
    // require('@tailwindcss/aspect-ratio'),
    // require('@tailwindcss/container-queries'),
    // plugin(function({ addUtilities, addComponents, e, config }) {
      
    // }),
  ],
}

// const plugin = require('tailwindcss/plugin')

// module.exports = {
//   plugins: [
//     plugin(function({ addUtilities, addComponents, e, config }) {
      
//     }),
//   ]
// }