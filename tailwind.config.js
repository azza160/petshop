/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#10b981", // emerald-500
                secondary: "#f59e0b", // amber-500
                dark: "#0f172a", // slate-900
            },
        },
    },
    plugins: [],
}
