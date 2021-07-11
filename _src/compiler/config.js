module.exports = {
    context: 'assets',
    entry: {
        mainstyle:    '../scss/main.scss',
        adminstyle:   '../scss/admin.scss',
        editsorstyle: '../scss/editor-style.scss',
        loginstyle:   '../scss/login.scss',
        mainscript:   '../js/main.js'
    },
    devtool: 'eval-source-map',
    outputFolder: '../dist',
    publicFolder: 'dist',
    proxyTarget: 'http://datasociety.test',
    watch: [
        '../**/*.php',
        '../scss/*.scss',
        '../js/*.js'
    ]
};