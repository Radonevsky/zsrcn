/** @type {import('tailwindcss').Config} */
export default {
    content: [
    "./resources/*.vue",
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",

    ],
    theme: {
        colors: {
            white: '#FFFFFF',
            'light-pink': '#FDA2A2',
            pink: '#FF8B8B',
            orange: '#FEC670',
            'light-orange': '#FEBD59',
            'dark-yellow': '#F8E40A',
            yellow: '#FFF481',
            green: '#D7E993',
            btngreen: '#D1E683',
            'light-blue': '#ACD7E1',
            'light-purple': '#C5CBDD',
            violet: '#ACB9E1',
            bluergba: 'rgba(164, 174, 204, 0.8)',
            bluebg: '#8B97BC',
            'purpl-blue': '#6070A3',
            'tblue-light': '#476088',
            tblue: '#38529D',
            'line-dark-blue': '#2B438F',
            tdarkblue: '#183284',
            'link-dark-blue': '#203065',

        },
        fontFamily: {
            'roboto300': ['Roboto300', 'sans-serif'],
            'roboto400': ['Roboto400', 'sans-serif'],
            'roboto500': ['Roboto500', 'sans-serif'],
            'roboto700': ['Roboto700', 'sans-serif'],
        },
        extend: {
            transitionTimingFunction: {
                'custom-cubic': 'cubic-bezier(.19,.62,.51,1.6)',
            }
        },
    },
    plugins: [],
}

