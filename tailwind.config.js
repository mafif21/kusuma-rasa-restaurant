const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter", "Nunito", ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                "hero-image": "url('/public/images/hero/hero.jpg')",
            },
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
