const colors = require("tailwindcss/colors");
const plugin = require("tailwindcss/plugin");

module.exports = {
    mode: "jit",
    content: [
        "./resources/**/*.{html,js,vue,php}",

        "./node_modules/flowbite/**/*.js",
    ],
    darkMode: "class",
    theme: {
        zIndex: {
            5: 5,
            10: 10,
            15: 15,
            20: 20,
            25: 25,
            30: 30,
            35: 35,
            40: 40,
            45: 45,
            50: 50,
            75: 75,
            100: 100,
            200: 200,
            999: 999,
            1000: 1000,
            9999: 9999,
            auto: "auto",
        },
        extend: {
            keyframes: {
                wiggle: {
                    "0%, 100%": { transform: "rotate(-4deg)" },
                    "50%": { transform: "rotate(4deg)" },
                },
            },
            animation: {
                "fade-in-down": "fade-in-down 0.5s ease-out",
                wiggle: "wiggle 0.4s ease-in-out infinite",
            },
            colors: {
                yellow: colors.amber,
                indigo: colors.indigo,
                teal: colors.teal,
                orange: colors.orange,
                lime: colors.lime,
                cyan: colors.cyan,
                brand: {
                    primary: "#1266F1",
                    facebook: "#435F9B",
                    twitter: "#55ACEE",
                    linkedin: "#007BB5",
                    github: "#333",
                    feedback: "#c0916f",
                    success: "#00B74A",
                    danger: "#F93154",
                    warning: "#FFA900",
                    info: "#39C0ED",
                    light: "#98AFF5",
                },
                theme: {
                    1: "#f59031",
                    2: "#464340",
                    3: "#26C165",
                    4: "#26C165",
                    5: "#dee7ef",
                    6: "#D32929",
                    7: "#00620E",
                    8: "#f3f5f6",
                    9: "#91C714",
                    10: "#3160D8",
                },
                dark: {
                    1: "#293145",
                    2: "#232a3b",
                    3: "#313a55",
                    4: "#1e2533",
                    5: "#3f4865",
                    6: "#2b3348",
                    7: "#181f29",
                },
                fontFamily: {
                    nunito: ["Nunito", "sans-serif"],
                },
                container: {
                    center: true,
                },
                maxWidth: {
                    "1/4": "25%",
                    "1/2": "50%",
                    "3/4": "75%",
                },
                maxHeight: {
                    0: "0",
                    98: "32rem",
                    "1/4": "25%",
                    "1/2": "50%",
                    "3/4": "75%",
                    full: "100%",
                },
                strokeWidth: {
                    0.5: 0.5,
                    1.5: 1.5,
                    2.5: 2.5,
                },
                margin: {
                    78: "19.5rem",
                },
            },
            boxShadow: {
                sm: "0 1px 2px 0 rgba(0, 0, 0, 0.05)",
                DEFAULT:
                    "0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06)",
                md: "0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)",
                lg: "0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)",
                xl: "0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)",
                "2xl": "0 25px 50px -12px rgba(0, 0, 0, 0.25)",
                "3xl": "0 35px 60px -15px rgba(0, 0, 0, 0.3)",
                inner: "inset 0 2px 4px 0 rgba(0, 0, 0, 0.06)",
                none: "none",
            },
            backgroundImage: (theme) => ({
                "ehr-template__bg": "url('/images/logo.png') !important",
            }),
        },
        variants: {
            gradients: ["responsive", "hover"],
        },
        plugins: [
            plugin(function ({ addVariant, e }) {
                addVariant("dark", ({ modifySelectors, separator }) => {
                    modifySelectors(({ className }) => {
                        return `.dark .${e(`dark${separator}${className}`)}`;
                    });
                });
                addVariant("dark-hover", ({ modifySelectors, separator }) => {
                    modifySelectors(({ className }) => {
                        return `.dark .${e(
                            `dark${separator}hover${separator}${className}`
                        )}:hover`;
                    });
                });
            }),

            require("flowbite/plugin"),
        ],
    },
};
