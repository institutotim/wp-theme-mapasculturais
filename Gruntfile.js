module.exports = function(grunt) {

  grunt.initConfig({
    less: {
      all: {
        options: {
          mangle: true,
          compress: true
        },
        files: {
          'css/main.css': 'css/main.less',
          'css/responsive.css': 'css/responsive.less'
        }
      }
    },
    copy: {
      assets: {
        files: [
          {
            cwd: 'bower_components',
            src: ['**/*'],
            dest: 'assets',
            expand: true
          }
        ]
      }
    },
    pot: {
      options: {
        encoding: 'UTF-8',
        text_domain: 'pmc',
        language: 'PHP',
        keywords: [
          '__',
          '_e',
          '_x:1,2c',
          '_ex:1,2c',
          '_n:1,2',
          '_nx:1,2,4c'
        ],
        dest: 'languages/'
      },
      files: {
        src: ['**/*.php', '!assets/**/*.php', '!node_modules/**/*.php', '!inc/class-tgm*'],
        expand: true
      }
    },
    watch: {
      css: {
        files: 'css/*.less',
        tasks: ['less']
      },
      php: {
        files: ['**/*.php', '!assets/**/*.php', '!node_modules/**/*.php', '!inc/class-tgm*'],
        tasks: ['pot']
      },
      copy: {
        files: 'bower_components/**/*',
        tasks: ['copy']
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-pot');
  grunt.loadNpmTasks('grunt-contrib-watch');

  grunt.registerTask(
    'build',
    ['less', 'copy', 'pot']
  );

  grunt.registerTask(
    'default',
    ['build', 'watch']
  );

}
