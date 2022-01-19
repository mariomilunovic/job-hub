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
           }

       },
     },
     variants: {
       extend: {},
     },
     plugins: [],

     enabled: process.env.NODE_ENV === "production",
   }
