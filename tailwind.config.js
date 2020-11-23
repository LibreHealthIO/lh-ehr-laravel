const plugin = require('tailwindcss/plugin');

module.exports = {
    purge: [
        './resources/views/**/*.blade.php',
        './resources/css/**/*.css',
    ],
    theme: {
        extend: {
            colors: {
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
            },
        },
        container: {
            padding: '10rem',
        },
    },
    variants: {
        backgroundColor: ['responsive', 'hover', 'focus', 'group-hover', 'focus-within', 'disabled'],
        textColor: ['responsive', 'hover', 'focus', 'group-hover', 'focus-within'],
        fontSize: ['responsive', 'hover', 'focus'],
        fontFamily: ['responsive', 'hover', 'focus'],
        zIndex: ['responsive', 'focus'],
        gradients: ['responsive', 'hover'],
        spinner: ['responsive'],
        animation: ['responsive', 'motion-safe', 'motion-reduce'],
        transitionProperty: ['responsive', 'motion-safe', 'motion-reduce'],
        outline: ['responsive', 'focus', 'hover', 'active'],
        float: ['responsive', 'direction'],
        margin: ['responsive', 'direction'],
        padding: ['responsive', 'direction'],
        borderCollapse: ['responsive', 'hover', 'focus'],
        tableLayout: ['responsive', 'hover', 'focus'],
    },
    plugins: [
        require('@tailwindcss/ui'),
        require('autoprefixer'),
        require('tailwindcss-dir')(),
        require('@tailwindcss/typography'),
        plugin(function ({ addComponents }) {
            const buttons = {
                '.btn': {
                    padding: '.5rem 1rem',
                    borderRadius: '.25rem',
                    fontWeight: '600',
                },
                '.btn-blue': {
                    backgroundColor: '#3490dc',
                    color: '#fff',
                    '&:hover': {
                        backgroundColor: '#2779bd'
                    },
                },
                '.btn-red': {
                    backgroundColor: '#e3342f',
                    color: '#fff',
                    '&:hover': {
                        backgroundColor: '#cc1f1a'
                    },
                },
            };
            addComponents(buttons)
        })
    ]
};
