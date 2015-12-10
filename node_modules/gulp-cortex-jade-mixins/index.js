'use strict';

var PluginError = require('gulp-util').PluginError;
var fs = require('fs');
var through = require('through2');
var node_path = require('path');

var file = node_path.join(__dirname, 'jade', 'common.jade');
var common = fs.readFileSync(file).toString();

module.exports = function (){
  return through.obj(function (file, enc, callback) {
    if(file.isStream()){
      this.emit('error', new PluginError('gulp-cortex-jade-mixins', 'Streaming not supported'));
      return callback();
    }

    file.contents = new Buffer(common + String(file.contents));
    this.push(file);
    callback();
  });
};
