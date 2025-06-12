module.exports = {
    parser: '@babel/eslint-parser',
    extends: [
        'eslint:recommended',
        'plugin:vue/recommended'
    ],
    env: {
        browser: true,
        node: true,
        es6: true
    },
    globals: {
        "am4core": true,
        "am4maps": true,
        "system": true,
        "am4geodata_worldLow": true
    }
}
