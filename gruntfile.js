module.exports = function(grunt){
    grunt.initConfig({
        sass:{
            front: {
                options: {
                    style: 'expanded',
                    sourcemap: 'none',
                    noCache: true
                },
                files : {
                    'assets/css/style.css':'assets/sass/front/style.scss'
                }
            },
            admin: {
                options: {
                    style: 'expanded',
                    sourcemap: 'none',
                    noCache: true
                },
                files : {
                    'assets/css/admin.css':'assets/sass/admin/admin.scss'
                }
            },
            bootstrap: {
                options: {
                    style: 'expanded',
                    sourcemap: 'none',
                    noCache: true
                },
                files : {
                    'assets/css/bootstrap.css':'assets/sass/bootstrap.scss'
                }
            }
        },
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
        uglify:{
            my_target:{
                files: {
                    "assets/js/script.min.js":["assets/js/script.js"]
                }
            }
        },
        watch : {
            front: {
                files : [ 'assets/sass/front/style.scss' ],
                tasks : [ 'sass:front', 'cssmin' ]
            },
            admin: {
                files : [ 'assets/sass/admin/admin.scss' ],
                tasks : [ 'sass:admin', 'cssmin' ]
            },
            bootstrap: {
                files : [ 'assets/sass/bootstrap.scss' ],
                tasks : [ 'sass:bootstrap', 'cssmin' ]
            },
            js:{
               files:["assets/js/script.js"],
               tasks:["uglify"]
            }
        },
    });

    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');

    grunt.registerTask('default', ['watch']);
    grunt.registerTask('compile', ['sass']);
};
