module.exports = function(grunt) {
    grunt.initConfig({
        uglify: {
            my_target: {
                files: {
                    'amd/build/samiereports.js': ['amd/src/samiereports.js']
                }
            }
        }
    });    
    
    grunt.loadNpmTasks('grunt-contrib-uglify');    
};