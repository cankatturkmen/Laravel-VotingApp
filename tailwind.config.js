const colors  = require('tailwindcss/defaultTheme');
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors:{
                'gray-background': '#f7f8fc',
                transparent: 'transparent',
                current: 'currentColor',
                black: colors.black,
                white: colors.white,
                gray: colors.trueGray,
                'blue': '#328af1',
                'blue-hover':'#2879bd',
                'yellow':'#ffc73c',
                'red':'#ec454f',
                'red-100':'#fee2e2',
                'green': '#1aab8b',
                'purple': '#8b60ed',
            },
            maxWidth:{
                custom: '68.5rem'
            },
            spacing:{
                104: "26rem",
                22: '5.5rem',
                70: '17.5rem',
                76: "19rem",
                175:'43.75rem',
            },
            fontFamily: {
                sans: ['Open Sans', ...defaultTheme.fontFamily.sans],
            },
            fontSize:{
                xxs: ['0.625rem', {lineHeight: '1rem'}]
            },
            boxShadow: {
                card:'4px 4px 15px 0 rgba(36,37,38,0.08)',
                dialog:'3px 4px 15px 0 rgba(36,37,38,0.22)'
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/line-clamp'),
    ],

};
