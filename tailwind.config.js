/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/views/**/*.blade.php",
    "./resources/js/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        // Military theme colors
        military: {
          50: '#f0f4f0',
          100: '#e1e9e1',
          200: '#c3d3c3',
          300: '#a5bda5',
          400: '#87a787',
          500: '#6b9969',
          600: '#559155',
          700: '#3f6941',
          800: '#2a412d',
          900: '#151a19',
        },
        // Dark background colors
        dark: {
          50: '#f8f8f8',
          100: '#f1f1f1',
          200: '#e3e3e3',
          300: '#d5d5d5',
          400: '#b3b3b3',
          500: '#919191',
          600: '#6f6f6f',
          700: '#4d4d4d',
          800: '#2b2b2b',
          900: '#141414',
        },
      },
      backgroundColor: {
        background: '#0d0d0d',
        card: '#1a1a1a',
        sidebar: '#141414',
        'sidebar-accent': '#252525',
      },
      textColor: {
        foreground: '#f5f5f5',
        'muted-foreground': '#999999',
        primary: '#6b9969',
      },
      borderColor: {
        border: '#2a2a2a',
        'sidebar-border': '#252525',
      },
      backgroundImage: {
        'military-grid': 'linear-gradient(0deg, transparent 24%, rgba(107, 153, 105, 0.05) 25%, rgba(107, 153, 105, 0.05) 26%, transparent 27%, transparent 74%, rgba(107, 153, 105, 0.05) 75%, rgba(107, 153, 105, 0.05) 76%, transparent 77%, transparent), linear-gradient(90deg, transparent 24%, rgba(107, 153, 105, 0.05) 25%, rgba(107, 153, 105, 0.05) 26%, transparent 27%, transparent 74%, rgba(107, 153, 105, 0.05) 75%, rgba(107, 153, 105, 0.05) 76%, transparent 77%, transparent)',
        'military-grid-lg': 'linear-gradient(0deg, transparent 24%, rgba(107, 153, 105, 0.05) 25%, rgba(107, 153, 105, 0.05) 26%, transparent 27%, transparent 74%, rgba(107, 153, 105, 0.05) 75%, rgba(107, 153, 105, 0.05) 76%, transparent 77%, transparent), linear-gradient(90deg, transparent 24%, rgba(107, 153, 105, 0.05) 25%, rgba(107, 153, 105, 0.05) 26%, transparent 27%, transparent 74%, rgba(107, 153, 105, 0.05) 75%, rgba(107, 153, 105, 0.05) 76%, transparent 77%, transparent)',
      },
      backgroundSize: {
        'military-grid': '50px 50px',
        'military-grid-lg': '100px 100px',
      },
    },
  },
  plugins: [],
}
