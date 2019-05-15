module.exports = function(grunt){
    grunt.initConfig({
        cssmin: {
          target: {
            files: [{
              expand: true,
              cwd: 'assets/css/',
              src: ['*.css', '!*.min.css'],
              dest: 'assets/css/',
              ext: '.min.css'
            }]
          }
        },
        sass:{
            dist:{
                options: {                       // Target options
                    style: 'expanded',
                    sourcemap: 'none',
                    noCache: true
                },
                files:{
                    "assets/css/style.css":"assets/sass/style.scss",
                    "assets/css/bootstrap.css":"assets/sass/bootstrap.scss"
                }
            }
        },
        uglify:{
            my_target:{
                files: {
                    "assets/js/script.min.js":["assets/js/script.js"]
                }
            }
        },
        watch: {
            sass:{
                files:["assets/sass/*.scss"],
                tasks:["sass"]
            },
            css:{
                 files:["assets/css/style.css"],
                 tasks:["cssmin"]
             },
             js:{
                files:["assets/js/script.js"],
                tasks:["uglify"]
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');

    grunt.registerTask('default', ['watch']);
    grunt.registerTask('compile', ['sass']);
};
