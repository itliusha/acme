/** @type {import('tailwindcss').Config} */
const {theme} = require("./tailwind.config");
module.exports = {
  content: [
    "./resources/views/**/*.blade.php",
    "./resources/**/*.js",
  ],
  darkMode: 'class',
  theme: {
    extend: {
      spacing: {
        '0.75': '0.1875rem',
        '7.5': '1.875rem',
        '8.5': '2.125rem',
        '9.5': '2.375rem',
        '10.5': '2.625rem',
      },
      zIndex: { 'top': '9999' },
      fontSize: {
        xs: ['0.75rem', '1.25rem'],
        sm: ['0.875rem', '1.375rem'],
        base: ['1rem', '1.5rem'],
        lg: ['1.125rem', '1.625rem'],
        xl: ['1.25rem', '1.75rem'],
      },
    },
    colors: {
      inherit: 'inherit',
      current: 'currentColor',
      transparent: 'transparent',
      black: '#000',
      white: '#fff',
      gray: {
        50: "#f9fafb",
        100: "#f3f4f6",
        200: "#e5e7eb",
        300: "#d1d5db",
        400: "#9fa5af",
        500: "#717680",
        600: "#4e5763",
        700: "#3a4351",
        800: "#212b37",
        900: "#111723",
        950: "#01050e"
      },
      primary: {
        50: "#EDFAFF",
        100: "#D6F1FF",
        200: "#BCEBFF",
        300: "#83DCFF",
        400: "#48C7FF",
        500: "#1EA7FF",
        600: "#0689FF",
        700: "#0075FF",
        800: "#0859C5",
        900: "#0D4E9B",
        950: "#0E305D"
      },
      success: {
        50: "#EDFCF6",
        100: "#D4F7E8",
        200: "#ACEED5",
        300: "#77DEBD",
        400: "#3FC8A1",
        500: "#1BA784",
        600: "#0F8C6F",
        700: "#0C705B",
        800: "#0C5949",
        900: "#0B493E",
        950: "#052923",
      },
      danger: {
        50: "#FEF2F3",
        100: "#FFE1E4",
        200: "#FFC8CE",
        300: "#FFA2AC",
        400: "#FD6C7C",
        500: "#F53E52",
        600: "#DE1C31",
        700: "#BF1628",
        800: "#9E1625",
        900: "#831924",
        950: "#47080F",
      },
      warning: {
        50: "#FFFBEC",
        100: "#FFF6D3",
        200: "#FFE9A7",
        300: "#FFD76F",
        400: "#FFBA35",
        500: "#FFA20E",
        600: "#FB8B05",
        700: "#C96605",
        800: "#9F500D",
        900: "#80420E",
        950: "#452005",
      },
      subsidiary: {
        50: "#FAF5FF",
        100: "#F4E8FF",
        200: "#EBD5FF",
        300: "#DBB4FE",
        400: "#C384FC",
        500: "#AA55F7",
        600: "#9333EA",
        700: "#7C22CE",
        800: "#6821A8",
        900: "#541C87",
        950: "#380764"
      }
    },
  },
  safelist: [
    { pattern: /grid-cols-/, variants: ['sm', 'md', 'lg', 'xl', '2xl'] },
    { pattern: /grid-rows-/, variants: ['sm', 'md', 'lg', 'xl', '2xl'] },
  ],
  plugins: [
    require("@tailwindcss/forms")({
      strategy: 'base',
    })
  ],
}


