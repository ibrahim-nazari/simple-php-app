/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php", // Scans PHP files in the root directory
    "./**/*.php", // Scans PHP files in subdirectories
    // Add other file types like "./*.html" if needed
  ],
  theme: {
    extend: {},
  },
  plugins: [],
};
