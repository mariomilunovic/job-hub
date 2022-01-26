module.exports = {

    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    mode: 'jit',

    purge: [

        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',

    ],
     darkMode: false, // or 'media' or 'class'
     theme: {
       extend: {
           width: {
               '400':'400px',
               '600':'600px',
               '800':'800px',
           },

           screens: {
            'sm': '640px',
            // => @media (min-width: 640px) { ... }

            'md': '768px',
            // => @media (min-width: 768px) { ... }

            'lg': '1024px',
            // => @media (min-width: 1024px) { ... }

            'xl': '1280px',
            // => @media (min-width: 1280px) { ... }

            '2xl': '1536px',
            // => @media (min-width: 1536px) { ... }
          } 


       },
     },
     variants: {
       extend: {},
     },
     plugins: [],

     enabled: process.env.NODE_ENV === "production",
   }
