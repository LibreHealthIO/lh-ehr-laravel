const plugin = require('tailwindcss/plugin');
const colors = require('tailwindcss/colors');

module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/css/**/*.css',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: 'media',
    theme: {
        zIndex: {
            '5': 5,
            '10': 10,
            '15': 15,
            '20': 20,
            '25': 25,
            '30': 30,
            '35': 35,
            '40': 40,
            '45': 45,
            '50': 50,
            '75': 75,
            '100': 100,
            '200': 200,
            '500': 500,
            '999': 999,
            'auto': 'auto',
        },
        listStyleType: {
            none: 'none',
            disc: 'disc',
            decimal: 'decimal',
            square: 'square',
            roman: 'upper-roman',
        },
        extend: {
            keyframes: {
                'fade-in-down': {
                    '0%': {
                        opacity: '0',
                        transform: 'translateY(-10px)'
                    },
                    '100%': {
                        opacity: '1',
                        transform: 'translateY(0)'
                    },
                },
                'wiggle': {
                    '0%, 100%': { transform: 'rotate(-4deg)' },
                    '50%': { transform: 'rotate(4deg)' },
                }
            },
            animation: {
                'spin-slow': 'spin 3s linear infinite',
                'fade-in-down': 'fade-in-down 0.5s ease-out',
                'wiggle': 'wiggle 0.4s ease-in-out infinite',
            },
            colors: {
                yellow: colors.amber,
                indigo: colors.indigo,
                teal: colors.teal,
                orange: colors.orange,
                lime: colors.lime,
                lightBlue: colors.lightBlue,
                cyan: colors.cyan,
                "brown": "#795548",
                "brown-50": "#efebe9",
                "brown-100": "#d7ccc8",
                "brown-200": "#bcaaa4",
                "brown-300": "#a1887f",
                "brown-400": "#8d6e63",
                "brown-500": "#795548",
                "brown-600": "#6d4c41",
                "brown-700": "#5d4037",
                "brown-800": "#4e342e",
                "brown-900": "#3e2723",
                "deep-purple": "#673ab7",
                "deep-purple-50": "#ede7f6",
                "deep-purple-100": "#d1c4e9",
                "deep-purple-200": "#b39ddb",
                "deep-purple-300": "#9575cd",
                "deep-purple-400": "#7e57c2",
                "deep-purple-500": "#673ab7",
                "deep-purple-600": "#5e35b1",
                "deep-purple-700": "#512da8",
                "deep-purple-800": "#4527a0",
                "deep-purple-900": "#311b92",
                'orange': { // TODO find the appropriate percentages
                    '100': '#f59031',
                    '200': '#f59031',
                    '300': '#f59031',
                    '400': '#f59031',
                    '500': '#f59031',
                    '600': '#f59031',
                    '700': '#f59031',
                    '800': '#f59031',
                    '900': '#f59031',
                },
                brand: {
                    primary: "#1266F1",
                    facebook: "#435F9B",
                    twitter: "#55ACEE",
                    linkedin: "#007BB5",
                    github: "#333",
                    feedback: "#c0916f",
                    'success': "#00B74A",
                    'danger': "#F93154",
                    'warning': "#FFA900",
                    'info': "#39C0ED",
                    'light': "#98AFF5",
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
                    7: "#181f29"
                }
            },
            fontFamily: {
                'nunito': ['Nunito', 'sans-serif']
            },
            container: {
                center: true
            },
            maxWidth: {
                "1/4": "25%",
                "1/2": "50%",
                "3/4": "75%"
            },
            screens: {
                sm: "640px",
                md: "768px",
                lg: "1024px",
                xl: "1280px",
                xxl: "1600px"
            },
            strokeWidth: {
                "0.5": 0.5,
                "1.5": 1.5,
                "2.5": 2.5
            },
            margin: {
                '78': '19.5rem',
            }
        },
    },
    variants: {
        backgroundColor: [
            'last', 'first', 'odd', 'even', 'responsive', 'hover', 'dark',
            'dark-hover', 'focus', 'group-hover',
            'focus-within', 'disabled'
        ],
        textColor: [
            'last', 'first', 'even', 'odd', 'responsive',
            'hover', 'dark', 'dark-hover', 'focus', 'group-hover',
            'focus-within'
        ],
        fontSize: ['responsive', 'hover', 'focus'],
        fontFamily: ['responsive', 'hover', 'focus'],
        zIndex: ['responsive', 'focus', 'hover', 'active'],
        gradients: ['responsive', 'hover'],
        spinner: ['responsive'],
        animation: ['responsive', 'motion-safe', 'motion-reduce'],
        transitionProperty: ['responsive', 'motion-safe', 'motion-reduce'],
        transform: ['hover', 'focus'],
        outline: ['responsive', 'focus', 'hover', 'active'],
        float: ['responsive', 'direction'],
        margin: ['responsive', 'last', 'direction'],
        padding: ['responsive', 'last', 'direction'],
        borderCollapse: ['responsive', 'hover', 'focus'],
        tableLayout: ['responsive', 'hover', 'focus'],
        position: ['responsive', 'hover'],
        borderWidth: ['responsive', 'last', 'hover', 'focus'],
        borderColor: ['last', 'first', 'even', 'odd', 'responsive', 'hover', 'dark', 'dark-hover'],
        backgroundAttachment: ['hover', 'focus'],
        opacity: ['disabled'],
        textOverflow: ['hover', 'focus'],
        listStyleType: ['hover', 'focus'],
        justifyContent: ['hover', 'focus', 'direction'],
        justifyItems: ['hover', 'focus', 'direction'],
        divideColor: ['hover', 'focus'],
        divideStyle: ['hover', 'focus'],
    },
    plugins: [
        require('tailwindcss-dir')(),
        plugin(function({ addVariant, e }) {
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
    ],
}
