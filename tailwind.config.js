/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./public/**/*.js",
    ],
    theme: {
        extend: {
            fontFamily: {
                "poppins-regular": "poppins-regular",
                "poppins-semibold": "poppins-semibold",
                "poppins-bold": "poppins-bold",
                "poppins-medium": "poppins-medium",
            },
        },
    },
    plugins: [],
};
