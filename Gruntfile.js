module.exports = function(grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        concat: {
            web: {
                options: {
                    separator: '\n\n'
                },
                src: [
                    'public/static/web/app/main.js',
                    'public/static/web/app/factory/**/*.js',
                    'public/static/web/app/service/**/*.js',
                    'public/static/web/app/repository/**/*.js',
                    'public/static/web/app/controller/**/*.js',
                    'public/static/web/app/directive/**/*.js',
                    'public/static/web/app/config.js'
                ],
                dest: 'public/static/web/dist/<%= pkg.version %>/<%= pkg.name %>.js'
            }, 
            admin: {
                options: {
                    separator: '\n\n'
                },
                src: [
                    'public/static/admin/app/main.js',
                    'public/static/admin/app/factory/**/*.js',
                    'public/static/admin/app/service/**/*.js',
                    'public/static/admin/app/repository/**/*.js',
                    'public/static/admin/app/controller/**/*.js',
                    'public/static/admin/app/directive/**/*.js',
                    'public/static/admin/app/config.js'
                ],
                dest: 'public/static/admin/dist/<%= pkg.version %>/<%= pkg.name %>.js'
            }, 
            user: {
                options: {
                    separator: '\n\n'
                },
                src: [
                    'public/static/user/app/main.js',
                    'public/static/user/app/factory/**/*.js',
                    'public/static/user/app/service/**/*.js',
                    'public/static/user/app/repository/**/*.js',
                    'public/static/user/app/controller/**/*.js',
                    'public/static/user/app/directive/**/*.js',
                    'public/static/user/app/config.js'
                ],
                dest: 'public/static/user/dist/<%= pkg.version %>/<%= pkg.name %>.js'
            }
        },

        uglify: {
            web: {
                options: {
                    banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
                },
                src: 'public/static/web/dist/<%= pkg.version %>/<%= pkg.name %>.js',
                dest: 'public/static/web/dist/<%= pkg.version %>/<%= pkg.name %>.min.js'
            }, 
            user: {
                options: {
                    banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
                },
                src: 'public/static/user/dist/<%= pkg.version %>/<%= pkg.name %>.js',
                dest: 'public/static/user/dist/<%= pkg.version %>/<%= pkg.name %>.min.js'
            }, 
            admin: {
                options: {
                    banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
                },
                src: 'public/static/admin/dist/<%= pkg.version %>/<%= pkg.name %>.js',
                dest: 'public/static/admin/dist/<%= pkg.version %>/<%= pkg.name %>.min.js'
            }
        },

        watch: {
            scripts: {
                files: [
                    'public/static/web/app/main.js',
                    'public/static/web/app/factory/**/*.js',
                    'public/static/web/app/service/**/*.js',
                    'public/static/web/app/repository/**/*.js',
                    'public/static/web/app/controller/**/*.js',
                    'public/static/web/app/directive/**/*.js',
                    'public/static/web/app/config.js',
                    
                    'public/static/admin/app/main.js',
                    'public/static/admin/app/factory/**/*.js',
                    'public/static/admin/app/service/**/*.js',
                    'public/static/admin/app/repository/**/*.js',
                    'public/static/admin/app/controller/**/*.js',
                    'public/static/admin/app/directive/**/*.js',
                    'public/static/admin/app/config.js',
                    
                    'public/static/user/app/main.js',
                    'public/static/user/app/factory/**/*.js',
                    'public/static/user/app/service/**/*.js',
                    'public/static/user/app/repository/**/*.js',
                    'public/static/user/app/controller/**/*.js',
                    'public/static/user/app/directive/**/*.js',
                    'public/static/user/app/config.js'
                ],
                tasks: ['default']
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-concat');

    // Default task(s).
    grunt.registerTask('default', ['concat', 'uglify']);

};