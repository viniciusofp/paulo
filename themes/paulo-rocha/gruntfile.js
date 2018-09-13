// P@ul0R0ch@13

// Comando para instalar dependências
// npm install grunt grunt-contrib-watch grunt-contrib-sass grunt-contrib-uglify

module.exports = function(grunt) {

  grunt.initConfig({
    // uglify: {
    //   options: {
    //     mangle: false,
    //     compress: false
    //   },
    //   angular: {
    //     files: {
    //       'js/input.js': ['js/output.min.js']
    //     }
    //   },
    //   // my_target: {
    //   //   files: {
    //   //     'js/input.js': ['js/output']
    //   //   }
    //   // }
    // },
    sass: {                              // Task
      dist: {                            // Target
        options: {                       // Target options
          style: 'compressed'
        },
        files: {                         // Dictionary of files
          'style.css': 'sass/style.scss',       // 'destination': 'source'
        }
      }
    },
    watch: {
      css: {
        files: ['sass/*'],
        tasks: ['sass']
      },
      // scripts: {
      //   files: ['js/app.js'],
      //   tasks: ['uglify']
      // }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-uglify');

  grunt.registerTask('default', ['watch']);

};