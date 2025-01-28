/** @type {import('tailwindcss').Config} */
export default {
  content: [
      './resources/**/*.blade.php',
      './resources/**/*.js',
      './resources/**/*.vue',
  ],
  theme: {
      extend: {
        colors: {
          primary: '#044C34',
          primaryHover: '#033f2c',     
          secondary:'#87A922',
          secondaryHover: '#769b1a',    
          tertiary: '#B9991D',
          tertiaryHover: '#a68816', 
          neutral: '#F7F6BB',
          neutralHover: '#e1df8a', 
          accent: '#D35400',
          accentHover: '#c84400', 
          danger: '#DC3545',           
          dangerHover: '#c82333',      
          success: '#28A745',         
          successHover: '#218838',     
          warning: '#FFC107',          
          warningHover: '#e0a800',    
          info: '#17A2B8',              
          infoHover: '#138496',        
      },
      },
  },
  plugins: [],
};
